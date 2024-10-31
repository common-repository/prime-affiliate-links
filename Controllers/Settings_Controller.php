<?php


namespace Mono_WP\Prime_Affiliate_Links\Controllers;


use Mono_WP\Prime_Affiliate_Links\Helpers\View;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Settings_Controller extends Base_Controller {

	public function display_settings() {
		_e( '', 'prime-affiliate-links' );
	}

	public function display_setting_field( $args ) {
		$view    = 'settings.' . $args['field'];
		$prefix  = Plugin::get_instance()->prefix;
		$setting = $prefix . $args[ 'field' ];
		$value = get_option( $prefix. $args[ 'field' ] );
		$has_valid_licence = Plugin::get_instance()->has_valid_licence();
		$upgrade_link = Plugin::get_instance()->upgrade_link();
		$is_not_paying = Plugin::get_instance()->is_not_paying();

		View::render( $view, compact( 'prefix', 'setting', 'value', 'has_valid_licence', 'upgrade_link', 'is_not_paying' ) );
	}

}
