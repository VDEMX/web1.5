<?php

App::uses('AppController', 'Controller');

/**
 * Versions Controller
 *
 * @property Version $Version
 */
class VersionsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Version->recursive = 0;
        $this->set('versions', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Version->id = $id;
        if (!$this->Version->exists()) {
            throw new NotFoundException(__('Versión Inválida'));
        }
        $this->set('version', $this->Version->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) {

            $file = $this->request->data['Version']['file'];
            if ($file['error'] == 0) {
                $extension = end(explode(".", basename($file['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'files' . DS . 'versions' . DS . $target_name;
                move_uploaded_file($file['tmp_name'], $target_path);
                $this->request->data['Version']['file'] = $target_name;
            } else {
                unset($this->request->data['Version']['file']);
            }
            if ($this->Version->save($this->request->data)) {
                $this->Session->setFlash(__('La versión ha sido guardada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {

                if (isset($this->request->data['Version']['file']) && !is_array($this->request->data['Version']['file']) && $this->request->data['Version']['file'] != "")
                    if (file_exists('files' . DS . 'versions' . DS . $this->request->data['Version']['file'])) {
                        unlink('files' . DS . 'versions' . DS . $this->request->data['Version']['file']);
                    }
                $this->Session->setFlash(__('No se pudo adicionar la versión.'), 'default', array('class' => 'failure'));
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
        $this->Version->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Version->read();
            $file = $this->request->data['Version']['file'];
            $this->set('file', $file);
            $version = $this->request->data;
            $this->set('version', $version);
        } else {
            $this->Version->id = $id;
            $version = $this->Version->read();
            $oldfile = $version['Version']['file'];
            $file = $this->request->data['Version']['file'];
            if ($file['error'] == 0) {
                $extension = end(explode(".", basename($file['name'])));
                $target_name = String::uuid() . '.' . $extension;
                $target_path = 'files' . DS . 'versions' . DS . $target_name;
                move_uploaded_file($file['tmp_name'], $target_path);
                $this->request->data['Version']['file'] = $target_name;
            } else {
                unset($this->request->data['Version']['file']);
            }

            if ($this->Version->save($this->request->data)) {
                if (isset($oldfile)) {
                    if ('files' . DS . 'versions' . DS . $oldfile) {
                        unlink('files' . DS . 'versions' . DS . $oldfile);
                    }
                }
                $this->Session->setFlash(__('La version ha sido actualizada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                if (isset($this->request->data['Version']['file']) && !is_array($this->request->data['Version']['file']) && $this->request->data['Version']['file'] != "") {
                    if (file_exists('files' . DS . 'versions' . DS . $this->request->data['Version']['file'])) {
                        unlink('files' . DS . 'versions' . DS . $this->request->data['Version']['file']);
                    }
                }
                $this->Session->setFlash(__('No se pudo actualizar la versión.'), 'default', array('class' => 'failure'));
            }
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
        $this->Version->id = $id;
        $version = $this->Version->read();
        $name_file = $version['Version']['file'];

        if ($this->Version->delete($id)) {
            if (file_exists('files' . DS . 'versions' . DS . $name_file)) {
                unlink('files' . DS . 'versions' . DS . $name_file);
            }


            $this->Session->setFlash(__('la versión ha sido eliminada.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
