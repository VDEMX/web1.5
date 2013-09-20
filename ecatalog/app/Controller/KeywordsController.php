<?php

App::uses('AppController', 'Controller');

/**
 * Keywords Controller
 *
 * @property Keyword $Keyword
 */
class KeywordsController extends AppController {

    public function get_keywords() {
        $q = $this->request->query['term'];
        $items = $this->Keyword->find('list');
        $result = array();
        foreach ($items as $key => $value) {
            if (strpos(strtolower($value), strtolower(trim($q) ) ) !== false) {
                array_push($result, array("id" => $key, "label" => $value, "value" => strip_tags($value)));
            }
            if (count($result) > 11)
                break;
        }
        $this->response->body(json_encode($result));
        return $this->response;
    }

    public function admin_index() {
        $this->set('keywords', $this->Keyword->find('all'));
    }

    public function admin_view($id = null) {
        $this->Keyword->id = $id;
        $this->set('keyword', $this->Keyword->read());
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('La keyword ha sido guardada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar la keyword.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->Keyword->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Keyword->read();
        } else {
            if ($this->Keyword->save($this->request->data)) {
                $this->Session->setFlash(__('La keyword ha sido actualizada.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar la keyword.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Keyword->delete($id)) {
            $this->Session->setFlash(__('La keyword ha sido eliminada.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
