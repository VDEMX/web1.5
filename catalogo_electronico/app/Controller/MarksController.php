<?php

App::uses('AppController', 'Controller');

/**
 * Marks Controller
 *
 * @property Mark $Mark
 */
class MarksController extends AppController {

    public $uses = array('Mark', 'Application');

    public function change_order() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $mark_id = $data['id'];
            $move = $data['move'];
            if (isset($mark_id) & isset($move)) {
                $options['order'] = array('Mark.order' => 'asc');

                $neighbors = $this->Mark->find('all', $options);

                if ($move == 'up') { // si es mover arriba
                    if (isset($neighbors)) {
                        $current_data = $this->Mark->findById($mark_id);
                        $temp_order = $current_data['Mark']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Mark']['id'] == $mark_id) {
                                if (!($key == 0)) {
                                    $current_data['Mark']['order'] = $neighbors[$key - 1]['Mark']['order'];
                                    if ($this->Mark->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Mark->id = $neighbors[$key - 1]['Mark']['id'];
                                    $next_data = $this->Mark->read();
                                    $next_data['Mark']['order'] = $temp_order;
                                    if ($this->Mark->save($next_data)) {
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
                        $current_data = $this->Mark->findById($mark_id);
                        $temp_order = $current_data['Mark']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Mark']['id'] == $mark_id) {
                                if (($key + 1) < count($neighbors)) {
                                    $current_data['Mark']['order'] = $neighbors[$key + 1]['Mark']['order'];
                                    if ($this->Mark->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Mark->id = $neighbors[$key + 1]['Mark']['id'];
                                    $next_data = $this->Mark->read();
                                    $next_data['Mark']['order'] = $temp_order;
                                    if ($this->Mark->save($next_data)) {
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
        $options['order'] = array('Mark.order' => 'asc');
        $this->set('marks', $this->Mark->find('all', $options));
    }

    public function admin_view($id = null) {
        $this->Mark->id = $id;
        $this->set('mark', $this->Mark->read());
    }

    public function admin_add() {
//        $this->set('applications', $this->Application->find('list'));

        if ($this->request->is('post')) {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Mark']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'marks' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Mark']['image'] = $target_name;
            } else {
                unset($this->request->data['Mark']['image']);
            }
            $sql = "SELECT Max(Mark.`order`) AS `order` FROM marks AS Mark";
            $order_last = $this->Mark->query($sql);
            $order = $order_last[0][0]['order'];
            $this->request->data['Mark']['order'] = $order + 1;
            if ($this->Mark->save($this->request->data)) {
                $this->Session->setFlash(__('La marca ha sido guardada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar la marca.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Mark']['image']) && !is_array($this->request->data['Mark']['image']) && $this->request->data['Mark']['image'] != "")
                    if ('img' . DS . 'marks' . DS . $this->request->data['Mark']['image']) {
                        unlink('img' . DS . 'marks' . DS . $this->request->data['Mark']['image']);
                    }
            }
        }
    }

    public function admin_edit($id = null) {
//        $this->set('applications', $this->Application->find('list'));

        $this->Mark->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Mark->read();

            $image = $this->request->data['Mark']['image'];
            $this->set('image', $image);
        } else {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Mark']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'marks' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Mark']['image'] = $target_name;
            } else {
                unset($this->request->data['Mark']['image']);
            }

            $obj_image = $this->Mark->read();
            $image = $obj_image['Mark']['image'];
            $this->set('image', $image);

            if ($this->Mark->save($this->request->data)) {
                $this->Session->setFlash(__('La marca ha sido actualizada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar la marca.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Mark']['image']) && !is_array($this->request->data['Mark']['image']) && $this->request->data['Mark']['image'] != "")
                    unlink('img' . DS . 'marks' . DS . $this->request->data['Mark']['image']);
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Mark->id = $id;
        $mark = $this->Mark->read();
        $name_image = $mark['Mark']['image'];

        if ($this->Mark->delete($id)) {
            if (file_exists('img' . DS . 'marks' . DS . $name_image)) {
                if (file_exists('img' . DS . 'marks' . DS . $name_image)) {
                    unlink('img' . DS . 'marks' . DS . $name_image);
                }
            }
            $this->Session->setFlash(__('La marca ha sido eliminada.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
