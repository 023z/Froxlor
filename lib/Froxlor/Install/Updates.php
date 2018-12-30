<?php
namespace Froxlor\Install;

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright (c) the authors
 * @author Froxlor team <team@froxlor.org> (2010-)
 * @license GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package Functions
 *         
 */
class Updates
{

	/**
	 * Function showUpdateStep
	 *
	 * outputs and logs the current
	 * update progress
	 *
	 * @param
	 *        	string task/status
	 * @param
	 *        	bool needs_status (if false, a linebreak will be added)
	 *        	
	 * @return string formatted output and log-entry
	 */
	public function showUpdateStep($task = null, $needs_status = true)
	{
		if (! $needs_status)
			echo "<b>";

		// output
		echo $task;

		if (! $needs_status) {
			echo "</b><br />";
		}

		\Froxlor\FroxlorLogger::getLog()->addWarning($task);
	}

	/**
	 * Function lastStepStatus
	 *
	 * outputs [OK] (success), [??] (warning) or [!!] (failure)
	 * of the last update-step
	 *
	 * @param
	 *        	int status (0 = success, 1 = warning, 2 = failure)
	 *        	
	 * @return string formatted output and log-entry
	 */
	public function lastStepStatus($status = -1, $message = '')
	{
		switch ($status) {

			case 0:
				$status_sign = ($message != '') ? '[' . $message . ']' : '[OK]';
				$status_color = 'ok';
				break;
			case 1:
				$status_sign = ($message != '') ? '[' . $message . ']' : '[??]';
				$status_color = 'warn';
				break;
			case 2:
				$status_sign = ($message != '') ? '[' . $message . ']' : '[!!]';
				$status_color = 'err';
				break;
			default:
				$status_sign = '[unknown]';
				$status_color = 'unknown';
				break;
		}

		// output
		echo "<span class=\"update-step update-step-" . $status_color . "\">" . $status_sign . "</span><br />";

		if ($status == - 1 || $status == 2) {
			\Froxlor\FroxlorLogger::getLog()->addWarning( 'Attention - last update task failed!!!');
		} elseif ($status == 0 || $status == 1) {
			\Froxlor\FroxlorLogger::getLog()->addNotice('Success');
		}
	}
}
