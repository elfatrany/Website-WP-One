<?php
/**
 * Title: Gallery - Image with Text Overlay
 * Slug: hill-street-realty/gallery-image-text-overlay
 * Categories: hsr-gallery
 * Description: Image cards with text overlay on hover
 * Keywords: gallery, images, overlay, hover, cards
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:cover {"url":"https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&q=80","dimRatio":40,"overlayColor":"primary","minHeight":300,"style":{"border":{"radius":"16px"}}} -->
            <div class="wp-block-cover" style="border-radius:0;min-height:300px">
                <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&q=80" data-object-fit="cover"/>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:heading {"textAlign":"center","level":3,"textColor":"white","fontSize":"x-large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-x-large-font-size">Category One</h3>
                    <!-- /wp:heading -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:cover {"url":"https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&q=80","dimRatio":40,"overlayColor":"primary","minHeight":300,"style":{"border":{"radius":"16px"}}} -->
            <div class="wp-block-cover" style="border-radius:0;min-height:300px">
                <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&q=80" data-object-fit="cover"/>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:heading {"textAlign":"center","level":3,"textColor":"white","fontSize":"x-large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-x-large-font-size">Category Two</h3>
                    <!-- /wp:heading -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:cover {"url":"https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=400&q=80","dimRatio":40,"overlayColor":"primary","minHeight":300,"style":{"border":{"radius":"16px"}}} -->
            <div class="wp-block-cover" style="border-radius:0;min-height:300px">
                <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="" src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=400&q=80" data-object-fit="cover"/>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:heading {"textAlign":"center","level":3,"textColor":"white","fontSize":"x-large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-x-large-font-size">Category Three</h3>
                    <!-- /wp:heading -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
