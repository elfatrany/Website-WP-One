<?php
/**
 * ACF Field Groups — Flexible Content + Options
 *
 * @package HillStreetRealty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register ACF Field Groups programmatically.
 * These will also sync to acf-json/ when saved via the UI.
 */
function hsr_register_acf_field_groups() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    /*----------------------------------------------------------
     * 1. FLEXIBLE CONTENT — Page Modules
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'      => 'group_hsr_modules',
        'title'    => 'Page Modules',
        'fields'   => array(
            array(
                'key'          => 'field_hsr_modules',
                'label'        => 'Modules',
                'name'         => 'modules',
                'type'         => 'flexible_content',
                'button_label' => 'Add Module',
                'layouts'      => hsr_get_module_layouts(),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'page',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'seamless',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ) );

    /*----------------------------------------------------------
     * 2. OPTIONS — Company Info
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_company_info',
        'title'  => 'Company Information',
        'fields' => array(
            array( 'key' => 'field_company_name',        'label' => 'Company Name',        'name' => 'company_name',        'type' => 'text', 'default_value' => 'Hill Street Realty' ),
            array( 'key' => 'field_company_description', 'label' => 'Company Description', 'name' => 'company_description', 'type' => 'textarea', 'rows' => 3 ),
            array( 'key' => 'field_company_logo',        'label' => 'Company Logo',        'name' => 'company_logo',        'type' => 'image', 'return_format' => 'array' ),
            array( 'key' => 'field_company_logo_footer', 'label' => 'Footer Logo (optional)', 'name' => 'company_logo_footer', 'type' => 'image', 'return_format' => 'array' ),
            array( 'key' => 'field_linkedin_url',        'label' => 'LinkedIn URL',        'name' => 'linkedin_url',        'type' => 'url' ),
        ),
        'location' => array(
            array(
                array( 'param' => 'options_page', 'operator' => '==', 'value' => 'acf-options-company-info' ),
            ),
        ),
        'active' => true,
    ) );

    /*----------------------------------------------------------
     * 3. OPTIONS — Office Locations
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_offices',
        'title'  => 'Office Locations',
        'fields' => array(
            array(
                'key'          => 'field_offices',
                'label'        => 'Offices',
                'name'         => 'offices',
                'type'         => 'repeater',
                'button_label' => 'Add Office',
                'layout'       => 'block',
                'sub_fields'   => array(
                    array( 'key' => 'field_office_city',           'label' => 'City',           'name' => 'city',           'type' => 'text', 'wrapper' => array( 'width' => '25' ) ),
                    array( 'key' => 'field_office_address_line_1', 'label' => 'Address Line 1', 'name' => 'address_line_1', 'type' => 'text', 'wrapper' => array( 'width' => '25' ) ),
                    array( 'key' => 'field_office_address_line_2', 'label' => 'Address Line 2', 'name' => 'address_line_2', 'type' => 'text', 'wrapper' => array( 'width' => '25' ) ),
                    array( 'key' => 'field_office_phone',          'label' => 'Phone',          'name' => 'phone',          'type' => 'text', 'wrapper' => array( 'width' => '15' ) ),
                    array( 'key' => 'field_office_fax',            'label' => 'Fax',            'name' => 'fax',            'type' => 'text', 'wrapper' => array( 'width' => '10' ) ),
                ),
            ),
        ),
        'location' => array(
            array(
                array( 'param' => 'options_page', 'operator' => '==', 'value' => 'acf-options-office-locations' ),
            ),
        ),
        'active' => true,
    ) );

    /*----------------------------------------------------------
     * 4. OPTIONS — Header Settings
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_header',
        'title'  => 'Header Settings',
        'fields' => array(
            array( 'key' => 'field_header_cta_text',   'label' => 'CTA Button Text',   'name' => 'header_cta_text',   'type' => 'text', 'default_value' => 'Contact Us' ),
            array( 'key' => 'field_header_cta_url',    'label' => 'CTA Button URL',    'name' => 'header_cta_url',    'type' => 'text', 'default_value' => '/contact/', 'placeholder' => '/contact/ or https://...' ),
            array( 'key' => 'field_header_login_text', 'label' => 'Login Button Text', 'name' => 'header_login_text', 'type' => 'text', 'default_value' => 'Login' ),
            array( 'key' => 'field_header_login_url',  'label' => 'Login Button URL',  'name' => 'header_login_url',  'type' => 'text', 'default_value' => '/login/', 'placeholder' => '/login/ or https://...' ),
        ),
        'location' => array(
            array(
                array( 'param' => 'options_page', 'operator' => '==', 'value' => 'acf-options-header-settings' ),
            ),
        ),
        'active' => true,
    ) );

    /*----------------------------------------------------------
     * 5. OPTIONS — Footer Settings
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_footer',
        'title'  => 'Footer Settings',
        'fields' => array(
            array(
                'key'          => 'field_footer_company_links',
                'label'        => 'Company Links',
                'name'         => 'footer_company_links',
                'type'         => 'repeater',
                'button_label' => 'Add Link',
                'layout'       => 'table',
                'sub_fields'   => array(
                    array( 'key' => 'field_fcl_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
                    array( 'key' => 'field_fcl_url',   'label' => 'URL',   'name' => 'url',   'type' => 'text', 'placeholder' => '/about/ or https://...' ),
                ),
            ),
            array(
                'key'          => 'field_footer_investment_links',
                'label'        => 'Investment Links',
                'name'         => 'footer_investment_links',
                'type'         => 'repeater',
                'button_label' => 'Add Link',
                'layout'       => 'table',
                'sub_fields'   => array(
                    array( 'key' => 'field_fil_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
                    array( 'key' => 'field_fil_url',   'label' => 'URL',   'name' => 'url',   'type' => 'text', 'placeholder' => '/strategy/ or https://...' ),
                ),
            ),
            array(
                'key'          => 'field_footer_legal_links',
                'label'        => 'Legal Links',
                'name'         => 'footer_legal_links',
                'type'         => 'repeater',
                'button_label' => 'Add Link',
                'layout'       => 'table',
                'sub_fields'   => array(
                    array( 'key' => 'field_fll_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
                    array( 'key' => 'field_fll_url',   'label' => 'URL',   'name' => 'url',   'type' => 'text', 'placeholder' => '/privacy-policy/ or https://...' ),
                ),
            ),
            array( 'key' => 'field_footer_copyright_text', 'label' => 'Copyright Text (override)', 'name' => 'footer_copyright_text', 'type' => 'text', 'instructions' => 'Leave blank for default' ),
        ),
        'location' => array(
            array(
                array( 'param' => 'options_page', 'operator' => '==', 'value' => 'acf-options-footer-settings' ),
            ),
        ),
        'active' => true,
    ) );
}
add_action( 'acf/init', 'hsr_register_acf_field_groups' );

/*----------------------------------------------------------------------
 * FLEXIBLE CONTENT LAYOUTS
 *---------------------------------------------------------------------*/
