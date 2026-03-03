<?php
/**
 * Template: 404 Not Found
 *
 * @package HillStreetRealty
 */

get_header(); ?>

<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:600px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);text-align:center;">

        <h1 class="wp-block-heading has-text-align-center has-gray-200-color has-text-color" style="font-size:8rem;font-weight:700">404</h1>

        <h2 class="wp-block-heading has-text-align-center has-huge-font-size">Page Not Found</h2>

        <p class="has-text-align-center has-gray-600-color has-text-color">Sorry, the page you're looking for doesn't exist or has been moved.</p>

        <div class="wp-block-buttons" style="display:flex;justify-content:center;gap:16px;margin-top:var(--wp--preset--spacing--40);">
            <div class="wp-block-button">
                <a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="border-radius:9999px">Back to Home</a>
            </div>
            <div class="wp-block-button is-style-outline">
                <a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-border-color has-primary-border-color wp-element-button" href="<?php echo esc_url( home_url( '/transactions/' ) ); ?>" style="border-width:2px;border-radius:9999px">View Transactions</a>
            </div>
        </div>

        <div style="height:60px" aria-hidden="true"></div>

        <?php get_search_form(); ?>

    </div>
</main>

<?php get_footer(); ?>
