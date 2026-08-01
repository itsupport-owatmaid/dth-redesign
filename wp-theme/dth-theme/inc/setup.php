<?php
/**
 * Theme supports, menus, image sizes.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'dth_setup' );
/**
 * Register theme features.
 */
function dth_setup() {
	load_theme_textdomain( 'dth', DTH_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 120,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );

	register_nav_menus( array(
		'primary' => __( 'เมนูหลัก (แถบบนสุด)', 'dth' ),
		'footer'  => __( 'เมนูท้ายเว็บไซต์', 'dth' ),
	) );

	add_image_size( 'dth-card', 640, 420, true );
	add_image_size( 'dth-portrait', 420, 520, true );
	add_image_size( 'dth-hero', 1920, 900, true );
}

add_filter( 'excerpt_length', 'dth_excerpt_length' );
/**
 * Shorten excerpts to fit the card layout.
 *
 * @param int $length Default word count.
 * @return int
 */
function dth_excerpt_length( $length ) {
	return 28;
}

add_filter( 'excerpt_more', 'dth_excerpt_more' );
/**
 * Use an ellipsis instead of the default […] link.
 *
 * @return string
 */
function dth_excerpt_more() {
	return '…';
}

add_filter( 'body_class', 'dth_body_class' );
/**
 * Add a marker class so CSS can target the front page shell.
 *
 * @param array $classes Body classes.
 * @return array
 */
function dth_body_class( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'dth-front';
	}
	return $classes;
}

add_action( 'pre_get_posts', 'dth_archive_query' );
/**
 * Show all DTH content types on their archives, newest first.
 *
 * @param WP_Query $query Query being prepared.
 */
function dth_archive_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_post_type_archive( array( 'dth_person', 'dth_province', 'dth_partner' ) ) ) {
		$query->set( 'posts_per_page', -1 );
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
	}

	if ( $query->is_post_type_archive( array( 'dth_news', 'dth_media', 'dth_proposal' ) ) || $query->is_tax( array( 'dth_news_cat', 'dth_media_cat' ) ) ) {
		$query->set( 'posts_per_page', 12 );
	}
}
