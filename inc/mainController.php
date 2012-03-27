<?php

class mainController extends F3instance {

	function __construct() {
		$this->set('menu',array(
			'home'=>'Home',
			'examples'=>'Examples',
			'docs'=>'Documentation',
            'plugins'=>'Plugins',
            //'contact'=>'Contact',
		));
	}

	function render() {

        $page = $this->get('PARAMS.page');
        $this->set('page.title',$this->get('menu.'.$page).' | Fat-Free Fridge');
        
        if($page == 'home') {
            $this->set('content', Template::serve($this->get('TMPL').'home_en.html'));
        }
        if($page == 'examples') {
            $this->set('content', Template::serve($this->get('TMPL').'examples_en.html'));
        }
        if($page == 'docs') {
            $this->set('content', Template::serve($this->get('TMPL').'docs_en.html'));
        }
        if($page == 'plugins') {
            $this->set('content', Template::serve($this->get('TMPL').'plugins_en.html'));
        }

        echo $this->get('content');
	}

}