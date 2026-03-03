<?php
/**
 * Title: Hero - Homelio Style
 * Slug: hill-street-realty/hero-homelio
 * Categories: hsr-hero
 * Description: Exact Homelio hero - fully editable
 * Keywords: hero, homelio, real estate
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"100px","bottom":"80px","left":"clamp(20px,5vw,60px)","right":"clamp(20px,5vw,60px)"}}},"backgroundColor":"white","className":"hero-homelio","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull hero-homelio has-white-background-color has-background" style="padding-top:40px;padding-right:clamp(20px,5vw,60px);padding-bottom:80px;padding-left:clamp(20px,5vw,60px)">

    <!-- Text + Button Row - Flex with align-items flex-end -->
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"60px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
    <div class="wp-block-group" style="margin-bottom:60px">

        <!-- Left: Headline + Subtext -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"constrained","contentSize":"800px","justifyContent":"left"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.1","fontWeight":"700","letterSpacing":"-1px","fontSize":"clamp(2.8rem, 5.5vw, 4.2rem)"}},"textColor":"primary"} -->
            <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2.8rem, 5.5vw, 4.2rem);font-weight:700;letter-spacing:-1px;line-height:1.1">Disciplined Judgment.<br>Durable Returns.</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}},"textColor":"gray-500","fontSize":"medium"} -->
            <p class="has-gray-500-color has-text-color has-medium-font-size" style="line-height:1.7">Disciplined underwriting, cycle-tested experience, and execution grounded in informed decision-making.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Right: Button with Arrow -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","bottom":"14px","left":"24px","right":"18px"}},"border":{"radius":"0"}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"className":"hero-cta-btn pill-button"} -->
        <div class="wp-block-group hero-cta-btn pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:14px;padding-right:18px;padding-bottom:14px;padding-left:24px">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"accent","fontSize":"small"} -->
            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500">View Transactions</p>
            <!-- /wp:paragraph -->
            <!-- wp:html -->
            <svg class="accent-stroke" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

    <!-- Images Section -->
    <!-- wp:group {"className":"hero-images-overlap","layout":{"type":"default"}} -->
    <div class="wp-block-group hero-images-overlap">

        <!-- Left Large Image -->
        <!-- wp:image {"sizeSlug":"full","className":"hero-left-image"} -->
        <figure class="wp-block-image size-full hero-left-image"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&q=80" alt="Modern building"/></figure>
        <!-- /wp:image -->

        <!-- Right Teal Box -->
        <!-- wp:group {"className":"hero-right-box","layout":{"type":"default"}} -->
        <div class="wp-block-group hero-right-box">
            <!-- wp:image {"sizeSlug":"large","className":"hero-right-image"} -->
            <figure class="wp-block-image size-large hero-right-image"><img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=600&q=80" alt="City buildings"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:group -->

        <!-- Badge -->
        <!-- wp:group {"className":"hero-badge-rotating","layout":{"type":"default"}} -->
        <div class="wp-block-group hero-badge-rotating">
            <!-- wp:html -->
            <svg viewBox="0 0 200 200" class="badge-svg">
                <defs>
                    <!-- Circle path starting at left (9 o'clock) going clockwise -->
                    <path id="badgeTextPath" d="M100,100 m-68,0 a68,68 0 1,1 136,0 a68,68 0 1,1 -136,0"/>
                </defs>
                <!-- Single color background -->
                <circle cx="100" cy="100" r="98" class="accent-fill"/>
                <!-- Rotating text -->
                <g class="badge-text-rotate">
                    <text fill="#1a1a5e" font-size="12" font-weight="700" font-family="Inter, sans-serif" letter-spacing="5">
                        <textPath href="#badgeTextPath" startOffset="0%">SINCE 2001 &#8226; REAL ESTATE INVESTORS &#8226;</textPath>
                    </text>
                </g>
                <!-- Center door icon -->
                <g class="badge-icon">
                    <rect x="75" y="65" width="50" height="70" rx="4" fill="none" stroke="#1a1a5e" stroke-width="4"/>
                    <line x1="100" y1="65" x2="100" y2="135" stroke="#1a1a5e" stroke-width="4"/>
                    <circle cx="90" cy="100" r="4" fill="#1a1a5e"/>
                </g>
            </svg>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
