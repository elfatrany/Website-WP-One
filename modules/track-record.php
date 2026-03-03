<?php
/**
 * Module: Track Record
 * Maps to: patterns/homepage-track-record.php
 */
$heading     = get_sub_field( 'heading' ) ?: 'A Proven Track Record of Value Creation';
$description = get_sub_field( 'description' );
$features    = get_sub_field( 'features' );
$cta_text    = get_sub_field( 'cta_text' );
$cta_url     = get_sub_field( 'cta_url' );
$image       = get_sub_field( 'image' );
$stat_number = get_sub_field( 'stat_number' );
$stat_label  = get_sub_field( 'stat_label' );

$img_url = $image ? esc_url( $image['url'] ) : 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400&q=80';
$img_alt = $image ? esc_attr( $image['alt'] ) : 'Multifamily apartment building';
?>

<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <div class="wp-block-columns are-vertically-aligned-center" style="display:flex;flex-wrap:wrap;gap:60px;">

            <!-- Left Column -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%;min-width:300px;">
                <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="font-weight:700;line-height:1.2"><?php echo esc_html( $heading ); ?></h2>

                <?php if ( $description ) : ?>
                    <p class="has-gray-600-color has-text-color" style="margin-top:20px"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>

                <?php if ( $features ) : ?>
                    <div class="wp-block-group" style="margin-top:30px;">
                        <?php foreach ( $features as $feature ) : ?>
                            <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                                <span class="check-icon accent-stroke"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                <p class="has-gray-700-color has-text-color" style="margin:0;"><?php echo esc_html( $feature['text'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $cta_text && $cta_url ) : ?>
                    <div style="margin-top:30px;">
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:12px 16px 12px 20px;display:inline-flex;align-items:center;text-decoration:none;">
                            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                            <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%;min-width:300px;">
                <div class="wp-block-columns" style="display:flex;gap:20px;">
                    <div class="wp-block-column" style="flex-basis:60%;">
                        <figure class="wp-block-image size-large" style="border-radius:0px"><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>"/></figure>
                    </div>
                    <?php if ( $stat_number ) : ?>
                        <div class="wp-block-column" style="flex-basis:40%;">
                            <div class="wp-block-group has-accent-background-color has-background" style="border-radius:0px;padding:30px 20px;text-align:center;">
                                <p class="has-primary-color has-text-color" style="font-size:3rem;font-weight:700;margin:0;"><?php echo esc_html( $stat_number ); ?></p>
                                <p class="has-primary-color has-text-color has-small-font-size" style="margin:8px 0 0;"><?php echo esc_html( $stat_label ); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
