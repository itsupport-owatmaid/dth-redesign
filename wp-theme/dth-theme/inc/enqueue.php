<?php
/**
 * Front-end and admin assets.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'dth_enqueue_assets' );
/**
 * Load the design system stylesheet, webfonts and behaviour script.
 */
function dth_enqueue_assets() {
	wp_enqueue_style(
		'dth-fonts',
		'https://fonts.googleapis.com/css2?family=Anuphan:wght@400;500;600;700&family=Sarabun:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'dth-main', DTH_URI . '/assets/css/dth-v2.css', array( 'dth-fonts' ), DTH_VERSION );
	wp_enqueue_style( 'dth-style', get_stylesheet_uri(), array( 'dth-main' ), DTH_VERSION );

	wp_enqueue_script( 'dth-main', DTH_URI . '/assets/js/dth.js', array(), DTH_VERSION, true );
	wp_localize_script( 'dth-main', 'dthData', array(
		'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
		'nonce'        => wp_create_nonce( 'dth_contact' ),
		'slideSeconds' => (int) get_theme_mod( 'dth_slide_seconds', 5 ),
		'i18n'         => array(
			'slide'      => __( 'สไลด์', 'dth' ),
			'required'   => __( 'กรุณากรอกชื่อและข้อความ', 'dth' ),
			'sendFailed' => __( 'ส่งข้อความไม่สำเร็จ กรุณาลองใหม่อีกครั้ง หรือติดต่อทางโทรศัพท์', 'dth' ),
		),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'admin_enqueue_scripts', 'dth_admin_assets' );
/**
 * Media picker helper for the repeatable meta boxes.
 *
 * @param string $hook Current admin page.
 */
function dth_admin_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php', 'tools_page_dth-import' ), true ) ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'dth-admin', DTH_URI . '/assets/js/dth-admin.js', array( 'jquery' ), DTH_VERSION, true );
	wp_enqueue_style( 'dth-admin', DTH_URI . '/assets/css/dth-admin.css', array(), DTH_VERSION );
}
