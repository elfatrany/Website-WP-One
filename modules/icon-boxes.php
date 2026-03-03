<?php
/**
 * Module: Icon Boxes
 */
$heading = get_sub_field( 'heading' );
$boxes   = get_sub_field( 'boxes' );
$columns = get_sub_field( 'columns' ) ?: '3';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $heading ) : ?>
            <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $boxes ) : ?>
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo intval( $columns ); ?>, 1fr);gap:40px;">
                <?php foreach ( $boxes as $box ) : ?>
                    <div class="wp-block-column">
                        <div class="wp-block-group has-border-color has-gray-200-border-color" style="border-width:1px;border-radius:0px;padding:36px 32px;">
                            <?php if ( ! empty( $box['icon_svg'] ) ) : ?>
                                <div class="wp-block-group has-accent-background-color has-background" style="border-radius:0px;padding:14px;display:inline-flex;justify-content:center;">
                                    <?php echo $box['icon_svg']; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="margin-top:24px;font-weight:600"><?php echo esc_html( $box['title'] ); ?></h3>
                            <p class="has-gray-600-color has-text-color has-small-font-size" style="margin-top:16px"><?php echo esc_html( $box['description'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
