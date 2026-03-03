<?php
/**
 * Module: Contact Info
 * Maps to: patterns/contact-info.php
 */
$cards   = get_sub_field( 'cards' );
$columns = get_sub_field( 'columns' ) ?: '3';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $cards ) : ?>
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo intval( $columns ); ?>, 1fr);gap:var(--wp--preset--spacing--60);">
                <?php foreach ( $cards as $card ) : ?>
                    <div class="wp-block-column">
                        <div class="wp-block-group has-off-white-background-color has-background" style="border-radius:0;padding:var(--wp--preset--spacing--40);">
                            <?php if ( ! empty( $card['icon'] ) ) : ?>
                                <div class="wp-block-group has-accent-background-color has-background" style="border-radius:0;padding:12px;display:inline-flex;justify-content:center;">
                                    <?php echo $card['icon']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $card['title'] ) ) : ?>
                                <h4 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:600"><?php echo esc_html( $card['title'] ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $card['content'] ) ) : ?>
                                <div class="has-gray-600-color has-text-color"><?php echo wp_kses_post( $card['content'] ); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
