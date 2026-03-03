<?php
/**
 * Module: Testimonial (Single)
 * Maps to: patterns/homepage-testimonial.php
 */
$quote        = get_sub_field( 'quote' );
$author_name  = get_sub_field( 'author_name' );
$author_title = get_sub_field( 'author_title' );
$bg_style     = get_sub_field( 'background_style' ) ?: 'primary';

$bg_class = 'has-' . $bg_style . '-background-color';
$text_color = ( $bg_style === 'primary' ) ? 'white' : 'gray-700';
$name_color = ( $bg_style === 'primary' ) ? 'accent' : 'primary';
$title_color = ( $bg_style === 'primary' ) ? 'gray-300' : 'gray-500';
?>

<div class="wp-block-group alignfull testimonial-bg-building <?php echo esc_attr( $bg_class ); ?> has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:900px;margin:0 auto;text-align:center;">

        <div style="display:flex;justify-content:center;margin-bottom:32px;">
            <svg class="accent-fill" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V21c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path></svg>
        </div>

        <?php if ( $quote ) : ?>
            <p class="has-text-align-center has-<?php echo esc_attr( $text_color ); ?>-color has-text-color has-x-large-font-size" style="line-height:1.8;margin-top:40px;margin-bottom:40px"><?php echo esc_html( $quote ); ?></p>
        <?php endif; ?>

        <?php if ( $author_name ) : ?>
            <div style="margin-top:40px;">
                <p class="has-<?php echo esc_attr( $name_color ); ?>-color has-text-color" style="font-weight:600;margin:0;"><?php echo esc_html( $author_name ); ?></p>
            </div>
        <?php endif; ?>

        <?php if ( $author_title ) : ?>
            <p class="has-text-align-center has-<?php echo esc_attr( $title_color ); ?>-color has-text-color has-small-font-size"><?php echo esc_html( $author_title ); ?></p>
        <?php endif; ?>

    </div>
</div>
