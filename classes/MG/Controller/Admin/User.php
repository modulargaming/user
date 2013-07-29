<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Controller for Admin User Index
 *
 * @package    MG/User
 * @category   Controller
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */

class MG_Controller_Admin_User extends Abstract_Controller_Admin {

	public function action_index()
	{
		$this->redirect(Route::get('user.admin.user.index')->uri());
	}

}
