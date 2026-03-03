<?php
/**
 * Module: Team Grid
 * Maps to: patterns/team-grid.php
 */
$heading      = get_sub_field( 'heading' ) ?: 'Meet Our Team';
$subtext      = get_sub_field( 'subtext' );
$display_mode = get_sub_field( 'display_mode' ) ?: 'all';
$columns      = get_sub_field( 'columns' ) ?: '4';

$args = array(
    'post_type'      => 'hsr_team',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_key'       => 'team_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
);

if ( $display_mode === 'department' ) {
    $department = get_sub_field( 'department' );
    if ( $department ) {
        $args['meta_query'] = array(
            array( 'key' => 'team_department', 'value' => $department ),
        );
    }
} elseif ( $display_mode === 'manual' ) {
    $manual = get_sub_field( 'manual_members' );
    if ( $manual ) {
        $args['post__in'] = wp_list_pluck( $manual, 'ID' );
        $args['orderby']  = 'post__in';
    }
}

$members = new WP_Query( $args );
?>

<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html( $heading ); ?></h2>

        <?php if ( $subtext ) : ?>
            <p class="has-text-align-center has-gray-500-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html( $subtext ); ?></p>
        <?php endif; ?>

        <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo intval( $columns ); ?>, 1fr);gap:var(--wp--preset--spacing--40);">
            <?php if ( $members->have_posts() ) : ?>
                <?php while ( $members->have_posts() ) : $members->the_post(); ?>
                    <?php $position = get_field( 'team_position' ); ?>
                    <div class="wp-block-column">
                        <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
                            <div class="wp-block-group has-white-background-color has-background" style="border-radius:0;padding:0 0 var(--wp--preset--spacing--40);overflow:hidden;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <figure class="wp-block-image size-large" style="border-top-left-radius:0;border-top-right-radius:0;">
                                        <?php the_post_thumbnail( 'hsr-team-member' ); ?>
                                    </figure>
                                <?php endif; ?>
                                <h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--30);font-weight:600"><?php the_title(); ?></h3>
                                <?php if ( $position ) : ?>
                                    <p class="has-text-align-center has-accent-color has-text-color has-small-font-size"><?php echo esc_html( $position ); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
