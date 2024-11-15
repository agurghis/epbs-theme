<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EPBS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="inside-article">
	
		<header class="entry-header">

			<?php epbs_entry_categories(); ?>

			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
			?>
		</header><!-- .entry-header -->

		<?php 

			if ( is_singular() ) {

				epbs_post_thumbnail();

			}
			
		?>

		<div class="entry-content">
			<?php
			if ( is_singular() ) :

				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'epbs' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'epbs' ),
						'after'  => '</div>',
					)
				);

			else :
				
				echo epbs_get_custom_excerpt(230);

			endif;

			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
				if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php epbs_posted_by(); ?>
					<span class="dot-separator"></span>
					<?php epbs_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
