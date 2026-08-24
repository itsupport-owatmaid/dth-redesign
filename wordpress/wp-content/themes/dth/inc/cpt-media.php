<?php
/**
 * CPT "คลังสื่อ/อินโฟกราฟิก" (dth_media) — shortcode [dth_media] (คงตัวกรองหมวดเดิม)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function dth_media_seed_data() { return array(
		array('title'=>'สิทธิของผู้ดูแลคนพิการ','cat'=>'rights','badge'=>'อินโฟกราฟิก','img'=>'Pic/external/275229039_1594676890888765_1550337596592218467_n-300x212.jpg','meta'=>'32,475สิทธิของผู้ดูแลคนพิการ','excerpt'=>'','link'=>'https://dth.or.th/infographic/','emoji'=>'&#127912;'),
		array('title'=>'ที่จอดรถคนพิการ','cat'=>'rights','badge'=>'อินโฟกราฟิก','img'=>'Pic/external/273556717_1580157409007380_985939727756942970_n-300x212.jpg','meta'=>'31,921ที่จอดรถคนพิการ','excerpt'=>'','link'=>'https://dth.or.th/infographic/','emoji'=>'&#127912;'),
		array('title'=>'สิทธิค่าโดยสารอัตราพิเศษในระบบขนส่งสาธารณะ','cat'=>'rights','badge'=>'อินโฟกราฟิก','img'=>'Pic/external/275194508_1594645250891929_4929658142830719063_n-300x212.jpg','meta'=>'28,924สิทธิค่าโดยสารอัตราพิเศษในระบบขนส่งสาธารณะ','excerpt'=>'','link'=>'https://dth.or.th/infographic/','emoji'=>'&#127912;'),
		array('title'=>'ช่วยเหลือทางกฎหมายแก่คนพิการ','cat'=>'law','badge'=>'อินโฟกราฟิก','img'=>'Pic/external/275425030_1598676160488838_995252658959268142_n-300x212.jpg','meta'=>'4,710ช่วยเหลือทางกฎหมายแก่คนพิการ','excerpt'=>'','link'=>'https://dth.or.th/infographic/','emoji'=>'&#127912;'),
		array('title'=>'การปรับสภาพบ้านสำหรับคนพิการ 7 ขั้นตอน','cat'=>'home','badge'=>'อินโฟกราฟิก','img'=>'Pic/infographic/home-mod-7steps.jpg','meta'=>'อินโฟกราฟิกการปรับสภาพบ้านสำหรับคนพิการ 7 ขั้นตอน','excerpt'=>'','link'=>'Pic/infographic/home-mod-7steps.jpg','emoji'=>'&#127912;'),
		array('title'=>'การปรับสภาพแวดล้อมที่อยู่อาศัยสำหรับคนพิการ','cat'=>'home','badge'=>'อินโฟกราฟิก','img'=>'Pic/infographic/home-environment-2567.jpg','meta'=>'อินโฟกราฟิกการปรับสภาพแวดล้อมที่อยู่อาศัยสำหรับคนพิการ','excerpt'=>'','link'=>'Pic/infographic/home-environment-2567.jpg','emoji'=>'&#127912;'),
		array('title'=>'DTH Magazine ฉบับที่ 14 — Colleague','cat'=>'magazine','badge'=>'วารสาร DTH','img'=>'','meta'=>'PDF · 13 MBDTH Magazine ฉบับที่ 14 — Colleague','excerpt'=>'','link'=>'Doc/magazine/dth-magazine-vol14.pdf','emoji'=>'📄'),
		array('title'=>'DTH Magazine ฉบับที่ 13 — Work Together Issue','cat'=>'magazine','badge'=>'วารสาร DTH','img'=>'','meta'=>'PDF · 4.2 MBDTH Magazine ฉบับที่ 13 — Work Together Issue','excerpt'=>'','link'=>'Doc/magazine/dth-magazine-vol13.pdf','emoji'=>'📄'),
	); }

/** แปลง path: http ไว้เดิม / Pic|Doc ในธีมเติม uri + encode ทีละส่วน */
function dth_media_url( $u ) {
	if ( ! $u ) { return ''; }
	if ( preg_match( '#^https?://#', $u ) ) { return $u; }
	$parts = array_map( 'rawurlencode', explode( '/', $u ) );
	return get_template_directory_uri() . '/' . implode( '/', $parts );
}

