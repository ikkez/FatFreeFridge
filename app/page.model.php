<?php
/**
	page.model.php

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

 **/
namespace Page;
use F3;

class Model extends \Axon {

	/**
	 * sync with table
	 */
	public function __construct()
	{
		$this->sync('pages');
	}

	/**
	 * get main navigation
	 * @return mixed
	 */
	public function getMainMenuPages()
	{
		return $this->aselect(
			'title,url_path',
			'parent_id = 0 AND visible_in_menu = 1 AND hidden = 0 AND deleted = 0',
			null,
			'sorting asc'
		);
	}
}
