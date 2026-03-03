<?php
/**
 * One-Time Setup: Populate ACF Options, Homepage Modules, Inner Pages, and Migrate CPT Meta
 *
 * HOW TO USE:
 * 1. Make sure ACF PRO is installed and activated.
 * 2. Go to WordPress admin → Theme Settings → and visit each sub-page once (so ACF creates option rows).
 * 3. Add ?hsr_setup=1 to any admin page URL, e.g.:
 *    https://yoursite.com/wp-admin/?hsr_setup=1
 * 4. You'll see a results page showing what was populated.
 * 5. Remove this file or the require_once line from functions.php after running.
 *
 * @package HillStreetRealty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Listen for ?hsr_setup=1 on admin pages.
 */
function hsr_run_setup_data() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    if ( empty( $_GET['hsr_setup'] ) || $_GET['hsr_setup'] !== '1' ) {
        return;
    }
    if ( ! function_exists( 'update_field' ) ) {
        wp_die( 'ACF PRO must be active before running setup.' );
    }

    $results = array();

    // Phase A: WordPress Settings (site name, reading, permalinks)
    $results['wp_settings'] = hsr_setup_wp_settings();

    // Phase B: Navigation Menus
    $results['nav_menus'] = hsr_setup_nav_menus();

    // Phase 6: Populate ACF Options
    $results['options'] = hsr_populate_options();

    // Phase 7: Populate Homepage modules
    $results['homepage'] = hsr_populate_homepage();

    // Phase 8: Populate Inner Pages
    $results['inner_pages'] = hsr_populate_inner_pages();

    // Phase 9: Migrate CPT meta
    $results['cpt_migration'] = hsr_migrate_cpt_meta();

    // Phase C: Create sample Transaction CPT posts
    $results['transactions'] = hsr_create_sample_transactions();

    // Phase D: Create sample Team Member CPT posts
    $results['team_members'] = hsr_create_sample_team_members();

    // Display results
    wp_die( '<h1>HSR Setup Complete</h1><pre>' . print_r( $results, true ) . '</pre><p><strong>Done!</strong> You can now remove <code>inc/hsr-setup-data.php</code> and its require_once from functions.php.</p>' );
}
add_action( 'admin_init', 'hsr_run_setup_data' );

/*===========================================================
 * PHASE A: WordPress Core Settings
 *==========================================================*/
function hsr_setup_wp_settings() {
    $log = array();

    // Site title & tagline.
    update_option( 'blogname', 'Hill Street Realty' );
    update_option( 'blogdescription', 'Disciplined Judgement. Durable Returns.' );
    $log[] = 'Site title and tagline set.';

    // Static front page (Home) — will be created in Phase 7 if missing.
    update_option( 'show_on_front', 'page' );
    $log[] = 'Reading settings: static front page enabled.';

    // Permalink structure.
    $current = get_option( 'permalink_structure' );
    if ( $current !== '/%postname%/' ) {
        update_option( 'permalink_structure', '/%postname%/' );
        flush_rewrite_rules();
        $log[] = 'Permalink structure set to /%postname%/.';
    } else {
        $log[] = 'Permalinks already set to /%postname%/.';
    }

    // Timezone.
    update_option( 'timezone_string', 'America/Los_Angeles' );
    $log[] = 'Timezone set to America/Los_Angeles.';

    return $log;
}

/*===========================================================
 * PHASE B: Navigation Menus
 *==========================================================*/
