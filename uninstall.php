<?php 
/**
 * @package Postinfo
 */

 /**
	 * // if uninstall.php is not called by WordPress, die
	 *
	 * @return false if not the define WP_UNINSTALL_PLUGIN.
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
