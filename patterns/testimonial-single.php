<?php
/**
 * Title: Testimonial - Single
 * Slug: hill-street-realty/testimonial-single
 * Categories: hsr-testimonials
 * Description: Single testimonial with quote, photo, and attribution
 * Keywords: testimonial, review, quote, customer
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"off-white","layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:lucide/icon {"icon":"quote","size":48,"color":"var(--wp--preset--color--accent)","strokeWidth":1.5,"alignment":"center"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic","lineHeight":"1.8"},"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"textColor":"gray-700","fontSize":"x-large"} -->
    <p class="has-text-align-center has-gray-700-color has-text-color has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--40);font-style:italic;line-height:1.8">"Add your testimonial quote here. This is where your happy client shares their experience working with you. Make it personal and impactful."</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
        <!-- wp:image {"width":"60px","height":"60px","sizeSlug":"thumbnail","style":{"border":{"radius":"50%"}}} -->
        <figure class="wp-block-image size-thumbnail is-resized" style="border-radius:50%"><img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80" alt="Client photo" style="width:60px;height:60px" width="60" height="60"/></figure>
        <!-- /wp:image -->
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"medium"} -->
            <p class="has-primary-color has-text-color has-medium-font-size" style="font-weight:600">Client Name</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
            <p class="has-gray-500-color has-text-color has-small-font-size">Location or Title</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
