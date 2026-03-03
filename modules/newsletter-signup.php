<?php
/**
 * Module: Newsletter Signup
 */
$heading        = get_sub_field( 'heading' );
$description    = get_sub_field( 'description' );
$form_shortcode = get_sub_field( 'form_shortcode' );
$bg_color       = get_sub_field( 'background_color' ) ?: 'primary';

$text_color = ( $bg_color === 'primary' ) ? 'white' : 'primary';
$desc_color = ( $bg_color === 'primary' ) ? 'gray-300' : 'gray-600';
?>

<div class="wp-block-group alignfull has-<?php echo esc_attr( $bg_color ); ?>-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <div style="max-width:700px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);text-align:center;">

        <?php if ( $heading ) : ?>
            <h2 class="wp-block-heading has-<?php echo esc_attr( $text_color ); ?>-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $description ) : ?>
            <p class="has-<?php echo esc_attr( $desc_color ); ?>-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>

        <?php if ( $form_shortcode ) : ?>
            <?php echo do_shortcode( $form_shortcode ); ?>
        <?php endif; ?>

    </div>
</div>
