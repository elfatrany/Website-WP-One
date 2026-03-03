<?php
/**
 * Title: Card - Service
 * Slug: hill-street-realty/card-service
 * Categories: hsr-cards
 * Description: Service card with icon, title, and description
 * Keywords: service, card, feature, offering
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|40","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40"}},"border":{"radius":"16px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","right":"14px","bottom":"14px","left":"14px"}},"border":{"radius":"12px"}},"backgroundColor":"primary","layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-group has-primary-background-color has-background" style="border-radius:0;padding-top:14px;padding-right:14px;padding-bottom:14px;padding-left:14px">
        <!-- wp:lucide/icon {"icon":"briefcase","size":28,"color":"#1a1a5e","strokeWidth":2} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}},"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"x-large"} -->
    <h3 class="wp-block-heading has-primary-color has-text-color has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--30);font-weight:600">Service Title</h3>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"gray-600"} -->
    <p class="has-gray-600-color has-text-color" style="margin-top:var(--wp--preset--spacing--20)">Describe your service here. Explain what you offer and how it benefits your clients.</p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"16px","right":"12px"}},"border":{"radius":"0"}},"backgroundColor":"primary","className":"pill-button","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
        <div class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:10px;padding-right:12px;padding-bottom:10px;padding-left:16px">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"accent","fontSize":"x-small"} -->
            <p class="has-accent-color has-text-color has-x-small-font-size" style="font-weight:500">Learn More</p>
            <!-- /wp:paragraph -->
            <!-- wp:html -->
            <svg class="accent-stroke" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:6px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