function hsr_get_module_layouts() {
    return array(

        /* 1. Hero (Homepage) */
        'hero' => array(
            'key'        => 'layout_hero',
            'name'       => 'hero',
            'label'      => 'Hero (Homepage)',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_hero_headline',   'label' => 'Headline',        'name' => 'headline',   'type' => 'text',     'default_value' => 'Disciplined Judgement.<br>Durable Returns.' ),
                array( 'key' => 'field_hero_subtext',    'label' => 'Subtext',         'name' => 'subtext',    'type' => 'textarea', 'rows' => 2 ),
                array( 'key' => 'field_hero_cta_text',   'label' => 'CTA Text',        'name' => 'cta_text',   'type' => 'text',     'default_value' => 'View Transactions' ),
                array( 'key' => 'field_hero_cta_url',    'label' => 'CTA URL',         'name' => 'cta_url',    'type' => 'text',     'default_value' => '/transactions/', 'placeholder' => '/transactions/ or https://...' ),
                array( 'key' => 'field_hero_image_left', 'label' => 'Left Image',      'name' => 'image_left', 'type' => 'image',    'return_format' => 'array' ),
                array( 'key' => 'field_hero_image_right','label' => 'Right Image',     'name' => 'image_right','type' => 'image',    'return_format' => 'array' ),
                array( 'key' => 'field_hero_badge_text', 'label' => 'Badge Text',      'name' => 'badge_text', 'type' => 'text',     'default_value' => 'SINCE 2001 &#8226; REAL ESTATE INVESTORS &#8226;' ),
            ),
        ),

        /* 2. Hero (Page) */
        'hero_page' => array(
            'key'        => 'layout_hero_page',
            'name'       => 'hero_page',
            'label'      => 'Hero (Page)',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_hp_label',       'label' => 'Label',       'name' => 'label',       'type' => 'text' ),
                array( 'key' => 'field_hp_headline',    'label' => 'Headline',    'name' => 'headline',    'type' => 'text' ),
                array( 'key' => 'field_hp_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                array( 'key' => 'field_hp_image',       'label' => 'Image',       'name' => 'image',       'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_hp_layout',      'label' => 'Layout',      'name' => 'layout',      'type' => 'select', 'choices' => array( 'two-column' => 'Two Column', 'centered' => 'Centered' ), 'default_value' => 'two-column' ),
            ),
        ),

        /* 3. Stats Bar */
        'stats_bar' => array(
            'key'        => 'layout_stats_bar',
            'name'       => 'stats_bar',
            'label'      => 'Stats Bar',
            'display'    => 'block',
            'sub_fields' => array(
                array(
                    'key'          => 'field_sb_stats',
                    'label'        => 'Stats',
                    'name'         => 'stats',
                    'type'         => 'repeater',
                    'button_label' => 'Add Stat',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array( 'key' => 'field_sb_number', 'label' => 'Number', 'name' => 'number', 'type' => 'number' ),
                        array( 'key' => 'field_sb_prefix', 'label' => 'Prefix', 'name' => 'prefix', 'type' => 'text' ),
                        array( 'key' => 'field_sb_suffix', 'label' => 'Suffix', 'name' => 'suffix', 'type' => 'text' ),
                        array( 'key' => 'field_sb_label',  'label' => 'Label',  'name' => 'label',  'type' => 'text' ),
                    ),
                ),
                array( 'key' => 'field_sb_bg_color', 'label' => 'Background Color', 'name' => 'background_color', 'type' => 'select', 'choices' => array( 'primary' => 'Primary (Navy)', 'accent' => 'Accent (Green)', 'white' => 'White' ), 'default_value' => 'primary' ),
            ),
        ),

        /* 4. Track Record */
        'track_record' => array(
            'key'        => 'layout_track_record',
            'name'       => 'track_record',
            'label'      => 'Track Record',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_tr_heading',     'label' => 'Heading',     'name' => 'heading',     'type' => 'text' ),
                array( 'key' => 'field_tr_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                array(
                    'key'          => 'field_tr_features',
                    'label'        => 'Features',
                    'name'         => 'features',
                    'type'         => 'repeater',
                    'button_label' => 'Add Feature',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array( 'key' => 'field_tr_feature_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ),
                    ),
                ),
                array( 'key' => 'field_tr_cta_text',    'label' => 'CTA Text',    'name' => 'cta_text',    'type' => 'text' ),
                array( 'key' => 'field_tr_cta_url',     'label' => 'CTA URL',     'name' => 'cta_url',     'type' => 'text', 'placeholder' => '/team/ or https://...' ),
                array( 'key' => 'field_tr_image',       'label' => 'Image',       'name' => 'image',       'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_tr_stat_number', 'label' => 'Stat Number', 'name' => 'stat_number', 'type' => 'text' ),
                array( 'key' => 'field_tr_stat_label',  'label' => 'Stat Label',  'name' => 'stat_label',  'type' => 'text' ),
            ),
        ),

        /* 5. Approach / Video */
        'approach_video' => array(
            'key'        => 'layout_approach_video',
            'name'       => 'approach_video',
            'label'      => 'Approach / Video',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_av_label',           'label' => 'Label',           'name' => 'label',           'type' => 'text' ),
                array( 'key' => 'field_av_description',     'label' => 'Description',     'name' => 'description',     'type' => 'textarea', 'rows' => 4 ),
                array( 'key' => 'field_av_cta_text',        'label' => 'CTA Text',        'name' => 'cta_text',        'type' => 'text' ),
                array( 'key' => 'field_av_cta_url',         'label' => 'CTA URL',         'name' => 'cta_url',         'type' => 'text', 'placeholder' => '/strategy/ or https://...' ),
                array( 'key' => 'field_av_image',           'label' => 'Image',           'name' => 'image',           'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_av_video_url',       'label' => 'Video URL',       'name' => 'video_url',       'type' => 'url' ),
                array( 'key' => 'field_av_reverse_columns', 'label' => 'Reverse Columns', 'name' => 'reverse_columns', 'type' => 'true_false', 'default_value' => 0 ),
            ),
        ),

        /* 6. Transactions Grid */
        'transactions_grid' => array(
            'key'        => 'layout_transactions_grid',
            'name'       => 'transactions_grid',
            'label'      => 'Transactions Grid',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_tg_heading',      'label' => 'Heading',      'name' => 'heading',      'type' => 'text', 'default_value' => 'Select Transactions' ),
                array( 'key' => 'field_tg_cta_text',     'label' => 'CTA Text',     'name' => 'cta_text',     'type' => 'text' ),
                array( 'key' => 'field_tg_cta_url',      'label' => 'CTA URL',      'name' => 'cta_url',      'type' => 'text', 'placeholder' => '/transactions/ or https://...' ),
                array( 'key' => 'field_tg_display_mode', 'label' => 'Display Mode', 'name' => 'display_mode', 'type' => 'select', 'choices' => array( 'featured' => 'Featured', 'latest' => 'Latest', 'manual' => 'Manual Selection' ), 'default_value' => 'featured' ),
                array( 'key' => 'field_tg_manual',       'label' => 'Manual Transactions', 'name' => 'manual_transactions', 'type' => 'relationship', 'post_type' => array( 'hsr_transaction' ), 'conditional_logic' => array( array( array( 'field' => 'field_tg_display_mode', 'operator' => '==', 'value' => 'manual' ) ) ) ),
                array( 'key' => 'field_tg_count',        'label' => 'Count',        'name' => 'count',        'type' => 'number', 'default_value' => 3 ),
                array( 'key' => 'field_tg_columns',      'label' => 'Columns',      'name' => 'columns',      'type' => 'select', 'choices' => array( '2' => '2', '3' => '3', '4' => '4' ), 'default_value' => '3' ),
            ),
        ),

        /* 7. Testimonial (Single) */
        'testimonial_single' => array(
            'key'        => 'layout_testimonial_single',
            'name'       => 'testimonial_single',
            'label'      => 'Testimonial (Single)',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_ts_quote',        'label' => 'Quote',        'name' => 'quote',            'type' => 'textarea', 'rows' => 4 ),
                array( 'key' => 'field_ts_author_name',  'label' => 'Author Name',  'name' => 'author_name',      'type' => 'text' ),
                array( 'key' => 'field_ts_author_title', 'label' => 'Author Title', 'name' => 'author_title',     'type' => 'text' ),
                array( 'key' => 'field_ts_bg_style',     'label' => 'Background',   'name' => 'background_style', 'type' => 'select', 'choices' => array( 'primary' => 'Primary (Navy)', 'white' => 'White', 'off-white' => 'Off-White' ), 'default_value' => 'primary' ),
            ),
        ),

        /* 8. Investment Focus */
        'investment_focus' => array(
            'key'        => 'layout_investment_focus',
            'name'       => 'investment_focus',
            'label'      => 'Investment Focus',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_if_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default_value' => 'Our Investment Focus' ),
                array(
                    'key'          => 'field_if_cards',
                    'label'        => 'Cards',
                    'name'         => 'cards',
                    'type'         => 'repeater',
                    'button_label' => 'Add Card',
                    'layout'       => 'block',
                    'sub_fields'   => array(
                        array( 'key' => 'field_if_icon_svg',    'label' => 'Icon SVG',    'name' => 'icon_svg',    'type' => 'textarea', 'rows' => 3 ),
                        array( 'key' => 'field_if_card_title',  'label' => 'Title',       'name' => 'title',       'type' => 'text' ),
                        array( 'key' => 'field_if_card_desc',   'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                    ),
                ),
                array( 'key' => 'field_if_columns', 'label' => 'Columns', 'name' => 'columns', 'type' => 'select', 'choices' => array( '2' => '2', '3' => '3', '4' => '4' ), 'default_value' => '3' ),
            ),
        ),

        /* 9. Gallery Strip */
        'gallery_strip' => array(
            'key'        => 'layout_gallery_strip',
            'name'       => 'gallery_strip',
            'label'      => 'Gallery Strip',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_gs_images', 'label' => 'Images', 'name' => 'images', 'type' => 'gallery', 'return_format' => 'array' ),
            ),
        ),

        /* 10. CTA Banner */
        'cta_banner' => array(
            'key'        => 'layout_cta_banner',
            'name'       => 'cta_banner',
            'label'      => 'CTA Banner',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_cb_heading',    'label' => 'Heading',          'name' => 'heading',          'type' => 'text' ),
                array( 'key' => 'field_cb_subtext',    'label' => 'Subtext',          'name' => 'subtext',          'type' => 'textarea', 'rows' => 2 ),
                array( 'key' => 'field_cb_btn_text',   'label' => 'Button Text',      'name' => 'button_text',      'type' => 'text' ),
                array( 'key' => 'field_cb_btn_url',    'label' => 'Button URL',       'name' => 'button_url',       'type' => 'text', 'placeholder' => '/contact/ or https://...' ),
                array( 'key' => 'field_cb_bg_color',   'label' => 'Background Color', 'name' => 'background_color', 'type' => 'select', 'choices' => array( 'primary' => 'Primary (Navy)', 'accent' => 'Accent (Green)' ), 'default_value' => 'primary' ),
            ),
        ),

        /* 11. Video Section */
        'video_section' => array(
            'key'        => 'layout_video_section',
            'name'       => 'video_section',
            'label'      => 'Video Section',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_vs_thumbnail', 'label' => 'Thumbnail', 'name' => 'thumbnail', 'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_vs_video_url', 'label' => 'Video URL', 'name' => 'video_url', 'type' => 'url' ),
                array( 'key' => 'field_vs_caption',   'label' => 'Caption',   'name' => 'caption',   'type' => 'text' ),
            ),
        ),

        /* 12. FAQ Accordion */
        'faq_accordion' => array(
            'key'        => 'layout_faq_accordion',
            'name'       => 'faq_accordion',
            'label'      => 'FAQ Accordion',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_faq_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default_value' => 'Frequently Asked Questions' ),
                array(
                    'key'          => 'field_faq_items',
                    'label'        => 'Items',
                    'name'         => 'items',
                    'type'         => 'repeater',
                    'button_label' => 'Add Question',
                    'layout'       => 'row',
                    'sub_fields'   => array(
                        array( 'key' => 'field_faq_question', 'label' => 'Question', 'name' => 'question', 'type' => 'text' ),
                        array( 'key' => 'field_faq_answer',   'label' => 'Answer',   'name' => 'answer',   'type' => 'wysiwyg', 'media_upload' => 0, 'tabs' => 'visual' ),
                    ),
                ),
            ),
        ),

        /* 13. Team Grid */
        'team_grid' => array(
            'key'        => 'layout_team_grid',
            'name'       => 'team_grid',
            'label'      => 'Team Grid',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_tg2_heading',      'label' => 'Heading',      'name' => 'heading',      'type' => 'text', 'default_value' => 'Meet Our Team' ),
                array( 'key' => 'field_tg2_subtext',      'label' => 'Subtext',      'name' => 'subtext',      'type' => 'textarea', 'rows' => 2 ),
                array( 'key' => 'field_tg2_display_mode', 'label' => 'Display Mode', 'name' => 'display_mode', 'type' => 'select', 'choices' => array( 'all' => 'All Members', 'department' => 'By Department', 'manual' => 'Manual Selection' ), 'default_value' => 'all' ),
                array( 'key' => 'field_tg2_department',   'label' => 'Department',   'name' => 'department',   'type' => 'select', 'choices' => array( 'Leadership' => 'Leadership', 'Investments' => 'Investments', 'Operations' => 'Operations' ), 'conditional_logic' => array( array( array( 'field' => 'field_tg2_display_mode', 'operator' => '==', 'value' => 'department' ) ) ) ),
                array( 'key' => 'field_tg2_manual',       'label' => 'Manual Selection', 'name' => 'manual_members', 'type' => 'relationship', 'post_type' => array( 'hsr_team' ), 'conditional_logic' => array( array( array( 'field' => 'field_tg2_display_mode', 'operator' => '==', 'value' => 'manual' ) ) ) ),
                array( 'key' => 'field_tg2_columns',      'label' => 'Columns',      'name' => 'columns',      'type' => 'select', 'choices' => array( '3' => '3', '4' => '4' ), 'default_value' => '4' ),
            ),
        ),

        /* 14. Testimonial Grid */
        'testimonial_grid' => array(
            'key'        => 'layout_testimonial_grid',
            'name'       => 'testimonial_grid',
            'label'      => 'Testimonial Grid',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_tgr_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text', 'default_value' => 'What Our Clients Say' ),
                array(
                    'key'          => 'field_tgr_testimonials',
                    'label'        => 'Testimonials',
                    'name'         => 'testimonials',
                    'type'         => 'repeater',
                    'button_label' => 'Add Testimonial',
                    'layout'       => 'block',
                    'sub_fields'   => array(
                        array( 'key' => 'field_tgr_quote', 'label' => 'Quote', 'name' => 'quote', 'type' => 'textarea', 'rows' => 3 ),
                        array( 'key' => 'field_tgr_name',  'label' => 'Name',  'name' => 'name',  'type' => 'text' ),
                        array( 'key' => 'field_tgr_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
                        array( 'key' => 'field_tgr_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
                    ),
                ),
            ),
        ),

        /* 15. Text Two Columns */
        'text_two_columns' => array(
            'key'        => 'layout_text_two_columns',
            'name'       => 'text_two_columns',
            'label'      => 'Text - Two Columns',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_ttc_heading',       'label' => 'Heading',       'name' => 'heading',       'type' => 'text' ),
                array( 'key' => 'field_ttc_left_content',  'label' => 'Left Content',  'name' => 'left_content',  'type' => 'wysiwyg', 'tabs' => 'all', 'media_upload' => 1 ),
                array( 'key' => 'field_ttc_right_content', 'label' => 'Right Content', 'name' => 'right_content', 'type' => 'wysiwyg', 'tabs' => 'all', 'media_upload' => 1 ),
            ),
        ),

        /* 16. Stats Row */
        'stats_row' => array(
            'key'        => 'layout_stats_row',
            'name'       => 'stats_row',
            'label'      => 'Stats Row',
            'display'    => 'block',
            'sub_fields' => array(
                array(
                    'key'          => 'field_sr_stats',
                    'label'        => 'Stats',
                    'name'         => 'stats',
                    'type'         => 'repeater',
                    'button_label' => 'Add Stat',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array( 'key' => 'field_sr_icon',  'label' => 'Icon SVG', 'name' => 'icon',  'type' => 'textarea', 'rows' => 2 ),
                        array( 'key' => 'field_sr_value', 'label' => 'Value',    'name' => 'value', 'type' => 'text' ),
                        array( 'key' => 'field_sr_label', 'label' => 'Label',    'name' => 'label', 'type' => 'text' ),
                    ),
                ),
                array( 'key' => 'field_sr_enable_counter', 'label' => 'Enable Counter Animation', 'name' => 'enable_counter', 'type' => 'true_false', 'default_value' => 0 ),
            ),
        ),

        /* 17. CTA Split */
        'cta_split' => array(
            'key'        => 'layout_cta_split',
            'name'       => 'cta_split',
            'label'      => 'CTA Split',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_cs_label',          'label' => 'Label',          'name' => 'label',          'type' => 'text' ),
                array( 'key' => 'field_cs_heading',        'label' => 'Heading',        'name' => 'heading',        'type' => 'text' ),
                array( 'key' => 'field_cs_description',    'label' => 'Description',    'name' => 'description',    'type' => 'textarea', 'rows' => 3 ),
                array( 'key' => 'field_cs_btn_text',       'label' => 'Button Text',    'name' => 'button_text',    'type' => 'text' ),
                array( 'key' => 'field_cs_btn_url',        'label' => 'Button URL',     'name' => 'button_url',     'type' => 'text', 'placeholder' => '/contact/ or https://...' ),
                array( 'key' => 'field_cs_image',          'label' => 'Image',          'name' => 'image',          'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_cs_image_position', 'label' => 'Image Position', 'name' => 'image_position', 'type' => 'select', 'choices' => array( 'left' => 'Left', 'right' => 'Right' ), 'default_value' => 'left' ),
            ),
        ),

        /* 18. Contact Info */
        'contact_info' => array(
            'key'        => 'layout_contact_info',
            'name'       => 'contact_info',
            'label'      => 'Contact Info',
            'display'    => 'block',
            'sub_fields' => array(
                array(
                    'key'          => 'field_ci_cards',
                    'label'        => 'Cards',
                    'name'         => 'cards',
                    'type'         => 'repeater',
                    'button_label' => 'Add Card',
                    'layout'       => 'block',
                    'sub_fields'   => array(
                        array( 'key' => 'field_ci_icon',    'label' => 'Icon SVG', 'name' => 'icon',    'type' => 'textarea', 'rows' => 2 ),
                        array( 'key' => 'field_ci_title',   'label' => 'Title',    'name' => 'title',   'type' => 'text' ),
                        array( 'key' => 'field_ci_content', 'label' => 'Content',  'name' => 'content', 'type' => 'wysiwyg', 'media_upload' => 0, 'tabs' => 'visual' ),
                    ),
                ),
                array( 'key' => 'field_ci_columns', 'label' => 'Columns', 'name' => 'columns', 'type' => 'select', 'choices' => array( '2' => '2', '3' => '3', '4' => '4' ), 'default_value' => '3' ),
            ),
        ),

        /* 19. Icon Boxes */
        'icon_boxes' => array(
            'key'        => 'layout_icon_boxes',
            'name'       => 'icon_boxes',
            'label'      => 'Icon Boxes',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_ib_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text' ),
                array(
                    'key'          => 'field_ib_boxes',
                    'label'        => 'Boxes',
                    'name'         => 'boxes',
                    'type'         => 'repeater',
                    'button_label' => 'Add Box',
                    'layout'       => 'block',
                    'sub_fields'   => array(
                        array( 'key' => 'field_ib_icon_svg', 'label' => 'Icon SVG',    'name' => 'icon_svg',    'type' => 'textarea', 'rows' => 3 ),
                        array( 'key' => 'field_ib_title',    'label' => 'Title',       'name' => 'title',       'type' => 'text' ),
                        array( 'key' => 'field_ib_desc',     'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                    ),
                ),
                array( 'key' => 'field_ib_columns', 'label' => 'Columns', 'name' => 'columns', 'type' => 'select', 'choices' => array( '2' => '2', '3' => '3', '4' => '4' ), 'default_value' => '3' ),
            ),
        ),

        /* 20. Features List */
        'features_list' => array(
            'key'        => 'layout_features_list',
            'name'       => 'features_list',
            'label'      => 'Features List',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_fl_heading',     'label' => 'Heading',     'name' => 'heading',     'type' => 'text' ),
                array( 'key' => 'field_fl_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                array(
                    'key'          => 'field_fl_features',
                    'label'        => 'Features',
                    'name'         => 'features',
                    'type'         => 'repeater',
                    'button_label' => 'Add Feature',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array( 'key' => 'field_fl_text', 'label' => 'Feature Text', 'name' => 'text', 'type' => 'text' ),
                    ),
                ),
                array( 'key' => 'field_fl_cta_text', 'label' => 'CTA Text', 'name' => 'cta_text', 'type' => 'text' ),
                array( 'key' => 'field_fl_cta_url',  'label' => 'CTA URL',  'name' => 'cta_url',  'type' => 'text', 'placeholder' => '/page/ or https://...' ),
            ),
        ),

        /* 21. Full Width Image */
        'full_width_image' => array(
            'key'        => 'layout_full_width_image',
            'name'       => 'full_width_image',
            'label'      => 'Full Width Image',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_fwi_image',   'label' => 'Image',   'name' => 'image',   'type' => 'image', 'return_format' => 'array' ),
                array( 'key' => 'field_fwi_caption', 'label' => 'Caption', 'name' => 'caption', 'type' => 'text' ),
            ),
        ),

        /* 22. Logo Carousel */
        'logo_carousel' => array(
            'key'        => 'layout_logo_carousel',
            'name'       => 'logo_carousel',
            'label'      => 'Logo Carousel',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_lc_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text' ),
                array(
                    'key'          => 'field_lc_logos',
                    'label'        => 'Logos',
                    'name'         => 'logos',
                    'type'         => 'repeater',
                    'button_label' => 'Add Logo',
                    'layout'       => 'table',
                    'sub_fields'   => array(
                        array( 'key' => 'field_lc_logo_image', 'label' => 'Image',    'name' => 'image',    'type' => 'image', 'return_format' => 'array' ),
                        array( 'key' => 'field_lc_logo_link',  'label' => 'Link',     'name' => 'link',     'type' => 'url' ),
                        array( 'key' => 'field_lc_logo_alt',   'label' => 'Alt Text', 'name' => 'alt_text', 'type' => 'text' ),
                    ),
                ),
            ),
        ),

        /* 23. Timeline */
        'timeline' => array(
            'key'        => 'layout_timeline',
            'name'       => 'timeline',
            'label'      => 'Timeline',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_tl_heading', 'label' => 'Heading', 'name' => 'heading', 'type' => 'text' ),
                array(
                    'key'          => 'field_tl_events',
                    'label'        => 'Events',
                    'name'         => 'events',
                    'type'         => 'repeater',
                    'button_label' => 'Add Event',
                    'layout'       => 'block',
                    'sub_fields'   => array(
                        array( 'key' => 'field_tl_year',  'label' => 'Year',  'name' => 'year',  'type' => 'text' ),
                        array( 'key' => 'field_tl_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
                        array( 'key' => 'field_tl_desc',  'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 3 ),
                        array( 'key' => 'field_tl_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array' ),
                    ),
                ),
            ),
        ),

        /* 24. Blog Posts Grid */
        'blog_posts_grid' => array(
            'key'        => 'layout_blog_posts_grid',
            'name'       => 'blog_posts_grid',
            'label'      => 'Blog Posts Grid',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_bpg_heading',      'label' => 'Heading',      'name' => 'heading',      'type' => 'text', 'default_value' => 'Latest News' ),
                array( 'key' => 'field_bpg_cta_text',     'label' => 'CTA Text',     'name' => 'cta_text',     'type' => 'text' ),
                array( 'key' => 'field_bpg_cta_url',      'label' => 'CTA URL',      'name' => 'cta_url',      'type' => 'text', 'placeholder' => '/news/ or https://...' ),
                array( 'key' => 'field_bpg_display_mode', 'label' => 'Display Mode', 'name' => 'display_mode', 'type' => 'select', 'choices' => array( 'latest' => 'Latest Posts', 'manual' => 'Manual Selection' ), 'default_value' => 'latest' ),
                array( 'key' => 'field_bpg_count',        'label' => 'Count',        'name' => 'count',        'type' => 'number', 'default_value' => 3 ),
                array( 'key' => 'field_bpg_columns',      'label' => 'Columns',      'name' => 'columns',      'type' => 'select', 'choices' => array( '2' => '2', '3' => '3', '4' => '4' ), 'default_value' => '3' ),
            ),
        ),

        /* 25. Newsletter Signup */
        'newsletter_signup' => array(
            'key'        => 'layout_newsletter_signup',
            'name'       => 'newsletter_signup',
            'label'      => 'Newsletter Signup',
            'display'    => 'block',
            'sub_fields' => array(
                array( 'key' => 'field_ns_heading',        'label' => 'Heading',        'name' => 'heading',          'type' => 'text' ),
                array( 'key' => 'field_ns_description',    'label' => 'Description',    'name' => 'description',      'type' => 'textarea', 'rows' => 2 ),
                array( 'key' => 'field_ns_form_shortcode', 'label' => 'Form Shortcode', 'name' => 'form_shortcode',   'type' => 'text', 'instructions' => 'e.g. [contact-form-7 id="123"]' ),
                array( 'key' => 'field_ns_bg_color',       'label' => 'Background',     'name' => 'background_color', 'type' => 'select', 'choices' => array( 'primary' => 'Primary (Navy)', 'off-white' => 'Off-White', 'white' => 'White' ), 'default_value' => 'primary' ),
            ),
        ),
    );
}
