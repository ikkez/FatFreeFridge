<?php


require __DIR__.'/lib/base.php';


class bootstrap extends F3instance {

    function __construct() {
    
    	/* basic config    	 
    	 *****************/
    	
    	// app classes to load
    	$this->set('AUTOLOAD', 'app/, inc/');
    	//$this->set('PLUGINS', 'lib/f3_ext/');
    	
    	// caching and temp files
		$this->set('CACHE',FALSE);
		$this->set('TEMP','temp/');
		
		// framework behaviour
		//$this->set('EXTEND',TRUE);       // f3 methods may be overwritten
		//$this->set('EXTERNAL','bin/');   // screenshot extension				
		$this->set('DEBUG',3);				// debugging
		$this->set('QUIET',false);
		//$this->set('ONERROR', function(){});
		
		// resource paths
		$this->set('UI','ui/');
		$this->set('TMPL','templates/');
		$this->set('CSS','css/');
		$this->set('JS','js/');
		$this->set('IMG','img/');
		
		// language 
		$this->set('LOCALES','dict/');
		$this->set('LANGUAGE', 'en');
		
		/* end basic config
		 *****************/ 

        $this->route('GET /@page', 'mainController->render');
		$this->route('GET /',
			function() {
                F3::set('PARAMS.page','home');
                $mc = new mainController();
                $mc->render();
			}
		);
	}
}

$app = new bootstrap();
$app->run();

