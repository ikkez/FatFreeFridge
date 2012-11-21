<?php
/**
	page.view.php

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

 **/
namespace Page;
use F3;

class View {

	/**
	 * deploy data to template and render it
	 * @param array $data
	 * @param string $file
	 * @return string
	 */
	public function render($data, $file)
	{
		F3::mset($data);
		return \Template::serve($file);
	}

}
