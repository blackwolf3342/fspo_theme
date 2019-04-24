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
 * @package fspo_theme
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="paralax-top" >

                <div id="slider-wrapper">
                    <div class="slide"  >
                        <div class="img-wrapper" style="background-image: url('<? echo get_template_directory_uri() ?>/img/header.jpg');">

                        </div>
                    </div>
                    <div class="slide" >
                        <div class="img-wrapper" style="background-image: url('<? echo get_template_directory_uri() ?>/img/header2.jpg');">

                        </div>
                    </div>
                    <div class="slide" >
                        <div class="img-wrapper" style="background-image: url('<? echo get_template_directory_uri() ?>/img/header3.jpg');">

                        </div>
                    </div>
                    <div class="slide" >
                        <div class="img-wrapper" style="background-image: url('<? echo get_template_directory_uri() ?>/img/header4.jpg');">

                        </div>
                    </div>
                </div>
            
               <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <p class="site-description"><?php echo get_bloginfo('description'); ?></p>
                        </div>
                        
                    </div>
               </div>

                <a href="#page-content" class="arrow"> 
                    <div class="chevron"></div> 
                    <div class="chevron"></div> 
                    <div class="chevron"></div> 
                    <span class="text">Прокрутіть вниз</span> 
                </a>
            </section>

            <section class="page-nav" id="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <?php $pages_out = get_pages(array ('meta_key' => 'front', 'sort_column' => 'menu_order') ); 

                        foreach (array_slice($pages_out, 0, 8) as $page) {  

                        ?>
                        <a href="<?php echo get_page_link($page->ID)?>" class="col-6 col-md-6 col-sm-6 col-lg-3">
							<div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( $page->ID,'large'); ?>')">
								
							</div>

							<div class="title">
								<h2>
                                    <?php echo $page->post_title; ?>
								</h2>
							</div>

                        </a>

                        <?php }?>
                        </div>
                </div>
            </section>
                    
            <section class="posts-list">
                <h2 class="header-title">Новини</h2>
                <div class="container-fluid">
                    <div class="row">
                    <?php
                        $query = new WP_Query('posts_per_page=8');
                        if( $query->have_posts() ){
                            while( $query->have_posts() ){ $query->the_post();
                            ?>
                                <div class="col-12 col-md-6 col-sm-6 col-lg-3">
                                    <a href="<?php echo get_page_link($page->ID)?>">
                                        <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url($query->ID, 'large'); ?>')">
                                        
                                        </div>
                                        <div class="title">

                                            <h2>
                                                <?php trim_title_chars(40, '...'); ?>
                                            </h2>
                                            
                                            <span class="entry-date"><?php echo the_time( 'j F Y' ); ?></span>

                                            <div class="description">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                        
                                    </a>
                                </div>
                            <?php
                            }
                            wp_reset_postdata();
                        } 
                        else echo 'Записей нет.';
                        ?>

                        <!-- <div class="col-md-12">
                            <a href="#">Всі Новини</a>
                        </div> -->
                    </div>
				</div>
				
				<div class="more-posts">
					<a href="<?php echo esc_url( home_url( '/' ) ) . "/blog"; ?>">Більше новин ...</a>
				</div>

				
            </section>
			<section class="advertaisment">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php dynamic_sidebar( 'advertisement' ) ?>
						</div>
					</div>
				</div>
			</section>
            <section class="basement" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div id="map">

                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <?php if ( is_active_sidebar( 'basement-right' ) ) : ?>
                                <div id="basement-right" class="basement-right widget-area" role="complementary">
                                    <?php dynamic_sidebar( 'basement-right' ); ?>
                                </div><!-- #primary-sidebar -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
