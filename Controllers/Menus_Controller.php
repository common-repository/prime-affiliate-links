<?php


namespace Mono_WP\Prime_Affiliate_Links\Controllers;


use Mono_WP\Prime_Affiliate_Links\Helpers\View;
use Mono_WP\Prime_Affiliate_Links\Models\Affiliate_Link;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Menus_Controller extends Base_Controller {

	public function show_settings_page() {
		$tab = $_GET['tab'] ?? 'settings';

		View::render( 'pages.settings', compact( 'tab' ) );
	}

	public function show_upgrade_page() {
		View::render( 'pages.upgrade' );
	}

	public function show_accounts_page() {

	}

	public function show_stats_page() {
		$view    = empty( $_GET['view'] ) ? '7days' : sanitize_text_field( $_GET['view'] );
		$type    = empty( $_GET['type'] ) ? 'all' : sanitize_text_field( $_GET['type'] );
		$link_id = empty( $_GET['link'] ) ? 0 : sanitize_text_field( $_GET['link'] );
		$link    = null;

		$clicks_dates     = json_encode( ( new Stats_Controller() )->generate_stats_days( $view, $type, $link_id ) );
		$clicks_links     = json_encode( ( new Stats_Controller() )->generate_stats_links( $view, $type, $link_id ) );
		$clicks_countries = json_encode( ( new Stats_Controller() )->generate_stats_countries( $view, $type, $link_id ) );

		if ( $link_id ) {
			$link = new Affiliate_Link( $link_id );
		}

		if ( Plugin::get_instance()->is_not_paying() ) {
			if ( $view != '7days' ) {
				View::render( 'pages.upgrade' );
				return;
			}
		}

		View::render( 'links.stats', compact( 'clicks_dates', 'clicks_links', 'clicks_countries', 'link' ) );

	}
}
