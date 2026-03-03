<?php
/**
 * Template: Single Team Member
 *
 * @package HillStreetRealty
 */

get_header();

while ( have_posts() ) : the_post();

$position   = get_field( 'team_position' );
$department = get_field( 'team_department' );
$email      = get_field( 'team_email' );
$phone      = get_field( 'team_phone' );
$linkedin   = get_field( 'team_linkedin' );
$bio        = get_field( 'team_bio' );
?>

<main class="wp-block-group">
    <article style="padding-top:160px;padding-bottom:96px;">
        <div style="max-width:1000px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

            <div style="display:flex;flex-wrap:wrap;gap:60px;">
                <!-- Photo -->
                <div style="width:350px;flex-shrink:0;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <figure class="wp-block-image size-large" style="margin:0;border-radius:0;">
                            <?php the_post_thumbnail( 'hsr-team-member' ); ?>
                        </figure>
                    <?php endif; ?>

                    <!-- Contact info -->
                    <div style="margin-top:24px;">
                        <?php if ( $email ) : ?>
                            <p style="margin:8px 0;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:var(--wp--preset--color--primary);text-decoration:none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:8px;"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <?php echo esc_html( $email ); ?>
                            </a></p>
                        <?php endif; ?>
                        <?php if ( $phone ) : ?>
                            <p style="margin:8px 0;"><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="color:var(--wp--preset--color--primary);text-decoration:none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;margin-right:8px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <?php echo esc_html( $phone ); ?>
                            </a></p>
                        <?php endif; ?>
                        <?php if ( $linkedin ) : ?>
                            <p style="margin:8px 0;"><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" style="color:var(--wp--preset--color--primary);text-decoration:none;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:8px;"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                LinkedIn
                            </a></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Bio -->
                <div style="flex:1;min-width:300px;">
                    <?php if ( $department ) : ?>
                        <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;"><?php echo esc_html( $department ); ?></p>
                    <?php endif; ?>
                    <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2rem, 4vw, 3rem);font-weight:700;line-height:1.2;margin-bottom:8px;"><?php the_title(); ?></h1>
                    <?php if ( $position ) : ?>
                        <p class="has-gray-500-color has-text-color has-large-font-size" style="margin-bottom:32px;"><?php echo esc_html( $position ); ?></p>
                    <?php endif; ?>

                    <?php if ( $bio ) : ?>
                        <div class="has-gray-700-color has-text-color" style="line-height:1.8;">
                            <?php echo wp_kses_post( $bio ); ?>
                        </div>
                    <?php else : ?>
                        <div class="entry-content has-gray-700-color has-text-color" style="line-height:1.8;">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </article>
</main>

<?php
endwhile;
get_footer();
?>
