<?php
/**
 * Module: CTA Split
 * Maps to: patterns/cta-split.php
 */
$label          = get_sub_field( 'label' );
$heading        = get_sub_field( 'heading' );
$description    = get_sub_field( 'description' );
$button_text    = get_sub_field( 'button_text' );
$button_url     = get_sub_field( 'button_url' );
$image          = get_sub_field( 'image' );
$image_position = get_sub_field( 'image_position' ) ?: 'left';

$img_url = $image ? esc_url( $image['url'] ) : 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=600&q=80';
$img_alt = $image ? esc_attr( $image['alt'] ) : '';
$flex_dir = ( $image_position === 'right' ) ? 'row-reverse' : 'row';
?>

<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <div class="wp-block-columns are-vertically-aligned-center" style="display:flex;flex-wrap:wrap;gap:var(--wp--preset--spacing--70);flex-direction:<?php echo esc_attr( $flex_dir ); ?>;">

            <div class="wp-block-column" style="flex-basis:50%;min-width:280px;">
                <figure class="wp-block-image size-large" style="border-radius:0">
                    <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>"/>
                </figure>
            </div>

            <div class="wp-block-column" style="flex-basis:50%;min-width:280px;">
                <?php if ( $label ) : ?>
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:2px;text-transform:uppercase"><?php echo esc_html( $label ); ?></p>
                <?php endif; ?>

                <?php if ( $heading ) : ?>
                    <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="margin-top:var(--wp--preset--spacing--20)"><?php echo esc_html( $heading ); ?></h2>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <p class="has-gray-600-color has-text-color" style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>

                <?php if ( $button_text && $button_url ) : ?>
                    <div style="margin-top:var(--wp--preset--spacing--40);">
                        <a href="<?php echo esc_url( $button_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:14px 18px 14px 24px;display:inline-flex;align-items:center;text-decoration:none;">
                            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;margin:0;"><?php echo esc_html( $button_text ); ?></p>
                            <svg class="accent-stroke" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
