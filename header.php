<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EPBS
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="header" class="site-header">

		<div class="container">

			<div class="inside-header">
		
				<div class="site-branding">
					<?php

						if ( has_custom_logo() ) {
						
							the_custom_logo();

						} else {

							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;

							$epbs_description = get_bloginfo( 'description', 'display' );
							
							if ( $epbs_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $epbs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php
							endif; 
							
						}

					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button id="menu-toggle" class="menu-toggle">
						<span><span class="first"></span></span>
						<span><span class="second"></span></span>
					</button>
					<?php
						
						if ( has_nav_menu( 'menu-1' ) ) {
																
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
		
						} else {

							echo '<ul class="menu nav-menu ">';
						
							wp_list_pages(array(
								'container' => '',
								'title_li' => '',
								'walker' => new WPBS_Page_Walker(),
							));

							echo '</ul>';
							
						} 

					?>
				</nav><!-- #site-navigation -->

			</div>

		</div>

	</header><!-- #header -->