function hsr_setup_nav_menus() {
    $log = array();

    // --- Primary Menu ---
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( $menu_exists ) {
        $log[] = "Primary menu already exists (ID {$menu_exists->term_id}). Skipping.";
        $menu_id = $menu_exists->term_id;
    } else {
        $menu_id = wp_create_nav_menu( $menu_name );
        if ( is_wp_error( $menu_id ) ) {
            $log[] = 'ERROR creating primary menu: ' . $menu_id->get_error_message();
            return $log;
        }
        $log[] = "Created primary menu (ID {$menu_id}).";

        // Helper to find page ID by slug.
        $get_page_id = function( $slug ) {
            $page = get_page_by_path( $slug );
            return $page ? $page->ID : 0;
        };

        // About (parent)
        $about_id = wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'About',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $get_page_id( 'about' ),
            'menu-item-type'      => $get_page_id( 'about' ) ? 'post_type' : 'custom',
            'menu-item-url'       => '/about/',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 1,
        ) );

        // About → Team (child)
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'      => 'Team',
            'menu-item-object'     => 'page',
            'menu-item-object-id'  => $get_page_id( 'team' ),
            'menu-item-type'       => $get_page_id( 'team' ) ? 'post_type' : 'custom',
            'menu-item-url'        => '/team/',
            'menu-item-status'     => 'publish',
            'menu-item-parent-id'  => $about_id,
            'menu-item-position'   => 2,
        ) );

        // About → History (child)
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'      => 'History',
            'menu-item-object'     => 'page',
            'menu-item-object-id'  => $get_page_id( 'history' ),
            'menu-item-type'       => $get_page_id( 'history' ) ? 'post_type' : 'custom',
            'menu-item-url'        => '/history/',
            'menu-item-status'     => 'publish',
            'menu-item-parent-id'  => $about_id,
            'menu-item-position'   => 3,
        ) );

        // Strategy
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'Strategy',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $get_page_id( 'strategy' ),
            'menu-item-type'      => $get_page_id( 'strategy' ) ? 'post_type' : 'custom',
            'menu-item-url'       => '/strategy/',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 4,
        ) );

        // Transactions (parent)
        $tx_id = wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'Transactions',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $get_page_id( 'transactions' ),
            'menu-item-type'      => $get_page_id( 'transactions' ) ? 'post_type' : 'custom',
            'menu-item-url'       => '/transactions/',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 5,
        ) );

        // Transactions → Current (child, custom link)
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'Current',
            'menu-item-url'       => '/transactions/?status=current',
            'menu-item-type'      => 'custom',
            'menu-item-status'    => 'publish',
            'menu-item-parent-id' => $tx_id,
            'menu-item-position'  => 6,
        ) );

        // Transactions → Realized (child, custom link)
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'Realized',
            'menu-item-url'       => '/transactions/?status=realized',
            'menu-item-type'      => 'custom',
            'menu-item-status'    => 'publish',
            'menu-item-parent-id' => $tx_id,
            'menu-item-position'  => 7,
        ) );

        // Fund
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'Fund',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $get_page_id( 'fund' ),
            'menu-item-type'      => $get_page_id( 'fund' ) ? 'post_type' : 'custom',
            'menu-item-url'       => '/fund/',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 8,
        ) );

        // News
        wp_update_nav_menu_item( $menu_id, 0, array(
            'menu-item-title'     => 'News',
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $get_page_id( 'news' ),
            'menu-item-type'      => $get_page_id( 'news' ) ? 'post_type' : 'custom',
            'menu-item-url'       => '/news/',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 9,
        ) );

        $log[] = 'Primary menu items created (About>Team/History, Strategy, Transactions>Current/Realized, Fund, News).';
    }

    // Assign menu to theme location.
    $locations = get_theme_mod( 'nav_menu_locations', array() );
    $locations['primary'] = $menu_id;
    set_theme_mod( 'nav_menu_locations', $locations );
    $log[] = 'Primary menu assigned to "primary" theme location.';

    return $log;
}

/*===========================================================
 * PHASE 6: Populate ACF Options
 *==========================================================*/
