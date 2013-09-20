<?php

App::uses('AppController', 'Controller');

/**
 * Pdfs Controller
 *
 * @property Pdf $Pdf
 */
class PdfsController extends AppController {

    public $uses = array('Pdf', 'Product');

    public function change_order() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $pdf_id = $data['pdf_id'];
            $move = $data['move'];
            if (isset($pdf_id) & isset($move)) {
//                $options['conditions'] = array(
//                    'Pdf.id' => $pdf_id,
//                );
                $options['order'] = array('product_id' => 'asc', 'order' => 'asc');

                $neighbors = $this->Pdf->find('all', $options);

                if ($move == 'up') { // si es mover arriba
                    if (isset($neighbors)) {
                        $current_data = $this->Pdf->findById($pdf_id);
                        $temp_order = $current_data['Pdf']['order'];
//                        die(debug($neighbors));
                        foreach ($neighbors as $key => $value) {
                            if ($value['Pdf']['id'] == $pdf_id) {
                                if (!($key == 0)) {
                                    $current_data['Pdf']['order'] = $neighbors[$key - 1]['Pdf']['order'];
                                    if ($this->Pdf->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Pdf->id = $neighbors[$key - 1]['Pdf']['id'];
                                    $next_data = $this->Pdf->read();
                                    $next_data['Pdf']['order'] = $temp_order;
                                    if ($this->Pdf->save($next_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                }
                            }
                        }
                    } else {
                        $this->response->body("Elemento no se pudo subir");
                    }
                }

                if ($move == 'down') {
                    if (isset($neighbors)) {
                        $current_data = $this->Pdf->findById($pdf_id);
                        $temp_order = $current_data['Pdf']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Pdf']['id'] == $pdf_id) {
                                if (($key + 1) < count($neighbors)) {
                                    $current_data['Pdf']['order'] = $neighbors[$key + 1]['Pdf']['order'];
                                    if ($this->Pdf->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Pdf->id = $neighbors[$key + 1]['Pdf']['id'];
                                    $next_data = $this->Pdf->read();
                                    $next_data['Pdf']['order'] = $temp_order;
                                    if ($this->Pdf->save($next_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                }
                            }
                        }
                    } else {
                        $this->response->body("Elemento no se pudo bajar");
                    }
                }
            }
            return $this->response;
        }
    }

    public function admin_index() {
        $options['order'] = array('product_id' => 'asc', 'order' => 'asc');
        $this->set('pdfs', $this->Pdf->find('all', $options));
    }

    public function admin_view($id = null) {
        $this->Pdf->id = $id;
        $this->set('pdf', $this->Pdf->read());
    }

    public function admin_add() {
        $this->set('products', $this->Product->find('list'));

        if ($this->request->is('post')) {

            $file = $this->request->data['Pdf']['file'];
            if ($file['error'] == 0 && $file['type'] == 'application/pdf') {
                $extension = end(explode(".", basename($file['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'files' . DS . 'pdfs' . DS . $target_name;
                move_uploaded_file($file['tmp_name'], $target_path);

                $this->request->data['Pdf']['file'] = $target_name;
            } else {
                unset($this->request->data['Pdf']['file']);
            }
            $sql = "SELECT Max(Pdf.`order`) AS `order` FROM pdfs AS Pdf";
            $order_last = $this->Pdf->query($sql);
            $order = $order_last[0][0]['order'];
            $this->request->data['Pdf']['order'] = $order + 1;
            if ($this->Pdf->save($this->request->data)) {
                $this->Session->setFlash(__('El pdf ha sido guardado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar el pdf.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Pdf']['file']) && !is_array($this->request->data['Pdf']['file']) && $this->request->data['Pdf']['file'] != "")
                    if ('files' . DS . 'pdfs' . DS . $this->request->data['Pdf']['file']) {
                        unlink('files' . DS . 'pdfs' . DS . $this->request->data['Pdf']['file']);
                    }
            }
        }
    }

    public function admin_edit($id = null) {
        $this->set('products', $this->Product->find('list'));

        $this->Pdf->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Pdf->read();

            $file = $this->request->data['Pdf']['file'];
            $this->set('file', $file);
        } else {
            $file = $this->request->data['Pdf']['file'];
            if ($file['error'] == 0 && $file['type'] == 'application/pdf') {
                $extension = end(explode(".", basename($file['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'files' . DS . 'pdfs' . DS . $target_name;
                move_uploaded_file($file['tmp_name'], $target_path);

                $this->request->data['Pdf']['file'] = $target_name;
            } else {
                unset($this->request->data['Pdf']['file']);
            }

            $obj_file = $this->Pdf->read();
            $file = $obj_file['Pdf']['file'];
            $this->set('file', $file);

            if ($this->Pdf->save($this->request->data)) {
                $this->Session->setFlash(__('El pdf ha sido actualizado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar el pdf.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Pdf']['file']) && !is_array($this->request->data['Pdf']['file']) && $this->request->data['Pdf']['file'] != "")
                    if (file_exists('files' . DS . 'pdfs' . DS . $this->request->data['Pdf']['file'])) {
                        unlink('files' . DS . 'pdfs' . DS . $this->request->data['Pdf']['file']);
                    }
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Pdf->id = $id;
        $pdf = $this->Pdf->read();
        $name_file = $pdf['Pdf']['file'];

        if ($this->Pdf->delete($id)) {
            if ('files' . DS . 'pdfs' . DS . $name_file) {
                unlink('files' . DS . 'pdfs' . DS . $name_file);
            }
            $this->Session->setFlash(__('El pdf ha sido eliminado.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}