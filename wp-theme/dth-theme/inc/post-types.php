<?php
/**
 * Custom post types and taxonomies — every editable content block on the site.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'dth_register_content_types' );
/**
 * Register all DTH post types and taxonomies.
 */
function dth_register_content_types() {
	foreach ( dth_post_type_args() as $slug => $args ) {
		register_post_type( $slug, $args );
	}
	foreach ( dth_taxonomy_args() as $slug => $tax ) {
		register_taxonomy( $slug, $tax['object_type'], $tax['args'] );
	}
}

/**
 * Definitions for every DTH post type.
 *
 * @return array<string,array>
 */
function dth_post_type_args() {
	$types = array(
		'dth_news'     => array(
			'singular'  => __( 'ข่าว/กิจกรรม', 'dth' ),
			'plural'    => __( 'ข่าวสารและกิจกรรม', 'dth' ),
			'slug'      => 'news',
			'icon'      => 'dashicons-megaphone',
			'position'  => 21,
			'supports'  => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
			'has_archive' => true,
		),
		'dth_media'    => array(
			'singular'  => __( 'สื่อ/เอกสาร', 'dth' ),
			'plural'    => __( 'คลังสื่อและเอกสาร', 'dth' ),
			'slug'      => 'media-library',
			'icon'      => 'dashicons-images-alt2',
			'position'  => 22,
			'supports'  => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			'has_archive' => true,
		),
		'dth_person'   => array(
			'singular'  => __( 'บุคลากร', 'dth' ),
			'plural'    => __( 'คณะกรรมการและเจ้าหน้าที่', 'dth' ),
			'slug'      => 'people',
			'icon'      => 'dashicons-groups',
			'position'  => 23,
			'supports'  => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive' => true,
		),
		'dth_province' => array(
			'singular'  => __( 'สภาฯ จังหวัด', 'dth' ),
			'plural'    => __( 'สภาฯ ประจำจังหวัด', 'dth' ),
			'slug'      => 'provinces',
			'icon'      => 'dashicons-location-alt',
			'position'  => 24,
			'supports'  => array( 'title', 'editor', 'page-attributes' ),
			'has_archive' => true,
		),
		'dth_proposal' => array(
			'singular'  => __( 'ข้อเสนอ', 'dth' ),
			'plural'    => __( 'ข้อเสนอเชิงนโยบาย', 'dth' ),
			'slug'      => 'proposals',
			'icon'      => 'dashicons-media-document',
			'position'  => 25,
			'supports'  => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive' => true,
		),
		'dth_slide'    => array(
			'singular'  => __( 'สไลด์หน้าแรก', 'dth' ),
			'plural'    => __( 'สไลด์หน้าแรก', 'dth' ),
			'slug'      => 'slide',
			'icon'      => 'dashicons-images-alt',
			'position'  => 26,
			'supports'  => array( 'title', 'thumbnail', 'page-attributes' ),
			'has_archive' => false,
			'public'    => false,
		),
		'dth_right'    => array(
			'singular'  => __( 'สิทธิคนพิการ', 'dth' ),
			'plural'    => __( 'สิทธิคนพิการ (แท็บหน้าแรก)', 'dth' ),
			'slug'      => 'rights',
			'icon'      => 'dashicons-universal-access',
			'position'  => 27,
			'supports'  => array( 'title', 'editor', 'page-attributes' ),
			'has_archive' => false,
		),
		'dth_faq'      => array(
			'singular'  => __( 'คำถามที่พบบ่อย', 'dth' ),
			'plural'    => __( 'คำถามที่พบบ่อย', 'dth' ),
			'slug'      => 'faq',
			'icon'      => 'dashicons-editor-help',
			'position'  => 28,
			'supports'  => array( 'title', 'editor', 'page-attributes' ),
			'has_archive' => false,
		),
		'dth_partner'  => array(
			'singular'  => __( 'องค์การ/เครือข่าย', 'dth' ),
			'plural'    => __( 'องค์การสมาชิกและเครือข่าย', 'dth' ),
			'slug'      => 'partners',
			'icon'      => 'dashicons-networking',
			'position'  => 29,
			'supports'  => array( 'title', 'thumbnail', 'page-attributes' ),
			'has_archive' => false,
		),
	);

	$args = array();
	foreach ( $types as $slug => $t ) {
		$public = isset( $t['public'] ) ? $t['public'] : true;

		$args[ $slug ] = array(
			'labels'             => dth_post_type_labels( $t['singular'], $t['plural'] ),
			'public'             => $public,
			'publicly_queryable' => $public,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => $public,
			'show_in_rest'       => true,
			'menu_icon'          => $t['icon'],
			'menu_position'      => $t['position'],
			'supports'           => $t['supports'],
			'has_archive'        => $t['has_archive'],
			'rewrite'            => $public ? array( 'slug' => $t['slug'], 'with_front' => false ) : false,
			'capability_type'    => 'post',
			'map_meta_cap'       => true,
		);
	}

	return $args;
}

