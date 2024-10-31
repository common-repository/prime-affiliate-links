<?php


namespace Mono_WP\Prime_Affiliate_Links\Controllers;


use Mono_WP\Prime_Affiliate_Links\Models\Click;

class Clicks_Controller extends Base_Controller {

	public function record( $link_id ) {
		$click = new Click( Click::create() );
		$json  = wp_remote_retrieve_body( wp_remote_get( 'https://geolocation-db.com/json' ) );
		$data  = json_decode( $json );

		if ( ! empty( sanitize_text_field( $_SERVER['HTTP_CLIENT_IP'] ) ) ) {
			$ip = sanitize_text_field( $_SERVER['HTTP_CLIENT_IP'] );
		} elseif ( ! empty( sanitize_text_field( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) {
			$ip = sanitize_text_field( $_SERVER['HTTP_X_FORWARDED_FOR'] );
		} else {
			$ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] );
		}

		$click->set( 'link_id', $link_id );
		$click->set( 'ip', $ip );
		$click->set( 'date', date( 'd M Y' ) );
		$click->set( 'country', $data->country_name );

	}

}