function hsr_populate_options() {
    $log = array();

    // --- Company Info ---
    update_field( 'company_name', 'Hill Street Realty', 'option' );
    update_field( 'company_description', 'A vertically integrated multifamily investment firm focused on value-add opportunities. We combine institutional discipline with entrepreneurial agility to deliver strong risk-adjusted returns.', 'option' );
    update_field( 'linkedin_url', '#', 'option' );
    $log[] = 'Company info populated.';

    // --- Office Locations ---
    $offices = array(
        array(
            'city'           => 'Los Angeles',
            'address_line_1' => '11400 W. Olympic Blvd. Suite 630',
            'address_line_2' => 'Los Angeles, CA 90064',
            'phone'          => '310.914.1410',
            'fax'            => '310.914.1420',
        ),
        array(
            'city'           => 'Denver',
            'address_line_1' => '1720 S. Bellaire Street Suite 1250',
            'address_line_2' => 'Denver, CO 80222',
            'phone'          => '970.999.1410',
            'fax'            => '',
        ),
    );
    update_field( 'offices', $offices, 'option' );
    $log[] = 'Office locations populated (LA + Denver).';

    // --- Header Settings ---
    update_field( 'header_cta_text', 'Contact Us', 'option' );
    update_field( 'header_cta_url', '/contact/', 'option' );
    update_field( 'header_login_text', 'Login', 'option' );
    update_field( 'header_login_url', '/login/', 'option' );
    $log[] = 'Header settings populated.';

    // --- Footer Settings ---
    $company_links = array(
        array( 'label' => 'About',   'url' => '/about/' ),
        array( 'label' => 'History', 'url' => '/history/' ),
        array( 'label' => 'Team',    'url' => '/team/' ),
        array( 'label' => 'Contact', 'url' => '/contact/' ),
    );
    update_field( 'footer_company_links', $company_links, 'option' );

    $investment_links = array(
        array( 'label' => 'Strategy',     'url' => '/strategy/' ),
        array( 'label' => 'Transactions', 'url' => '/transactions/' ),
        array( 'label' => 'Fund',         'url' => '/fund/' ),
        array( 'label' => 'News',         'url' => '/news/' ),
    );
    update_field( 'footer_investment_links', $investment_links, 'option' );

    $legal_links = array(
        array( 'label' => 'Privacy Policy',   'url' => '/privacy-policy/' ),
        array( 'label' => 'Terms of Service',  'url' => '/terms/' ),
        array( 'label' => 'Disclosures',       'url' => '/disclosures/' ),
    );
    update_field( 'footer_legal_links', $legal_links, 'option' );

    update_field( 'footer_copyright_text', '', 'option' ); // Uses default shortcode
    $log[] = 'Footer settings populated (company, investment, legal links).';

    return $log;
}

/*===========================================================
 * PHASE 7: Populate Homepage Flexible Content
 *==========================================================*/
