<?php

App::uses('AppController', 'Controller');

/**
 * Sectors Controller
 *
 * @property Sector $Sector
 */
class SectorsController extends AppController {

    public function change_order() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $sector_id = $data['id'];
            $move = $data['move'];
            if (isset($sector_id) & isset($move)) {
                $options['order'] = array('Sector.order' => 'asc');

                $neighbors = $this->Sector->find('all', $options);

                if ($move == 'up') { // si es mover arriba
                    if (isset($neighbors)) {
                        $current_data = $this->Sector->findById($sector_id);
                        $temp_order = $current_data['Sector']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Sector']['id'] == $sector_id) {
                                if (!($key == 0)) {
                                    $current_data['Sector']['order'] = $neighbors[$key - 1]['Sector']['order'];
                                    if ($this->Sector->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Sector->id = $neighbors[$key - 1]['Sector']['id'];
                                    $next_data = $this->Sector->read();
                                    $next_data['Sector']['order'] = $temp_order;
                                    if ($this->Sector->save($next_data)) {
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
                        $current_data = $this->Sector->findById($sector_id);
                        $temp_order = $current_data['Sector']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Sector']['id'] == $sector_id) {
                                if (($key + 1) < count($neighbors)) {
                                    $current_data['Sector']['order'] = $neighbors[$key + 1]['Sector']['order'];
                                    if ($this->Sector->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Sector->id = $neighbors[$key + 1]['Sector']['id'];
                                    $next_data = $this->Sector->read();
                                    $next_data['Sector']['order'] = $temp_order;
                                    if ($this->Sector->save($next_data)) {
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
        $options['order'] = array('Sector.order' => 'asc');
        $this->set('sectors', $this->Sector->find('all', $options));
    }

    public function admin_view($id = null) {
        $this->Sector->id = $id;
        $this->set('sector', $this->Sector->read());
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Sector']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'sectors' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Sector']['image'] = $target_name;
            } else {
                unset($this->request->data['Sector']['image']);
            }
            $sql = "SELECT Max(Sector.`order`) AS `order` FROM sectors AS Sector";
            $order_last = $this->Sector->query($sql);
            $order = $order_last[0][0]['order'];
            $this->request->data['Sector']['order'] = $order + 1;

            if ($this->Sector->save($this->request->data)) {
                $this->Session->setFlash(__('El sector ha sido guardado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar el sector.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Sector']['image']) && !is_array($this->request->data['Sector']['image']) && $this->request->data['Sector']['image'] != "")
                    if (file_exists('img' . DS . 'sectors' . DS . $this->request->data['Sector']['image'])) {
                        unlink('img' . DS . 'sectors' . DS . $this->request->data['Sector']['image']);
                    }
            }
        }
    }

    public function admin_edit($id = null) {
        $this->Sector->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Sector->read();

            $image = $this->request->data['Sector']['image'];
            $this->set('image', $image);
        } else {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Sector']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'sectors' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Sector']['image'] = $target_name;
            } else {
                unset($this->request->data['Sector']['image']);
            }

            $obj_image = $this->Sector->read();
            $image = $obj_image['Sector']['image'];
            $this->set('image', $image);

            if ($this->Sector->save($this->request->data)) {
                $this->Session->setFlash(__('El sector ha sido actualizado..'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar el sector.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Sector']['image']) && !is_array($this->request->data['Sector']['image']) && $this->request->data['Sector']['image'] != "")
                    if (file_exists('img' . DS . 'sectors' . DS . $this->request->data['Sector']['image'])) {
                        unlink('img' . DS . 'sectors' . DS . $this->request->data['Sector']['image']);
                    }
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Sector->id = $id;
        $sector = $this->Sector->read();
        $name_image = $sector['Sector']['image'];

        if ($this->Sector->delete($id)) {
            if (file_exists('img' . DS . 'sectors' . DS . $name_image)) {
                unlink('img' . DS . 'sectors' . DS . $name_image);
            }
            $this->Session->setFlash(__('El sector ha sido eliminado.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
