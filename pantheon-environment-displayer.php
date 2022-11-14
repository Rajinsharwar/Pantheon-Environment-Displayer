<?php
/**
 * Plugin Name: Pantheon Environment Displayer
 * Description: A super light-weight WordPress plugin to display the current Pantheon's environment in the ADMIN Toolbar of WordPress. Avoid conflicts while working on various envionment, and always besure that you are working on the correct branch. No configurations needed. Just activate it, and your admin panel will display the current environment.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.0.0
 * Text Domain: pantheon-environment-displayer
 */

add_action('wp_before_admin_bar_render', "pantheon_environment_displayer");

function pantheon_environment_displayer(){
	global $wp_admin_bar;
	$pantheon_env = strtoupper($_ENV['PANTHEON_ENVIRONMENT']);
	if (empty($pantheon_env)) {
			$non_pantheon_args = array (
			'id' => 'pantheon-environment-displayer',
			'title' => 'Pantheon Environment: Non-Pantheon Site ',
			'meta' => array(
			));
	$wp_admin_bar -> add_menu($non_pantheon_args);
	} else {
  	  $pantheon_evn_args = array (
			'id' => 'pantheon-environment-displayer',
			'title' => 'Pantheon Environment: ' . $pantheon_env,
			'meta' => array(
			));
	$wp_admin_bar -> add_menu($pantheon_evn_args);
	}
	
}
