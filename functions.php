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
});

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', function () {
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'lightweight-theme-style', get_stylesheet_uri(), [], $theme_version );
	wp_enqueue_script( 'lightweight-theme-scripts', get_template_directory_uri() . '/assets/js/main.js', [], $theme_version, true );
} );

// Editor styles
add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style( 'lightweight-theme-editor', get_template_directory_uri() . '/assets/css/editor-style.css', [], wp_get_theme()->get( 'Version' ) );
} );
