<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fspo_theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>
			<section class="thumbnail-post" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/header.jpg">
				
				<div class="container title">
				<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
				</div>
				
			</section>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<article class="container page-blog">
							<div class="row">
								<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();
										?>
										<div class="col-md-12 post">
											<div class="post-block">
												<div class="thumbnails">
													<?php echo get_the_post_thumbnail($wp_query->ID, 'thumbnail'); ?>
												</div>
												<div class="title-post">
													<h2 class="post-header"><a href="<?php the_permalink(); ?>" title="Читати далі"><?php trim_title_chars(70, '...'); ?></a></h2>
													<p>
														<?php //the_excerpt();
															the_truncated_post( 200 );  
														?>
													</p>
												</div>
												<div class="more">
													<a href="<?php the_permalink(); ?>" title="Читати більше">Читати більше</a>

												</div>
											</div>
										</div>
									<?php
									endwhile;
									?>
									<?php
									$arrg = array(
										'prev_text'    => ('<i class="fas fa-chevron-left"></i>'),
										'next_text'    => ('<i class="fas fa-chevron-right"></i>')
									);
								the_posts_pagination($arrg); ?>

									<?
									else :

									// get_template_part( 'template-parts/content', 'none' );

									endif;
									?>

							</div>
						</article>
					</div>
					<div class="col-md-4">
						<?php get_sidebar( 'sidebar-1' ) ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
