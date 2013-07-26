<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Task to promote a user to admin
 *
 * Available config options are:
 *
 *  --username=username
 *
 *  This is the username of the user you wish to promote.
 *
 *  --type=id
 *
 *  How you wish to define roles, use either name or id.
 *  This value is defaulted to `id`
 *
 *  --roles=admin
 *
 *  This is the role(s) you wish to promote the user to. It can either be a
 *  single digit, string or multiple separated by a comma.
 *  This value defaults to `admin`
 *
 * @package    MG/User
 * @category   Task
 * @author     Kohana Team
 * @copyright  (c) 2009-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class MG_Task_User_Promote extends Minion_Task
{
     protected $_options = array(
         'username' => NULL,
	     'type' => 'id',
	     'roles' => 2 //default to admin
    );

	/**
	 * Task to promote a user to admin
	 *
	 * Accepts the following options:
	 *  - username: the user you want to promote
	 *  - type: [id, name] How you'll assign the role (defaults to id)
	 *  - roles: a string(single) or multiple(separated by a comma) of {type} role(s) (defaults to admin)
	 *
	 * @param array $params
	 * @return null
	 */
	protected function _execute(array $params)
	{
		$user = ORM::factory('User')
			->where('username', '=', $params['username'])
			->find();

		if ( ! $user->loaded())
		{
			echo 'Unable to load user "'.$params['username'].'"'.PHP_EOL;
		}
		else
		{
			$roles = explode(',', $params['roles']);

			foreach ($roles as $role)
			{
				if ($params['type'] == 'name')
				{
					$role = array('name' => $role);
				}

				if ( ! $user->has('roles', $role))
				{
					$user->add('roles', $role);
				}
			}
			echo 'The user "'.$params['username'].'" was assigned the role(s) "'.$params['roles'].'"'.PHP_EOL;
		}
	}

	public function build_validation(Validation $validation)
	{
		return parent::build_validation($validation)
			->rule('username', 'not_empty') // Require this param
			->rule('username', function($value){
				return ORM::factory('User')
					->where('username', '=', $value)
					->find()
					->loaded();
			}); // Check if the username exists
	}
}