function hsr_populate_homepage() {
    $log = array();

    // Find the front page
    $front_page_id = get_option( 'page_on_front' );
    if ( ! $front_page_id ) {
        // Try to find by slug
        $page = get_page_by_path( 'home' );
        if ( ! $page ) {
            $page = get_page_by_path( 'homepage' );
        }
        if ( ! $page ) {
            // Try the page with front-page template
            $pages = get_pages();
            foreach ( $pages as $p ) {
                if ( $p->post_name === 'front-page' || $p->post_name === 'home' ) {
                    $page = $p;
                    break;
                }
            }
        }
        if ( $page ) {
            $front_page_id = $page->ID;
        }
    }

    if ( ! $front_page_id ) {
        // Auto-create a Home page and set it as the front page.
        $page_id = wp_insert_post( array(
            'post_title'  => 'Home',
            'post_name'   => 'home',
            'post_status' => 'publish',
            'post_type'   => 'page',
        ) );
        if ( is_wp_error( $page_id ) ) {
            $log[] = 'ERROR: Could not create Home page: ' . $page_id->get_error_message();
            return $log;
        }
        $front_page_id = $page_id;
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
        $log[] = "Created Home page (ID {$front_page_id}) and set as static front page.";
    }

    $log[] = "Front page found: ID {$front_page_id}";

    // Build the modules array matching front-page.html pattern order:
    // 1. hero, 2. stats_bar, 3. track_record, 4. transactions_grid,
    // 5. testimonial_single, 6. approach_video, 7. investment_focus,
    // 8. gallery_strip, 9. cta_banner
    $modules = array(

        // 1. Hero (from homepage-hero.php)
        array(
            'acf_fc_layout' => 'hero',
            'headline'      => 'Disciplined Judgement.<br>Durable Returns.',
            'subtext'       => 'Institutional underwriting, cycle-tested experience, and execution built for long-term capital performance.',
            'cta_text'      => 'View Transactions',
            'cta_url'       => '/transactions/',
            'badge_text'    => 'SINCE 2001 • REAL ESTATE INVESTORS •',
        ),

        // 2. Stats Bar (from homepage-stats.php)
        array(
            'acf_fc_layout'    => 'stats_bar',
            'background_color' => 'primary',
            'stats'            => array(
                array( 'number' => '650', 'prefix' => '$', 'suffix' => 'M+', 'label' => 'Total invested capital' ),
                array( 'number' => '35',  'prefix' => '',  'suffix' => '',   'label' => 'Investments to date' ),
                array( 'number' => '36',  'prefix' => '',  'suffix' => '%',  'label' => 'Avg. annual gross return' ),
                array( 'number' => '19',  'prefix' => '',  'suffix' => '',   'label' => 'Realized investments' ),
            ),
        ),

        // 3. Track Record (from homepage-track-record.php)
        array(
            'acf_fc_layout' => 'track_record',
            'heading'       => 'A Proven Track Record of Value Creation',
            'description'   => 'Our vertically integrated platform enables direct control over assets, allowing us to execute efficiently and create lasting value for our partners.',
            'features'      => array(
                array( 'text' => 'Disciplined underwriting' ),
                array( 'text' => 'Hands-on asset management' ),
                array( 'text' => 'Strategic repositioning expertise' ),
            ),
            'cta_text'      => 'Meet Our Team',
            'cta_url'       => '/team/',
            'stat_number'   => '24',
            'stat_label'    => 'Years of experience in real estate investing',
        ),

        // 4. Transactions Grid (from homepage-transactions.php)
        array(
            'acf_fc_layout' => 'transactions_grid',
            'heading'       => 'Select Transactions',
            'cta_text'      => 'View All Transactions',
            'cta_url'       => '/transactions/',
            'display_mode'  => 'featured',
            'count'         => 6,
            'columns'       => '3',
        ),

        // 5. Testimonial Single (from homepage-testimonial.php)
        array(
            'acf_fc_layout'    => 'testimonial_single',
            'quote'            => 'Hill Street\'s disciplined approach and hands-on management have consistently delivered strong risk-adjusted returns. Their deep expertise in multifamily repositioning and commitment to operational excellence make them exceptional partners.',
            'author_name'      => 'Investment Partner',
            'author_title'     => 'Institutional Investor',
            'background_style' => 'primary',
        ),

        // 6. Approach / Video (from homepage-approach.php)
        array(
            'acf_fc_layout'   => 'approach_video',
            'label'           => 'Our Approach',
            'description'     => 'At Hill Street, we combine institutional discipline with entrepreneurial agility to identify undervalued multifamily assets and unlock their full potential through hands-on management and strategic repositioning.',
            'cta_text'        => 'Learn About Our Strategy',
            'cta_url'         => '/strategy/',
            'video_url'       => '',
            'reverse_columns' => 0,
        ),

        // 7. Investment Focus (from homepage-investment-focus.php)
        array(
            'acf_fc_layout' => 'investment_focus',
            'heading'       => 'Our Investment Focus',
            'cards'         => array(
                array(
                    'icon_svg'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1a1a5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M19 21V11l-6-4"></path><path d="M9 9v.01"></path><path d="M9 12v.01"></path><path d="M9 15v.01"></path><path d="M9 18v.01"></path></svg>',
                    'title'       => 'Value-Add Multifamily',
                    'description' => 'Targeting well-located properties with operational, physical, or financial inefficiencies and repositioning them through thoughtful renovations and strategic management.',
                ),
                array(
                    'icon_svg'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1a1a5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20v-6M6 20V10M18 20V4"/></svg>',
                    'title'       => 'Risk-Adjusted Returns',
                    'description' => 'Each investment is evaluated against alternatives to deliver outsized returns while carefully managing downside risk through disciplined underwriting and market analysis.',
                ),
                array(
                    'icon_svg'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#1a1a5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                    'title'       => 'Vertically Integrated',
                    'description' => 'Direct control over our assets through in-house property management, allowing us to act quickly, execute efficiently, and maximize operational performance.',
                ),
            ),
            'columns'       => '3',
        ),

        // 8. Gallery Strip
        array(
            'acf_fc_layout' => 'gallery_strip',
        ),

        // 9. CTA Banner (from homepage-cta.php)
        array(
            'acf_fc_layout'    => 'cta_banner',
            'heading'          => 'Partner With Us',
            'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
            'button_text'      => 'Contact Us',
            'button_url'       => '/contact/',
            'background_color' => 'primary',
        ),
    );

    update_field( 'modules', $modules, $front_page_id );
    $log[] = 'Homepage modules populated (' . count( $modules ) . ' modules).';

    return $log;
}

