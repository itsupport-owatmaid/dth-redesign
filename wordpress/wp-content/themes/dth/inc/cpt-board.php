<?php
/**
 * CPT "กรรมการ" (dth_board) — ผู้บริหาร/กรรมการ · shortcode [dth_board_cards] (การ์ดผู้บริหารมีรูป) และ [dth_board_table] (ตารางกรรมการทั้งหมด)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function dth_board_seed_data() { return array(
		array('name'=>'นายวิทยุต บุนนาค','pos'=>'นายกสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย/ประธานฝ่ายศิลปะ วัฒนธรรม และภาษา','photo'=>'board-witthayut.png'),
		array('name'=>'นายเอกกมล แพทยานันท์','pos'=>'อุปนายก คนที่ 1/เหรัญญิก/ประธานฝ่ายต่างประเทศและขับเคลื่อนนโยบายสาธารณะ','photo'=>'board-ekkamon.png'),
		array('name'=>'นายสุชาติ โอวาทวรรณสกุล','pos'=>'อุปนายก คนที่ 2','photo'=>'board-suchart.png'),
		array('name'=>'นายชูศักดิ์ จันทยานนท์','pos'=>'อุปนายก คนที่ 3/เลขาธิการ/ประธานฝ่ายวิสาหกิจเพื่อสังคม','photo'=>'board-choosak.png'),
		array('name'=>'นางนุชจารี คล้ายสุวรรณ','pos'=>'อุปนายก คนที่ 4/ปฏิคม','photo'=>'board-nutcharee.png'),
		array('name'=>'นายศุภชีพ ดิษเทศ','pos'=>'อุปนายก คนที่ 5/นายทะเบียน','photo'=>'board-suphachip.png'),
		array('name'=>'นางกัณฐมณี พฤกษะวัน','pos'=>'กรรมการ/ประธานฝ่ายประชาสัมพันธ์และสื่อสารองค์กร','photo'=>''),
		array('name'=>'นายกิตติพงษ์ หาดทวายกาญจน์','pos'=>'กรรมการ/ประธานฝ่ายการท่องเที่ยวและกีฬา','photo'=>''),
		array('name'=>'นายชัชชัย วิจิตรจรรยา','pos'=>'กรรมการ/ประธานฝ่ายเทคโนโลยีสารสนเทศและการสื่อสาร','photo'=>''),
		array('name'=>'นางสาวญาณี ชีวะเจริญ','pos'=>'กรรมการ/ประธานฝ่ายจิตอาสาและพัฒนาศักยภาพ','photo'=>''),
		array('name'=>'นายเทวพงษ์ พวงเพชร','pos'=>'กรรมการ/ประธานฝ่ายส่งเสริมและพัฒนาผู้นำคนพิการ','photo'=>''),
		array('name'=>'นายปราโมทย์ ธรรมสโรช','pos'=>'กรรมการ/ประธานฝ่ายการศึกษา','photo'=>''),
		array('name'=>'นายพลทร ขุนสะอาด','pos'=>'กรรมการ/ประธานฝ่ายเด็กและเยาวชน','photo'=>''),
		array('name'=>'นายภัทรพันธุ์ กฤษณา','pos'=>'กรรมการ/ประธานฝ่ายสิ่งอำนวยความสะดวกสำหรับคนพิการ','photo'=>''),
		array('name'=>'นางวาสนา สำลีรัตน์','pos'=>'กรรมการ/ประธานฝ่ายสวัสดิการ','photo'=>''),
		array('name'=>'นายสมชาย ปัญญ์เอกวงศ์','pos'=>'กรรมการ/ประธานฝ่ายกฎหมายและสิทธิมนุษยชน','photo'=>''),
		array('name'=>'นายสุบิน แบขุนทด','pos'=>'กรรมการ/ประธานฝ่ายส่งเสริมอาชีพและการจ้างงาน','photo'=>''),
		array('name'=>'นางสาวอรุณวดี ลิ้มอังกูร','pos'=>'กรรมการ/ประธานฝ่ายการแพทย์','photo'=>''),
		array('name'=>'นางอรุณี ลิ้มมณี','pos'=>'กรรมการ/ประธานฝ่ายสตรีและกลุ่มเป้าหมายพิเศษ','photo'=>''),
		array('name'=>'นางกัญญาวีร์ แขวงโสภา','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางสาวกิจจาพร ชื่นบุญ','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางสาวฐิติพร พริ้งเพลิด','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางฑิฆัมพร บุญศรี','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางณัชชา กู้สุจริต','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางสาวปรียาพรรณ มีษา','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางสาวพัตสุณี สุรินทร์','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นายภักดี พิกุลหอม','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นางวันเพ็ญ นิภานันท์','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นายสามารถ ห้องกระจก','pos'=>'กรรมการ','photo'=>''),
		array('name'=>'นายสุรเชษฐ์ คำนวล','pos'=>'กรรมการ','photo'=>''),
	); }

function dth_board_photo_url( $photo ) {
	if ( ! $photo ) { return ''; }
	if ( preg_match( '#^https?://#', $photo ) ) { return $photo; }
	return get_template_directory_uri() . '/Pic/' . rawurlencode( 'รูปนายก' ) . '/cut/' . $photo;
}

add_action( 'init', function () {
	register_post_type( 'dth_board', array(
		'labels' => array(
			'name' => 'กรรมการ', 'singular_name' => 'กรรมการ',
			'add_new' => 'เพิ่มกรรมการ', 'add_new_item' => 'เพิ่มกรรมการใหม่',
			'edit_item' => 'แก้ไขกรรมการ', 'all_items' => 'กรรมการทั้งหมด', 'menu_name' => 'กรรมการ',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-businessperson',
		'menu_position' => 27, 'supports' => array( 'title', 'page-attributes' ),
	) );
} );

add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_board_meta', 'ข้อมูลกรรมการ', function ( $post ) {
		wp_nonce_field( 'dth_board_save', 'dth_board_nonce' );
		$pos = get_post_meta( $post->ID, 'dth_position', true );
		$photo = get_post_meta( $post->ID, 'dth_photo', true );
		echo '<p style="color:#666">ชื่อ = ช่องชื่อเรื่องด้านบน · ลำดับ = กล่อง "คุณลักษณะหน้า"</p>';
		echo '<p><label style="display:block;font-weight:600">ตำแหน่ง</label><input type="text" name="dth_position" value="' . esc_attr( $pos ) . '" style="width:100%;max-width:560px;padding:6px"></p>';
		echo '<p><label style="display:block;font-weight:600">รูป (ชื่อไฟล์ในธีม หรือ URL เต็ม) — เว้นว่างได้ถ้าไม่โชว์การ์ดรูป</label><input type="text" name="dth_photo" value="' . esc_attr( $photo ) . '" style="width:100%;max-width:560px;padding:6px" placeholder="board-xxx.png หรือ https://..."></p>';
	}, 'dth_board', 'normal', 'high' );
} );
add_action( 'save_post_dth_board', function ( $id ) {
	if ( ! isset( $_POST['dth_board_nonce'] ) || ! wp_verify_nonce( $_POST['dth_board_nonce'], 'dth_board_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $id ) ) { return; }
	foreach ( array( 'dth_position', 'dth_photo' ) as $f ) {
		if ( isset( $_POST[ $f ] ) ) { update_post_meta( $id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) ); }
	}
} );

add_filter( 'manage_dth_board_posts_columns', function ( $c ) {
	return array( 'cb' => $c['cb'], 'title' => 'ชื่อ-นามสกุล', 'position' => 'ตำแหน่ง', 'photo' => 'รูป', 'order' => 'ลำดับ' );
} );
add_action( 'manage_dth_board_posts_custom_column', function ( $col, $id ) {
	if ( 'position' === $col ) { echo esc_html( get_post_meta( $id, 'dth_position', true ) ); }
	elseif ( 'photo' === $col ) { echo get_post_meta( $id, 'dth_photo', true ) ? '✓' : '—'; }
	elseif ( 'order' === $col ) { echo (int) get_post_field( 'menu_order', $id ); }
}, 10, 2 );

function dth_board_query() {
	return new WP_Query( array( 'post_type' => 'dth_board', 'posts_per_page' => -1,
		'orderby' => array( 'menu_order' => 'ASC', 'date' => 'ASC' ), 'no_found_rows' => true ) );
}

/** การ์ดผู้บริหาร (เฉพาะที่มีรูป) */
add_shortcode( 'dth_board_cards', function () {
	$q = dth_board_query(); if ( ! $q->have_posts() ) { return ''; }
	$out = '<div class="board-grid">';
	foreach ( $q->posts as $p ) {
		$photo = get_post_meta( $p->ID, 'dth_photo', true );
		if ( ! $photo ) { continue; }
		$url = dth_board_photo_url( $photo );
		$out .= '<figure class="board-card"><img src="' . esc_url( $url ) . '" alt="' . esc_attr( get_the_title( $p ) ) . '" loading="lazy" onerror="this.style.display=\'none\'"><figcaption><strong>' . esc_html( get_the_title( $p ) ) . '</strong><span>' . esc_html( get_post_meta( $p->ID, 'dth_position', true ) ) . '</span></figcaption></figure>';
	}
	wp_reset_postdata();
	return $out . '</div>';
} );

