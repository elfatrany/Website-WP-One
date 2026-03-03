<?php
/**
 * Module: Stats Row
 * Maps to: patterns/stats-row.php
 */
$stats          = get_sub_field( 'stats' );
$enable_counter = get_sub_field( 'enable_counter' );
?>

<div class="wp-block-group alignfull has-primary-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $stats ) : ?>
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(<?php echo count( $stats ); ?>, 1fr);gap:30px;">
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="wp-block-column" style="text-align:center;">
                        <?php if ( ! empty( $stat['icon'] ) ) : ?>
                            <div style="display:flex;justify-content:center;margin-bottom:var(--wp--preset--spacing--20);">
                                <?php echo $stat['icon']; ?>
                            </div>
                        <?php endif; ?>
                        <p class="has-text-align-center has-white-color has-text-color has-gigantic-font-size" style="margin-top:var(--wp--preset--spacing--20);font-weight:700"><?php echo esc_html( $stat['value'] ); ?></p>
                        <p class="has-text-align-center has-gray-300-color has-text-color has-medium-font-size"><?php echo esc_html( $stat['label'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
