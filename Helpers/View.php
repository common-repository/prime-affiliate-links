<?php


namespace Mono_WP\Prime_Affiliate_Links\Helpers;


use Mono_WP\Prime_Affiliate_Links\Plugin;

class View {

	private static $base = 'Views/';

	public static function render( $view, $vars = [] ) {

		foreach ( $vars as $var => $v ) {
			$$var = $v;
		}

		if ( $view_parts = explode( '.', $view ) ) {
			include_once Plugin::get_instance()->get_path() . self::$base . implode( '/', $view_parts ) . '.php';
		} else {
			include_once Plugin::get_instance()->get_path() . self::$base . $view . '.php';
		}
	}
}
