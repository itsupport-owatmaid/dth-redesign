<?php
/**
 * DTH theme functions
 * คงพฤติกรรมเว็บ static เดิม: โหลดฟอนต์ Google + dth-v2.css
 * โครงสร้าง markup/JS ของแต่ละหน้าอยู่ใน front-page.php และ page-*.php
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'DTH_URI', get_template_directory_uri() );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
	// ฟอนต์เดิม (Anuphan + Sarabun)
	wp_enqueue_style(
		'dth-fonts',
		'https://fonts.googleapis.com/css2?family=Anuphan:wght@400;500;600;700&family=Sarabun:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);
	// สไตล์หลักของเว็บ DTH
	wp_enqueue_style( 'dth-main', DTH_URI . '/dth-v2.css', array(), '3' );
} );
