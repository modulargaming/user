<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * View for Admin User Log Index
 *
 * @package    MG/User
 * @category   View
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_View_Admin_User_Log_Index extends Abstract_View_Admin {

	public $title = 'Logs';

	public function logs()
	{
		$logs = array();

		foreach ($this->logs as $log)
		{
			$logs[] = array(
				'id'          => $role->id,
				'name'        => $role->name,
				'description' => $role->description
			);
		}

		return $logs;
	}

}
