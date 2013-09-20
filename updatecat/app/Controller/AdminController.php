<?php
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class AdminController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Admin';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function admin_index() {
		
	}
}