/*===========================================================
 * PHASE 8: Populate Inner Pages with Modules
 *==========================================================*/
function hsr_populate_inner_pages() {
    $log = array();

    // Define inner page configs: slug → array of modules
    $pages_config = array(

        'about' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => '',
                'headline'      => 'Building lasting value through strategic investment.',
                'description'   => 'Distinct. Disciplined. Results-Driven. Hill Street Realty combines institutional expertise with entrepreneurial agility to identify and transform undervalued multifamily assets.',
                'layout'        => 'two-column',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'team' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Leadership',
                'headline'      => 'Meet Our Team',
                'description'   => 'Our experienced team brings together decades of expertise in acquisitions, asset management, and capital markets.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout' => 'team_grid',
                'heading'       => '',
                'subtext'       => '',
                'display_mode'  => 'all',
                'columns'       => '4',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'strategy' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Our Approach',
                'headline'      => 'Strategy',
                'description'   => 'We focus on value-add multifamily investments in high-growth Western markets, combining institutional discipline with entrepreneurial execution.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'transactions' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Portfolio',
                'headline'      => 'Transactions',
                'description'   => 'Explore our portfolio of current and realized multifamily investments across the Western United States.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout' => 'transactions_grid',
                'heading'       => '',
                'cta_text'      => '',
                'cta_url'       => '',
                'display_mode'  => 'latest',
                'count'         => 12,
                'columns'       => '3',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'fund' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Invest With Us',
                'headline'      => 'Fund',
                'description'   => 'Partner with us to access carefully selected multifamily investment opportunities with attractive risk-adjusted returns.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'history' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Our Story',
                'headline'      => 'History & Track Record',
                'description'   => 'Since 2001, we have built a track record of consistent performance through disciplined investment practices and hands-on asset management.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'news' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Latest Updates',
                'headline'      => 'News',
                'description'   => 'Stay informed with our latest news, market insights, and company updates from across our portfolio.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout' => 'blog_posts_grid',
                'heading'       => '',
                'cta_text'      => '',
                'cta_url'       => '',
                'display_mode'  => 'latest',
                'count'         => 9,
                'columns'       => '3',
            ),
            array(
                'acf_fc_layout'    => 'cta_banner',
                'heading'          => 'Partner With Us',
                'subtext'          => 'Explore co-investment opportunities in carefully selected multifamily assets.',
                'button_text'      => 'Contact Us',
                'button_url'       => '/contact/',
                'background_color' => 'primary',
            ),
        ),

        'contact' => array(
            array(
                'acf_fc_layout' => 'hero_page',
                'label'         => 'Get In Touch',
                'headline'      => 'Contact Us',
                'description'   => 'Ready to explore investment opportunities or learn more about Hill Street Realty? We\'d love to hear from you.',
                'layout'        => 'centered',
            ),
            array(
                'acf_fc_layout' => 'contact_info',
                'cards'         => array(
                    array(
                        'icon'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
                        'title'   => 'Los Angeles',
                        'content' => '11400 W. Olympic Blvd. Suite 630<br>Los Angeles, CA 90064<br>Phone: <a href="tel:+13109141410">310.914.1410</a><br>Fax: 310.914.1420',
                    ),
                    array(
                        'icon'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
                        'title'   => 'Denver',
                        'content' => '1720 S. Bellaire Street Suite 1250<br>Denver, CO 80222<br>Phone: <a href="tel:+19709991410">970.999.1410</a>',
                    ),
                    array(
                        'icon'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
                        'title'   => 'Email Us',
                        'content' => '<a href="mailto:info@hillstreetrealtyinc.com">info@hillstreetrealtyinc.com</a>',
                    ),
                ),
                'columns'       => '3',
            ),
        ),
    );

    // Page titles for auto-creation.
    $page_titles = array(
        'about'        => 'About',
        'team'         => 'Team',
        'strategy'     => 'Strategy',
        'transactions' => 'Transactions',
        'fund'         => 'Fund',
        'history'      => 'History',
        'news'         => 'News',
        'contact'      => 'Contact',
    );

    foreach ( $pages_config as $slug => $modules ) {
        $page = get_page_by_path( $slug );

        // Auto-create the page if it doesn't exist.
        if ( ! $page ) {
            $title   = isset( $page_titles[ $slug ] ) ? $page_titles[ $slug ] : ucfirst( $slug );
            $page_id = wp_insert_post( array(
                'post_title'  => $title,
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ) );
            if ( is_wp_error( $page_id ) ) {
                $log[] = "ERROR: Could not create page '{$slug}': " . $page_id->get_error_message();
                continue;
            }
            $log[] = "Created page '{$title}' (ID {$page_id}).";
            $page = get_post( $page_id );
        }

        update_field( 'modules', $modules, $page->ID );
        $log[] = "Page '{$slug}' (ID {$page->ID}) populated with " . count( $modules ) . ' module(s).';
    }

    return $log;
}

