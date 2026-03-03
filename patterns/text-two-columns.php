<?php
/**
 * Title: Text - Two Columns
 * Slug: hill-street-realty/text-two-columns
 * Categories: hsr-text
 * Description: Two column text layout
 * Keywords: text, columns, content, split
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
    <div class="wp-block-columns">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:heading {"textColor":"primary","fontSize":"huge"} -->
            <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size">Left Column Heading</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color">Add your content here. This could be an introduction, overview, or any text content that you want to display in a two-column layout for better readability.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:paragraph {"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color">Continue your content in this column. Two-column layouts are great for balancing text and making long-form content more digestible for readers.</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph {"textColor":"gray-600"} -->
            <p class="has-gray-600-color has-text-color">You can add multiple paragraphs, lists, or other content blocks within each column to create a rich, engaging layout.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
