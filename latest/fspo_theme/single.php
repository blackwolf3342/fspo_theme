<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fspo_theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
				while ( have_posts() ) : 
					the_post()
				?>

				 <?php
				if (has_post_thumbnail()) { ?>
					<div class="thumbnail-post" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>);">
						<div class="container title">
								<h1><?php echo get_the_title(); ?></h1>
						</div>
					</div>
				<?php } else { ?>
					<div class="thumbnail-post post-bg" style="background-image: url('<?
						echo get_template_directory_uri() . '/img/post-bg.jpg'
						?>');">
						<div class="container title">
								<h1><?php echo get_the_title(); ?></h1>
						</div>
					</div>
					<?php
				} 
				?>
			<div class="container">
				<div class="row">
					<section class="single col-md-9">
						<?php the_time( 'j F Y' ); ?>
						
						
						<?php the_content(); ?>
					
							
						<?php
							endwhile;
						?>

					</section>
					<section class="col-md-3">
						<? get_sidebar( 'sidebar-1' ) ?>
					</section>
				</div>
			</div>
		


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