/*===========================================================
 * PHASE 9: Migrate CPT Meta to ACF Fields
 *==========================================================*/
function hsr_migrate_cpt_meta() {
    $log = array();

    // --- Transactions ---
    $transactions = get_posts( array(
        'post_type'      => 'hsr_transaction',
        'posts_per_page' => -1,
        'post_status'    => 'any',
    ) );

    $tx_count = 0;
    foreach ( $transactions as $tx ) {
        $migrated = false;

        // Map old meta keys → new ACF field names
        $meta_map = array(
            'hsr_address'    => 'transaction_address',
            'hsr_city_state' => 'transaction_city_state',
            'hsr_units'      => 'transaction_units',
            'hsr_status'     => 'transaction_status',
            'hsr_type'       => 'transaction_type',
            'hsr_year'       => 'transaction_year',
            'hsr_year_sold'  => 'transaction_year_sold',
            'hsr_featured'   => 'transaction_featured',
            'hsr_order'      => 'transaction_order',
        );

        foreach ( $meta_map as $old_key => $new_key ) {
            $old_value = get_post_meta( $tx->ID, $old_key, true );
            if ( $old_value !== '' && $old_value !== false ) {
                // Only migrate if ACF field is empty
                $current = get_field( $new_key, $tx->ID );
                if ( empty( $current ) ) {
                    update_field( $new_key, $old_value, $tx->ID );
                    $migrated = true;
                }
            }
        }

        if ( $migrated ) {
            $tx_count++;
        }
    }
    $log[] = "Transactions: {$tx_count} of " . count( $transactions ) . ' migrated.';

    // --- Team Members ---
    $team = get_posts( array(
        'post_type'      => 'hsr_team',
        'posts_per_page' => -1,
        'post_status'    => 'any',
    ) );

    $tm_count = 0;
    foreach ( $team as $member ) {
        $migrated = false;

        $meta_map = array(
            'hsr_position'   => 'team_position',
            'hsr_department' => 'team_department',
            'hsr_email'      => 'team_email',
            'hsr_phone'      => 'team_phone',
            'hsr_linkedin'   => 'team_linkedin',
            'hsr_bio'        => 'team_bio',
            'hsr_order'      => 'team_order',
            'hsr_featured'   => 'team_featured',
        );

        foreach ( $meta_map as $old_key => $new_key ) {
            $old_value = get_post_meta( $member->ID, $old_key, true );
            if ( $old_value !== '' && $old_value !== false ) {
                $current = get_field( $new_key, $member->ID );
                if ( empty( $current ) ) {
                    update_field( $new_key, $old_value, $member->ID );
                    $migrated = true;
                }
            }
        }

        if ( $migrated ) {
            $tm_count++;
        }
    }
    $log[] = "Team members: {$tm_count} of " . count( $team ) . ' migrated.';

    return $log;
}

/*===========================================================
 * PHASE C: Create Sample Transaction CPT Posts
 *==========================================================*/
