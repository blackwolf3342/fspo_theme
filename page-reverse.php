<?php 
/*
    Template Name: Page Revers
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
    <article class='container subpages'>
            <div class="col-12">
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            </div>
            
            <div class="container">
                <div class="row">
                    

                    <?php
                        $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order' ) );

                        foreach( $mypages as $page ) {      
                            $content = $page->post_content;

                            ?>
                            <a href="<?php echo get_page_link($page->ID)?>" class="col-6 col-md-3 col-sm-6 col-lg-3">
                                        <div class="thumbnail" style="background-image: url('<?php echo get_the_post_thumbnail_url( $page->ID, 'large'); ?>')">
                                            
                                        </div>

                                        <div class="title">
                                            <h2>
                                                <?php echo $page->post_title; ?>
                                            </h2>
                                        </div>

                                    </a>

                        <?php } ?>

                </div>
            </div>

            <?php the_content( );  ?>
            

    </article>

 
<?php get_footer(); ?>