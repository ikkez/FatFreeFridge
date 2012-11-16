<?php
/**
	page.php

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

 **/
class Page {

	public function view() {

		$current_uri = substr(F3::get('PARAMS.0'),1);
		$cpp = explode('?', $current_uri); // strip away get parameters
		F3::set('current_page_path', $cpp[0]);

		$page = new Axon('pages');
		$page->load(array('url_path = :url',array(':url'=> F3::get('current_page_path')))); //TODO: some kind of sorting

		if(!$page->dry()) {
			F3::set('page',$page->cast());
			F3::set('content',$page->title.' has been loaded.');
			F3::set('menu', $this->getMainMenuPages());
			echo Template::serve('layout/default.html');

		} else {
			F3::error('404');
		}
	}

	public function getMainMenuPages() {
		$page_ax = new Axon('pages');
		$pages = $page_ax->afind('parent_id = 0 AND visible_in_menu = 1 AND hidden = 0 AND deleted = 0','title,url_path');
		return $pages;
	}


	public function error() {
		$content = '<div class="alert alert-error">';
		$content .= '<h1>ERROR: '.F3::get('ERROR.code').' - '.F3::get('ERROR.title').'</h1>';
		$content .= F3::get('ERROR.text').'</div>';
		$content .= '<p>'.F3::get('ERROR.trace') . '</p>'; // does not work... is empty. bug?

		F3::set('content', $content);
		echo Template::serve('layout/default.html');
	}

}
