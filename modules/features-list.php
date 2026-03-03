<?php
/**
 * Module: Features List
 */
$heading     = get_sub_field( 'heading' );
$description = get_sub_field( 'description' );
$features    = get_sub_field( 'features' );
$cta_text    = get_sub_field( 'cta_text' );
$cta_url     = get_sub_field( 'cta_url' );
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:900px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $heading ) : ?>
            <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $description ) : ?>
            <p class="has-gray-600-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>

        <?php if ( $features ) : ?>
            <div style="display:flex;flex-direction:column;gap:16px;">
                <?php foreach ( $features as $feature ) : ?>
                    <div style="display:flex;align-items:center;gap:12px;">
                        <span class="check-icon accent-stroke"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                        <p class="has-gray-700-color has-text-color" style="margin:0;"><?php echo esc_html( $feature['text'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( $cta_text && $cta_url ) : ?>
            <div style="margin-top:var(--wp--preset--spacing--40);">
                <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:14px 18px 14px 24px;display:inline-flex;align-items:center;text-decoration:none;">
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                    <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
