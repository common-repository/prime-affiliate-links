<?php


namespace Mono_WP\Prime_Affiliate_Links\Providers;


use Mono_WP\Prime_Affiliate_Links\Controllers\Settings_Controller;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Settings_Service_Provider extends Base_Service_Provider {

	private $settings_controller, $settings;

	public function __construct() {
		$this->settings_controller = new Settings_Controller();

		$this->settings = array(
			array(
				'key' => 'redirection_type',
				'title' => 'Redirection Type'
			),
			array(
				'key' => 'open_in_new_tab',
				'title' => 'Open Links in New Tab?'
			),
			array(
				'key' => 'add_no_follow',
				'title' => 'Add nofollow attribute?'
			),
			array(
				'key' => 'uncloak',
				'title' => 'Uncloak links?'
			),
			array(
				'key' => 'forward_parameters',
				'title' => 'Forward parameters to affiliate links?'
			),
			array(
				'key' => 'keep_data_on_uninstall',
				'title' => 'Keep plugin data after uninstalling the plugin?'
			),
		);
	}

	/**
	 * Registers wordpress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'admin_init', array( $this, 'run' ) );
	}

	public function run() {

		foreach ( $this->settings as $setting ) {
			Plugin::get_instance()->add_setting( $setting );

			register_setting( Plugin::get_instance()->prefix . 'settings', Plugin::get_instance()->prefix . $setting[ 'key' ] );

			add_settings_field( Plugin::get_instance()->prefix . $setting[ 'key' ], $setting[ 'title' ], array(
				$this->settings_controller,
				'display_setting_field'
			), Plugin::get_instance()->prefix . 'settings', Plugin::get_instance()->prefix . 'settings', array( 'field' => $setting[ 'key' ] ) );
		}


		add_settings_section( Plugin::get_instance()->prefix . 'settings', 'Prime Afiliate Links Settings', array(
			$this->settings_controller,
			'display_settings'
		), Plugin::get_instance()->prefix . 'settings' );




	}
}
