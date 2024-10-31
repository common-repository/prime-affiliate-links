<?php

namespace Mono_WP\Prime_Affiliate_Links\Providers;

use Mono_WP\Prime_Affiliate_Links\Controllers\Menus_Controller;
use Mono_WP\Prime_Affiliate_Links\Plugin;

/**
 * Undocumented class
 */
class Menus_Service_Provider extends Base_Service_Provider {

	/**
	 * Controller class responsible for display menus.
	 *
	 * @var Menu_Controller
	 */
	private $menus_controller;

	/**
	 * Construction function.
	 */
	public function __construct() {
		$this->menus_controller = new Menus_Controller();
	}

	/**
	 * Registers WordPress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {

		add_action( 'admin_menu', array( $this, 'run' ) );

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function run() {

		if ( Plugin::get_instance()->is_not_paying() ) {
			add_submenu_page(
				'edit.php?post_type=' . Plugin::get_instance()->cpt,
				'Link Groups',
				'Link Groups',
				'manage_options',
				'link_groups',
				array(
					$this->menus_controller,
					'show_upgrade_page',
				),
				2
			);
		}

		add_submenu_page(
			'edit.php?post_type=' . Plugin::get_instance()->cpt,
			'Stats - Super Affiliate Links',
			'Link Stats',
			'manage_options',
			'stats',
			array(
				$this->menus_controller,
				'show_stats_page',
			)
		);

		add_submenu_page(
			'edit.php?post_type=' . Plugin::get_instance()->cpt,
			'Super Affiliate Links Settings',
			'Settings',
			'manage_options',
			'settings',
			array(
				$this->menus_controller,
				'show_settings_page',
			),
			null
		);


	}
}
