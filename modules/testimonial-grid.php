<?php
/**
 * Module: Testimonial Grid
 * Maps to: patterns/testimonial-grid.php
 */
$heading      = get_sub_field( 'heading' ) ?: 'What Our Clients Say';
$testimonials = get_sub_field( 'testimonials' );
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html( $heading ); ?></h2>

        <?php if ( $testimonials ) : ?>
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo min( count( $testimonials ), 3 ); ?>, 1fr);gap:var(--wp--preset--spacing--40);">
                <?php foreach ( $testimonials as $t ) : ?>
                    <div class="wp-block-column">
                        <div class="wp-block-group has-off-white-background-color has-background" style="border-radius:0;padding:var(--wp--preset--spacing--40);">
                            <p class="has-gray-700-color has-text-color" style="font-style:italic">"<?php echo esc_html( $t['quote'] ); ?>"</p>
                            <div style="display:flex;align-items:center;gap:12px;margin-top:var(--wp--preset--spacing--30);">
                                <?php if ( ! empty( $t['image'] ) ) : ?>
                                    <figure class="wp-block-image size-thumbnail is-resized" style="border-radius:50%;overflow:hidden;width:40px;height:40px;flex-shrink:0;">
                                        <img src="<?php echo esc_url( $t['image']['sizes']['thumbnail'] ?? $t['image']['url'] ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" style="width:40px;height:40px;object-fit:cover;" width="40" height="40"/>
                                    </figure>
                                <?php endif; ?>
                                <div>
                                    <p class="has-primary-color has-text-color has-small-font-size" style="font-weight:600;margin:0;"><?php echo esc_html( $t['name'] ); ?></p>
                                    <?php if ( ! empty( $t['title'] ) ) : ?>
                                        <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0;"><?php echo esc_html( $t['title'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
