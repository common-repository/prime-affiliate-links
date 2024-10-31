<?php

namespace Mono_WP\Prime_Affiliate_Links\Providers;

use Mono_WP\Prime_Affiliate_Links\Plugin;
use Mono_WP\Prime_Affiliate_Links\Controllers\prime_affiliate_links_Controller;

class Init_Service_Provider extends Base_Service_Provider {

	/**
	 * @inheritDoc
	 */
	public function register() {
		add_action( 'init', [ $this, 'run' ] );
		Plugin::get_instance()->freemius()->add_filter( 'hide_freemius_powered_by', [
			$this,
			'hide_freemius_powered_by'
		] );
	}

	/**
	 * @inheritDoc
	 */
	public function run() {

	}

	public function hide_freemius_powered_by() {
		return true;
	}
}