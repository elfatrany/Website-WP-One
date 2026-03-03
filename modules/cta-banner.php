<?php
/**
 * Module: CTA Banner
 * Maps to: patterns/homepage-cta.php
 */
$heading    = get_sub_field( 'heading' ) ?: 'Partner With Us';
$subtext    = get_sub_field( 'subtext' );
$btn_text   = get_sub_field( 'button_text' ) ?: 'Contact Us';
$btn_url    = get_sub_field( 'button_url' ) ?: '/contact/';
$bg_color   = get_sub_field( 'background_color' ) ?: 'primary';

$btn_bg   = ( $bg_color === 'primary' ) ? 'accent' : 'primary';
$btn_text_color = ( $bg_color === 'primary' ) ? 'primary' : 'accent';
$heading_color  = ( $bg_color === 'primary' ) ? 'white' : 'primary';
$subtext_color  = ( $bg_color === 'primary' ) ? 'gray-300' : 'gray-600';
?>

<div class="wp-block-group alignfull cta-diamond-pattern has-<?php echo esc_attr( $bg_color ); ?>-background-color has-background" style="padding-top:64px;padding-right:clamp(20px,5vw,60px);padding-bottom:64px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1100px;margin:0 auto;">

        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:30px;">
            <div style="max-width:550px;">
                <h2 class="wp-block-heading has-<?php echo esc_attr( $heading_color ); ?>-color has-text-color" style="font-weight:700;line-height:1.2;font-size:clamp(1.75rem, 3vw, 2.25rem)"><?php echo esc_html( $heading ); ?></h2>
                <?php if ( $subtext ) : ?>
                    <p class="has-<?php echo esc_attr( $subtext_color ); ?>-color has-text-color" style="margin-top:12px;font-size:1.35rem"><?php echo esc_html( $subtext ); ?></p>
                <?php endif; ?>
            </div>

            <a href="<?php echo esc_url( $btn_url ); ?>" class="wp-block-group pill-button has-<?php echo esc_attr( $btn_bg ); ?>-background-color has-background" style="border-radius:0;padding:14px 18px 14px 24px;display:inline-flex;align-items:center;text-decoration:none;">
                <p class="has-<?php echo esc_attr( $btn_text_color ); ?>-color has-text-color has-small-font-size" style="font-weight:600;margin:0;"><?php echo esc_html( $btn_text ); ?></p>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="<?php echo ( $bg_color === 'primary' ) ? '#1a1a5e' : 'currentColor'; ?>" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            </a>
        </div>

    </div>
</div>
