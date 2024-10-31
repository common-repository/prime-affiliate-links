<?php


namespace Mono_WP\Prime_Affiliate_Links\Models;


use Mono_WP\Prime_Affiliate_Links\Exceptions\PostTypeMismatchException;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Click extends BaseModel {

	public function __construct( $id ) {
		try {
			parent::__construct( $id, Plugin::get_instance()->click_cpt );
		} catch ( PostTypeMismatchException $e ) {
			wp_die( 'A post type mismatch error has occurred' );
		}
	}

	public static function all( $link_id = null ) {
		$clicks = get_posts( [
			'numberposts' => '-1',
			'post_type'   => Plugin::get_instance()->click_cpt
		] );

		if ( is_null( $link_id ) ) {
			return $clicks;
		}

		$link_clicks = [];

		foreach ( $clicks as $click ) {
			$click = new self( $click->ID );
			if ( $click->get( 'link_id' ) == $link_id ) {
				array_push( $link_clicks, $click );
			}
		}

		return $link_clicks;
	}

	public static function create() {
		return wp_insert_post( [
			'post_type'   => Plugin::get_instance()->click_cpt,
			'post_status' => 'publish',
		] );
	}


}
