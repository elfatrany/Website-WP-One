<?php
/**
 * Module: Logo Carousel
 */
$heading = get_sub_field( 'heading' );
$logos   = get_sub_field( 'logos' );
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $heading ) : ?>
            <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $logos ) : ?>
            <div style="display:flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:40px;">
                <?php foreach ( $logos as $logo ) : ?>
                    <?php if ( ! empty( $logo['image'] ) ) : ?>
                        <?php if ( ! empty( $logo['link'] ) ) : ?>
                            <a href="<?php echo esc_url( $logo['link'] ); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url( $logo['image']['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt_text'] ?: $logo['image']['alt'] ); ?>" style="max-height:60px;width:auto;opacity:0.6;transition:opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'"/>
                            </a>
                        <?php else : ?>
                            <img src="<?php echo esc_url( $logo['image']['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt_text'] ?: $logo['image']['alt'] ); ?>" style="max-height:60px;width:auto;opacity:0.6;"/>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
