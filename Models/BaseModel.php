<?php


namespace Mono_WP\Prime_Affiliate_Links\Models;


use Mono_WP\Prime_Affiliate_Links\Exceptions\PostTypeMismatchException;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class BaseModel {

	public $title;
	public $permalink;
	public $id;
	public $type;
	public $status;
	public $banner;

	public function __construct( $id, $post_type ) {

		if ( get_post( $id )->post_type != $post_type ) {
			throw new PostTypeMismatchException();
		}

		$this->id        = $id;
		$this->type      = $post_type;
		$this->title     = get_post( $id )->post_title;
		$this->permalink = get_permalink( $id );
		$this->status    = get_post( $id )->post_status;
		$this->banner    = get_post_meta( $id, 'link_banner', true );
	}

	public function get( $key ) {
		return get_post_meta( $this->id, $key, true );
	}

	public function set( $key, $value ) {
		return update_post_meta( $this->id, $key, $value );
	}

}
