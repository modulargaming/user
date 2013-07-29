<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * User title model.
 *
 * @package    MG/User
 * @category   Model
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_Model_User_Title extends ORM {

	protected $_table_columns = array(
		'id'          => NULL,
		'title'       => NULL,
		'description' => NULL
	);

	public static function title_exists($id)
	{
		$title = ORM::factory('User_Title', $id);

		return $title->loaded();
	}

}
