<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * View for user logout page.
 *
 * @package    MG/User
 * @category   View
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_View_User_Logout extends Abstract_View_User {

	public $title = 'Logout';

	protected function get_breadcrumb()
	{
		
		return array_merge(parent::get_breadcrumb(), array(
			array(
				'title' => 'Logout',
				'href'  => Route::url('user.logout')
			)
		));
	}

}
