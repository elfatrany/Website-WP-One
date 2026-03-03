<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$login_text = get_field( 'header_login_text', 'option' ) ?: 'Login';
$login_url  = get_field( 'header_login_url', 'option' )  ?: '/login/';
$cta_text   = get_field( 'header_cta_text', 'option' )   ?: 'Contact Us';
$cta_url    = get_field( 'header_cta_url', 'option' )    ?: '/contact/';
?>

<header class="wp-block-group site-header has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
    <div class="wp-block-group alignwide" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;max-width:var(--wp--style--global--wide-size);margin-left:auto;margin-right:auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">
        <!-- Logo -->
        <div class="wp-block-group" style="display:flex;align-items:center;gap:var(--wp--preset--spacing--20);">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:var(--wp--preset--color--primary);font-weight:700;font-size:var(--wp--preset--font-size--x-large);text-decoration:none;">
                    <?php bloginfo( 'name' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <!-- Navigation -->
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => 'nav',
            'container_class'=> 'hsr-primary-nav',
            'menu_class'     => 'hsr-nav-list',
            'fallback_cb'    => false,
            'depth'          => 2,
        ) );
        ?>

        <!-- Header Buttons -->
        <div class="wp-block-group" style="display:flex;align-items:center;gap:var(--wp--preset--spacing--20);">
            <div class="wp-block-buttons" style="display:flex;gap:var(--wp--preset--spacing--20);">
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background has-border-color has-small-font-size wp-element-button" href="<?php echo esc_url( $login_url ); ?>" style="border-radius:0;border-width:1px;border-color:#e5e7eb;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px;font-weight:600"><?php echo esc_html( $login_text ); ?></a>
                </div>
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-primary-color has-accent-background-color has-text-color has-background has-small-font-size wp-element-button" href="<?php echo esc_url( $cta_url ); ?>" style="border-radius:0;padding-top:12px;padding-right:24px;padding-bottom:12px;padding-left:24px;font-weight:600"><?php echo esc_html( $cta_text ); ?></a>
                </div>
            </div>
        </div>
    </div>
</header>
