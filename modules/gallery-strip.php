<?php
/**
 * Module: Gallery Strip
 * Maps to: patterns/homepage-gallery.php
 */
$images = get_sub_field( 'images' );
?>

<div class="wp-block-group alignfull gallery-strip" style="padding-top:0;padding-bottom:0">
    <div class="wp-block-group gallery-grid" style="display:flex;flex-wrap:nowrap;justify-content:center;">
        <?php if ( $images ) : ?>
            <?php foreach ( $images as $img ) : ?>
                <figure class="wp-block-image size-large gallery-image">
                    <img src="<?php echo esc_url( $img['sizes']['medium_large'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="400" height="300" loading="lazy" decoding="async"/>
                </figure>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
