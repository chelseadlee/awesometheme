<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LL_Theme
 */

?>

	</div><!-- #content -->

    <?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-footer__wrap">
            <?php
            // Make sure there is a social menu to display.
            if ( has_nav_menu( 'social' ) ) { ?>
            <nav class="social-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'menu_class'     => 'social-links-menu',
                    'depth'          => 1,
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>' . awesometheme_get_svg( array( 'icon' => 'chain' ) ),
                ) );
                ?>
            </nav><!-- .social-menu -->
            <?php } ?>

		    <div class="site-info">
                <div><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'awesometheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'awesometheme' ), 'WordPress' ); ?></a></div>
                    <div><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'awesometheme' ), 'awesometheme', '<a href="https://automattic.com/" rel="designer">Chelsea Lee</a>' ); ?></div>
		    </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
