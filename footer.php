<?php
$company_name = get_field( 'company_name', 'option' ) ?: get_bloginfo( 'name' );
$company_desc = get_field( 'company_description', 'option' ) ?: 'A vertically integrated multifamily investment firm focused on value-add opportunities.';
$linkedin_url = get_field( 'linkedin_url', 'option' );
$offices      = get_field( 'offices', 'option' );
$company_links    = get_field( 'footer_company_links', 'option' );
$investment_links = get_field( 'footer_investment_links', 'option' );
$legal_links      = get_field( 'footer_legal_links', 'option' );
$copyright_text   = get_field( 'footer_copyright_text', 'option' );
?>

<footer class="wp-block-group site-footer has-white-color has-primary-dark-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--60)">
    <div style="max-width:1200px;margin:0 auto;padding-left:clamp(20px,5vw,60px);padding-right:clamp(20px,5vw,60px);">

        <div class="wp-block-columns" style="display:flex;flex-wrap:wrap;gap:var(--wp--preset--spacing--60);">

            <!-- Company Info Column -->
            <div class="wp-block-column" style="flex-basis:35%;min-width:250px;">
                <h3 style="color:var(--wp--preset--color--white);font-weight:700;font-size:var(--wp--preset--font-size--x-large);margin:0 0 var(--wp--preset--spacing--30);">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $company_name ); ?></a>
                </h3>
                <p style="color:var(--wp--preset--color--gray-400);margin-top:var(--wp--preset--spacing--30);"><?php echo esc_html( $company_desc ); ?></p>
                <?php if ( $linkedin_url ) : ?>
                    <div style="margin-top:var(--wp--preset--spacing--40);">
                        <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" style="color:#fff;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Company Links -->
            <div class="wp-block-column" style="flex-basis:20%;min-width:150px;">
                <h4 style="color:var(--wp--preset--color--white);font-size:var(--wp--preset--font-size--large);margin-bottom:var(--wp--preset--spacing--30);">Company</h4>
                <?php if ( $company_links ) : ?>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:var(--wp--preset--spacing--20);">
                        <?php foreach ( $company_links as $link ) : ?>
                            <li><a href="<?php echo esc_url( $link['url'] ); ?>" style="color:var(--wp--preset--color--gray-400);text-decoration:none;font-size:var(--wp--preset--font-size--medium);"><?php echo esc_html( $link['label'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'hsr-footer-nav',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                    ?>
                <?php endif; ?>
            </div>

            <!-- Investment Links -->
            <div class="wp-block-column" style="flex-basis:20%;min-width:150px;">
                <h4 style="color:var(--wp--preset--color--white);font-size:var(--wp--preset--font-size--large);margin-bottom:var(--wp--preset--spacing--30);">Investment</h4>
                <?php if ( $investment_links ) : ?>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:var(--wp--preset--spacing--20);">
                        <?php foreach ( $investment_links as $link ) : ?>
                            <li><a href="<?php echo esc_url( $link['url'] ); ?>" style="color:var(--wp--preset--color--gray-400);text-decoration:none;font-size:var(--wp--preset--font-size--medium);"><?php echo esc_html( $link['label'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Contact / Offices -->
            <div class="wp-block-column" style="flex-basis:30%;min-width:200px;">
                <h4 style="color:var(--wp--preset--color--white);font-size:var(--wp--preset--font-size--large);margin-bottom:var(--wp--preset--spacing--30);">Contact</h4>
                <?php if ( $offices ) : ?>
                    <?php foreach ( $offices as $i => $office ) : ?>
                        <div style="<?php echo $i > 0 ? 'margin-top:var(--wp--preset--spacing--30);' : ''; ?>display:flex;gap:12px;align-items:flex-start;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <div>
                                <p style="color:var(--wp--preset--color--white);font-weight:600;font-size:var(--wp--preset--font-size--small);margin:0;"><?php echo esc_html( $office['city'] ); ?></p>
                                <p style="color:var(--wp--preset--color--gray-400);font-size:var(--wp--preset--font-size--small);margin:4px 0 0;">
                                    <?php echo esc_html( $office['address_line_1'] ); ?><br>
                                    <?php echo esc_html( $office['address_line_2'] ); ?>
                                </p>
                                <?php if ( ! empty( $office['phone'] ) ) : ?>
                                    <p style="color:var(--wp--preset--color--gray-400);font-size:var(--wp--preset--font-size--small);margin:4px 0 0;">
                                        Phone: <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $office['phone'] ) ); ?>" style="color:inherit;"><?php echo esc_html( $office['phone'] ); ?></a>
                                    </p>
                                <?php endif; ?>
                                <?php if ( ! empty( $office['fax'] ) ) : ?>
                                    <p style="color:var(--wp--preset--color--gray-400);font-size:var(--wp--preset--font-size--small);margin:4px 0 0;">
                                        Fax: <?php echo esc_html( $office['fax'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>

        <!-- Separator -->
        <hr style="border:0;border-top:1px solid var(--wp--preset--color--gray-700);margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--40);">

        <!-- Bottom bar -->
        <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;">
            <p style="color:var(--wp--preset--color--gray-500);font-size:var(--wp--preset--font-size--small);margin:0;">
                <?php
                if ( $copyright_text ) {
                    echo esc_html( $copyright_text );
                } else {
                    echo '&copy; ' . esc_html( date( 'Y' ) . ' ' . $company_name ) . '. All rights reserved.';
                }
                ?>
            </p>
            <?php if ( $legal_links ) : ?>
                <div style="display:flex;gap:var(--wp--preset--spacing--40);">
                    <?php foreach ( $legal_links as $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>" style="color:var(--wp--preset--color--gray-500);font-size:var(--wp--preset--font-size--small);text-decoration:none;"><?php echo esc_html( $link['label'] ); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
