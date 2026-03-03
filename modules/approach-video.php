<?php
/**
 * Module: Approach / Video
 * Maps to: patterns/homepage-approach.php
 */
$label           = get_sub_field( 'label' ) ?: 'Our Approach';
$description     = get_sub_field( 'description' );
$cta_text        = get_sub_field( 'cta_text' );
$cta_url         = get_sub_field( 'cta_url' );
$image           = get_sub_field( 'image' );
$video_url       = get_sub_field( 'video_url' );
$reverse_columns = get_sub_field( 'reverse_columns' );

$img_url = $image ? esc_url( $image['url'] ) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&q=80';
$img_alt = $image ? esc_attr( $image['alt'] ) : 'Real estate investment video';
$flex_dir = $reverse_columns ? 'row-reverse' : 'row';
?>

<div class="wp-block-group alignfull approach-video-section has-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <div class="wp-block-columns are-vertically-aligned-center" style="display:flex;flex-wrap:wrap;gap:60px;flex-direction:<?php echo esc_attr( $flex_dir ); ?>;">

            <!-- Text Column -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%;min-width:300px;">

                <?php if ( $label ) : ?>
                    <div class="wp-block-group section-label has-gray-200-background-color has-background" style="border-radius:0;padding:6px 12px;width:fit-content;">
                        <p class="has-primary-color has-text-color" style="font-weight:600;letter-spacing:1.5px;text-transform:uppercase;font-size:0.75rem;margin:0;"><?php echo esc_html( $label ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <p class="has-gray-700-color has-text-color has-x-large-font-size" style="margin-top:20px;line-height:1.7"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>

                <?php if ( $cta_text && $cta_url ) : ?>
                    <div style="margin-top:32px;">
                        <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:14px 18px 14px 24px;display:inline-flex;align-items:center;text-decoration:none;">
                            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                            <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Video Column -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%;min-width:280px;">
                <div class="wp-block-group approach-video-wrapper">
                    <figure class="wp-block-image size-large approach-video-image" style="border-radius:0px">
                        <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>"/>
                    </figure>
                    <?php if ( $video_url ) : ?>
                        <div class="approach-play-button" data-video-popup="<?php echo esc_url( $video_url ); ?>">
                            <svg class="accent-fill" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="8 5 19 12 8 19 8 5"></polygon></svg>
                        </div>
                    <?php else : ?>
                        <div class="approach-play-button">
                            <svg class="accent-fill" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="8 5 19 12 8 19 8 5"></polygon></svg>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
