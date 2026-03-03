<?php
/**
 * ACF Fields for Custom Post Types
 *
 * @package HillStreetRealty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function hsr_register_acf_cpt_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    /*----------------------------------------------------------
     * Transaction Fields
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_transaction_fields',
        'title'  => 'Transaction Details',
        'fields' => array(
            array( 'key' => 'field_tx_address',      'label' => 'Address',      'name' => 'transaction_address',    'type' => 'text',       'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_tx_city_state',   'label' => 'City, State',  'name' => 'transaction_city_state', 'type' => 'text',       'wrapper' => array( 'width' => '50' ), 'placeholder' => 'Los Angeles, CA' ),
            array( 'key' => 'field_tx_units',        'label' => 'Units',        'name' => 'transaction_units',      'type' => 'number',     'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_tx_status',       'label' => 'Status',       'name' => 'transaction_status',     'type' => 'select',     'wrapper' => array( 'width' => '25' ), 'choices' => array( 'Current' => 'Current', 'Realized' => 'Realized' ) ),
            array( 'key' => 'field_tx_type',         'label' => 'Type',         'name' => 'transaction_type',       'type' => 'select',     'wrapper' => array( 'width' => '25' ), 'choices' => array( 'Value-Add' => 'Value-Add', 'Repositioning' => 'Repositioning', 'Core-Plus' => 'Core-Plus', 'Development' => 'Development' ) ),
            array( 'key' => 'field_tx_year',         'label' => 'Year',         'name' => 'transaction_year',       'type' => 'number',     'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_tx_year_sold',    'label' => 'Year Sold',    'name' => 'transaction_year_sold',  'type' => 'number',     'wrapper' => array( 'width' => '25' ) ),
            array( 'key' => 'field_tx_gallery',      'label' => 'Gallery',      'name' => 'transaction_gallery',    'type' => 'gallery',    'return_format' => 'array' ),
            array( 'key' => 'field_tx_featured',     'label' => 'Featured',     'name' => 'transaction_featured',   'type' => 'true_false', 'wrapper' => array( 'width' => '25' ), 'instructions' => 'Show on homepage' ),
            array( 'key' => 'field_tx_order',        'label' => 'Order',        'name' => 'transaction_order',      'type' => 'number',     'wrapper' => array( 'width' => '25' ), 'default_value' => 0 ),
        ),
        'location' => array(
            array(
                array( 'param' => 'post_type', 'operator' => '==', 'value' => 'hsr_transaction' ),
            ),
        ),
        'position'  => 'normal',
        'style'     => 'default',
        'active'    => true,
    ) );

    /*----------------------------------------------------------
     * Team Member Fields
     *---------------------------------------------------------*/
    acf_add_local_field_group( array(
        'key'    => 'group_hsr_team_fields',
        'title'  => 'Team Member Details',
        'fields' => array(
            array( 'key' => 'field_tm_position',   'label' => 'Position',   'name' => 'team_position',   'type' => 'text',       'wrapper' => array( 'width' => '50' ) ),
            array( 'key' => 'field_tm_department', 'label' => 'Department', 'name' => 'team_department', 'type' => 'select',     'wrapper' => array( 'width' => '50' ), 'choices' => array( 'Leadership' => 'Leadership', 'Investments' => 'Investments', 'Operations' => 'Operations' ) ),
            array( 'key' => 'field_tm_email',      'label' => 'Email',      'name' => 'team_email',      'type' => 'email',      'wrapper' => array( 'width' => '33' ) ),
            array( 'key' => 'field_tm_phone',      'label' => 'Phone',      'name' => 'team_phone',      'type' => 'text',       'wrapper' => array( 'width' => '33' ) ),
            array( 'key' => 'field_tm_linkedin',   'label' => 'LinkedIn',   'name' => 'team_linkedin',   'type' => 'url',        'wrapper' => array( 'width' => '34' ) ),
            array( 'key' => 'field_tm_bio',        'label' => 'Bio',        'name' => 'team_bio',        'type' => 'wysiwyg',    'tabs' => 'visual', 'media_upload' => 0 ),
            array( 'key' => 'field_tm_order',      'label' => 'Order',      'name' => 'team_order',      'type' => 'number',     'wrapper' => array( 'width' => '25' ), 'default_value' => 0 ),
            array( 'key' => 'field_tm_featured',   'label' => 'Featured',   'name' => 'team_featured',   'type' => 'true_false', 'wrapper' => array( 'width' => '25' ), 'instructions' => 'Show on homepage' ),
        ),
        'location' => array(
            array(
                array( 'param' => 'post_type', 'operator' => '==', 'value' => 'hsr_team' ),
            ),
        ),
        'position'  => 'normal',
        'style'     => 'default',
        'active'    => true,
    ) );
}
add_action( 'acf/init', 'hsr_register_acf_cpt_fields' );
