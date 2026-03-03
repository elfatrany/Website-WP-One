<?php
/**
 * Title: Card - Property
 * Slug: hill-street-realty/card-property
 * Categories: hsr-cards
 * Description: Property listing card with image, price, and details
 * Keywords: property, card, listing, real estate
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"radius":"16px"}},"backgroundColor":"white","className":"property-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group property-card has-white-background-color has-background" style="border-radius:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"position":{"type":"relative"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":{"topLeft":"16px","topRight":"16px","bottomLeft":"0px","bottomRight":"0px"}}}} -->
        <figure class="wp-block-image size-large" style="border-top-left-radius:16px;border-top-right-radius:16px;border-bottom-left-radius:0px;border-bottom-right-radius:0px"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&q=80" alt="Property image" width="500" height="333" loading="lazy" decoding="async"/></figure>
        <!-- /wp:image -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","right":"16px","bottom":"8px","left":"16px"}},"border":{"radius":"6px"}},"backgroundColor":"accent","className":"property-badge","layout":{"type":"constrained"}} -->
        <div class="wp-block-group property-badge has-accent-background-color has-background" style="border-radius:6px;padding-top:8px;padding-right:16px;padding-bottom:8px;padding-left:16px">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","fontSize":"12px"}},"textColor":"white"} -->
            <p class="has-white-color has-text-color" style="font-size:12px;font-weight:600">For Sale</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
        <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
        <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600">Property Address Here</h3>
        <!-- /wp:heading -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"6px"}}} -->
        <div class="wp-block-group">
            <!-- wp:lucide/icon {"icon":"map-pin","size":14,"color":"#9ca3af","strokeWidth":2} /-->
            <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
            <p class="has-gray-500-color has-text-color has-small-font-size">City, State 12345</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30)">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"accent","fontSize":"x-large"} -->
            <p class="has-accent-color has-text-color has-x-large-font-size" style="font-weight:700">$1,250,000</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"gray-200"} -->
        <hr class="wp-block-separator has-text-color has-gray-200-color has-alpha-channel-opacity has-gray-200-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"/>
        <!-- /wp:separator -->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
        <div class="wp-block-group">
            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"6px"}}} -->
            <div class="wp-block-group">
                <!-- wp:lucide/icon {"icon":"bed-double","size":16,"color":"#6b7280","strokeWidth":2} /-->
                <!-- wp:paragraph {"textColor":"gray-600","fontSize":"small"} -->
                <p class="has-gray-600-color has-text-color has-small-font-size">4 Beds</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"6px"}}} -->
            <div class="wp-block-group">
                <!-- wp:lucide/icon {"icon":"bath","size":16,"color":"#6b7280","strokeWidth":2} /-->
                <!-- wp:paragraph {"textColor":"gray-600","fontSize":"small"} -->
                <p class="has-gray-600-color has-text-color has-small-font-size">3 Baths</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"6px"}}} -->
            <div class="wp-block-group">
                <!-- wp:lucide/icon {"icon":"square","size":16,"color":"#6b7280","strokeWidth":2} /-->
                <!-- wp:paragraph {"textColor":"gray-600","fontSize":"small"} -->
                <p class="has-gray-600-color has-text-color has-small-font-size">2,500 sqft</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
