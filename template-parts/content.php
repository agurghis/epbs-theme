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

			<?php if ( !is_singular() ) { epbs_entry_categories(); } ?>

			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title single-post-title">', '</h1>' );

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta single-post-meta">
							<div class="gravatar">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
									<img src="<?php echo esc_url(get_avatar_url( get_the_author_meta('user_email'), '25','' )); ?>" width="25" height="25"  class="avatar avatar-200 wp-user-avatar wp-user-avatar-200 alignnone photo">
								</a>
							</div>
							<?php epbs_posted_by(); ?>
							<span class="dot-separator"></span>
							<?php epbs_posted_on_single(); ?>
							<span class="dot-separator"></span>
							<?php epbs_entry_categories_single(); ?>
							<span class="dot-separator"></span>
							<?php epbs_comments_post(); ?>
						</div><!-- .entry-meta -->
					<?php endif;

				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					epbs_post_thumbnail();
				endif;
			?>
		</header><!-- .entry-header -->

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

				if ( has_tag() ) : ?>

					<div class="entry-footer-tags d-block mt-8">
						<div class="tags-holder">
							<span class="tags-caption"><?php esc_html_e( "Tagged with", 'epbs' ); ?>: </span>
							<?php

								$post_tags = get_the_tags();

								if ( $post_tags ) {
									foreach( $post_tags as $tag ) {
										?>
										<span class="tag">
											<a href="<?php echo get_tag_link($tag->term_id); ?>" rel="tag"><?php echo esc_html($tag->name); ?></a>
										</span>
										<?php
									}
								}
							?>
						</div>
					</div>

				<?php endif;

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
		
		<?php if ( ! is_singular() ) : ?>

			<footer class="entry-footer">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php epbs_posted_by(); ?>
						<span class="dot-separator"></span>
						<?php epbs_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</footer><!-- .entry-footer -->

		<?php else : ?>



		<?php endif; ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
