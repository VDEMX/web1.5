<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'admin_login');
    }
    
    public function admin_index() {
        $this->set('users', $this->User->find('all'));
    }

    public function admin_view($id = null) {
        $this->User->id = $id;
        $this->set('user', $this->User->read());
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido guardado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo adicionar el usuario.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
            unset($this->request->data['User']['password']);
        } else {
            if($this->request->data['User']['password'] == '')
                unset($this->request->data['User']['password']);
            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido actualizado.'), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('No se pudo actualizar el usuario.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('El usuario ha sido eliminado.'), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function login() {
        if ($this->Auth->user())
            $this->redirect(array(
                'controller' => 'admin',
                'action' => 'index'
            ));

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {                
                $this->redirect(array(
                    'controller' => 'admin',
                    'action' => 'index'
                ));
            }else{
                $this->Session->setFlash(__('Usuario o contraseña incorrecta, intente otra vez.'), 'default', array('class' => 'failure'));
            }
        } 
    }

    public function logout() {
        $this->Auth->logout();
        $this->redirect('/');
    }
    
    public function admin_login() {
        if ($this->Auth->user())
            $this->redirect(array(
                'controller' => 'admin',
                'action' => 'index'
            ));

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {                
                $this->redirect(array(
                    'controller' => 'admin',
                    'action' => 'index'
                ));
            }else{
                $this->Session->setFlash(__('Usuario o contraseña incorrecta, intente otra vez.'), 'default', array('class' => 'failure'));
            }
        }
    }

    public function admin_logout() {
        $this->Auth->logout();
        $this->redirect('/');
    }

    
}
