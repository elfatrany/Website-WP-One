<?php
/**
 * Title: Homepage - Transactions Section
 * Slug: hill-street-realty/homepage-transactions
 * Categories: hsr-homepage
 * Description: Select Transactions section for homepage

 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"96px","bottom":"96px","left":"clamp(20px,5vw,60px)","right":"clamp(20px,5vw,60px)"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">

    <!-- Section Header -->
    <!-- wp:group {"className":"section-header-row","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"},"style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
    <div class="wp-block-group section-header-row" style="margin-bottom:50px">
        <!-- wp:heading {"style":{"typography":{"fontWeight":"700"}},"textColor":"primary","fontSize":"huge"} -->
        <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="font-weight:700">Select Transactions</h2>
        <!-- /wp:heading -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","bottom":"14px","left":"24px","right":"18px"}},"border":{"radius":"0"}},"backgroundColor":"primary","className":"pill-button","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
        <div class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding-top:12px;padding-right:16px;padding-bottom:12px;padding-left:20px">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"accent","fontSize":"small"} -->
            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500">View All Transactions</p>
            <!-- /wp:paragraph -->
            <!-- wp:html -->
            <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            <!-- /wp:html -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- Transaction Cards Grid -->
    <!-- wp:group {"className":"transaction-cards-grid","layout":{"type":"default"}} -->
    <div class="wp-block-group transaction-cards-grid">

        <!-- Card 1 -->
        <!-- wp:group {"className":"transaction-card","layout":{"type":"default"}} -->
        <div class="wp-block-group transaction-card">
            <!-- wp:group {"className":"transaction-card-image","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-image">
                <!-- wp:image {"sizeSlug":"large"} -->
                <figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=600&q=80" alt="The Westmore - Multifamily property in Los Angeles"/></figure>
                <!-- /wp:image -->
                <!-- wp:group {"className":"transaction-card-badge","backgroundColor":"accent","layout":{"type":"default"}} -->
                <div class="wp-block-group transaction-card-badge has-accent-background-color has-background">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600"}},"textColor":"primary"} -->
                    <p class="has-primary-color has-text-color" style="font-size:12px;font-weight:600">Realized</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"className":"transaction-card-content","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-content">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
                <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600">The Westmore</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"transaction-location","textColor":"gray-500","fontSize":"small"} -->
                <p class="transaction-location has-gray-500-color has-text-color has-small-font-size">Los Angeles, CA</p>
                <!-- /wp:paragraph -->
                <!-- wp:separator {"backgroundColor":"gray-200"} -->
                <hr class="wp-block-separator has-text-color has-gray-200-color has-alpha-channel-opacity has-gray-200-background-color has-background"/>
                <!-- /wp:separator -->
                <!-- wp:group {"className":"transaction-card-meta","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group transaction-card-meta">
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">156 Units</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">Value-Add</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- Card 2 -->
        <!-- wp:group {"className":"transaction-card","layout":{"type":"default"}} -->
        <div class="wp-block-group transaction-card">
            <!-- wp:group {"className":"transaction-card-image","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-image">
                <!-- wp:image {"sizeSlug":"large"} -->
                <figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1460317442991-0ec209397118?w=600&q=80" alt="Highland Gardens - Apartment complex in Denver"/></figure>
                <!-- /wp:image -->
                <!-- wp:group {"className":"transaction-card-badge","backgroundColor":"primary","layout":{"type":"default"}} -->
                <div class="wp-block-group transaction-card-badge has-primary-background-color has-background">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600"}},"textColor":"white"} -->
                    <p class="has-white-color has-text-color" style="font-size:12px;font-weight:600">Current</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"className":"transaction-card-content","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-content">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
                <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600">Highland Gardens</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"transaction-location","textColor":"gray-500","fontSize":"small"} -->
                <p class="transaction-location has-gray-500-color has-text-color has-small-font-size">Denver, CO</p>
                <!-- /wp:paragraph -->
                <!-- wp:separator {"backgroundColor":"gray-200"} -->
                <hr class="wp-block-separator has-text-color has-gray-200-color has-alpha-channel-opacity has-gray-200-background-color has-background"/>
                <!-- /wp:separator -->
                <!-- wp:group {"className":"transaction-card-meta","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group transaction-card-meta">
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">224 Units</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">Repositioning</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- Card 3 -->
        <!-- wp:group {"className":"transaction-card","layout":{"type":"default"}} -->
        <div class="wp-block-group transaction-card">
            <!-- wp:group {"className":"transaction-card-image","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-image">
                <!-- wp:image {"sizeSlug":"large"} -->
                <figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1574362848149-11496d93a7c7?w=600&q=80" alt="Parkview Terrace - Apartment building in Phoenix"/></figure>
                <!-- /wp:image -->
                <!-- wp:group {"className":"transaction-card-badge","backgroundColor":"accent","layout":{"type":"default"}} -->
                <div class="wp-block-group transaction-card-badge has-accent-background-color has-background">
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600"}},"textColor":"primary"} -->
                    <p class="has-primary-color has-text-color" style="font-size:12px;font-weight:600">Realized</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"className":"transaction-card-content","layout":{"type":"default"}} -->
            <div class="wp-block-group transaction-card-content">
                <!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
                <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600">Parkview Terrace</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph {"className":"transaction-location","textColor":"gray-500","fontSize":"small"} -->
                <p class="transaction-location has-gray-500-color has-text-color has-small-font-size">Phoenix, AZ</p>
                <!-- /wp:paragraph -->
                <!-- wp:separator {"backgroundColor":"gray-200"} -->
                <hr class="wp-block-separator has-text-color has-gray-200-color has-alpha-channel-opacity has-gray-200-background-color has-background"/>
                <!-- /wp:separator -->
                <!-- wp:group {"className":"transaction-card-meta","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group transaction-card-meta">
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">198 Units</p>
                    <!-- /wp:paragraph -->
                    <!-- wp:paragraph {"textColor":"gray-500","fontSize":"small"} -->
                    <p class="has-gray-500-color has-text-color has-small-font-size">Value-Add</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
