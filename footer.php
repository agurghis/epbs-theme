<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EPBS
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="container">
			
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'epbs' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'epbs' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'epbs' ), 'epbs', '<a href="https://alexgurghis.com/">Alex Gurghis</a>' );
					?>
			</div><!-- .site-info -->

		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<!-- Mobile Menu -->
<div id="epbs-side-menu" class="epbs-side-menu">

	<div class="epbs-side-top">

		<div class="close-side-menu-icon"></div>

	</div>

	<div class="epbs-side-inner">

		<ul class="epbs-side-inner-menu">
					
			<?php 

				if ( has_nav_menu( 'menu-1' ) ) {
																
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);

				} else {
				
					wp_list_pages(array(
						'container' => '',
						'title_li' => '',
						'walker' => new WPBS_Page_Walker(),
						'wrap_before' => '<ul class="menu">',
						'wrap_after' => '</ul>'
					));
					
				} 

			?>
			
		</ul>	

		<ul class="epbs-side-inner-menu">
					
			<?php 

				if ( has_nav_menu( 'primary_right' ) ) {
																
					wp_nav_menu( array( 
										
						'container' => '', 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary_right',
						'walker' => new ft_menu_walker()
													
					) ); 
				} 

			?>
			
		</ul>	

	</div>

</div>
<!-- End Mobile Menu -->

<a href="#epbs-side-close" class="epbs-trigger epbs-side-close"></a>

<?php wp_footer(); ?>

</body>
</html>
