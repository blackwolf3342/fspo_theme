<?php 
/*
    Template Name: Blog
*/
?>
<?php get_header(); ?>
    

    <?php while ( have_posts() ) : 
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
    <?php endwhile ?>
    <article class='container page-blog'>
        <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
        <div class="row">
            <div class="col-md-8 ">
                <div class="row posts">
                    <?php 
                    $temp = $wp_query; 
                    $wp_query= null;
                    $wp_query = new WP_Query(); 
                    $wp_query->query('showposts=10' . '&paged='.$paged);

                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

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
                        
                    
                    
                </div>
                    <div class="more-btn btn btn-success" id="more" style="opacity: 0;">Завантажити більше новин</div>
                    <?php
                        $arrg = array(
                            'prev_text'    => ('<i class="fas fa-chevron-left"></i>'),
                            'next_text'    => ('<i class="fas fa-chevron-right"></i>')
                        );
                    the_posts_pagination($arrg); ?>

                    <?php wp_reset_postdata(); ?>

            </div>


            <div class="col-md-4">
                <?php get_sidebar( 'sidebar-1' ) ?>
            </div>
        </div>
    </article>

 
<?php get_footer(); ?>