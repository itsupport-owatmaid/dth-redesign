<?php
/**
 * DTH CMS — Custom Post Type "จังหวัด" (dth_province)
 * จัดการรายชื่อประธานสภาคนพิการประจำจังหวัด ผ่านหลังบ้าน WordPress
 * ไม่ต้องใช้ปลั๊กอินเสริม (ใช้ meta box ในตัว)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once __DIR__ . '/provinces-seed.php';

/** ภูมิภาค: key => array(ชื่อแสดง, ไฟล์โปสเตอร์) */
function dth_regions() {
	return array(
		'north'   => array( 'label' => 'ภาคเหนือ',                       'poster' => 'Pic/provinces/north.png' ),
		'isan'    => array( 'label' => 'ภาคตะวันออกเฉียงเหนือ (อีสาน)', 'poster' => 'Pic/provinces/isan.png' ),
		'central' => array( 'label' => 'ภาคกลาง',                        'poster' => 'Pic/provinces/central.png' ),
		'south'   => array( 'label' => 'ภาคใต้',                         'poster' => 'Pic/provinces/south.png' ),
	);
}

/** ลงทะเบียน CPT */
add_action( 'init', function () {
	register_post_type( 'dth_province', array(
		'labels' => array(
			'name'          => 'จังหวัด',
			'singular_name' => 'จังหวัด',
			'add_new'       => 'เพิ่มจังหวัด',
			'add_new_item'  => 'เพิ่มจังหวัดใหม่',
			'edit_item'     => 'แก้ไขจังหวัด',
			'new_item'      => 'จังหวัดใหม่',
			'search_items'  => 'ค้นหาจังหวัด',
			'all_items'     => 'จังหวัดทั้งหมด',
			'menu_name'     => 'สภาฯ จังหวัด',
		),
		'public'        => false,
		'show_ui'       => true,
		'show_in_menu'  => true,
		'menu_icon'     => 'dashicons-location-alt',
		'menu_position' => 25,
		'supports'      => array( 'title' ),
		'capability_type' => 'post',
	) );
} );

/** Meta box */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_province_meta', 'ข้อมูลประธานสภาจังหวัด', 'dth_province_meta_box', 'dth_province', 'normal', 'high' );
} );

function dth_province_meta_box( $post ) {
	wp_nonce_field( 'dth_province_save', 'dth_province_nonce' );
	$region = get_post_meta( $post->ID, 'dth_region', true );
	$chair  = get_post_meta( $post->ID, 'dth_chair', true );
	$dtype  = get_post_meta( $post->ID, 'dth_dtype', true );
	$phone  = get_post_meta( $post->ID, 'dth_phone', true );
	$regions = dth_regions();
	echo '<style>.dthf{margin:12px 0}.dthf label{display:block;font-weight:600;margin-bottom:4px}.dthf input,.dthf select{width:100%;max-width:480px;padding:6px}</style>';
	echo '<p style="color:#666">หมายเหตุ: ชื่อจังหวัดให้กรอกในช่อง "ชื่อเรื่อง" ด้านบน</p>';
	echo '<div class="dthf"><label>ภูมิภาค</label><select name="dth_region">';
	foreach ( $regions as $k => $r ) {
		echo '<option value="' . esc_attr( $k ) . '"' . selected( $region, $k, false ) . '>' . esc_html( $r['label'] ) . '</option>';
	}
	echo '</select></div>';
	echo '<div class="dthf"><label>ชื่อประธานสภาจังหวัด</label><input type="text" name="dth_chair" value="' . esc_attr( $chair ) . '"></div>';
	echo '<div class="dthf"><label>ประเภทความพิการ</label><input type="text" name="dth_dtype" value="' . esc_attr( $dtype ) . '" placeholder="เช่น การได้ยิน, สายตา, เคลื่อนไหว"></div>';
	echo '<div class="dthf"><label>เบอร์โทร</label><input type="text" name="dth_phone" value="' . esc_attr( $phone ) . '" placeholder="0xx-xxxxxxx"></div>';
}

