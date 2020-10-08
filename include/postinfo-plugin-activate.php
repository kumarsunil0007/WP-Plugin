<?php
/**
 * @package  Postinfo
 */

 /**
	 * Remove rewrite rules and then recreate rewrite rules..
	 *
	 * @return false if not the define PostinfoPluginActivate
 */

class PostinfoPluginActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}