function hsr_create_sample_transactions() {
    $log = array();

    $transactions = array(
        array(
            'title'      => 'The Westmore',
            'slug'       => 'the-westmore',
            'address'    => '456 Westmore Ave',
            'city_state' => 'Los Angeles, CA',
            'units'      => 156,
            'status'     => 'Realized',
            'type'       => 'Value-Add',
            'year'       => 2015,
            'year_sold'  => 2019,
            'featured'   => 1,
            'order'      => 1,
        ),
        array(
            'title'      => 'Highland Gardens',
            'slug'       => 'highland-gardens',
            'address'    => '789 Highland Blvd',
            'city_state' => 'Denver, CO',
            'units'      => 224,
            'status'     => 'Current',
            'type'       => 'Repositioning',
            'year'       => 2021,
            'year_sold'  => 0,
            'featured'   => 1,
            'order'      => 2,
        ),
        array(
            'title'      => 'Parkview Terrace',
            'slug'       => 'parkview-terrace',
            'address'    => '321 Parkview Dr',
            'city_state' => 'Phoenix, AZ',
            'units'      => 198,
            'status'     => 'Realized',
            'type'       => 'Value-Add',
            'year'       => 2017,
            'year_sold'  => 2022,
            'featured'   => 1,
            'order'      => 3,
        ),
        array(
            'title'      => 'Meridian Place',
            'slug'       => 'meridian-place',
            'address'    => '500 Meridian Way',
            'city_state' => 'Las Vegas, NV',
            'units'      => 312,
            'status'     => 'Current',
            'type'       => 'Core-Plus',
            'year'       => 2023,
            'year_sold'  => 0,
            'featured'   => 1,
            'order'      => 4,
        ),
        array(
            'title'      => 'Canyon Ridge',
            'slug'       => 'canyon-ridge',
            'address'    => '100 Canyon Ridge Rd',
            'city_state' => 'Tucson, AZ',
            'units'      => 144,
            'status'     => 'Realized',
            'type'       => 'Value-Add',
            'year'       => 2012,
            'year_sold'  => 2016,
            'featured'   => 0,
            'order'      => 5,
        ),
        array(
            'title'      => 'Summit Pointe',
            'slug'       => 'summit-pointe',
            'address'    => '250 Summit Pointe Blvd',
            'city_state' => 'Salt Lake City, UT',
            'units'      => 180,
            'status'     => 'Realized',
            'type'       => 'Repositioning',
            'year'       => 2014,
            'year_sold'  => 2018,
            'featured'   => 0,
            'order'      => 6,
        ),
    );

    foreach ( $transactions as $tx ) {
        // Skip if already exists.
        $existing = get_page_by_path( $tx['slug'], OBJECT, 'hsr_transaction' );
        if ( $existing ) {
            $log[] = "Transaction '{$tx['title']}' already exists (ID {$existing->ID}). Skipping.";
            continue;
        }

        $post_id = wp_insert_post( array(
            'post_title'  => $tx['title'],
            'post_name'   => $tx['slug'],
            'post_status' => 'publish',
            'post_type'   => 'hsr_transaction',
        ) );

        if ( is_wp_error( $post_id ) ) {
            $log[] = "ERROR creating transaction '{$tx['title']}': " . $post_id->get_error_message();
            continue;
        }

        update_field( 'transaction_address',    $tx['address'],    $post_id );
        update_field( 'transaction_city_state',  $tx['city_state'], $post_id );
        update_field( 'transaction_units',       $tx['units'],      $post_id );
        update_field( 'transaction_status',      $tx['status'],     $post_id );
        update_field( 'transaction_type',        $tx['type'],       $post_id );
        update_field( 'transaction_year',        $tx['year'],       $post_id );
        if ( $tx['year_sold'] ) {
            update_field( 'transaction_year_sold', $tx['year_sold'], $post_id );
        }
        update_field( 'transaction_featured',    $tx['featured'],   $post_id );
        update_field( 'transaction_order',       $tx['order'],      $post_id );

        $log[] = "Created transaction '{$tx['title']}' (ID {$post_id}).";
    }

    return $log;
}

/*===========================================================
 * PHASE D: Create Sample Team Member CPT Posts
 *==========================================================*/