/**
 * Build a full label set from a singular and plural name.
 *
 * @param string $singular Singular name.
 * @param string $plural   Plural name.
 * @return array
 */
function dth_post_type_labels( $singular, $plural ) {
	return array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'menu_name'          => $plural,
		'add_new'            => __( 'เพิ่มใหม่', 'dth' ),
		/* translators: %s: singular post type name. */
		'add_new_item'       => sprintf( __( 'เพิ่ม%s', 'dth' ), $singular ),
		/* translators: %s: singular post type name. */
		'edit_item'          => sprintf( __( 'แก้ไข%s', 'dth' ), $singular ),
		/* translators: %s: singular post type name. */
		'new_item'           => sprintf( __( '%sใหม่', 'dth' ), $singular ),
		/* translators: %s: singular post type name. */
		'view_item'          => sprintf( __( 'ดู%s', 'dth' ), $singular ),
		/* translators: %s: plural post type name. */
		'search_items'       => sprintf( __( 'ค้นหา%s', 'dth' ), $plural ),
		/* translators: %s: plural post type name. */
		'not_found'          => sprintf( __( 'ยังไม่มี%s', 'dth' ), $plural ),
		/* translators: %s: plural post type name. */
		'not_found_in_trash' => sprintf( __( 'ไม่มี%sในถังขยะ', 'dth' ), $plural ),
		'all_items'          => $plural,
		'featured_image'     => __( 'ภาพประกอบ', 'dth' ),
		'set_featured_image' => __( 'เลือกภาพประกอบ', 'dth' ),
	);
}

/**
 * Definitions for every DTH taxonomy.
 *
 * @return array<string,array>
 */
function dth_taxonomy_args() {
	$taxonomies = array(
		'dth_news_cat'     => array(
			'object_type' => array( 'dth_news' ),
			'singular'    => __( 'หมวดข่าว', 'dth' ),
			'plural'      => __( 'หมวดข่าว', 'dth' ),
			'slug'        => 'news-category',
		),
		'dth_media_cat'    => array(
			'object_type' => array( 'dth_media' ),
			'singular'    => __( 'หมวดสื่อ', 'dth' ),
			'plural'      => __( 'หมวดสื่อ', 'dth' ),
			'slug'        => 'media-category',
		),
		'dth_person_group' => array(
			'object_type' => array( 'dth_person' ),
			'singular'    => __( 'กลุ่มบุคลากร', 'dth' ),
			'plural'      => __( 'กลุ่มบุคลากร', 'dth' ),
			'slug'        => 'people-group',
		),
		'dth_region'       => array(
			'object_type' => array( 'dth_province' ),
			'singular'    => __( 'ภูมิภาค', 'dth' ),
			'plural'      => __( 'ภูมิภาค', 'dth' ),
			'slug'        => 'region',
		),
		'dth_partner_group' => array(
			'object_type' => array( 'dth_partner' ),
			'singular'    => __( 'กลุ่มเครือข่าย', 'dth' ),
			'plural'      => __( 'กลุ่มเครือข่าย', 'dth' ),
			'slug'        => 'partner-group',
		),
	);

	$args = array();
	foreach ( $taxonomies as $slug => $t ) {
		$args[ $slug ] = array(
			'object_type' => $t['object_type'],
			'args'        => array(
				'labels'            => array(
					'name'          => $t['plural'],
					'singular_name' => $t['singular'],
					'menu_name'     => $t['plural'],
					/* translators: %s: taxonomy singular name. */
					'add_new_item'  => sprintf( __( 'เพิ่ม%s', 'dth' ), $t['singular'] ),
					/* translators: %s: taxonomy singular name. */
					'edit_item'     => sprintf( __( 'แก้ไข%s', 'dth' ), $t['singular'] ),
					/* translators: %s: taxonomy plural name. */
					'search_items'  => sprintf( __( 'ค้นหา%s', 'dth' ), $t['plural'] ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'show_in_nav_menus' => true,
				'rewrite'           => array( 'slug' => $t['slug'], 'with_front' => false ),
			),
		);
	}

	return $args;
}

add_action( 'after_switch_theme', 'dth_flush_rewrites' );
/**
 * Register post types then flush rewrite rules once, on activation.
 */
function dth_flush_rewrites() {
	dth_register_content_types();
	flush_rewrite_rules();
}
