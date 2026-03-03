<?php
/**
 * Title: CTA - Split with Image
 * Slug: hill-street-realty/cta-split
 * Categories: hsr-cta
 * Description: Call to action with text on one side and image on other
 * Keywords: cta, call to action, split, image
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"off-white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=600&q=80" alt="Multifamily apartment building"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px","fontWeight":"600"}},"textColor":"accent","fontSize":"small"} -->
            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;letter-spacing:2px;text-transform:uppercase">Get Started</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"primary","fontSize":"huge"} -->
            <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="margin-top:var(--wp--preset--spacing--20)">Let's Find Your Perfect Home Together</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color" style="margin-top:var(--wp--preset--spacing--30)">Our experienced team is ready to help you navigate the real estate market and find exactly what you're looking for.</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","bottom":"14px","left":"24px","right":"18px"}},"border":{"radius":"0"}},"backgroundColor":"primary","className":"pill-button","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
                <div class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:14px;padding-right:18px;padding-bottom:14px;padding-left:24px">
                    <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"accent","fontSize":"small"} -->
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600">Schedule a Consultation</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:html -->
                    <svg class="accent-stroke" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                    <!-- /wp:html -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
