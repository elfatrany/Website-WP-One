<?php
/**
 * Title: Page - About Us Hero
 * Slug: hill-street-realty/page-about-hero
 * Categories: hsr-pages
 * Description: Hero section for About Us page with two-column header and full-width image
 * Keywords: hero, about, page
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"160px","bottom":"80px","left":"clamp(20px,5vw,60px)","right":"clamp(20px,5vw,60px)"}}},"backgroundColor":"white","className":"about-hero-section","layout":{"type":"constrained","contentSize":"1320px"}} -->
<div class="wp-block-group alignfull about-hero-section has-white-background-color has-background" style="padding-top:160px;padding-right:clamp(20px,5vw,60px);padding-bottom:80px;padding-left:clamp(20px,5vw,60px)">

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"60px"},"margin":{"bottom":"60px"}}},"className":"about-hero-header"} -->
    <div class="wp-block-columns are-vertically-aligned-center about-hero-header" style="margin-bottom:60px">

        <!-- Left Column - Large Heading (60%) -->
        <!-- wp:column {"verticalAlignment":"center","width":"60%","className":"about-hero-heading"} -->
        <div class="wp-block-column is-vertically-aligned-center about-hero-heading" style="flex-basis:60%">
            <!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.2","fontWeight":"500","fontSize":"clamp(2.5rem, 5vw, 4.25rem)"}},"textColor":"primary"} -->
            <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2.5rem, 5vw, 4.25rem);font-weight:500;line-height:1.2">Building lasting value through strategic investment.</h1>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- Right Column - Description (40%) -->
        <!-- wp:column {"verticalAlignment":"center","width":"40%","className":"about-hero-description"} -->
        <div class="wp-block-column is-vertically-aligned-center about-hero-description" style="flex-basis:40%">
            <!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"gray-700","fontSize":"medium"} -->
            <p class="has-gray-700-color has-text-color has-medium-font-size" style="line-height:1.6">Distinct. Disciplined. Results-Driven. Hill Street Realty combines institutional expertise with entrepreneurial agility to identify and transform undervalued multifamily assets.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

    <!-- Full-width Image -->
    <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}},"className":"about-hero-image"} -->
    <figure class="wp-block-image size-full about-hero-image" style="border-radius:12px"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1400&q=80" alt="Hill Street Realty team at work" style="border-radius:12px"/></figure>
    <!-- /wp:image -->

</div>
<!-- /wp:group -->
