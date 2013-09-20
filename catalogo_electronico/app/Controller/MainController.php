<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class MainController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Main';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
	public function index() {
        $this->set('title_for_layout','Main');   
        
        if($this->Auth->user())
            $this->redirect(array(
                'controller' => 'admin',
                'action' => 'index'
            ));
	}
}
