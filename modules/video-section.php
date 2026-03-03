<?php
/**
 * Module: Video Section
 * Maps to: patterns/homepage-video.php
 */
$thumbnail = get_sub_field( 'thumbnail' );
$video_url = get_sub_field( 'video_url' );
$caption   = get_sub_field( 'caption' ) ?: 'See how Hill Street creates value';

$thumb_url = $thumbnail ? esc_url( $thumbnail['url'] ) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=700&q=80';
$thumb_alt = $thumbnail ? esc_attr( $thumbnail['alt'] ) : 'Real estate investment';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:24px;padding-right:clamp(20px,5vw,60px);padding-bottom:48px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:900px;margin:0 auto;">

        <div style="position:relative;border-radius:0;">
            <figure class="wp-block-image size-large" style="border-radius:0">
                <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"/>
            </figure>

            <div class="wp-block-group video-play-button has-white-background-color has-background" style="border-radius:30px;padding:12px 20px;position:absolute;bottom:30px;left:50%;transform:translateX(-50%);display:inline-flex;align-items:center;gap:8px;cursor:pointer;" <?php echo $video_url ? 'data-video-popup="' . esc_url( $video_url ) . '"' : ''; ?>>
                <svg class="accent-fill accent-stroke" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                <p class="has-primary-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $caption ); ?></p>
            </div>
        </div>

    </div>
</div>
