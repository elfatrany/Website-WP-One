<?php
/**
 * Title: Card - Blog Post
 * Slug: hill-street-realty/card-blog
 * Categories: hsr-cards
 * Description: Blog post card with image and excerpt
 * Keywords: blog, post, card, article, news
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"16px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":{"topLeft":"16px","topRight":"16px"}}}} -->
    <figure class="wp-block-image size-large" style="border-top-left-radius:0;border-top-right-radius:0"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&q=80" alt="Blog post image"/></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
        <!-- wp:paragraph {"textColor":"accent","fontSize":"small"} -->
        <p class="has-accent-color has-text-color has-small-font-size">Category</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}},"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
        <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--10);font-weight:600">Blog Post Title Goes Here</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"gray-500","fontSize":"small"} -->
        <p class="has-gray-500-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--20)">A brief excerpt or summary of the blog post content to entice readers to click through.</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"spacing":{"margin":{"top":"var:preset|spacing|20"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
        <p class="has-link-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:600"><a href="#">Read more →</a></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
