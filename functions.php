<?php
/**
 * Hill Street Realty Theme Functions
 *
 * @package HillStreetRealty
 * @since 1.0.0
 *
 * DEVELOPMENT GUIDELINES:
 * -----------------------
 * ICONS: Always use Lucide Icons Block plugin (wp:lucide/icon) for all icons.
 *        DO NOT use emojis anywhere in the theme - patterns, templates, or content.
 *        Example: <!-- wp:lucide/icon {"icon":"home","size":24,"color":"#1e2a4a","strokeWidth":2} /-->
 *
 * Available Lucide icons: https://lucide.dev/icons
 * Common icons used: home, map-pin, bed-double, bath, square, phone, mail,
 *                    arrow-up-right, arrow-right, check, star, building-2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'HSR_THEME_VERSION', '4.0.0' );
define( 'HSR_THEME_DIR', get_template_directory() );
define( 'HSR_THEME_URI', get_template_directory_uri() );

/*----------------------------------------------------------
 * ACF Includes
 *---------------------------------------------------------*/
require_once HSR_THEME_DIR . '/inc/acf-options-pages.php';
require_once HSR_THEME_DIR . '/inc/acf-field-groups.php';
require_once HSR_THEME_DIR . '/inc/acf-cpt-fields.php';
require_once HSR_THEME_DIR . '/inc/acf-flexible-content.php';
require_once HSR_THEME_DIR . '/inc/hsr-setup-data.php';

/*----------------------------------------------------------
 * ACF JSON Save/Load Paths
 *---------------------------------------------------------*/
function hsr_acf_json_save_point( $path ) {
    return HSR_THEME_DIR . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'hsr_acf_json_save_point' );

