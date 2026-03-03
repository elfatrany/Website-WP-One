<?php
/**
 * ACF Flexible Content Renderer
 *
 * @package HillStreetRealty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Render all Flexible Content modules for the current page.
 */
function hsr_render_modules() {
    if ( ! function_exists( 'have_rows' ) ) {
        return;
    }

    if ( have_rows( 'modules' ) ) {
        while ( have_rows( 'modules' ) ) {
            the_row();
            $layout = get_row_layout();
            $file   = HSR_THEME_DIR . '/modules/' . str_replace( '_', '-', $layout ) . '.php';

            if ( file_exists( $file ) ) {
                include $file;
            }
        }
    }
}
