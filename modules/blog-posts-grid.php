<?php
/**
 * Module: Blog Posts Grid
 */
$heading      = get_sub_field( 'heading' ) ?: 'Latest News';
$cta_text     = get_sub_field( 'cta_text' );
$cta_url      = get_sub_field( 'cta_url' );
$display_mode = get_sub_field( 'display_mode' ) ?: 'latest';
$count        = get_sub_field( 'count' ) ?: 3;
$columns      = get_sub_field( 'columns' ) ?: '3';

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => $count,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$posts_query = new WP_Query( $args );
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-bottom:var(--wp--preset--spacing--50);">
            <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="font-weight:700"><?php echo esc_html( $heading ); ?></h2>
            <?php if ( $cta_text && $cta_url ) : ?>
                <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:12px 16px 12px 20px;display:inline-flex;align-items:center;text-decoration:none;">
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                    <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </a>
            <?php endif; ?>
        </div>

        <div style="display:grid;grid-template-columns:repeat(<?php echo intval( $columns ); ?>, 1fr);gap:30px;">
            <?php if ( $posts_query->have_posts() ) : ?>
                <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
                        <div class="wp-block-group has-white-background-color has-background" style="border-radius:0;border:1px solid var(--wp--preset--color--gray-200);overflow:hidden;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <figure class="wp-block-image size-large" style="margin:0;">
                                    <?php the_post_thumbnail( 'hsr-property-card' ); ?>
                                </figure>
                            <?php endif; ?>
                            <div style="padding:24px;">
                                <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0 0 8px;"><?php echo get_the_date(); ?></p>
                                <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600;margin:0;"><?php the_title(); ?></h3>
                                <?php if ( has_excerpt() ) : ?>
                                    <p class="has-gray-600-color has-text-color has-small-font-size" style="margin-top:12px;"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
