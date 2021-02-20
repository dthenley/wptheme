<?php
/**
 * WP_Rig\WP_Rig\ACF\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\ACF;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;

/**
 * Class for implementing ACF theme options
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'acf';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'add_acf_theme_options' ), 10, 2 );
	}

	/**
	 * Adds the theme option from acf
	 */
	public function add_acf_theme_options() {

		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page( array(
				'page_title' 	=> 'Theme General Settings',
				'menu_title'	=> 'Theme Settings',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false,
			));

			acf_add_options_sub_page( array(
				'page_title' 	=> 'Theme Header Settings',
				'menu_title'	=> 'Header',
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page( array(
				'page_title' 	=> 'Theme Footer Settings',
				'menu_title'	=> 'Footer',
				'parent_slug'	=> 'theme-general-settings',
			));

		}
	}

}
