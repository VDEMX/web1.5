<?php

App::uses('AppController', 'Controller');

/**
 * Applications Controller
 *
 * @property Application $Application
 */
class ApplicationsController extends AppController {

    public $uses = array('Application', 'ApplicationsSector');

    public function change_order() {
        if ($this->request->is('ajax')) {
            $data = $this->request->data;
            $application_id = $data['id'];
            $move = $data['move'];
            if (isset($application_id) & isset($move)) {
                $options['order'] = array('Application.order' => 'asc');

                $neighbors = $this->Application->find('all', $options);

                if ($move == 'up') { // si es mover arriba
                    if (isset($neighbors)) {
                        $current_data = $this->Application->findById($application_id);
                        $temp_order = $current_data['Application']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Application']['id'] == $application_id) {
                                if (!($key == 0)) {
                                    $current_data['Application']['order'] = $neighbors[$key - 1]['Application']['order'];
                                    if ($this->Application->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Application->id = $neighbors[$key - 1]['Application']['id'];
                                    $next_data = $this->Application->read();
                                    $next_data['Application']['order'] = $temp_order;
                                    if ($this->Application->save($next_data)) {
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
                        $current_data = $this->Application->findById($application_id);
                        $temp_order = $current_data['Application']['order'];
                        foreach ($neighbors as $key => $value) {
                            if ($value['Application']['id'] == $application_id) {
                                if (($key + 1) < count($neighbors)) {
                                    $current_data['Application']['order'] = $neighbors[$key + 1]['Application']['order'];
                                    if ($this->Application->save($current_data)) {
                                        $this->response->body("Elemento actual salvado correctamente");
                                    } else {
                                        $this->response->body("Error al salvar");
                                    }
                                    $this->Application->id = $neighbors[$key + 1]['Application']['id'];
                                    $next_data = $this->Application->read();
                                    $next_data['Application']['order'] = $temp_order;
                                    if ($this->Application->save($next_data)) {
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
        $options['order'] = array('Application.order' => 'asc');
        $this->set('applications', $this->Application->find('all', $options));
    }

    public function admin_view($id = null) {
        $this->Application->id = $id;
        $this->set('application', $this->Application->read());
    }

    public function admin_add() {

        if ($this->request->is('post')) {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Application']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'applications' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Application']['image'] = $target_name;
            } else {
                unset($this->request->data['Application']['image']);
            }
            $sql = "SELECT Max(Application.`order`) AS `order` FROM applications AS Application";
            $order_last = $this->Application->query($sql);
            $order = $order_last[0][0]['order'];
            $this->request->data['Application']['order'] = $order + 1;

            if ($this->Application->save($this->request->data)) {
                $sectors = $this->request->data['Application']['Sector'];
                if (is_array($sectors)) {
                    foreach ($sectors as $item) {
                        $this->ApplicationsSector->create();
                        $this->ApplicationsSector->set('application_id', $this->Application->id);
                        $this->ApplicationsSector->set('sector_id', $item);
                        $this->ApplicationsSector->save();
                    }
                }
                $this->Session->setFlash(__('La aplicación ha sido guardada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar la aplicación.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Application']['image']) && !is_array($this->request->data['Application']['image']) && $this->request->data['Application']['image'] != "")
                    if (file_exists('img' . DS . 'applications' . DS . $this->request->data['Application']['image'])) {
                        unlink('img' . DS . 'applications' . DS . $this->request->data['Application']['image']);
                    }
            }
        }
        $this->set('sectors', $this->Application->Sector->find('list'));
    }

    public function admin_edit($id = null) {
        $this->Application->id = $id;
        $this->set('sectors', $this->Application->Sector->find('list'));
        if ($this->request->is('get')) {
            $this->request->data = $this->Application->read();
            $image = $this->request->data['Application']['image'];
            $this->set('image', $image);
        } else {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Application']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'applications' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Application']['image'] = $target_name;
            } else {
                unset($this->request->data['Application']['image']);
            }

            $obj_image = $this->Application->read();
            $image = $obj_image['Application']['image'];
            $this->set('image', $image);

            if ($this->Application->save($this->request->data)) {
                $this->ApplicationsSector->deleteAll(array('ApplicationsSector.application_id' => $this->Application->id), false);
                $sectors = $this->request->data['Application']['Sector'];
                if (!is_array($sectors))
                    $sectors = array();
                foreach ($sectors as $item) {
                    $this->ApplicationsSector->create();
                    $this->ApplicationsSector->set('sector_id', $item);
                    $this->ApplicationsSector->set('application_id', $this->Application->id);
                    $this->ApplicationsSector->save();
                }
                $this->Session->setFlash(__('La aplicación ha sido actualizada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar la aplicación.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Application']['image']) && !is_array($this->request->data['Application']['image']) && $this->request->data['Application']['image'] != "")
                    if (file_exists('img' . DS . 'applications' . DS . $this->request->data['Application']['image'])) {
                        unlink('img' . DS . 'applications' . DS . $this->request->data['Application']['image']);
                    }
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Application->id = $id;
        $application = $this->Application->read();
        $name_image = $application['Application']['image'];

        if ($this->Application->delete($id)) {
            if (file_exists('img' . DS . 'applications' . DS . $name_image)) {
                unlink('img' . DS . 'applications' . DS . $name_image);
            }
            $this->Session->setFlash(__('La aplicación ha sido eliminada.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}

