<?php
/**
 * Lightweight Theme functions and definitions
 *
 * @package LightweightTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Theme setup
add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', [
		'height'      => 64,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	] );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'custom-units' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'editor-color-palette', [
		[ 'name' => __( 'Primary', 'lightweight-theme' ), 'slug' => 'primary', 'color' => '#2A2A72' ],
		[ 'name' => __( 'Accent', 'lightweight-theme' ), 'slug' => 'accent', 'color' => '#FF6B6B' ],
		[ 'name' => __( 'Background', 'lightweight-theme' ), 'slug' => 'background', 'color' => '#F7F7FF' ],
		[ 'name' => __( 'Dark', 'lightweight-theme' ), 'slug' => 'dark', 'color' => '#22223B' ],
	] );

	// Register navigation menu
	register_nav_menus([
		'primary' => __( 'Primary Menu', 'lightweight-theme' ),
	]);
});

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'lightweight-theme-style', get_template_directory_uri() . '/build/css/style.min.css', [], $theme_version );
    wp_enqueue_script( 'lightweight-theme-scripts', get_template_directory_uri() . '/build/js/main.min.js', [], $theme_version, true );

    // Enqueue AOS CSS and JS from CDN
    wp_enqueue_style( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', [], '2.3.4' );
    wp_enqueue_script( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', [], '2.3.4', true );
}, 20 );

// Initialize AOS in the editor as well
add_action( 'enqueue_block_editor_assets', function () {
    wp_enqueue_style( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', [], '2.3.4' );
    wp_enqueue_script( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', [], '2.3.4', true );
} );

// Editor styles
add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style( 'lightweight-theme-editor', get_template_directory_uri() . '/build/css/editor-style.min.css', [], wp_get_theme()->get( 'Version' ) );
} );

// Modular block registration: auto-register all blocks in /blocks
add_action( 'init', function () {
	$blocks_dir = get_template_directory() . '/blocks';
	if ( is_dir( $blocks_dir ) ) {
		foreach ( glob( $blocks_dir . '/*/block.json' ) as $block_json ) {
			$block_dir = dirname( $block_json );
			register_block_type( $block_dir );
		}
	}
} );
