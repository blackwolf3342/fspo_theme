<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fspo_theme
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<section class="paralax-top   page-search" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/header.jpg">
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="site-title ">Результати пошуку: <span>  <? echo get_search_query(); ?></span> </h1>
						</div>
					</div>
				</div>
			</section>

		<article class="container page-search">
			<div class="row">
				<div class="col-md-9">
					<?php if ( have_posts() ) : ?>
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
							

						<?php endwhile; ?>
					
						<?php
							$arrg = array(
								'prev_text'    => ('<i class="fas fa-chevron-left"></i>'),
								'next_text'    => ('<i class="fas fa-chevron-right"></i>')
							);
						the_posts_pagination($arrg); ?>

					<? else :?>

						<div class="col-md-12 text-center">

							<h2>По запиту <? echo get_search_query(); ?>.</h2> 
							<p>Вибачте, але нічого не відповідає умові пошуку. </p>
							<p>Будь ласка, спробуйте ще раз з деякими іншими ключовими словами.</p>

							<?php  get_search_form(); ?>
							

						</div>

					<? endif;?>
				</div>
				<div class="col-md-3">
					<? get_sidebar(); ?>
				</div>
			</div>
		</arricle>
		

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
