<?php
/**
 * @package  Postinfo
 */


 /**
	 * Remove rewrite rules and then recreate rewrite rules.
	 *
	 * @return false if not the define PostinfoPluginDeactivate.
 */
class PostinfoPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}