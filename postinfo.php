<?php
/**
 * @package Postinfo
 */
/*
Plugin Name: Post Info
Description: Wp plugin post info outputs "hello world" in the newest post via browser console.
Version: 1.0.0
Author: Post Info
License: GPLv2 or later
Text Domain: postinfo
*/

/**
	 * ABSPATH is the absolute path to the WordPress directory.
	 *
	 * @return false if not the define absolute path.
 */
if( ! defined( 'ABSPATH' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

/**
	 * Make sure we don't expose any info if called directly.
	 *
	 * @return false if not expose any info if called directly
 */
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}



/**
 *initialize class
 */
class PostInfoPlugin 
{
	/**
	 * this function is use for activate plugin
	 * @return 
	 */
	function activate() {
		// flush rewrite rules
		flush_rewrite_rules();
	}

	/**
	 *	this function in use for deactivate plugin
	 * @return 
	 */
	function deactivate() {
		// flush rewrite rules
		flush_rewrite_rules();
	}

	/**
	 * this function is use for get recent post and include script
	 * @return get recent post , console browser hello world when load this script.
	 */
	function customScript() {
		$recent_posts = wp_get_recent_posts();
		$post_id = $recent_posts[0]['ID'];
			// Run code only for Single post page
		 	if ( is_single( $post_id )) {
	 		// enqueue all our scripts
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/js/myscript.js', __FILE__ ) );
	 	}
	}

	/**
	 * this function call customScript
	 * @return false if not expose any info if called directly
	 */
	function dataInfo() {
		add_action( 'wp_enqueue_scripts', array( $this, 'customScript' ) );
	}
	
}

/**
 * if this class exists the execute this object
 */
if ( class_exists( 'PostInfoPlugin' ) ) {

	$infoPlugin = new PostInfoPlugin();
	$infoPlugin->dataInfo();
}

/**
 * plugin activation hooks and include Plugin calsss PostinfoPluginActivate
 */
require_once plugin_dir_path( __FILE__ ) . 'include/postinfo-plugin-activate.php';
register_activation_hook( __FILE__, array( 'PostinfoPluginActivate' , 'activate') );


/**
 * plugin deactivation hooks and include Plugin calsss PostinfoPluginDeactivate
 */
require_once plugin_dir_path( __FILE__ ) . 'include/postinfo-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array( 'PostinfoPluginDeactivate', 'deactivate' ) );


