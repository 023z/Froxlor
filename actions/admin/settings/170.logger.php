<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2003-2009 the SysCP Team (see authors).
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Florian Lippert <flo@syscp.org> (2003-2009)
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Settings
 *
 */
return array(
	'groups' => array(
		'logging' => array(
			'title' => \Froxlor\Frontend\UI::getLng('admin.loggersettings'),
			'fields' => array(
				'logger_enabled' => array(
					'label' => \Froxlor\Frontend\UI::getLng('serversettings.logger.enable'),
					'settinggroup' => 'logger',
					'varname' => 'enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'overview_option' => true
				),
				'logger_severity' => array(
					'label' => \Froxlor\Frontend\UI::getLng('serversettings.logger.severity'),
					'settinggroup' => 'logger',
					'varname' => 'severity',
					'type' => 'option',
					'default' => 1,
					'option_mode' => 'one',
					'option_options' => array(
						1 => \Froxlor\Frontend\UI::getLng('admin.logger.normal'),
						2 => \Froxlor\Frontend\UI::getLng('admin.logger.paranoid')
					),
					'save_method' => 'storeSettingField'
				),
				'logger_logtypes' => array(
					'label' => \Froxlor\Frontend\UI::getLng('serversettings.logger.types'),
					'settinggroup' => 'logger',
					'varname' => 'logtypes',
					'type' => 'option',
					'default' => 'syslog,mysql',
					'option_mode' => 'multiple',
					'option_options' => array(
						'syslog' => 'syslog',
						'file' => 'file',
						'mysql' => 'mysql'
					),
					'save_method' => 'storeSettingField'
				),
				'logger_logfile' => array(
					'label' => \Froxlor\Frontend\UI::getLng('serversettings.logger.logfile'),
					'settinggroup' => 'logger',
					'varname' => 'logfile',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'logger_log_cron' => array(
					'label' => \Froxlor\Frontend\UI::getLng('serversettings.logger.logcron'),
					'settinggroup' => 'logger',
					'varname' => 'log_cron',
					'type' => 'option',
					'default' => 0,
					'option_mode' => 'one',
					'option_options' => array(
						0 => \Froxlor\Frontend\UI::getLng('serversettings.logger.logcronoption.never'),
						1 => \Froxlor\Frontend\UI::getLng('serversettings.logger.logcronoption.once'),
						2 => \Froxlor\Frontend\UI::getLng('serversettings.logger.logcronoption.always')
					),
					'save_method' => 'storeSettingField'
				)
			)
		)
	)
);
