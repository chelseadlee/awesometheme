<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LL_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

    <?php
    if ( has_post_thumbnail() ) { ?>
        <figure class="featured-image full-bleed">
            <?php
            the_post_thumbnail( 'awesometheme-full-bleed' );
            ?>
        </figure><!-- .featured-image full-bleed -->
    <?php } ?>

    <div class="entry-content post-content">
        <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awesometheme' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content .post-content -->

    <?php
    get_sidebar( 'page' );
    ?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article><!-- #post-## -->
