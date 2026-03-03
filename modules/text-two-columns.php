<?php
/**
 * Module: Text Two Columns
 * Maps to: patterns/text-two-columns.php
 */
$heading       = get_sub_field( 'heading' );
$left_content  = get_sub_field( 'left_content' );
$right_content = get_sub_field( 'right_content' );
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <div class="wp-block-columns" style="display:flex;flex-wrap:wrap;gap:var(--wp--preset--spacing--60);">
            <div class="wp-block-column" style="flex:1;min-width:300px;">
                <?php if ( $heading ) : ?>
                    <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size"><?php echo esc_html( $heading ); ?></h2>
                <?php endif; ?>
                <?php if ( $left_content ) : ?>
                    <div class="has-gray-600-color has-text-color"><?php echo wp_kses_post( $left_content ); ?></div>
                <?php endif; ?>
            </div>
            <div class="wp-block-column" style="flex:1;min-width:300px;">
                <?php if ( $right_content ) : ?>
                    <div class="has-gray-600-color has-text-color"><?php echo wp_kses_post( $right_content ); ?></div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
