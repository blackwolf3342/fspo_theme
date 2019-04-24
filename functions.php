<?php
/**
 * fspo_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fspo_theme
 */

if ( ! function_exists( 'fspo_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fspo_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fspo_theme, use a find and replace
		 * to change 'fspo_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fspo_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fspo_theme' ),
		) );
		register_nav_menus( array(
			'menu-footer-1' => esc_html__( 'Footer Left', 'fspo_theme' ),
		) );
		register_nav_menus( array(
			'menu-footer-2' => esc_html__( 'Footer Center', 'fspo_theme' ),
		) );
		register_nav_menus( array(
			'menu-footer-3' => esc_html__( 'Footer Right', 'fspo_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fspo_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fspo_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fspo_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fspo_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'fspo_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fspo_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fspo_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fspo_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Місце під відео',
		'id'            => 'basement-right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Оголошення',
		'id'            => 'advertisement',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Мова',
		'id'            => 'language',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fspo_theme_widgets_init' );


add_filter('deprecated_constructor_trigger_error', '__return_false');
////////////

add_filter( 'excerpt_length', function(){
	return 10;
} );
add_filter( 'excerpt_more', function($more){
	return ' ...';
} );

/**
 * Enqueue scripts and styles.
 */
function fspo_theme_scripts() {

	wp_enqueue_style( 'fspo_theme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	if(is_home())  {
		wp_enqueue_style('leafret', 'https://unpkg.com/leaflet@1.3.4/dist/leaflet.css', array(), 1.1, false);

		wp_enqueue_script('leafret_js', 'https://unpkg.com/leaflet@1.3.4/dist/leaflet.js', array(), 1.0, false);
		
		wp_enqueue_script('maps', get_template_directory_uri() . '/js/map.js', array('leafret_js'), 1.001, false);
	}
	if(!is_admin()){

		// wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css');

		wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/css/bootstrap-reboot.min.css');

		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true );

		// wp_enqueue_script( 'fspo_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('slick', 'image-load'), '20151220', false );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), false );

		wp_enqueue_script('image-load', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery'), '1.1', false);

	}

	wp_enqueue_script( 'fspo_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fspo_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// footer copyright

function comicpress_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish' ");
	$output = '';
	if($copyright_dates) {
		$copyright = "Copyright &copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
		$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
		$output = $copyright;
	}
	return $output;
}

//Post header
function the_truncated_post($symbol_amount) {
	$filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

function trim_title_chars($count, $after) {
	$title = get_the_title();
	if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
	else $after = '';
	echo $title . $after;
}

//Pagination title

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function dimox_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home'] = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404
	$text['page'] = 'Страница %s'; // текст 'Страница N'
	$text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'
  
	$wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep = '›'; // разделитель между "крошками"
	$sep_before = '<span class="sep">'; // тег перед разделителем
	$sep_after = '</span>'; // тег после разделителя
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$before = '<span class="current">'; // тег перед текущей "крошкой"
	$after = '</span>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */
  
	global $post;
	$home_url = home_url('/');
	$link_before = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link_after = '</span>';
	$link_attr = ' itemprop="item"';
	$link_in_before = '<span itemprop="name">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;
  
	if (is_home() || is_front_page()) {
  
	  if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
  
	} else {
  
	  echo $wrap_before;
	  if ($show_home_link) echo $home_link;
  
	  if ( is_category() ) {
		$cat = get_category(get_query_var('cat'), false);
		if ($cat->parent != 0) {
		  $cats = get_category_parents($cat->parent, TRUE, $sep);
		  $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
		  $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
		  if ($show_home_link) echo $sep;
		  echo $cats;
		}
		if ( get_query_var('paged') ) {
		  $cat = $cat->cat_ID;
		  echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
		} else {
		  if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		}
  
	  } elseif ( is_search() ) {
		if (have_posts()) {
		  if ($show_home_link && $show_current) echo $sep;
		  if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
		} else {
		  if ($show_home_link) echo $sep;
		  echo $before . sprintf($text['search'], get_search_query()) . $after;
		}
  
	  } elseif ( is_day() ) {
		if ($show_home_link) echo $sep;
		echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
		echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
		if ($show_current) echo $sep . $before . get_the_time('d') . $after;
  
	  } elseif ( is_month() ) {
		if ($show_home_link) echo $sep;
		echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
		if ($show_current) echo $sep . $before . get_the_time('F') . $after;
  
	  } elseif ( is_year() ) {
		if ($show_home_link && $show_current) echo $sep;
		if ($show_current) echo $before . get_the_time('Y') . $after;
  
	  } elseif ( is_single() && !is_attachment() ) {
		if ($show_home_link) echo $sep;
		if ( get_post_type() != 'post' ) {
		  $post_type = get_post_type_object(get_post_type());
		  $slug = $post_type->rewrite;
		  printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
		  if ($show_current) echo $sep . $before . get_the_title() . $after;
		} else {
		  $cat = get_the_category(); $cat = $cat[0];
		  $cats = get_category_parents($cat, TRUE, $sep);
		  if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
		  $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
		  echo $cats;
		  if ( get_query_var('cpage') ) {
			echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
		  } else {
			if ($show_current) echo $before . get_the_title() . $after;
		  }
		}
  
	  // custom post type
	  } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		$post_type = get_post_type_object(get_post_type());
		if ( get_query_var('paged') ) {
		  echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
		} else {
		  if ($show_current) echo $sep . $before . $post_type->label . $after;
		}
  
	  } elseif ( is_attachment() ) {
		if ($show_home_link) echo $sep;
		$parent = get_post($parent_id);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		if ($cat) {
		  $cats = get_category_parents($cat, TRUE, $sep);
		  $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
		  echo $cats;
		}
		printf($link, get_permalink($parent), $parent->post_title);
		if ($show_current) echo $sep . $before . get_the_title() . $after;
  
	  } elseif ( is_page() && !$parent_id ) {
		if ($show_current) echo $sep . $before . get_the_title() . $after;
  
	  } elseif ( is_page() && $parent_id ) {
		if ($show_home_link) echo $sep;
		if ($parent_id != $frontpage_id) {
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			if ($parent_id != $frontpage_id) {
			  $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
			}
			$parent_id = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  for ($i = 0; $i < count($breadcrumbs); $i++) {
			echo $breadcrumbs[$i];
			if ($i != count($breadcrumbs)-1) echo $sep;
		  }
		}
		if ($show_current) echo $sep . $before . get_the_title() . $after;
  
	  } elseif ( is_tag() ) {
		if ( get_query_var('paged') ) {
		  $tag_id = get_queried_object_id();
		  $tag = get_tag($tag_id);
		  echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
		} else {
		  if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		}
  
	  } elseif ( is_author() ) {
		global $author;
		$author = get_userdata($author);
		if ( get_query_var('paged') ) {
		  if ($show_home_link) echo $sep;
		  echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
		} else {
		  if ($show_home_link && $show_current) echo $sep;
		  if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
		}
  
	  } elseif ( is_404() ) {
		if ($show_home_link && $show_current) echo $sep;
		if ($show_current) echo $before . $text['404'] . $after;
  
	  } elseif ( has_post_format() && !is_singular() ) {
		if ($show_home_link) echo $sep;
		echo get_post_format_string( get_post_format() );
	  }
  
	  echo $wrap_after;
  
	}
} // end of dimox_breadcrumbs()
	
	
function hyper_spoiler($atts, $content) {
	if (!isset($atts['name'])) {
	$sp_name = 'Спойлер';
	} else {
	$sp_name = $atts['name'];
	}
	return '
	<div class="spoiler-wrap">
	<div class="spoiler-head">'.$sp_name.'</div>
	<div class="spoiler-body">'.$content.'</div>
	</div>
		
	';
}
add_shortcode('spoiler', 'hyper_spoiler');



