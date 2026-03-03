<?php
/**
 * Module: Transactions Grid
 * Maps to: patterns/homepage-transactions.php
 */
$heading      = get_sub_field( 'heading' ) ?: 'Select Transactions';
$cta_text     = get_sub_field( 'cta_text' );
$cta_url      = get_sub_field( 'cta_url' );
$display_mode = get_sub_field( 'display_mode' ) ?: 'featured';
$count        = get_sub_field( 'count' ) ?: 3;
$columns      = get_sub_field( 'columns' ) ?: '3';

// Build query
$args = array(
    'post_type'      => 'hsr_transaction',
    'posts_per_page' => $count,
    'post_status'    => 'publish',
);

if ( $display_mode === 'featured' ) {
    $args['meta_key']   = 'transaction_featured';
    $args['meta_value'] = '1';
    $args['orderby']    = 'meta_value_num';
    $args['meta_query'] = array(
        'relation' => 'AND',
        array( 'key' => 'transaction_featured', 'value' => '1' ),
    );
    $args['orderby']  = array( 'transaction_order_clause' => 'ASC' );
    $args['meta_query'][] = array( 'transaction_order_clause' => array( 'key' => 'transaction_order', 'type' => 'NUMERIC' ) );
} elseif ( $display_mode === 'latest' ) {
    $args['orderby'] = 'date';
    $args['order']   = 'DESC';
} elseif ( $display_mode === 'manual' ) {
    $manual = get_sub_field( 'manual_transactions' );
    if ( $manual ) {
        $args['post__in'] = wp_list_pluck( $manual, 'ID' );
        $args['orderby']  = 'post__in';
    }
}

$transactions = new WP_Query( $args );

$grid_cols = 'repeat(' . intval( $columns ) . ', 1fr)';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:96px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <!-- Section Header -->
        <div class="wp-block-group section-header-row" style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-bottom:50px;">
            <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size" style="font-weight:700"><?php echo esc_html( $heading ); ?></h2>
            <?php if ( $cta_text && $cta_url ) : ?>
                <a href="<?php echo esc_url( $cta_url ); ?>" class="wp-block-group pill-button has-primary-background-color has-background" style="border-radius:0;padding:12px 16px 12px 20px;display:inline-flex;align-items:center;text-decoration:none;">
                    <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:500;margin:0;"><?php echo esc_html( $cta_text ); ?></p>
                    <svg class="accent-stroke" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left:8px;"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </a>
            <?php endif; ?>
        </div>

        <!-- Transaction Cards -->
        <div class="wp-block-group transaction-cards-grid" style="display:grid;grid-template-columns:<?php echo esc_attr( $grid_cols ); ?>;gap:30px;">
            <?php if ( $transactions->have_posts() ) : ?>
                <?php while ( $transactions->have_posts() ) : $transactions->the_post(); ?>
                    <?php
                    $city_state = get_field( 'transaction_city_state' );
                    $units      = get_field( 'transaction_units' );
                    $status     = get_field( 'transaction_status' );
                    $type       = get_field( 'transaction_type' );
                    $badge_bg   = ( $status === 'Realized' ) ? 'accent' : 'primary';
                    $badge_text_color = ( $status === 'Realized' ) ? 'primary' : 'white';
                    ?>
                    <a href="<?php the_permalink(); ?>" class="wp-block-group transaction-card" style="text-decoration:none;">
                        <div class="wp-block-group transaction-card-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <figure class="wp-block-image size-large"><?php the_post_thumbnail( 'hsr-property-card' ); ?></figure>
                            <?php endif; ?>
                            <?php if ( $status ) : ?>
                                <div class="wp-block-group transaction-card-badge has-<?php echo esc_attr( $badge_bg ); ?>-background-color has-background">
                                    <p class="has-<?php echo esc_attr( $badge_text_color ); ?>-color has-text-color" style="font-size:12px;font-weight:600;margin:0;"><?php echo esc_html( $status ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="wp-block-group transaction-card-content">
                            <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600"><?php the_title(); ?></h3>
                            <?php if ( $city_state ) : ?>
                                <p class="transaction-location has-gray-500-color has-text-color has-small-font-size"><?php echo esc_html( $city_state ); ?></p>
                            <?php endif; ?>
                            <hr class="wp-block-separator has-gray-200-background-color has-background"/>
                            <div class="wp-block-group transaction-card-meta" style="display:flex;gap:16px;">
                                <?php if ( $units ) : ?>
                                    <p class="has-gray-500-color has-text-color has-small-font-size"><?php echo esc_html( $units ); ?> Units</p>
                                <?php endif; ?>
                                <?php if ( $type ) : ?>
                                    <p class="has-gray-500-color has-text-color has-small-font-size"><?php echo esc_html( $type ); ?></p>
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
