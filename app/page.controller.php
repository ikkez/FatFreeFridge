<?php
/**
	page.controller.php

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

 **/
namespace Page;
use F3;

class Controller {

	public function view()
	{
		$current_uri = substr(F3::get('PARAMS.0'),1);
		$cpp = explode('?', $current_uri); // strip away get parameters
		F3::set('current_page_path', $cpp[0]);

		$model = new Model();
		$model->load(array('url_path = :url',array(':url'=> F3::get('current_page_path'))));

		if(!$model->dry()) {

			$data = array(
				'page' => $model->cast(),
				'content' => $model->title . ' has been loaded.',
				'menu' => $model->getMainMenuPages(),
			);
			
			$view = new View();
			$template = $view->render($data,'layout/default.html');

			echo $template;

		} else {
			F3::error('404');
		}
	}

}
