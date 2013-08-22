<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Controller for Admin User Log
 *
 * @package    MG/User
 * @category   Controller
 * @author     Modular Gaming
 * @copyright  (c) 2012-2013 Modular Gaming
 * @license    BSD http://www.modulargaming.com/license
 */
class MG_Controller_Admin_User_Log extends Abstract_Controller_Admin {

		public function action_index()
		{

			if ( ! $this->user->can('Admin_User_Log_Index'))
			{
				throw HTTP_Exception::factory('403', 'Permission denied to view admin user log index');
			}

			$logs = ORM::factory('Log')
				->find_all();

			$this->view = new View_Admin_User_Log_Index;
			$this->_nav('user', 'log');
			$this->view->logs = $logs->as_array();
		}

		public function action_paginate()
		{

			if ( ! $this->user->can('Admin_User_Log_Paginate'))
			{
				throw HTTP_Exception::factory('403', 'Permission denied to view admin user log paginate');
			}
		if (DataTables::is_request())
		{
			$orm = ORM::factory('Log');

			$paginate = Paginate::factory($orm)
				->columns(array('id', 'user_id', 'location', 'alias', 'time', 'type'))
				->search_columns(array('user.username', 'alias', 'location', 'type'));

			$datatables = DataTables::factory($paginate)->execute();

			foreach ($datatables->result() as $log)
			{
				$datatables->add_row(array(
						$log->type,
						$log->alias,
						$log->user->username,
						$log->location,
						$log->time,
						$log->id
					)
				);
			}

			$datatables->render($this->response);
		}
		else
		{
			throw HTTP_Exception::factory(500, 'error');
		}

		}

		public function action_retrieve()
		{

			if ( ! $this->user->can('Admin_User_Log_Retrieve'))
			{
				throw HTTP_Exception::factory('403', 'Permission denied to view admin user log retrieve');
			}

		$this->view = NULL;

		$log_id = $this->request->query('id');

		$log = ORM::factory('Log', $log_id);

		$list = array(
			'id'      => $log->id,
			'user_id'   => $log->user_id,
			'username' => $log->user->username,
			'type' => $log->type,
			'alias' => $log->alias,
			'location' => $log->location,
			'client' => array(
				'agent' => $log->agent,
				'ip' => $log->ip
			),
			'time' => date('l jS F G:i:s', $log->time),
			'message' => __($log->message, $log->params),
			'params' => $log->params
		);

		$this->response->headers('Content-Type', 'application/json');
		$this->response->body(json_encode($list));

		}

	}
