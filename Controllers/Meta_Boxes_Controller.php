<?php

namespace Mono_WP\Prime_Affiliate_Links\Controllers;

use Mono_WP\Prime_Affiliate_Links\Helpers\View;
use Mono_WP\Prime_Affiliate_Links\Models\Affiliate_Link;
use Mono_WP\Prime_Affiliate_Links\Plugin;

class Meta_Boxes_Controller extends Base_Controller {
	private $prefix;

	public function __construct() {
		$this->prefix = Plugin::get_instance()->prefix;
	}

	public function display_submit_meta_box() {
		global $action, $post;
		$post_type = $post->post_type;
		// get current post_type
		$post_type_object = get_post_type_object( $post_type );
		$can_publish      = current_user_can( $post_type_object->cap->publish_posts );
		View::render( 'metaboxes.submitdiv', compact(
			'action',
			'post',
			'post_type',
			'post_type_object',
			'can_publish'
		) );
	}

	public function display_meta_box( $post, $args ) {
		$view   = 'metaboxes.' . $args['args']['metabox'];
		$prefix = Plugin::get_instance()->prefix;
		$has_valid_licence = Plugin::get_instance()->has_valid_licence();
		$is_not_paying = Plugin::get_instance()->is_not_paying();
		$is_trial = Plugin::get_instance()->is_trial();
		$upgrade_link = Plugin::get_instance()->upgrade_link();

		View::render( $view, compact( 'prefix', 'post', 'has_valid_licence', 'is_trial', 'is_not_paying', 'upgrade_link' ) );
	}

	public function save( $post_id, $post ) {
		if ( $post->post_type == Plugin::get_instance()->cpt && isset( $_POST[ 'save_' . Plugin::get_instance()->cpt . 'meta' ] ) ) {
			$this->save_affiliate_link_meta( $post_id );
		}

		if ($post->post_type != Plugin::get_instance()->cpt || $post->post_status == 'auto-draft')
			return;

		// only change slug when the post is created (both dates are equal)
		if ($post->post_date_gmt != $post->post_modified_gmt)
			return;

		$link = new Affiliate_Link( $post_id );
		$slug = $link->get( 'link_slug' );

		// unhook this function to prevent infinite looping
		remove_action( 'save_post', array( $this, 'save' ), 10 );
		// update the post slug (WP handles unique post slug)
		wp_update_post( array(
			'ID' => $post_id,
			'post_name' => $slug
		));
		// re-hook this function
		add_action( 'save_post', array( $this, 'save' ), 10, 2 );

//		if ( Plugin::get_instance()->has_valid_licence() ) {
//			if ( $post->post_type == 'post' && isset( $_POST[ 'save_' . Plugin::get_instance()->cpt . 'meta' ] ) ) {
//				$this->save_post_meta( $post_id );
//			}
//		}
	}

	private function save_affiliate_link_meta( $post_id ) {

		$link               = esc_url_raw( $_POST[ $this->prefix . 'link_url' ] );
		$add_no_follow      = sanitize_text_field( $_POST[ $this->prefix . 'add_no_follow' ] );
		$uncloak            = sanitize_text_field( $_POST[ $this->prefix . 'uncloak' ] );
		$forward_parameters = sanitize_text_field( $_POST[ $this->prefix . 'forward_parameters' ] );
		$open_in_new_tab    = sanitize_text_field( $_POST[ $this->prefix . 'open_in_new_tab' ] );
		$redirection_type   = sanitize_text_field( $_POST[ $this->prefix . 'redirection_type' ] );
		$banner             = sanitize_text_field( $_POST[ $this->prefix . 'link_banner' ] );
		$keywords           = sanitize_text_field( $_POST[ $this->prefix . 'link_keywords' ] );
		$slug           = sanitize_text_field( $_POST[ $this->prefix . 'link_slug' ] );
//		$expiration_date    = sanitize_text_field( $_POST[ $this->prefix . 'link_expiration' ] );
		$password = sanitize_text_field( $_POST[ $this->prefix . 'link_password' ] );

		update_post_meta( $post_id, 'link_url', $link );
		update_post_meta( $post_id, 'add_no_follow', $add_no_follow );
		update_post_meta( $post_id, 'open_in_new_tab', $open_in_new_tab );
		update_post_meta( $post_id, 'redirection_type', $redirection_type );
		update_post_meta( $post_id, 'link_banner', $banner );
		update_post_meta( $post_id, 'link_keywords', $keywords );
		update_post_meta( $post_id, 'uncloak', $uncloak );
		update_post_meta( $post_id, 'forward_parameters', $forward_parameters );
//		update_post_meta( $post_id, 'expiration_date', $expiration_date );
		update_post_meta( $post_id, 'password', $password );
		update_post_meta( $post_id, 'link_slug', $slug );

//		wp_update_post( [
//		    'ID' => $post_id,
//            'post_name' => sanitize_text_field( $_POST[ $this->prefix . 'link_short' ] )
//        ], true, true );

//		wp_redirect( admin_url( 'edit.php?post_type=' . Plugin::get_instance()->cpt ) );
	}

}