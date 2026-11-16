<?php
/**
 * CPT "เจ้าหน้าที่" (dth_staff) — เพิ่ม/แก้/ลบ ผ่านหลังบ้าน + shortcode [dth_staff]
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function dth_staff_seed_data() { return array(
		array('name'=>'นางสาวจรรยา บัวศร','pos'=>'ผู้อำนวยการสำนักงาน'),
		array('name'=>'นายรัตน์ กิจธรรม','pos'=>'ผู้อำนวยการฝ่ายต่างประเทศและขับเคลื่อนนโยบายสาธารณะ'),
		array('name'=>'นางสาวญาณิกา อักษรนำ','pos'=>'ผู้อำนวยการฝ่ายกิจการภูมิภาคและองค์กรท้องถิ่น'),
		array('name'=>'นางสาววาริสา ทรัพย์ประดิษฐ','pos'=>'ผู้อำนวยการฝ่ายวิจัยและพัฒนา'),
		array('name'=>'นางสาวศิริรัช ไชยรัตน์','pos'=>'หัวหน้าฝ่ายประสานงานส่วนกลาง'),
		array('name'=>'นางสาวรตินันท์ เมฆฉาย','pos'=>'ผู้ช่วยอำนวยการสำนักงานและกิจการภูมิภาค'),
		array('name'=>'นางสาวสวรรยา ปุนินานนท์','pos'=>'ผู้ช่วยฝ่ายประสานงานส่วนกลาง'),
		array('name'=>'นายสุนทร สุขชา','pos'=>'เจ้าหน้าที่ฝ่ายกฎหมาย'),
		array('name'=>'Mr. Nathaniel Ross','pos'=>'Law & Policy Officer'),
		array('name'=>'นางสาวปัณณรัตน์ อัคราสิริภัสร์','pos'=>'เจ้าหน้าที่ฝ่ายการเงิน'),
		array('name'=>'นางสาวเจนจิรา ไตรวรรณ์','pos'=>'เจ้าหน้าที่ฝ่ายสื่อสารสาธารณะ'),
		array('name'=>'นายโมทน์ อุเทนสุต','pos'=>'เจ้าหน้าที่ฝ่ายบริหารงานทั่วไป'),
	); }

/** ลงทะเบียน CPT */
add_action( 'init', function () {
	register_post_type( 'dth_staff', array(
		'labels' => array(
			'name' => 'เจ้าหน้าที่', 'singular_name' => 'เจ้าหน้าที่',
			'add_new' => 'เพิ่มเจ้าหน้าที่', 'add_new_item' => 'เพิ่มเจ้าหน้าที่ใหม่',
			'edit_item' => 'แก้ไขเจ้าหน้าที่', 'all_items' => 'เจ้าหน้าที่ทั้งหมด', 'menu_name' => 'เจ้าหน้าที่',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-groups',
		'menu_position' => 26, 'supports' => array( 'title', 'page-attributes' ),
	) );
} );

/** Meta box: ตำแหน่ง */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_staff_meta', 'ข้อมูลเจ้าหน้าที่', function ( $post ) {
		wp_nonce_field( 'dth_staff_save', 'dth_staff_nonce' );
		$pos = get_post_meta( $post->ID, 'dth_position', true );
		echo '<p style="color:#666">ชื่อ-นามสกุล กรอกในช่อง "ชื่อเรื่อง" ด้านบน · ลำดับการแสดงผลตั้งได้ในกล่อง "คุณลักษณะหน้า (ลำดับ)"</p>';
		echo '<p><label style="display:block;font-weight:600;margin-bottom:4px">ตำแหน่ง</label>';
		echo '<input type="text" name="dth_position" value="' . esc_attr( $pos ) . '" style="width:100%;max-width:560px;padding:6px"></p>';
	}, 'dth_staff', 'normal', 'high' );
} );
add_action( 'save_post_dth_staff', function ( $id ) {
	if ( ! isset( $_POST['dth_staff_nonce'] ) || ! wp_verify_nonce( $_POST['dth_staff_nonce'], 'dth_staff_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $id ) ) { return; }
	if ( isset( $_POST['dth_position'] ) ) { update_post_meta( $id, 'dth_position', sanitize_text_field( wp_unslash( $_POST['dth_position'] ) ) ); }
} );

/** คอลัมน์ */
add_filter( 'manage_dth_staff_posts_columns', function ( $c ) {
	return array( 'cb' => $c['cb'], 'title' => 'ชื่อ-นามสกุล', 'position' => 'ตำแหน่ง', 'order' => 'ลำดับ' );
} );
add_action( 'manage_dth_staff_posts_custom_column', function ( $col, $id ) {
	if ( 'position' === $col ) { echo esc_html( get_post_meta( $id, 'dth_position', true ) ); }
	elseif ( 'order' === $col ) { echo (int) get_post_field( 'menu_order', $id ); }
}, 10, 2 );

/** Shortcode [dth_staff] — ตารางเจ้าหน้าที่ */
add_shortcode( 'dth_staff', function () {
	$q = new WP_Query( array(
		'post_type' => 'dth_staff', 'posts_per_page' => -1,
		'orderby' => array( 'menu_order' => 'ASC', 'date' => 'ASC' ), 'no_found_rows' => true,
	) );
	if ( ! $q->have_posts() ) { return ''; }
	$out  = '<div class="table-wrap"><table class="board-table">';
	$out .= '<thead><tr><th scope="col">ที่</th><th scope="col">ชื่อ-นามสกุล</th><th scope="col">ตำแหน่ง</th></tr></thead><tbody>';
	$i = 0;
	foreach ( $q->posts as $p ) {
		$i++;
		$out .= '<tr><td>' . $i . '</td><td>' . esc_html( get_the_title( $p ) ) . '</td><td>' . esc_html( get_post_meta( $p->ID, 'dth_position', true ) ) . '</td></tr>';
	}
	wp_reset_postdata();
	$out .= '</tbody></table></div>';
	return $out;
} );

/** Seed ครั้งเดียว */
add_action( 'admin_init', function () {
	if ( get_option( 'dth_staff_seeded' ) ) { return; }
	$existing = get_posts( array( 'post_type' => 'dth_staff', 'posts_per_page' => 1, 'fields' => 'ids' ) );
	if ( empty( $existing ) ) {
		$o = 0;
		foreach ( dth_staff_seed_data() as $row ) {
			$id = wp_insert_post( array( 'post_type' => 'dth_staff', 'post_status' => 'publish', 'post_title' => $row['name'], 'menu_order' => $o++ ) );
			if ( $id && ! is_wp_error( $id ) ) { update_post_meta( $id, 'dth_position', $row['pos'] ); }
		}
	}
	update_option( 'dth_staff_seeded', 1 );
} );
