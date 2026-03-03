<?php
/**
 * Title: Homepage - Video Section
 * Slug: hill-street-realty/homepage-video
 * Categories: hsr-homepage
 * Description: Video/image section for homepage

 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"24px","bottom":"48px","left":"clamp(20px,5vw,60px)","right":"clamp(20px,5vw,60px)"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:24px;padding-right:clamp(20px,5vw,60px);padding-bottom:48px;padding-left:clamp(20px,5vw,60px)">

    <!-- wp:group {"style":{"position":{"type":"relative"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="border-radius:0">
        <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"20px"}}} -->
        <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=700&q=80" alt="Real estate investment"/></figure>
        <!-- /wp:image -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"20px","right":"20px"}},"border":{"radius":"30px"}},"backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"className":"video-play-button"} -->
        <div class="wp-block-group video-play-button has-white-background-color has-background" style="border-radius:30px;padding-top:12px;padding-right:20px;padding-bottom:12px;padding-left:20px;position:absolute;bottom:30px;left:50%;transform:translateX(-50%);">
            <!-- wp:html -->
            <svg class="accent-fill accent-stroke" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
            <!-- /wp:html -->
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"primary","fontSize":"small"} -->
            <p class="has-primary-color has-text-color has-small-font-size" style="font-weight:500">See how Hill Street creates value</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
