<?php
/**
 * Module: Hero (Page)
 * Maps to: page-*-hero.php patterns
 */
$label       = get_sub_field( 'label' );
$headline    = get_sub_field( 'headline' );
$description = get_sub_field( 'description' );
$image       = get_sub_field( 'image' );
$layout      = get_sub_field( 'layout' ) ?: 'two-column';
?>

<div class="wp-block-group alignfull about-hero-section has-white-background-color has-background" style="padding-top:160px;padding-right:clamp(20px,5vw,60px);padding-bottom:80px;padding-left:clamp(20px,5vw,60px)">
    <div style="max-width:1320px;margin:0 auto;">

        <?php if ( $layout === 'two-column' ) : ?>
            <div class="wp-block-columns are-vertically-aligned-center about-hero-header" style="display:flex;flex-wrap:wrap;gap:60px;margin-bottom:60px;">
                <div class="wp-block-column about-hero-heading" style="flex-basis:60%;min-width:300px;">
                    <?php if ( $label ) : ?>
                        <div class="wp-block-group section-label has-gray-200-background-color has-background" style="border-radius:0;padding:6px 12px;width:fit-content;margin-bottom:16px;">
                            <p class="has-primary-color has-text-color" style="font-weight:600;letter-spacing:1.5px;text-transform:uppercase;font-size:0.75rem;margin:0;"><?php echo esc_html( $label ); ?></p>
                        </div>
                    <?php endif; ?>
                    <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2.5rem, 5vw, 4.25rem);font-weight:500;line-height:1.2"><?php echo wp_kses_post( $headline ); ?></h1>
                </div>
                <?php if ( $description ) : ?>
                    <div class="wp-block-column about-hero-description" style="flex-basis:40%;min-width:250px;">
                        <p class="has-gray-700-color has-text-color has-medium-font-size" style="line-height:1.6"><?php echo esc_html( $description ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div style="text-align:center;margin-bottom:60px;max-width:900px;margin-left:auto;margin-right:auto;">
                <?php if ( $label ) : ?>
                    <div class="wp-block-group section-label has-gray-200-background-color has-background" style="border-radius:0;padding:6px 12px;width:fit-content;margin:0 auto 16px;">
                        <p class="has-primary-color has-text-color" style="font-weight:600;letter-spacing:1.5px;text-transform:uppercase;font-size:0.75rem;margin:0;"><?php echo esc_html( $label ); ?></p>
                    </div>
                <?php endif; ?>
                <h1 class="wp-block-heading has-primary-color has-text-color" style="font-size:clamp(2.5rem, 5vw, 4.25rem);font-weight:500;line-height:1.2"><?php echo wp_kses_post( $headline ); ?></h1>
                <?php if ( $description ) : ?>
                    <p class="has-gray-700-color has-text-color has-medium-font-size" style="line-height:1.6;margin-top:20px;"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( $image ) : ?>
            <figure class="wp-block-image size-full about-hero-image" style="border-radius:12px">
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" style="border-radius:12px;width:100%;"/>
            </figure>
        <?php endif; ?>

    </div>
</div>
