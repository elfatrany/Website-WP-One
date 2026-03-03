<?php
/**
 * Title: Card - Team Member
 * Slug: hill-street-realty/card-team-member
 * Categories: hsr-cards, hsr-team
 * Description: Team member card with photo, name, and role
 * Keywords: team, member, staff, card, profile
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|40","left":"0"}},"border":{"radius":"16px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:0;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
    <!-- wp:image {"sizeSlug":"large","style":{"border":{"radius":{"topLeft":"16px","topRight":"16px"}}}} -->
    <figure class="wp-block-image size-large" style="border-top-left-radius:0;border-top-right-radius:0"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80" alt="Team member photo"/></figure>
    <!-- /wp:image -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"primary","fontSize":"large"} -->
        <h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-large-font-size" style="font-weight:600">John Smith</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"accent","fontSize":"small"} -->
        <p class="has-text-align-center has-accent-color has-text-color has-small-font-size">Senior Real Estate Agent</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"textColor":"gray-500","fontSize":"small"} -->
        <p class="has-text-align-center has-gray-500-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--20)">10+ years of experience helping clients find their dream homes.</p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"gray-500","iconColorValue":"#6b7280","size":"has-small-icon-size","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30)">
            <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
            <!-- wp:social-link {"url":"#","service":"x"} /-->
            <!-- wp:social-link {"url":"#","service":"mail"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
