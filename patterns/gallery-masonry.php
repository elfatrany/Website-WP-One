<?php
/**
 * Title: Gallery - Masonry Style
 * Slug: hill-street-realty/gallery-masonry
 * Categories: hsr-gallery
 * Description: Masonry-style staggered image gallery
 * Keywords: gallery, images, masonry, staggered
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&q=80" alt="Gallery image 1"/></figure>
            <!-- /wp:image -->

            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0;margin-top:var(--wp--preset--spacing--30)"><img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?w=400&q=80" alt="Gallery image 2"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"},"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0;margin-top:var(--wp--preset--spacing--60)"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&q=80" alt="Gallery image 3"/></figure>
            <!-- /wp:image -->

            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0;margin-top:var(--wp--preset--spacing--30)"><img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=400&q=80" alt="Gallery image 4"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&q=80" alt="Gallery image 5"/></figure>
            <!-- /wp:image -->

            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"16px"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0;margin-top:var(--wp--preset--spacing--30)"><img src="https://images.unsplash.com/photo-1600573472550-8090b5e0745e?w=400&q=80" alt="Gallery image 6"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
