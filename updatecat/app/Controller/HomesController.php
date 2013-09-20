<?php

App::uses('AppController', 'Controller');

/**
 * Homes Controller
 *
 * @property Home $Home
 */
class HomesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Home->recursive = 0;
        $this->set('homes', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Home->id = $id;
        if (!$this->Home->exists()) {
            throw new NotFoundException(__('Invalid home'));
        }
        $this->set('home', $this->Home->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Home']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'homes' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Home']['image'] = $target_name;
            } else {
                unset($this->request->data['Home']['image']);
            }

            if ($this->Home->save($this->request->data)) {
                $this->Session->setFlash(__('La elemento ha sido guardado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar el elemento.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Home']['image']) && !is_array($this->request->data['Home']['image']) && $this->request->data['Home']['image'] != "")
                    if (file_exists('img' . DS . 'homes' . DS . $this->request->data['Home']['image'])) {
                        unlink('img' . DS . 'homes' . DS . $this->request->data['Home']['image']);
                    }
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Home->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Home->read();
            $image = $this->request->data['Home']['image'];
            $this->set('image', $image);
        } else {
            $exts = array('image/gif', 'image/jpeg', 'image/png');

            $image = $this->request->data['Home']['image'];
            if ($image['error'] == 0 && in_array($image['type'], $exts)) {
                $extension = end(explode(".", basename($image['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'img' . DS . 'homes' . DS . $target_name;
                move_uploaded_file($image['tmp_name'], $target_path);

                $this->request->data['Home']['image'] = $target_name;
            } else {
                unset($this->request->data['Home']['image']);
            }

            $obj_image = $this->Home->read();
            $image = $obj_image['Home']['image'];
            $this->set('image', $image);

            if ($this->Home->save($this->request->data)) {
                $this->Session->setFlash(__('El elemento ha sido actualizada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar el elemento.'), 'default', array('class' => 'failure'));

                if (isset($this->request->data['Home']['image']) && !is_array($this->request->data['Home']['image']) && $this->request->data['Home']['image'] != "")
                    if (file_exists('img' . DS . 'homes' . DS . $this->request->data['Home']['image'])) {
                        unlink('img' . DS . 'homes' . DS . $this->request->data['Home']['image']);
                    }
            }
        }






        $this->Home->id = $id;
        if (!$this->Home->exists()) {
            throw new NotFoundException(__('Invalid home'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Home->save($this->request->data)) {
                $this->Session->setFlash(__('The home has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The home could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Home->read(null, $id);
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Home->id = $id;
        $mark = $this->Home->read();
        $name_image = $mark['Home']['image'];

        if ($this->Home->delete($id)) {
            if (file_exists('img' . DS . 'homes' . DS . $name_image)) {
                if (file_exists('img' . DS . 'homes' . DS . $name_image)) {
                    unlink('img' . DS . 'homes' . DS . $name_image);
                }
            }
            $this->Session->setFlash(__('El elemento ha sido eliminado.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
