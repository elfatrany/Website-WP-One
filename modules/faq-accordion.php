<?php
/**
 * Module: FAQ Accordion
 * Maps to: patterns/faq-accordion.php
 */
$heading = get_sub_field( 'heading' ) ?: 'Frequently Asked Questions';
$items   = get_sub_field( 'items' );
?>

<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:900px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html( $heading ); ?></h2>

        <?php if ( $items ) : ?>
            <div class="wp-block-group" style="display:flex;flex-direction:column;gap:var(--wp--preset--spacing--20);">
                <?php foreach ( $items as $item ) : ?>
                    <details class="wp-block-details has-white-background-color has-background" style="border-radius:0;padding:var(--wp--preset--spacing--30) var(--wp--preset--spacing--40);">
                        <summary><strong><?php echo esc_html( $item['question'] ); ?></strong></summary>
                        <div class="has-gray-600-color has-text-color" style="margin-top:var(--wp--preset--spacing--20)">
                            <?php echo wp_kses_post( $item['answer'] ); ?>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
