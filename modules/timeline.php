<?php
/**
 * Module: Timeline
 */
$heading = get_sub_field( 'heading' );
$events  = get_sub_field( 'events' );
?>

<div class="wp-block-group alignfull has-off-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div style="max-width:900px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <?php if ( $heading ) : ?>
            <h2 class="wp-block-heading has-text-align-center has-primary-color has-text-color has-huge-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $events ) : ?>
            <div style="position:relative;padding-left:40px;border-left:2px solid var(--wp--preset--color--accent);">
                <?php foreach ( $events as $event ) : ?>
                    <div style="position:relative;margin-bottom:48px;">
                        <div style="position:absolute;left:-49px;top:0;width:16px;height:16px;background:var(--wp--preset--color--accent);border-radius:50%;"></div>
                        <?php if ( ! empty( $event['year'] ) ) : ?>
                            <p class="has-accent-color has-text-color has-small-font-size" style="font-weight:700;text-transform:uppercase;letter-spacing:1px;margin:0 0 8px;"><?php echo esc_html( $event['year'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $event['title'] ) ) : ?>
                            <h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size" style="font-weight:600;margin:0 0 12px;"><?php echo esc_html( $event['title'] ); ?></h3>
                        <?php endif; ?>
                        <?php if ( ! empty( $event['description'] ) ) : ?>
                            <p class="has-gray-600-color has-text-color" style="margin:0;"><?php echo esc_html( $event['description'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $event['image'] ) ) : ?>
                            <figure class="wp-block-image size-medium" style="margin-top:16px;border-radius:0;">
                                <img src="<?php echo esc_url( $event['image']['sizes']['medium_large'] ?? $event['image']['url'] ); ?>" alt="<?php echo esc_attr( $event['image']['alt'] ); ?>" style="border-radius:0;max-width:400px;"/>
                            </figure>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</div>
