<?php
/**
	FatFreeFridge - your user guide for the PHP Fat-Free Framework

	The contents of f3 file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use f3 file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

		Copyright (c) 2012 F3-Junkies
		http://www.fatfreefridge.net

		@package Base
		@version 0.0.1
 **/

$f3 = require __DIR__.'/lib/base.php';

// set global vars
$f3->set('AUTOLOAD', 'inc/;app/');
$f3->set('DEBUG', 3);
$f3->set('TZ', 'Europe/Berlin');

// set paths
$f3->set('UI', 'gui/');
$f3->set('LOCALES', 'dict/');
$f3->set('CACHE', FALSE);
$f3->set('TEMP', 'temp/');

// load DB
$f3->set('DB',new DB\SQL('sqlite:db/sqlite2.db'));

// some routes
$f3->route('GET /', function($f3) {
	$f3->reroute('/home');
});
$f3->route('GET /@page', '\Page\Controller->view');
$f3->route('GET /install', '\Common->install');

$f3->route('GET /home2', function($f3){
	$model = new \DB\SQL\Mapper($f3->get('DB'), 'pages');
	$model->load(array('title=?', 'Home'));
	var_dump($model->dry());
	var_dump($model->get('title'));
	var_dump($model->title);
});


$f3->set('ONERROR','\Common->error');


$f3->run();