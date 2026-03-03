<?php
/**
 * ACF Options Pages Registration
 *
 * @package HillStreetRealty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register ACF Options Pages
 */
function hsr_register_acf_options_pages() {
    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    // Parent page
    acf_add_options_page( array(
        'page_title'  => 'Theme Settings',
        'menu_title'  => 'Theme Settings',
        'menu_slug'   => 'hsr-theme-settings',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url'    => 'dashicons-admin-customizer',
        'position'    => 2,
    ) );

    // Sub-page: Company Info
    acf_add_options_sub_page( array(
        'page_title'  => 'Company Info',
        'menu_title'  => 'Company Info',
        'parent_slug' => 'hsr-theme-settings',
        'capability'  => 'edit_posts',
    ) );

    // Sub-page: Office Locations
    acf_add_options_sub_page( array(
        'page_title'  => 'Office Locations',
        'menu_title'  => 'Office Locations',
        'parent_slug' => 'hsr-theme-settings',
        'capability'  => 'edit_posts',
    ) );

    // Sub-page: Header Settings
    acf_add_options_sub_page( array(
        'page_title'  => 'Header Settings',
        'menu_title'  => 'Header Settings',
        'parent_slug' => 'hsr-theme-settings',
        'capability'  => 'edit_posts',
    ) );

    // Sub-page: Footer Settings
    acf_add_options_sub_page( array(
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer Settings',
        'parent_slug' => 'hsr-theme-settings',
        'capability'  => 'edit_posts',
    ) );
}
add_action( 'acf/init', 'hsr_register_acf_options_pages' );
