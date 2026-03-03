<?php
/**
 * Template: Single Transaction
 *
 * @package HillStreetRealty
 */

get_header();

while ( have_posts() ) : the_post();

$address    = get_field( 'transaction_address' );
$city_state = get_field( 'transaction_city_state' );
$units      = get_field( 'transaction_units' );
$status     = get_field( 'transaction_status' );
$type       = get_field( 'transaction_type' );
$year       = get_field( 'transaction_year' );
$year_sold  = get_field( 'transaction_year_sold' );
$gallery    = get_field( 'transaction_gallery' );
?>

<main class="wp-block-group">
    <article style="padding-top:160px;padding-bottom:96px;">
        <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

            <!-- Header -->
            <div style="margin-bottom:48px;">
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
                    <?php if ( $status ) : ?>
                        <span style="background:var(--wp--preset--color--<?php echo ( $status === 'Realized' ) ? 'accent' : 'primary'; ?>);color:var(--wp--preset--color--<?php echo ( $status === 'Realized' ) ? 'primary' : 'white'; ?>);font-size:12px;font-weight:600;padding:6px 12px;">
                            <?php echo esc_html( $status ); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ( $type ) : ?>
                        <span class="has-gray-500-color has-text-color has-small-font-size"><?php echo esc_html( $type ); ?></span>
                    <?php endif; ?>
                </div>
                <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2rem, 4vw, 3rem);font-weight:700;line-height:1.2"><?php the_title(); ?></h1>
                <?php if ( $city_state ) : ?>
                    <p class="has-gray-500-color has-text-color has-medium-font-size" style="margin-top:8px;"><?php echo esc_html( $city_state ); ?></p>
                <?php endif; ?>
            </div>

            <!-- Gallery -->
            <?php if ( $gallery ) : ?>
                <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(350px, 1fr));gap:16px;margin-bottom:48px;">
                    <?php foreach ( $gallery as $img ) : ?>
                        <figure class="wp-block-image size-large" style="margin:0;border-radius:0;">
                            <img src="<?php echo esc_url( $img['sizes']['large'] ?? $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" style="width:100%;height:300px;object-fit:cover;"/>
                        </figure>
                    <?php endforeach; ?>
                </div>
            <?php elseif ( has_post_thumbnail() ) : ?>
                <figure class="wp-block-image size-full" style="margin-bottom:48px;">
                    <?php the_post_thumbnail( 'large' ); ?>
                </figure>
            <?php endif; ?>

            <!-- Details -->
            <div style="display:flex;flex-wrap:wrap;gap:48px;">
                <div style="flex:1;min-width:300px;">
                    <div class="entry-content has-gray-700-color has-text-color" style="line-height:1.8;">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div style="width:300px;flex-shrink:0;">
                    <div class="wp-block-group has-off-white-background-color has-background" style="padding:32px;border-radius:0;">
                        <h3 class="has-primary-color has-text-color" style="font-weight:600;margin:0 0 24px;">Details</h3>
                        <?php if ( $address ) : ?>
                            <div style="margin-bottom:16px;">
                                <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0;">Address</p>
                                <p class="has-primary-color has-text-color" style="font-weight:500;margin:4px 0 0;"><?php echo esc_html( $address ); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ( $units ) : ?>
                            <div style="margin-bottom:16px;">
                                <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0;">Units</p>
                                <p class="has-primary-color has-text-color" style="font-weight:500;margin:4px 0 0;"><?php echo esc_html( $units ); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ( $year ) : ?>
                            <div style="margin-bottom:16px;">
                                <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0;">Year Acquired</p>
                                <p class="has-primary-color has-text-color" style="font-weight:500;margin:4px 0 0;"><?php echo esc_html( $year ); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if ( $year_sold ) : ?>
                            <div style="margin-bottom:16px;">
                                <p class="has-gray-500-color has-text-color has-small-font-size" style="margin:0;">Year Sold</p>
                                <p class="has-primary-color has-text-color" style="font-weight:500;margin:4px 0 0;"><?php echo esc_html( $year_sold ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </article>
</main>

<?php
endwhile;
get_footer();
?>
