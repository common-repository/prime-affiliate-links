<?php


namespace Mono_WP\Prime_Affiliate_Links\Models;


use Mono_WP\Prime_Affiliate_Links\Exceptions\PostTypeMismatchException;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Affiliate_Link extends BaseModel {

	public $clicks;

	public function __construct( $id ) {
		try {
			parent::__construct( $id, Plugin::get_instance()->cpt );
		} catch ( PostTypeMismatchException $e ) {
			wp_die( 'An error has occurred! Post type mismatch' );
		}

		if ( $this->get( 'uncloak' ) == '1' ) {
			$this->permalink = $this->get( 'link_url' );
		}

		$this->clicks = Click::all( $this->id );
	}

	public static function in_random_order() {
		$links = self::all();

		$links_count = count( $links );

		$random_links = [];

		while ( count( $random_links ) != $links_count ) {
			$index = rand( 0, count( $links ) );
			if ( ! $links[ $index ] ) {
				continue;
			}
			array_push( $random_links, $links[ $index ] );
			unset( $links[ $index ] );
		}

		return $random_links;
	}

	public static function all() {
		return get_posts( [
			'numberposts' => '-1',
			'post_type'   => Plugin::get_instance()->cpt
		] );
	}

	public static function find( $ids ) {
		if ( ! is_array( $ids ) ) {
			if ( get_post( $ids )->post_type != Plugin::get_instance()->cpt ) {
				return;
			}

			return get_post( $ids );
		}

		$links = [];

		foreach ( $ids as $id ) {
			if ( get_post( $id )->post_type != Plugin::get_instance()->cpt ) {
				continue;
			}
			array_push( $links, get_post( $id ) );
		}

		return $links;
	}

	public function get_target() {
		if ( $this->get( 'open_in_new_tab' ) ) {
			return '_blank';
		} else {
			return '_self';
		}
	}

	public function get_rel() {
		if ( $this->get( 'add_no_follow' ) ) {
			return 'nofollow';
		} else {
			return 'follow';
		}
	}

	public function get_keywords() {
		return explode( ',', $this->get( 'link_keywords' ) );
	}

}
