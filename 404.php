<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fspo_theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="paralax-top   page-404" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/header.jpg">
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="site-title ">404</h1>

							<p class="p-404">
								Сторінка не знайдена!
							</p>
						</div>
					</div>
				</div>
			</section>
			<section class="error-404 not-found container">
				<div class="row">
					<div class="col-md-12">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Упс! Цієї сторінки не знайдено.', 'fspo_theme' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'Схоже нічого не було знайдено на цьому місці. Можливо, спробуйте одне з посилань нижче чи пошук?', 'fspo_theme' ); ?></p>

							<?php
							get_search_form();
							?>
							<div class="row justify-content-center">
								<div class="col-8">

									<?php the_widget( 'WP_Widget_Recent_Posts' );?>
									
								</div>
							</div>

						</div><!-- .page-content -->
					</div>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