/** ตารางกรรมการทั้งหมด */
add_shortcode( 'dth_board_table', function () {
	$q = dth_board_query(); if ( ! $q->have_posts() ) { return ''; }
	$out = '<div class="table-wrap"><table class="board-table"><thead><tr><th scope="col">ที่</th><th scope="col">ชื่อ-นามสกุล</th><th scope="col">ตำแหน่ง</th></tr></thead><tbody>';
	$i = 0;
	foreach ( $q->posts as $p ) { $i++;
		$out .= '<tr><td>' . $i . '</td><td>' . esc_html( get_the_title( $p ) ) . '</td><td>' . esc_html( get_post_meta( $p->ID, 'dth_position', true ) ) . '</td></tr>';
	}
	wp_reset_postdata();
	return $out . '</tbody></table></div>';
} );

add_action( 'admin_init', function () {
	if ( get_option( 'dth_board_seeded' ) ) { return; }
	$ex = get_posts( array( 'post_type' => 'dth_board', 'posts_per_page' => 1, 'fields' => 'ids' ) );
	if ( empty( $ex ) ) { $o = 0;
		foreach ( dth_board_seed_data() as $row ) {
			$id = wp_insert_post( array( 'post_type' => 'dth_board', 'post_status' => 'publish', 'post_title' => $row['name'], 'menu_order' => $o++ ) );
			if ( $id && ! is_wp_error( $id ) ) {
				update_post_meta( $id, 'dth_position', $row['pos'] );
				if ( $row['photo'] ) { update_post_meta( $id, 'dth_photo', $row['photo'] ); }
			}
		}
	}
	update_option( 'dth_board_seeded', 1 );
} );