function hsr_acf_json_load_point( $paths ) {
    $paths[] = HSR_THEME_DIR . '/acf-json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'hsr_acf_json_load_point' );

/**
 * Theme Setup
 */
function hsr_theme_setup() {
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add custom image sizes
    add_image_size( 'hsr-property-card', 600, 400, true );
    add_image_size( 'hsr-property-gallery', 1200, 800, true );
    add_image_size( 'hsr-team-member', 400, 500, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'hill-street-realty' ),
        'footer'    => __( 'Footer Menu', 'hill-street-realty' ),
        'resources' => __( 'Resources Menu', 'hill-street-realty' ),
    ) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Remove core block patterns if using custom only
    remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'hsr_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function hsr_enqueue_assets() {
    // Theme stylesheet (with animations)
    wp_enqueue_style(
        'hsr-theme-style',
        get_stylesheet_uri(),
        array(),
        HSR_THEME_VERSION
    );

    // Main stylesheet - depends on WP block styles so it loads AFTER
    wp_enqueue_style(
        'hsr-main-style',
        HSR_THEME_URI . '/assets/css/main.css',
        array( 'hsr-theme-style', 'wp-block-library' ),
        HSR_THEME_VERSION
    );

    // Google Fonts - Optimized with display=swap and only needed weights
    wp_enqueue_style(
        'hsr-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main JavaScript
    wp_enqueue_script(
        'hsr-main-script',
        HSR_THEME_URI . '/assets/js/main.js',
        array(),
        HSR_THEME_VERSION,
        true
    );

    // Navigation script
    wp_enqueue_script(
        'hsr-navigation',
        HSR_THEME_URI . '/assets/js/navigation.js',
        array(),
        HSR_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'hsr_enqueue_assets' );

/**
 * Register Block Styles
 */
function hsr_register_block_styles() {
    // Button - Pill style
    register_block_style( 'core/button', array(
        'name'  => 'hsr-pill',
        'label' => __( 'Pill', 'hill-street-realty' ),
    ) );

    // Button - Outline style
    register_block_style( 'core/button', array(
        'name'  => 'hsr-outline',
        'label' => __( 'Outline', 'hill-street-realty' ),
    ) );

    // Image - Hover zoom
    register_block_style( 'core/image', array(
        'name'  => 'hsr-hover-zoom',
        'label' => __( 'Hover Zoom', 'hill-street-realty' ),
    ) );

    // Group - Card style
    register_block_style( 'core/group', array(
        'name'  => 'hsr-card',
        'label' => __( 'Card', 'hill-street-realty' ),
    ) );

    // Group - Shadow lift on hover
    register_block_style( 'core/group', array(
        'name'  => 'hsr-hover-lift',
        'label' => __( 'Hover Lift', 'hill-street-realty' ),
    ) );
}
add_action( 'init', 'hsr_register_block_styles' );


/**
 * Register Custom Post Type: Transactions
 */
function hsr_register_transaction_post_type() {
    $labels = array(
        'name'               => __( 'Transactions', 'hill-street-realty' ),
        'singular_name'      => __( 'Transaction', 'hill-street-realty' ),
        'menu_name'          => __( 'Transactions', 'hill-street-realty' ),
        'add_new'            => __( 'Add New Transaction', 'hill-street-realty' ),
        'add_new_item'       => __( 'Add New Transaction', 'hill-street-realty' ),
        'edit_item'          => __( 'Edit Transaction', 'hill-street-realty' ),
        'new_item'           => __( 'New Transaction', 'hill-street-realty' ),
        'view_item'          => __( 'View Transaction', 'hill-street-realty' ),
        'search_items'       => __( 'Search Transactions', 'hill-street-realty' ),
        'not_found'          => __( 'No transactions found', 'hill-street-realty' ),
        'not_found_in_trash' => __( 'No transactions found in Trash', 'hill-street-realty' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'transactions' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'template'           => array(
            array( 'core/paragraph', array( 'placeholder' => 'Transaction details...' ) ),
        ),
    );

    register_post_type( 'hsr_transaction', $args );
}
add_action( 'init', 'hsr_register_transaction_post_type' );

/**
 * Register Transaction Taxonomies
 */
function hsr_register_transaction_taxonomies() {
    // Transaction Type
    register_taxonomy( 'transaction_type', 'hsr_transaction', array(
        'labels'            => array(
            'name'          => __( 'Transaction Types', 'hill-street-realty' ),
            'singular_name' => __( 'Transaction Type', 'hill-street-realty' ),
        ),
        'public'            => true,
        'show_in_rest'      => true,
        'hierarchical'      => true,
        'rewrite'           => array( 'slug' => 'transaction-type' ),
    ) );
}
add_action( 'init', 'hsr_register_transaction_taxonomies' );

/**
 * Register Custom Post Type: Team Members
 */
function hsr_register_team_post_type() {
    $labels = array(
        'name'               => __( 'Team Members', 'hill-street-realty' ),
        'singular_name'      => __( 'Team Member', 'hill-street-realty' ),
        'menu_name'          => __( 'Team', 'hill-street-realty' ),
        'add_new'            => __( 'Add Team Member', 'hill-street-realty' ),
        'add_new_item'       => __( 'Add New Team Member', 'hill-street-realty' ),
        'edit_item'          => __( 'Edit Team Member', 'hill-street-realty' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    );

    register_post_type( 'hsr_team', $args );
}
add_action( 'init', 'hsr_register_team_post_type' );

/* Transaction meta, team meta, and block pattern categories
 * have been replaced by ACF field groups in inc/acf-field-groups.php
 * and inc/acf-cpt-fields.php */

/**
 * Disable Comments Completely
 */
function hsr_disable_comments() {
    // Remove comments from admin menu
    remove_menu_page( 'edit-comments.php' );

    // Remove comments from admin bar
    if ( is_admin_bar_showing() ) {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }

    // Disable comments support for all post types
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}
add_action( 'admin_init', 'hsr_disable_comments' );

// Close comments on frontend
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

// Hide existing comments
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

// Remove comments from admin bar
function hsr_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'hsr_remove_comments_admin_bar' );

/**
 * Duplicate Page/Post Functionality
 */
function hsr_duplicate_post_link( $actions, $post ) {
    if ( current_user_can( 'edit_posts' ) ) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url(
            admin_url( 'admin.php?action=hsr_duplicate_post&post=' . $post->ID ),
            'hsr_duplicate_post_' . $post->ID
        ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}
add_filter( 'page_row_actions', 'hsr_duplicate_post_link', 10, 2 );
add_filter( 'post_row_actions', 'hsr_duplicate_post_link', 10, 2 );

function hsr_duplicate_post() {
    if ( ! isset( $_GET['post'] ) || ! isset( $_GET['_wpnonce'] ) ) {
        wp_die( 'No post to duplicate.' );
    }

    $post_id = absint( $_GET['post'] );

    if ( ! wp_verify_nonce( $_GET['_wpnonce'], 'hsr_duplicate_post_' . $post_id ) ) {
        wp_die( 'Security check failed.' );
    }

    $post = get_post( $post_id );

    if ( ! $post ) {
        wp_die( 'Post not found.' );
    }

    $new_post = array(
        'post_title'    => $post->post_title . ' (Copy)',
        'post_content'  => $post->post_content,
        'post_status'   => 'draft',
        'post_type'     => $post->post_type,
        'post_author'   => get_current_user_id(),
        'post_excerpt'  => $post->post_excerpt,
    );

    $new_post_id = wp_insert_post( $new_post );

    // Copy post meta
    $post_meta = get_post_meta( $post_id );
    foreach ( $post_meta as $key => $values ) {
        foreach ( $values as $value ) {
            add_post_meta( $new_post_id, $key, maybe_unserialize( $value ) );
        }
    }

    wp_redirect( admin_url( 'edit.php?post_type=' . $post->post_type ) );
    exit;
}
add_action( 'admin_action_hsr_duplicate_post', 'hsr_duplicate_post' );

/**
 * ==========================================
 * PERFORMANCE OPTIMIZATIONS
 * ==========================================
 */

/**
 * Preload critical resources and add resource hints
 * SRP: This function handles ONLY resource hints
 */
function hsr_preload_resources() {
    // Preconnect to Google Fonts - critical for font loading performance
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

    // Preload the font file for faster text rendering
    echo '<link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff2" as="font" type="font/woff2" crossorigin>';

    // DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//images.unsplash.com">';
}
add_action( 'wp_head', 'hsr_preload_resources', 1 );

/**
 * Inline Critical CSS for above-the-fold content
 * SRP: Handles ONLY critical rendering path CSS
 * This prevents FOUC (Flash of Unstyled Content)
 */
function hsr_inline_critical_css() {
    ?>
    <style id="hsr-critical-css">
    /* Critical CSS - Above the fold */
    :root {
        --wp--preset--color--primary: #1a1a5e;
        --wp--preset--color--accent: #c9f56f;
        --wp--preset--color--white: #ffffff;
    }
    body {
        margin: 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: var(--wp--preset--color--white);
        -webkit-font-smoothing: antialiased;
    }
    /* Prevent layout shift - reserve space for header */
    .site-header {
        min-height: 80px;
    }
    /* Smooth image loading - prevent layout shift */
    img {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    img.is-loaded, img[src] {
        opacity: 1;
    }
    /* Content placeholders while loading */
    .wp-block-group.alignfull {
        min-height: 100px;
    }
    /* Hide elements until JS adds is-visible */
    .section-animate {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .section-animate.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    /* Skeleton placeholder for cards */
    .card-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: skeleton-loading 1.5s infinite;
    }
    @keyframes skeleton-loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    </style>
    <?php
}
add_action( 'wp_head', 'hsr_inline_critical_css', 2 );

/**
 * Optimize Google Fonts loading with display=swap
 */
function hsr_optimize_google_fonts( $html, $handle ) {
    if ( 'hsr-google-fonts' === $handle ) {
        $html = str_replace( "media='all'", "media='all' onload=\"this.media='all'\"", $html );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'hsr_optimize_google_fonts', 10, 2 );

/**
 * Disable WordPress emojis for performance
 */
function hsr_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'hsr_disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'hsr_disable_emojis_dns_prefetch', 10, 2 );
}
add_action( 'init', 'hsr_disable_emojis' );

function hsr_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    }
    return array();
}

function hsr_disable_emojis_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

/**
 * Remove query strings from static resources
 */
function hsr_remove_script_version( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'hsr_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'hsr_remove_script_version', 15, 1 );

/**
 * Add loading="lazy" to images and iframes
 */
function hsr_add_lazy_loading( $content ) {
    // Add lazy loading to images that don't have it
    $content = preg_replace(
        '/<img((?!loading=)[^>]*)>/i',
        '<img$1 loading="lazy">',
        $content
    );

    // Add lazy loading to iframes
    $content = preg_replace(
        '/<iframe((?!loading=)[^>]*)>/i',
        '<iframe$1 loading="lazy">',
        $content
    );

    return $content;
}
add_filter( 'the_content', 'hsr_add_lazy_loading' );
add_filter( 'post_thumbnail_html', 'hsr_add_lazy_loading' );
add_filter( 'render_block', 'hsr_add_lazy_loading' );

/**
 * Defer non-critical JavaScript
 */
function hsr_defer_scripts( $tag, $handle, $src ) {
    // Scripts to defer
    $defer_scripts = array( 'hsr-main-script', 'hsr-navigation' );

    if ( in_array( $handle, $defer_scripts ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'hsr_defer_scripts', 10, 3 );

/**
 * Remove unnecessary WordPress features
 */
function hsr_remove_unnecessary_features() {
    // Remove RSD link
    remove_action( 'wp_head', 'rsd_link' );

    // Remove Windows Live Writer manifest
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove shortlink
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );

    // Remove adjacent posts links
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

    // Remove WordPress generator tag
    remove_action( 'wp_head', 'wp_generator' );

    // Remove REST API link
    remove_action( 'wp_head', 'rest_output_link_wp_head' );

    // Remove oEmbed discovery links
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
}
add_action( 'init', 'hsr_remove_unnecessary_features' );

/**
 * Disable XML-RPC for security and performance
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove jQuery migrate (if not needed)
 */
function hsr_remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'hsr_remove_jquery_migrate' );

/**
 * Optimize heartbeat API
 */
function hsr_optimize_heartbeat( $settings ) {
    // Reduce heartbeat frequency on frontend
    $settings['interval'] = 60; // Default is 15 seconds
    return $settings;
}
add_filter( 'heartbeat_settings', 'hsr_optimize_heartbeat' );

// Disable heartbeat on frontend except on post edit pages
function hsr_disable_heartbeat_unless_editing() {
    global $pagenow;
    if ( 'post.php' !== $pagenow && 'post-new.php' !== $pagenow ) {
        wp_deregister_script( 'heartbeat' );
    }
}
add_action( 'init', 'hsr_disable_heartbeat_unless_editing', 1 );

/**
 * Add fetchpriority="high" to hero images
 */
function hsr_prioritize_hero_images( $content ) {
    // Add high priority to first image (likely hero)
    $content = preg_replace(
        '/<img((?!fetchpriority)[^>]*class="[^"]*hero[^"]*"[^>]*)>/i',
        '<img$1 fetchpriority="high">',
        $content,
        1
    );
    return $content;
}
add_filter( 'the_content', 'hsr_prioritize_hero_images', 5 );

/**
 * Add decoding="async" to images for better performance
 */
function hsr_async_image_decoding( $content ) {
    $content = preg_replace(
        '/<img((?!decoding=)[^>]*)>/i',
        '<img$1 decoding="async">',
        $content
    );
    return $content;
}
add_filter( 'the_content', 'hsr_async_image_decoding' );
add_filter( 'render_block', 'hsr_async_image_decoding' );

/**
 * Dynamic copyright year shortcode
 * Usage: [hsr_year] or [hsr_copyright]
 */
function hsr_current_year_shortcode() {
    return date( 'Y' );
}
add_shortcode( 'hsr_year', 'hsr_current_year_shortcode' );

function hsr_copyright_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'company' => 'Hill Street Realty',
    ), $atts );

    return '&copy; ' . date( 'Y' ) . ' ' . esc_html( $atts['company'] ) . '. All rights reserved.';
}
add_shortcode( 'hsr_copyright', 'hsr_copyright_shortcode' );
