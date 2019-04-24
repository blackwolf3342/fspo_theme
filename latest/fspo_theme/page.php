<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fspo_theme
 */

get_header();
?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post() ?>

				
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
		<?php endwhile ?>
		<div class="container">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			<div class="row">
				<div class="col-12">
					
				</div>
				<div class="col-md-12">
				<main id="main-1" class="site-main">

					<?php
					while ( have_posts() ) :
						the_post();
						?>

						 <?php the_content(); ?>
						
						<?php
					endwhile; // End of the loop.
					?>

						</main><!-- #main -->
				</div>
				
			</div>
		</div>
	</div><!-- #primary -->

<?php

get_footer();
