<?php defined('SYSPATH') OR die('No direct script access.');
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
 * @author     Modular Gaming Team
 * @copyright  (c) 2012-2013 Modular Gaming Team
 * @license    BSD http://modulargaming.com/license
 */
class Task_User_Promote extends MG_Task_User_Promote {}