function hsr_create_sample_team_members() {
    $log = array();

    $members = array(
        array(
            'name'       => 'Jonathan Mitchell',
            'slug'       => 'jonathan-mitchell',
            'position'   => 'Managing Partner & CEO',
            'department' => 'Leadership',
            'email'      => 'jmitchell@hillstreetrealtyinc.com',
            'phone'      => '310.914.1410',
            'bio'        => 'Jonathan founded Hill Street Realty in 2001 with a vision to create a vertically integrated investment firm focused on multifamily assets. With over 25 years of real estate experience, he leads the firm\'s strategic direction and oversees all investment activities.',
            'featured'   => 1,
            'order'      => 1,
        ),
        array(
            'name'       => 'Sarah Chen',
            'slug'       => 'sarah-chen',
            'position'   => 'Chief Investment Officer',
            'department' => 'Leadership',
            'email'      => 'schen@hillstreetrealtyinc.com',
            'phone'      => '310.914.1411',
            'bio'        => 'Sarah oversees all investment underwriting and due diligence. She brings 18 years of institutional real estate experience, having previously held senior roles at major private equity firms. Her disciplined approach to analysis ensures each investment meets the firm\'s rigorous standards.',
            'featured'   => 1,
            'order'      => 2,
        ),
        array(
            'name'       => 'Michael Torres',
            'slug'       => 'michael-torres',
            'position'   => 'VP of Acquisitions',
            'department' => 'Investments',
            'email'      => 'mtorres@hillstreetrealtyinc.com',
            'phone'      => '310.914.1412',
            'bio'        => 'Michael leads the firm\'s acquisitions pipeline, identifying and evaluating value-add multifamily opportunities across Western markets. He has sourced over $400M in transactions during his tenure at Hill Street.',
            'featured'   => 1,
            'order'      => 3,
        ),
        array(
            'name'       => 'Emily Rodriguez',
            'slug'       => 'emily-rodriguez',
            'position'   => 'VP of Asset Management',
            'department' => 'Operations',
            'email'      => 'erodriguez@hillstreetrealtyinc.com',
            'phone'      => '970.999.1411',
            'bio'        => 'Emily leads the hands-on management of the firm\'s portfolio, overseeing property operations, capital improvements, and value creation strategies. Her operational expertise is key to maximizing returns across our investments.',
            'featured'   => 1,
            'order'      => 4,
        ),
        array(
            'name'       => 'David Park',
            'slug'       => 'david-park',
            'position'   => 'Director of Capital Markets',
            'department' => 'Investments',
            'email'      => 'dpark@hillstreetrealtyinc.com',
            'phone'      => '310.914.1413',
            'bio'        => 'David manages investor relations and capital raising efforts. He structures investment vehicles and maintains strong relationships with the firm\'s institutional and private capital partners.',
            'featured'   => 0,
            'order'      => 5,
        ),
        array(
            'name'       => 'Rachel Kim',
            'slug'       => 'rachel-kim',
            'position'   => 'Director of Operations',
            'department' => 'Operations',
            'email'      => 'rkim@hillstreetrealtyinc.com',
            'phone'      => '970.999.1412',
            'bio'        => 'Rachel oversees day-to-day operations for the Denver portfolio, managing property teams and driving operational efficiencies across our Colorado assets.',
            'featured'   => 0,
            'order'      => 6,
        ),
    );

    foreach ( $members as $member ) {
        // Skip if already exists.
        $existing = get_page_by_path( $member['slug'], OBJECT, 'hsr_team' );
        if ( $existing ) {
            $log[] = "Team member '{$member['name']}' already exists (ID {$existing->ID}). Skipping.";
            continue;
        }

        $post_id = wp_insert_post( array(
            'post_title'  => $member['name'],
            'post_name'   => $member['slug'],
            'post_status' => 'publish',
            'post_type'   => 'hsr_team',
        ) );

        if ( is_wp_error( $post_id ) ) {
            $log[] = "ERROR creating team member '{$member['name']}': " . $post_id->get_error_message();
            continue;
        }

        update_field( 'team_position',   $member['position'],   $post_id );
        update_field( 'team_department', $member['department'], $post_id );
        update_field( 'team_email',      $member['email'],      $post_id );
        update_field( 'team_phone',      $member['phone'],      $post_id );
        update_field( 'team_bio',        $member['bio'],        $post_id );
        update_field( 'team_featured',   $member['featured'],   $post_id );
        update_field( 'team_order',      $member['order'],      $post_id );

        $log[] = "Created team member '{$member['name']}' (ID {$post_id}).";
    }

    return $log;
}
