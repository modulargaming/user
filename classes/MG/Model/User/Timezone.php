<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * User timezone model, contains all timezones a user can use.
 *
 * @package    MG/User
 * @category   Model
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_Model_User_Timezone extends ORM {

	protected $_table_columns = array(
		'id'       => NULL,
		'timezone' => NULL,
		'name'     => NULL
	);

	public static function timezone_exists($id)
	{
		$timezone = ORM::factory('User_Timezone', $id);

		return $timezone->loaded();
	}

}
