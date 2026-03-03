<?php
/**
 * Module: Investment Focus
 * Maps to: patterns/homepage-investment-focus.php
 */
$heading = get_sub_field( 'heading' ) ?: 'Our Investment Focus';
$cards   = get_sub_field( 'cards' );
$columns = get_sub_field( 'columns' ) ?: '3';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:48px;font-weight:700"><?php echo esc_html( $heading ); ?></h2>

        <?php if ( $cards ) : ?>
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo intval( $columns ); ?>, 1fr);gap:40px;">
                <?php foreach ( $cards as $card ) : ?>
                    <div class="wp-block-column">
                        <div class="wp-block-group has-border-color has-gray-200-border-color" style="border-width:1px;border-radius:0px;padding:36px 32px;">
                            <?php if ( ! empty( $card['icon_svg'] ) ) : ?>
                                <div class="wp-block-group has-accent-background-color has-background" style="border-radius:0px;padding:14px;display:inline-flex;justify-content:center;">
                                    <?php echo $card['icon_svg']; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="margin-top:24px;font-weight:600"><?php echo esc_html( $card['title'] ); ?></h3>
                            <p class="has-gray-600-color has-text-color has-small-font-size" style="margin-top:16px"><?php echo esc_html( $card['description'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
