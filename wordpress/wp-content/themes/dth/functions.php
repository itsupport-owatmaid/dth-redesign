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

/**
 * ตั้งค่าอัตโนมัติเมื่อ "เปิดใช้ธีม"
 * - สร้างหน้าทั้ง 11 หน้า (ถ้ายังไม่มี) ด้วย slug ที่ตรงกับ page-*.php
 * - ตั้งหน้าแรกแบบ static ไปที่หน้า "home"
 * - ตั้ง permalink เป็น /%postname%/ เพื่อให้ /about/ /news/ ฯลฯ ทำงาน
 */
add_action( 'after_switch_theme', function () {
	$pages = array(
		'home'        => 'หน้าแรก',
		'about'       => 'เกี่ยวกับสมาคม',
		'staff'       => 'เจ้าหน้าที่สมาคม',
		'provinces'   => 'สภาฯ ประจำจังหวัด',
		'news'        => 'ข่าวสาร',
		'media'       => 'คลังสื่อ / อินโฟกราฟิก',
		'magazine'    => 'DTH Magazine',
		'proposals'   => 'ข้อเสนอเชิงนโยบาย',
		'regulations' => 'ข้อบังคับ/ระเบียบ',
		'sitemap'     => 'ผังเว็บไซต์',
		'development' => 'ขั้นตอนการพัฒนา',
	);

	$home_id = 0;
	foreach ( $pages as $slug => $title ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$id = $existing->ID;
		} else {
			$id = wp_insert_post( array(
				'post_type'    => 'page',
				'post_name'    => $slug,
				'post_title'   => $title,
				'post_status'  => 'publish',
				'post_content' => '',
			) );
		}
		if ( 'home' === $slug && $id && ! is_wp_error( $id ) ) {
			$home_id = $id;
		}
	}

	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	// เปิด permalink สวย + flush
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
} );
