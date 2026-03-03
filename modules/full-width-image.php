<?php
/**
 * Module: Full Width Image
 */
$image   = get_sub_field( 'image' );
$caption = get_sub_field( 'caption' );
?>

<?php if ( $image ) : ?>
<div class="wp-block-group alignfull" style="padding:0;">
    <figure class="wp-block-image size-full" style="margin:0;">
        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" style="width:100%;display:block;"/>
        <?php if ( $caption ) : ?>
            <figcaption class="has-gray-500-color has-text-color has-small-font-size" style="text-align:center;padding:12px;"><?php echo esc_html( $caption ); ?></figcaption>
        <?php endif; ?>
    </figure>
</div>
<?php endif; ?>
