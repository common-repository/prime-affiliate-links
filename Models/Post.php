<?php


namespace Mono_WP\Prime_Affiliate_Links\Models;


use Mono_WP\Prime_Affiliate_Links\Exceptions\PostTypeMismatchException;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Post extends BaseModel {

	public $sponsor_link;
	public $sponsor_text;
	public $sponsor_banner;
	public $sponsor_text_classes;
	public $sponsor_banner_classes;

	public function __construct( $id ) {
		try {
			parent::__construct( $id, 'post' );
		} catch ( PostTypeMismatchException $e ) {
			wp_die( 'An error has occurred. Post type mismatch' );
		}

		$affiliateLink                = new Affiliate_Link( $this->get( Plugin::get_instance()->prefix . 'link_id' ) );
		$this->sponsor_text           = $this->get( Plugin::get_instance()->prefix . 'link_text' );
		$this->sponsor_link           = $affiliateLink->permalink;
		$this->sponsor_banner         = $affiliateLink->get( 'link_banner' );
		$this->sponsor_text_classes   = implode( ' ', explode( ',', $this->get( Plugin::get_instance()->prefix . 'link_text_classes' ) ) );
		$this->sponsor_banner_classes = implode( ' ', explode( ',', $this->get( Plugin::get_instance()->prefix . 'link_banner_classes' ) ) );
	}

}
