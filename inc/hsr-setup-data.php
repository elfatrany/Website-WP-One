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

    // Phase 6: Populate ACF Options
    $results['options'] = hsr_populate_options();

    // Phase 7: Populate Homepage modules
    $results['homepage'] = hsr_populate_homepage();

    // Phase 8: Populate Inner Pages
    $results['inner_pages'] = hsr_populate_inner_pages();

    // Phase 9: Migrate CPT meta
    $results['cpt_migration'] = hsr_migrate_cpt_meta();

    // Display results
    wp_die( '<h1>HSR Setup Complete</h1><pre>' . print_r( $results, true ) . '</pre><p><strong>Done!</strong> You can now remove <code>inc/hsr-setup-data.php</code> and its require_once from functions.php.</p>' );
}
add_action( 'admin_init', 'hsr_run_setup_data' );

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
