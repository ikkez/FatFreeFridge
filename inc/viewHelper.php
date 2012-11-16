<?php
/**
	viewHelper

	The contents of this file are subject to the terms of the GNU General
	Public License Version 3.0. You may not use this file except in
	compliance with the license. Any of the license terms and conditions
	can be waived if you get permission from the copyright holder.

 **/

class ViewHelper {

	/**
	 * returns current base domain url
	 * @author KOTRET, thx dude ;)
	 * @return string
	 */
	static function getBaseUrl()
	{
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
		return urldecode($protocol . "://" . $_SERVER['SERVER_NAME'] . $port . F3::get('BASE') . '/');
	}

}
