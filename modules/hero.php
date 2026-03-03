<?php
/**
 * Module: Hero (Homepage)
 * Maps to: patterns/homepage-hero.php
 */
$headline   = get_sub_field( 'headline' ) ?: 'Disciplined Judgement.<br>Durable Returns.';
$subtext    = get_sub_field( 'subtext' ) ?: 'Institutional underwriting, cycle-tested experience, and execution built for long-term capital performance.';
$cta_text   = get_sub_field( 'cta_text' ) ?: 'View Transactions';
$cta_url    = get_sub_field( 'cta_url' ) ?: '/transactions/';
$image_left = get_sub_field( 'image_left' );
$image_right = get_sub_field( 'image_right' );
$badge_text = get_sub_field( 'badge_text' ) ?: 'SINCE 2001 &#8226; REAL ESTATE INVESTORS &#8226;';

$img_left_url  = $image_left ? esc_url( $image_left['url'] ) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&q=80';
$img_left_alt  = $image_left ? esc_attr( $image_left['alt'] ) : 'Commercial real estate investment';
$img_right_url = $image_right ? esc_url( $image_right['url'] ) : 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=600&q=80';
$img_right_alt = $image_right ? esc_attr( $image_right['alt'] ) : 'Multifamily property';
?>

<div class="wp-block-group alignfull hero-homelio has-white-background-color has-background" style="padding-top:150px;padding-right:clamp(20px,5vw,60px);padding-bottom:48px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <!-- Text + Button Row -->
        <div class="wp-block-group section-header-row" style="margin-bottom:40px;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-end;">

            <div class="wp-block-group" style="max-width:800px;">
                <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2.5rem, 5vw, 3.8rem);font-weight:700;letter-spacing:-1px;line-height:1.08"><?php echo wp_kses_post( $headline ); ?></h1>
                <p class="has-gray-500-color has-text-color has-medium-font-size" style="line-height:1.6"><?php echo esc_html( $subtext ); ?></p>
            </div>

            <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group hero-cta-btn pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:14px;padding-right:18px;padding-bottom:14px;padding-left:24px;display:inline-flex;align-items:center;text-decoration:none;">
                <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                <svg class="accent-stroke" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            </a>

        </div>

        <!-- Images Section -->
        <div class="wp-block-group hero-images-overlap">
            <figure class="wp-block-image size-full hero-left-image"><img src="<?php echo $img_left_url; ?>" alt="<?php echo $img_left_alt; ?>"/></figure>

            <div class="wp-block-group hero-right-box">
                <figure class="wp-block-image size-large hero-right-image"><img src="<?php echo $img_right_url; ?>" alt="<?php echo $img_right_alt; ?>"/></figure>
            </div>

            <div class="wp-block-group hero-badge-rotating">
                <svg viewBox="0 0 200 200" class="badge-svg">
                    <defs>
                        <path id="badgeTextPath" d="M100,100 m-68,0 a68,68 0 1,1 136,0 a68,68 0 1,1 -136,0"/>
                    </defs>
                    <circle cx="100" cy="100" r="98" class="accent-fill"/>
                    <g class="badge-text-rotate">
                        <text fill="#1a1a5e" font-size="12" font-weight="700" font-family="Inter, sans-serif" letter-spacing="5">
                            <textPath href="#badgeTextPath" startOffset="0%"><?php echo $badge_text; ?></textPath>
                        </text>
                    </g>
                    <g class="badge-icon">
                        <rect x="75" y="65" width="50" height="70" rx="4" fill="none" stroke="#1a1a5e" stroke-width="4"/>
                        <line x1="100" y1="65" x2="100" y2="135" stroke="#1a1a5e" stroke-width="4"/>
                        <circle cx="90" cy="100" r="4" fill="#1a1a5e"/>
                    </g>
                </svg>
            </div>
        </div>

    </div>
</div>
