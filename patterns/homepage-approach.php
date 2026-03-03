<?php
/**
 * Title: Homepage - Our Approach Section
 * Slug: hill-street-realty/homepage-approach
 * Categories: hsr-homepage
 * Description: Our approach with text and video side by side
 *
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"96px","bottom":"96px","left":"clamp(20px,5vw,60px)","right":"clamp(20px,5vw,60px)"}}},"backgroundColor":"white","className":"approach-video-section","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull approach-video-section has-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"60px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center">

        <!-- Left Column - Text (55%) -->
        <!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"12px","right":"12px"}},"border":{"radius":"0"}},"backgroundColor":"gray-200","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"className":"section-label"} -->
            <div class="wp-block-group section-label has-gray-200-background-color has-background" style="border-radius:0;padding-top:6px;padding-right:12px;padding-bottom:6px;padding-left:12px;width:fit-content">
                <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1.5px","fontWeight":"600","fontSize":"0.75rem"}},"textColor":"primary"} -->
                <p class="has-primary-color has-text-color" style="font-weight:600;letter-spacing:1.5px;text-transform:uppercase;font-size:0.75rem">Our Approach</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"20px"}},"typography":{"lineHeight":"1.7"}},"textColor":"gray-700","fontSize":"x-large"} -->
            <p class="has-gray-700-color has-text-color has-x-large-font-size" style="margin-top:20px;line-height:1.7">At Hill Street, we combine institutional discipline with entrepreneurial agility to identify undervalued multifamily assets and unlock their full potential through hands-on management and strategic repositioning.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"32px"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
            <div class="wp-block-group" style="margin-top:32px">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","bottom":"14px","left":"24px","right":"18px"}},"border":{"radius":"0"}},"backgroundColor":"primary","className":"pill-button","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
                <div class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:14px;padding-right:18px;padding-bottom:14px;padding-left:24px">
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"accent","fontSize":"small"} -->
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500">Learn About Our Strategy</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:html -->
                    <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                    <!-- /wp:html -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

        <!-- Right Column - Video (45%) -->
        <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">

            <!-- wp:group {"className":"approach-video-wrapper","layout":{"type":"default"}} -->
            <div class="wp-block-group approach-video-wrapper">
                <!-- wp:image {"sizeSlug":"large","className":"approach-video-image","style":{"border":{"radius":"0px"}}} -->
                <figure class="wp-block-image size-large approach-video-image" style="border-radius:0px"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=600&q=80" alt="Real estate investment video"/></figure>
                <!-- /wp:image -->

                <!-- wp:html -->
                <div class="approach-play-button">
                    <svg class="accent-fill" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="8 5 19 12 8 19 8 5"></polygon></svg>
                </div>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
