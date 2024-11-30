<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EPBS
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">

			<header class="page-title-container">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="blog-container">

				<div class="main-content">

					<?php

						if ( have_posts() ) : ?>

							<div 
					
								<?php 
								
									if(is_active_sidebar("sidebar-1") ) { 
										?>class="articles-grid-two"<?php 
									} else { 
										?>class="articles-grid-three"<?php 
									} 
								?>
								
							>

								<?php 

									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										* Include the Post-Type-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Type name) and that will be used instead.
										*/
										get_template_part( 'template-parts/content', get_post_type() );

									endwhile; 
								
								?>

							</div>

							<?php

							// Previous/next page navigation.
							the_posts_pagination(
								array(
									'prev_text'          => __( 'Prev', 'epbs' ),
									'next_text'          => __( 'Next', 'epbs' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'epbs' ) . ' </span>',
								)
							);

						else : ?>

							<div 
								
								<?php 
								
									if(is_active_sidebar("sidebar-1") ) { 
										?>class="articles-grid-two"<?php 
									} else { 
										?>class="articles-grid-three"<?php 
									} 
								?>
							
							>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							</div>

							<?php

						endif;

					?>

				</div>

				<?php if(is_active_sidebar("sidebar-1") ) { ?>

					<div class="sidebar-content">

						<?php get_sidebar(); ?>

					</div>

				<?php } ?>

			</div>

		</div>

	</main><!-- #main -->

<?php

get_footer();
