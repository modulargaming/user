<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * View for Admin User User Index
 *
 * @package    MG/User
 * @category   View
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_View_Admin_User_User_Index extends Abstract_View_Admin {

	public $title = 'Users';

	public function users()
	{
		$users = array();

		foreach ($this->users as $user)
		{
			$users[] = array(
				$user->id,
				$user->username,
			);
		}

		return $users;
	}

	public function user_roles()
	{
		$list = array();

		foreach ($this->roles as $role) {
			$list[$role->id] = array('name' => $role->name);
		}

		return json_encode($list, JSON_NUMERIC_CHECK);
	}

	public function roles()
	{
		$list = array();

		foreach ($this->roles as $role) {
			$list[] = array('name' => $role->name, 'id' => $role->id);
		}

		return $list;
	}
}
