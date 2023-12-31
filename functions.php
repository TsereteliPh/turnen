<?php

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('adem_setup')) {
	function adem_setup()
	{
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support('editor-styles');
		add_editor_style();

		register_nav_menus(
			array(
				'menu_footer' => 'Меню футера'
			)
		);
	}

	register_post_type('coaches', [
		'label' => null,
		'labels' => [
			'name' => 'Тренеры',
			'singular_name' => 'Тренер',
			'add_new' => 'Добавить нового тренера',
			'add_new_item' => 'Добавить нового тренера',
			'edit_item' => 'Редактировать информацию о тренере',
			'new_item' => 'Добавить нового тренера',
			'view_item' => 'Информация о тренере',
			'search_items' => 'Найти тренера',
			'not_found' => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name' => 'Тренеры',
		],
		'public' => true,
		'show_in_menu' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-groups',
		'supports' => ['title', 'thumbnail'],
		'taxonomies' => ['coaches_type'],
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true,
		'publicly_queryable' => false
	]);
}

add_action('after_setup_theme', 'adem_setup');

//disable archive pages
add_action( 'parse_query', function ( $query ) {
    if( is_date() || is_category() || is_tag() || is_author() ) {
        wp_redirect( home_url() );
        exit;
    }
});

// Return classic widgets
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

add_action('wp_enqueue_scripts', 'adem_scripts');
function adem_scripts()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/vendor/css/fancybox.css', array(), '4.0.31');
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/vendor/js/fancybox.umd.js', array(), '4.0.31', true);
	wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/vendor/css/swiper-bundle.min.css', array(), '10.3.0');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/vendor/js/swiper-bundle.min.js', array(), '10.3.0', true);
	wp_enqueue_style('adem', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('adem', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true);
	wp_localize_script('adem', 'adem_ajax', array('url' => admin_url('admin-ajax.php')));
}

//ending of experience

function endingExperience ($num) {
	$number = substr($num, -2);

	if ($number == 11) {
		$ending = ' лет';
	} else {
		$number = substr($number, -1);

		if ($number == 1) $ending = ' года';
		if ($number != 1) $ending = ' лет';
	}

	echo $num . $ending;
}

// disable scale images
add_filter('big_image_size_threshold', '__return_false');

// remove prefix in archive title
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// excerpt
function adem_excerpt($limit, $ID = null)
{
	return mb_substr(get_the_excerpt($ID), 0, $limit) . '...';
}

require 'inc/acf.php';
require 'inc/load-more.php';
require 'inc/mail.php';
require 'inc/svg.php';
require 'inc/tiny-mce.php';
require 'inc/traffic.php';
