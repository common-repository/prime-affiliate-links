<?php


namespace Mono_WP\Prime_Affiliate_Links\Providers;


use Mono_WP\Prime_Affiliate_Links\Controllers\Meta_Boxes_Controller;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Meta_Boxes_Service_Provider extends Base_Service_Provider {

	private $meta_boxes_controller, $metaboxes;

	public function __construct() {
		$this->meta_boxes_controller = new Meta_Boxes_Controller();
		$this->metaboxes = array(
			array(
				'key' => 'link_options',
				'title' => 'Link Options',
				'context' => 'side'
			),
			array(
				'key' => 'link_details',
				'title' => 'Link Details',
				'context' => 'normal'
			),
			array(
				'key' => 'link_settings',
				'title' => 'Advanced Link Settings',
				'context' => 'normal'
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
		add_action( 'admin_menu', [ $this, 'run' ] );
		add_action( 'save_post', [ $this->meta_boxes_controller, 'save' ], 10, 2 );
	}

	public function run() {

		foreach ( $this->metaboxes as $metabox ) {

			Plugin::get_instance()->add_metabox( $metabox );

			add_meta_box( Plugin::get_instance()->prefix . $metabox[ 'key' ], $metabox[ 'title' ], array(
				$this->meta_boxes_controller,
				'display_meta_box'
			), Plugin::get_instance()->cpt, $metabox[ 'context' ], 'default', array( 'metabox' => $metabox[ 'key' ] ) );
		}

		remove_meta_box( 'submitdiv', Plugin::get_instance()->cpt, 'side' );

		add_meta_box( 'submitdiv', 'Publish', [
			$this->meta_boxes_controller,
			'display_submit_meta_box'
		], Plugin::get_instance()->cpt, 'side' );


//		add_meta_box( 'insert_affiliate_link', 'Post Sponsor', [
//			$this->meta_boxes_controller,
//			'display_meta_box'
//		], 'post', 'normal', 'default', [ 'metabox' => 'insert_affiliate_link' ] );
	}

}