add_action( 'save_post_dth_province', function ( $post_id ) {
	if ( ! isset( $_POST['dth_province_nonce'] ) || ! wp_verify_nonce( $_POST['dth_province_nonce'], 'dth_province_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
	foreach ( array( 'dth_region', 'dth_chair', 'dth_dtype', 'dth_phone' ) as $f ) {
		if ( isset( $_POST[ $f ] ) ) {
			update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
		}
	}
} );

/** คอลัมน์ในหน้ารายการ */
add_filter( 'manage_dth_province_posts_columns', function ( $cols ) {
	$new = array();
	$new['cb']    = $cols['cb'];
	$new['title'] = 'จังหวัด';
	$new['region'] = 'ภูมิภาค';
	$new['chair']  = 'ประธาน';
	$new['dtype']  = 'ประเภทความพิการ';
	$new['phone']  = 'เบอร์โทร';
	return $new;
} );
add_action( 'manage_dth_province_posts_custom_column', function ( $col, $post_id ) {
	$regions = dth_regions();
	if ( 'region' === $col ) {
		$r = get_post_meta( $post_id, 'dth_region', true );
		echo esc_html( isset( $regions[ $r ] ) ? $regions[ $r ]['label'] : $r );
	} elseif ( 'chair' === $col ) {
		echo esc_html( get_post_meta( $post_id, 'dth_chair', true ) );
	} elseif ( 'dtype' === $col ) {
		echo esc_html( get_post_meta( $post_id, 'dth_dtype', true ) );
	} elseif ( 'phone' === $col ) {
		echo esc_html( get_post_meta( $post_id, 'dth_phone', true ) );
	}
}, 10, 2 );

/** ดึงจังหวัดทั้งหมด จัดกลุ่มตามภูมิภาค (เรียงตามลำดับที่สร้าง) */
function dth_get_provinces_grouped() {
	$out = array();
	foreach ( array_keys( dth_regions() ) as $k ) { $out[ $k ] = array(); }
	$q = new WP_Query( array(
		'post_type'      => 'dth_province',
		'posts_per_page' => -1,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'ASC' ),
		'no_found_rows'  => true,
	) );
	foreach ( $q->posts as $p ) {
		$r = get_post_meta( $p->ID, 'dth_region', true );
		if ( ! isset( $out[ $r ] ) ) { $r = 'central'; }
		$out[ $r ][] = array(
			'name'  => get_the_title( $p ),
			'chair' => get_post_meta( $p->ID, 'dth_chair', true ),
			'dtype' => get_post_meta( $p->ID, 'dth_dtype', true ),
			'phone' => get_post_meta( $p->ID, 'dth_phone', true ),
		);
	}
	wp_reset_postdata();
	return $out;
}

/** seed อัตโนมัติครั้งเดียว แม้ธีมจะเปิดใช้อยู่ก่อนแล้ว */
add_action( 'admin_init', function () {
	if ( get_option( 'dth_provinces_seeded' ) ) { return; }
	dth_seed_provinces();
	update_option( 'dth_provinces_seeded', 1 );
} );

/** Seed ข้อมูลจังหวัดครั้งแรก (ถ้ายังไม่มี) */
function dth_seed_provinces() {
	$existing = get_posts( array( 'post_type' => 'dth_province', 'posts_per_page' => 1, 'fields' => 'ids' ) );
	if ( ! empty( $existing ) ) { return; }
	$order = 0;
	foreach ( dth_province_seed_data() as $row ) {
		$id = wp_insert_post( array(
			'post_type'   => 'dth_province',
			'post_status' => 'publish',
			'post_title'  => $row['name'],
			'menu_order'  => $order++,
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			update_post_meta( $id, 'dth_region', $row['region'] );
			update_post_meta( $id, 'dth_chair', $row['chair'] );
			update_post_meta( $id, 'dth_dtype', $row['dtype'] );
			update_post_meta( $id, 'dth_phone', $row['phone'] );
		}
	}
}
