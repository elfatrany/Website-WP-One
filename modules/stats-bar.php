<?php
/**
 * Module: Stats Bar
 * Maps to: patterns/homepage-stats.php
 */
$stats    = get_sub_field( 'stats' );
$bg_color = get_sub_field( 'background_color' ) ?: 'primary';
?>

<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:24px;padding-right:clamp(20px,5vw,60px);padding-bottom:96px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1280px;margin:0 auto;">

        <div class="wp-block-group stats-pill-bar has-<?php echo esc_attr( $bg_color ); ?>-background-color has-background" style="border-radius:0px;padding:32px 48px;display:flex;flex-wrap:wrap;justify-content:space-between;gap:24px;">
            <?php if ( $stats ) : ?>
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="wp-block-group" style="text-align:center;flex:1;min-width:120px;">
                        <p class="stat-number has-text-align-center" style="font-size:3rem;font-weight:700;text-align:center;color:var(--wp--preset--color--accent);margin:0;" data-counter="<?php echo esc_attr( $stat['number'] ); ?>" data-prefix="<?php echo esc_attr( $stat['prefix'] ); ?>" data-suffix="<?php echo esc_attr( $stat['suffix'] ); ?>"><?php echo esc_html( $stat['prefix'] ); ?>0<?php echo esc_html( $stat['suffix'] ); ?></p>
                        <p class="has-text-align-center has-white-color has-text-color has-small-font-size" style="margin:8px 0 0;"><?php echo esc_html( $stat['label'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</div>
