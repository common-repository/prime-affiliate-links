<?php

namespace Mono_WP\Prime_Affiliate_Links\Providers;

use  Mono_WP\Prime_Affiliate_Links\Controllers\Affiliate_Links_Controller ;
use  Mono_WP\Prime_Affiliate_Links\Plugin ;
class CPT_Service_Provider extends Base_Service_Provider
{
    private  $links_controller ;
    public function __construct()
    {
        $this->links_controller = new Affiliate_Links_Controller();
    }
    
    /**
     * Registers WordPress action hooks and filters.
     *
     * @return mixed|void
     *
     * @since 1.0.0
     */
    public function register()
    {
        add_action( 'init', array( $this, 'run' ) );
        add_action( 'wp', array( $this->links_controller, 'redirect' ) );
        add_action( 'manage_' . Plugin::get_instance()->cpt . '_posts_columns', array( $this->links_controller, 'display_columns' ) );
        add_action(
            'manage_' . Plugin::get_instance()->cpt . '_posts_custom_column',
            array( $this->links_controller, 'display_columns_data' ),
            10,
            2
        );
        add_filter( 'manage_edit-' . Plugin::get_instance()->cpt . '_sortable_columns', array( $this->links_controller, 'sort_columns' ) );
        add_filter(
            'post_type_link',
            array( $this->links_controller, 'remove_slug' ),
            10,
            3
        );
        add_action( 'pre_get_posts', array( $this->links_controller, 'parse_request' ) );
        add_action( 'admin_head', array( $this->links_controller, 'remove_permalink_editor' ) );
    }
    
    public function run()
    {
        $prefix = get_option( Plugin::get_instance()->prefix . 'link_prefix', true );
        // Main CPT labels
        $labels = array(
            'name'                  => _x( 'Affiliate Links', 'Post type general name', 'prime-affiliate-links' ),
            'singular_name'         => _x( 'Affiliate Link', 'Post type singular name', 'prime-affiliate-links' ),
            'menu_name'             => _x( 'Affiliate Links', 'Admin Menu text', 'prime-affiliate-links' ),
            'name_admin_bar'        => _x( 'Affiliate Link', 'Add New on Toolbar', 'prime-affiliate-links' ),
            'add_new'               => __( 'New Affiliate Link', 'prime-affiliate-links' ),
            'add_new_item'          => __( 'Add Affiliate New Link', 'prime-affiliate-links' ),
            'new_item'              => __( 'New Affiliate Link', 'prime-affiliate-links' ),
            'edit_item'             => __( 'Edit Affiliate Link', 'prime-affiliate-links' ),
            'view_item'             => __( 'View Affiliate Link', 'prime-affiliate-links' ),
            'all_items'             => __( 'Affiliate Links', 'prime-affiliate-links' ),
            'search_items'          => __( 'Search Affiliate Links', 'prime-affiliate-links' ),
            'parent_item_colon'     => __( 'Parent Affiliate Links:', 'prime-affiliate-links' ),
            'not_found'             => __( 'No Affiliate Links found.', 'prime-affiliate-links' ),
            'not_found_in_trash'    => __( 'No Affiliate Links found in Trash.', 'prime-affiliate-links' ),
            'archives'              => _x( 'Affiliate Links archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'prime-affiliate-links' ),
            'filter_items_list'     => _x( 'Affiliate Filter Links list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'prime-affiliate-links' ),
            'items_list_navigation' => _x( 'Affiliate Links list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'prime-affiliate-links' ),
            'items_list'            => _x( 'Affiliate Links list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'prime-affiliate-links' ),
        );
        // Main CPT args
        $args = array(
            'labels'              => $labels,
            'description'         => 'Affiliate Link custom post type.',
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_json'        => true,
            'show_in_nav_menus'   => false,
            'query_var'           => true,
            'capability_type'     => 'post',
            'has_archive'         => false,
            'hierarchical'        => true,
            'menu_position'       => 20,
            'menu_icon'           => 'dashicons-admin-links',
            'supports'            => array( 'title' ),
            'taxonomies'          => array(),
            'show_in_rest'        => true,
            'can_export'          => true,
            'exclude_from_search' => true,
        );
        register_post_type( Plugin::get_instance()->cpt, $args );
        register_post_type( Plugin::get_instance()->click_cpt, array(
            'public' => false,
        ) );
    }

}