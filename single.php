<?php
/**
 * Template: Single Post
 *
 * @package HillStreetRealty
 */

get_header(); ?>

<main class="wp-block-group">
    <?php while ( have_posts() ) : the_post(); ?>

        <article style="padding-top:160px;padding-bottom:96px;">
            <div style="max-width:800px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

                <header style="margin-bottom:48px;">
                    <p class="has-gray-500-color has-text-color has-small-font-size" style="margin-bottom:12px;"><?php echo get_the_date(); ?></p>
                    <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2rem, 4vw, 3rem);font-weight:700;line-height:1.2"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="wp-block-image size-full" style="margin-bottom:48px;border-radius:0;">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </figure>
                <?php endif; ?>

                <div class="entry-content has-gray-700-color has-text-color" style="line-height:1.8;">
                    <?php the_content(); ?>
                </div>

            </div>
        </article>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
