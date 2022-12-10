<?php

function byte_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

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
	add_theme_support(
		'custom-background',
		apply_filters(
			'helper_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'byte_setup' );



add_action( 'wp_enqueue_scripts', 'add_my_scripts' );    // Фронт
function add_my_scripts(){
    wp_enqueue_style( 'main', get_stylesheet_uri() );
    wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.min.css');
    wp_deregister_style ('admin-bar-css');
    wp_deregister_style ('wp-block-library');
    wp_deregister_style ('global-styles-inline');
    wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate');
    wp_enqueue_script( 'lottie', 'https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js?_v=20221206134137',);
	wp_enqueue_script( 'main-min', get_stylesheet_directory_uri() . '/js/app.min.js', array(), false, true);
}
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
    ));
    
}

add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {

	// разрешаем новые типы
	$mimes['lottie']  = 'image/lottie';
	$mimes['json']  = 'script/json';
	//$mimes['woff'] = 'font/woff';
	//$mimes['fb2']  = 'text/xml';
	//$mimes['epub'] = 'application/epub+zip';

	// запрещаем (отключаем) имеющиеся
	// unset( $mimes['mp4a'] );

	return $mimes;
}