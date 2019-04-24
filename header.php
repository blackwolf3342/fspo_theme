<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fspo_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">


</head>

<body <?php body_class(); ?>>


<div id="top"></div>
<div class="spinner-wrapper">
	<div class="sk-cube-grid">
		<div class="sk-cube sk-cube1"></div>
		<div class="sk-cube sk-cube2"></div>
		<div class="sk-cube sk-cube3"></div>
		<div class="sk-cube sk-cube4"></div>
		<div class="sk-cube sk-cube5"></div>
		<div class="sk-cube sk-cube6"></div>
		<div class="sk-cube sk-cube7"></div>
		<div class="sk-cube sk-cube8"></div>
		<div class="sk-cube sk-cube9"></div>
	</div>
</div>

<a href="#top" class="scroll-up">
	<i class="fas fa-chevron-up"></i>
	<i class="fas fa-chevron-up"></i>
</a>
</div>
<div class="menu-toggled-wrapper">
	<div class="conta">
		<button id="toggle-close"></button>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'container'       => '',
				'menu_id'        => 'primary-menu-toggle'
			) );
			?>
		
	</div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fspo_theme' ); ?></a>

	<div class="info-line">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<p><i class="fas fa-phone"></i><a href="tel:(04744) 3-53-08">(04744) 3-53-08</a></p>
					<p><i class="fas fa-envelope"></i><a href="mailto:fspo@ukr.net">fspo@ukr.net</a></p>
				</div>
				<div class="col-md-6 social-link">
					<a rel="external" href="https://www.facebook.com/fspoudpu/" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
					<a rel="external" href="https://twitter.com/admin_fspo?lang=uk" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
					<a rel="external" href="https://www.instagram.com/fspo_udpu/?hl=uk" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>

					<?php dynamic_sidebar( 'language' ); ?>
				</div>
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header <?php if(is_front_page()) { echo "front";}?>">
		<nav id="site-navigation" class="main-navigation container ">
			<div class="site-logo">
				<a href="<?php echo get_home_url(); ?>"><?php //the_custom_logo(0) 
					bloginfo( 'name' );
				?>
				</a>
			</div>
			<button class="menu-toggle" id="toggle-menu" aria-controls="primary-menu" aria-expanded="false"></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'container' => '',
				'menu_id'        => 'primary-menu'
			) );
			?>
			<? get_search_form();  ?>
		</nav>
	</header>

	<div id="content" class="site-content">
