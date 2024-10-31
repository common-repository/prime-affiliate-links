<?php


namespace Mono_WP\Prime_Affiliate_Links;

/**
 * Instantiates all service providers and gets plugin ready for use.
 *
 * Class Bootstrapper
 * @package Level_Wp\SmartAffiliateLinks
 *
 * @since 1.0.0
 */
class Bootstrapper {

	private $providers = [];

	public function __construct( $providers ) {
		$this->providers = $providers;
	}

	public function run() {
		foreach ( $this->providers as $provider ) {
			$service = new $provider;
			$service->register();
		}
	}

}
