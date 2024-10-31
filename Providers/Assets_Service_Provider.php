<?php


namespace Mono_WP\Prime_Affiliate_Links\Providers;


use Mono_WP\Prime_Affiliate_Links\Plugin;

class Assets_Service_Provider extends Base_Service_Provider {

	/**
	 * Registers wordpress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function run() {

	}

	/**
	 * Enqueues admin script and styles
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts() {
		global $post_type;

		// Only loads our styles on our pages
		if ( get_current_screen()->post_type == Plugin::get_instance()->cpt ) {
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_media();

			wp_register_script( 'prime-affiliate-links-admin', Plugin::get_instance()->get_url() . 'Assets/js/prime-affiliate-links-admin.js', array(
				'jquery',
				'thickbox',
				'prime-affiliate-links-chart-js'
			) );
			wp_register_script( 'prime-affiliate-links-chart-js', Plugin::get_instance()->get_url() . 'Assets/js/chart.js' );
			wp_register_script( 'prime-affiliate-links-share', Plugin::get_instance()->get_url() . 'Assets/js/prime-affiliate-links-share.js' );

			wp_enqueue_script( 'prime-affiliate-links-chart-js' );
			wp_enqueue_script( 'prime-affiliate-links-admin' );
			wp_enqueue_script( 'prime-affiliate-links-share' );

			wp_localize_script( 'prime-affiliate-links-admin', 'prime_affiliate_links', [
				'prefix' => Plugin::get_instance()->prefix,
				'cpt'    => Plugin::get_instance()->cpt,
				'admin_url' => admin_url()
			] );

			wp_register_style( 'prime-affiliate-links-admin', Plugin::get_instance()->get_url() . 'Assets/css/prime-affiliate-links-admin.css' );

			wp_enqueue_style( 'prime-affiliate-links-admin' );


		}

	}

	/**
	 * Enqueues frontend script and styles
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		wp_register_style( 'prime-affiliate-links', Plugin::get_instance()->get_url() . 'Assets/css/prime-affiliate-links.css' );
		wp_register_style( 'prime-affiliate-links-bootstrap', Plugin::get_instance()->get_url() . 'Assets/css/prime-affiliate-links.css' );

		wp_enqueue_style( 'prime-affiliate-links' );
	}
}
