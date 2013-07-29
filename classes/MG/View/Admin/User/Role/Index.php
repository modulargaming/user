<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * View for Admin User Role Index
 *
 * @package    MG/User
 * @category   View
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_View_Admin_User_Role_Index extends Abstract_View_Admin {

	public $title = 'Roles';

	public function roles()
	{
		$roles = array();

		foreach ($this->roles as $role)
		{
			$roles[] = array(
				'id'          => $role->id,
				'name'        => $role->name,
				'description' => $role->description
			);
		}

		return $roles;
	}

}
