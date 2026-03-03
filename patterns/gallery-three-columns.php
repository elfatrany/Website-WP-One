<?php
/**
 * Title: Gallery - Three Columns
 * Slug: hill-street-realty/gallery-three-columns
 * Categories: hsr-gallery
 * Description: Three column image gallery grid
 * Keywords: gallery, images, grid, three columns
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&q=80" alt="Gallery image 1"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=400&q=80" alt="Gallery image 2"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":"12px"}}} -->
            <figure class="wp-block-image size-large" style="border-radius:0"><img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=400&q=80" alt="Gallery image 3"/></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
