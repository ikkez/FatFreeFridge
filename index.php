<?php
/**
	FatFreeFridge - your user guide for the PHP Fat-Free Framework

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

		Copyright (c) 2012 F3-Junkies
		http://www.fatfreefridge.net

		@package Base
		@version 0.0.1
 **/

require __DIR__.'/lib/base.php';

class F3WIKI extends F3instance {

	public function __construct(){

		// set global vars
		$this->set('AUTOLOAD', 'inc/;inc/temp/');
		$this->set('DEBUG', 3);
		$this->set('TZ', 'Europe/Berlin');

		// set paths
		$this->set('GUI', 'gui/');
		$this->set('LOCALES', 'dict/');
		$this->set('CACHE', FALSE);
		$this->set('TEMP', 'temp/');

		// load DB
		$this->set('DB',new VDB('sqlite:db/sqlite.db'));

		// some routes
		$this->route('GET /', function() { F3::reroute('/home'); });
		$this->route('GET /@page', '\Page->view');
		$this->route('GET /install', '\Main->install');

		// error handler
		$this->set('ONERROR','\Page->error');
	}
}

$f3fridge = new F3WIKI();
$f3fridge->run();