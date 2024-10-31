<?php

/**
 * Plugin Name: Prime Affiliate Links
 * Plugin URI: http://monowp.com
 * Description: Prime Affiliate Links is a revolution in affiliate link management. Collect, collate and store your affiliate links for use in your posts and pages.
 * Version: 1.0.0
 * Author: Mono WP
 * Author URI: https://monowp.com/
 * Requires at least: 4.5
 * Tested up to: 6.0
 * Requires PHP: 7.4
 *
 * Text Domain: prime-affiliate-links
 * Domain Path: /Languages/
 *
 */
if ( !defined( 'ABSPATH' ) ) {
    die( 'What are you doing here?' );
}
use  Mono_WP\Prime_Affiliate_Links\Plugin ;
use  Mono_WP\Prime_Affiliate_Links\PluginActivator ;
use  Mono_WP\Prime_Affiliate_Links\PluginDeactivator ;
require_once dirname( __FILE__ ) . '/Helpers/helpers.php';

if ( function_exists( 'prime_affiliate_links_freemius' ) ) {
    prime_affiliate_links_freemius()->set_basename( false, __FILE__ );
} else {
    // DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
    
    if ( !function_exists( 'prime_affiliate_links_freemius' ) ) {
        // Create a helper function for easy SDK access.
        function prime_affiliate_links_freemius()
        {
            global  $prime_affiliate_links_freemuis ;
            
            if ( !isset( $prime_affiliate_links_freemuis ) ) {
                // Activate multisite network integration.
                if ( !defined( 'WP_FS__PRODUCT_11077_MULTISITE' ) ) {
                    define( 'WP_FS__PRODUCT_11077_MULTISITE', true );
                }
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/includes/freemius/start.php';
                $prime_affiliate_links_freemuis = fs_dynamic_init( array(
                    'id'             => '11077',
                    'slug'           => 'prime-affiliate-links',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_ec3708a2a825aee697479b71295f1',
                    'is_premium'     => false,
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                    'days'               => 7,
                    'is_require_payment' => false,
                ),
                    'menu'           => array(
                    'slug' => 'edit.php?post_type=affiliate_link',
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $prime_affiliate_links_freemuis;
        }
        
        // Init Freemius.
        prime_affiliate_links_freemius();
        // Signal that SDK was initiated.
        do_action( 'prime_affiliate_links_freemuis_loaded' );
    }
    
    require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
    register_activation_hook( __FILE__, 'activate_prime_affiliate_links' );
    register_deactivation_hook( __FILE__, 'deactivate_prime_affiliate_links' );
    register_uninstall_hook( __FILE__, 'uninstall_prime_affiliate_links' );
    //prime_affiliate_links_freemuis()->add_action('after_uninstall', 'prime_affiliate_links_freemuis_uninstall_cleanup');
    $super_affiliate_links = Plugin::get_instance();
    $super_affiliate_links->init();
    function activate_prime_affiliate_links()
    {
        Plugin::get_instance()->activate();
    }
    
    function deactivate_prime_affiliate_links()
    {
        Plugin::get_instance()->deactivate();
    }
    
    function uninstall_prime_affiliate_links()
    {
        Plugin::get_instance()->uninstall();
    }

}