add_action( 'init', function () {
	register_post_type( 'dth_media', array(
		'labels' => array(
			'name' => 'คลังสื่อ', 'singular_name' => 'สื่อ',
			'add_new' => 'เพิ่มสื่อ', 'add_new_item' => 'เพิ่มสื่อใหม่',
			'edit_item' => 'แก้ไขสื่อ', 'all_items' => 'สื่อทั้งหมด', 'menu_name' => 'คลังสื่อ',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-images-alt2',
		'menu_position' => 28, 'supports' => array( 'title', 'page-attributes' ),
	) );
} );

add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_media_meta', 'ข้อมูลสื่อ', function ( $post ) {
		wp_nonce_field( 'dth_media_save', 'dth_media_nonce' );
		$f = array(
			'dth_cat'   => array( 'หมวด: rights / law / home / magazine', get_post_meta( $post->ID, 'dth_cat', true ) ),
			'dth_badge' => array( 'ป้ายบนรูป', get_post_meta( $post->ID, 'dth_badge', true ) ),
			'dth_img'   => array( 'รูปหน้าปก (Pic/... , Pic/external/... หรือ URL)', get_post_meta( $post->ID, 'dth_img', true ) ),
			'dth_emoji' => array( 'อีโมจิสำรอง', get_post_meta( $post->ID, 'dth_emoji', true ) ),
			'dth_meta'  => array( 'ข้อความวันที่/ประเภท', get_post_meta( $post->ID, 'dth_meta', true ) ),
			'dth_link'  => array( 'ลิงก์เมื่อคลิก (Doc/... หรือ URL)', get_post_meta( $post->ID, 'dth_link', true ) ),
		);
		echo '<p style="color:#666">ชื่อสื่อ = ช่องชื่อเรื่องด้านบน · ลำดับ = กล่อง "คุณลักษณะหน้า"</p>';
		foreach ( $f as $k => $v ) {
			echo '<p><label style="display:block;font-weight:600;margin-bottom:3px">' . esc_html( $v[0] ) . '</label><input type="text" name="' . esc_attr( $k ) . '" value="' . esc_attr( $v[1] ) . '" style="width:100%;max-width:640px;padding:6px"></p>';
		}
		echo '<p><label style="display:block;font-weight:600;margin-bottom:3px">คำโปรย</label><textarea name="dth_excerpt" rows="3" style="width:100%;max-width:640px;padding:6px">' . esc_textarea( get_post_meta( $post->ID, 'dth_excerpt', true ) ) . '</textarea></p>';
	}, 'dth_media', 'normal', 'high' );
} );
add_action( 'save_post_dth_media', function ( $id ) {
	if ( ! isset( $_POST['dth_media_nonce'] ) || ! wp_verify_nonce( $_POST['dth_media_nonce'], 'dth_media_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $id ) ) { return; }
	foreach ( array( 'dth_cat', 'dth_badge', 'dth_img', 'dth_emoji', 'dth_meta', 'dth_link' ) as $k ) {
		if ( isset( $_POST[ $k ] ) ) { update_post_meta( $id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) ); }
	}
	if ( isset( $_POST['dth_excerpt'] ) ) { update_post_meta( $id, 'dth_excerpt', sanitize_textarea_field( wp_unslash( $_POST['dth_excerpt'] ) ) ); }
} );

add_filter( 'manage_dth_media_posts_columns', function ( $c ) {
	return array( 'cb' => $c['cb'], 'title' => 'ชื่อสื่อ', 'cat' => 'หมวด', 'order' => 'ลำดับ' );
} );
add_action( 'manage_dth_media_posts_custom_column', function ( $col, $id ) {
	if ( 'cat' === $col ) { echo esc_html( get_post_meta( $id, 'dth_cat', true ) ); }
	elseif ( 'order' === $col ) { echo (int) get_post_field( 'menu_order', $id ); }
}, 10, 2 );

add_shortcode( 'dth_media', function () {
	$q = new WP_Query( array( 'post_type' => 'dth_media', 'posts_per_page' => -1,
		'orderby' => array( 'menu_order' => 'ASC', 'date' => 'ASC' ), 'no_found_rows' => true ) );
	if ( ! $q->have_posts() ) { return ''; }
	$out = '<div class="hub-grid" id="hubGrid">';
	foreach ( $q->posts as $p ) {
		$cat = get_post_meta( $p->ID, 'dth_cat', true ) ?: 'all';
		$link = dth_media_url( get_post_meta( $p->ID, 'dth_link', true ) ) ?: '#';
		$badge = get_post_meta( $p->ID, 'dth_badge', true );
		$img = dth_media_url( get_post_meta( $p->ID, 'dth_img', true ) );
		$emoji = get_post_meta( $p->ID, 'dth_emoji', true ) ?: '📄';
		$meta = get_post_meta( $p->ID, 'dth_meta', true );
		$title = get_the_title( $p );
		$ex = get_post_meta( $p->ID, 'dth_excerpt', true );
		$thumb = '<span class="mtype">' . esc_html( $badge ) . '</span>';
		if ( $img ) {
			$thumb .= '<img src="' . esc_url( $img ) . '" alt="' . esc_attr( $title ) . '" loading="lazy" onerror="this.parentElement.classList.add(\'ph\');this.parentElement.innerHTML=\'' . esc_js( $emoji ) . '\'">';
		} else {
			$thumb .= '<div class="ph" style="display:grid;place-items:center;font-size:3rem;width:100%;height:100%">' . esc_html( $emoji ) . '</div>';
		}
		$out .= '<a class="card hub-card" data-cat="' . esc_attr( $cat ) . '" href="' . esc_url( $link ) . '" target="_blank" rel="noopener">'
			. '<div class="thumb">' . $thumb . '</div>'
			. '<div class="body"><div class="meta">' . esc_html( $meta ) . '</div><h3>' . esc_html( $title ) . '</h3><p>' . esc_html( $ex ) . '</p></div></a>';
	}
	wp_reset_postdata();
	return $out . '</div>';
} );

add_action( 'admin_init', function () {
	if ( get_option( 'dth_media_seeded' ) ) { return; }
	$ex = get_posts( array( 'post_type' => 'dth_media', 'posts_per_page' => 1, 'fields' => 'ids' ) );
	if ( empty( $ex ) ) { $o = 0;
		foreach ( dth_media_seed_data() as $row ) {
			$id = wp_insert_post( array( 'post_type' => 'dth_media', 'post_status' => 'publish', 'post_title' => $row['title'], 'menu_order' => $o++ ) );
			if ( $id && ! is_wp_error( $id ) ) {
				foreach ( array( 'cat', 'badge', 'img', 'meta', 'excerpt', 'link', 'emoji' ) as $k ) {
					update_post_meta( $id, 'dth_' . $k, $row[ $k ] );
				}
			}
		}
	}
	update_option( 'dth_media_seeded', 1 );
} );
