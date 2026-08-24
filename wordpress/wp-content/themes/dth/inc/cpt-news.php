<?php
/**
 * CPT "ข่าวสาร" (dth_news) — เพิ่ม/แก้ ผ่านหลังบ้าน + shortcode [dth_news] (คงตัวกรองหมวดเดิม)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function dth_news_seed_data() { return array(
		array('title'=>'เผยแพร่ข้อบังคับสมาคมสภาคนพิการทุกประเภทฯ พ.ศ. 2560 (แก้ไขเพิ่มเติม 2565)','cat'=>'pr','badge'=>'ข่าวประชาสัมพันธ์','img'=>'','meta'=>'16-09-2567เผยแพร่ข้อบังคับสมาคมสภาคนพิการทุกประเภทฯ พ.ศ. 2560 (แก้ไขเพิ่มเติม 2565)','excerpt'=>'ดาวน์โหลดข้อบังคับสมาคมฉบับปรับปรุงล่าสุดได้แล้ว ทั้งรูปแบบ PDF และ Word','link'=>'https://dth.or.th/wp-content/uploads/2024/09/ข้อบังคับสภาคนพิการพ.ศ.25602565.pdf','emoji'=>'📄'),
		array('title'=>'การประชุมสมัชชาคนพิการแห่งชาติ','cat'=>'activity','badge'=>'กิจกรรม','img'=>'หน้าปกเว็บไซต์ประชุมสมัชชา-ยาว.png','meta'=>'ติดตามกำหนดการผ่านเพจการประชุมสมัชชาคนพิการแห่งชาติ','excerpt'=>'ร่วมขับเคลื่อนนโยบายและสิทธิคนพิการไปด้วยกัน ติดตามรายละเอียดกิจกรรมล่าสุดผ่าน Facebook ของสมาคม','link'=>'https://www.facebook.com/share/1Ez81X9Yjh/','emoji'=>'🤝'),
		array('title'=>'เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน','cat'=>'knowledge health','badge'=>'สุขภาพ','img'=>'279270879_1630628107293643_3234477952132787000_n-300x212.jpg','meta'=>'25-07-2565 · 2,877เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน','excerpt'=>'เส้นเลือดขอด อีกหนึ่งโรคยอดฮิตของวัยทำงาน เมื่อเกิดขึ้นแล้วจะทำให้มีอาการปวด จา…','link'=>'https://dth.or.th/knowledge/%e0%b9%80%e0%b8%aa%e0%b9%89%e0%b8%99%e0%b9%80%e0%b8%a5%e0%b8%b7%e0%b8%ad%e0%b8%94%e0%b8%82%e0%b8%ad%e0%b8%94/','emoji'=>'🩺'),
		array('title'=>'กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม','cat'=>'knowledge health','badge'=>'สุขภาพ','img'=>'กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม-300x212.jpg','meta'=>'25-07-2565 · 2,821กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม','excerpt'=>'กลุ่มไหนเสี่ยงมีภาวะข้อสะโพกเสื่อม ข้อสะโพกเป็นอวัยวะที่ใช้ในการช่วยพยุงและรับน้…','link'=>'https://dth.or.th/knowledge/%e0%b8%a0%e0%b8%b2%e0%b8%a7%e0%b8%b0%e0%b8%82%e0%b9%89%e0%b8%ad%e0%b8%aa%e0%b8%b0%e0%b9%82%e0%b8%9e%e0%b8%81%e0%b9%80%e0%b8%aa%e0%b8%b7%e0%b9%88%e0%b8%ad%e0%b8%a1/','emoji'=>'🦴'),
		array('title'=>'การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19','cat'=>'knowledge general','badge'=>'ทั่วไป','img'=>'289098221_586550159662695_1032763863887327249_n-300x225.jpg','meta'=>'05-07-2565 · 2,893การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19','excerpt'=>'การเข้าสังคมของบุคคลออทิสติก หลังสถานการณ์โควิด-19 อัษฎากรณ์ ขันตี …','link'=>'https://dth.or.th/knowledge/%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%80%e0%b8%82%e0%b9%89%e0%b8%b2%e0%b8%aa%e0%b8%b1%e0%b8%87%e0%b8%84%e0%b8%a1%e0%b8%82%e0%b8%ad%e0%b8%87%e0%b8%9a%e0%b8%b8%e0%b8%84%e0%b8%84%e0%b8%a5%e0%b8%ad%e0%b8%ad/','emoji'=>'🧩'),
		array('title'=>'เคยไหม? เวลาพบคนตาบอดจะข้ามถนน … อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร??','cat'=>'knowledge blind','badge'=>'สมาคมคนตาบอดฯ','img'=>'284793305_5424047971024873_3993741284349771105_n-1-300x200.jpg','meta'=>'05-07-2565 · 5,518เคยไหม? เวลาพบคนตาบอดจะข้ามถนน … อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร??','excerpt'=>'เคยไหม? เวลาพบคนตาบอดจะข้ามถนน … อยากจะช่วยแต่ไม่รู้ว่าจะทำอย่างไร?? การพ…','link'=>'https://dth.or.th/knowledge/https-web-facebook-com-tabodthai-photos-a-434572563305797-5424047981024872/','emoji'=>'🦯'),
		array('title'=>'45 สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ','cat'=>'knowledge general','badge'=>'ทั่วไป','img'=>'1-300x300.jpg','meta'=>'05-07-2565 · 19,90645 สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ','excerpt'=>'๔๕ สถานพยาบาลเอกชนที่สามารถออกเอกสารรับรองความพิการ (๑) โรงพยาบาลเพชรเวช เขตห้วย…','link'=>'https://dth.or.th/knowledge/45-%e0%b8%aa%e0%b8%96%e0%b8%b2%e0%b8%99%e0%b8%9e%e0%b8%a2%e0%b8%b2%e0%b8%9a%e0%b8%b2%e0%b8%a5%e0%b9%80%e0%b8%ad%e0%b8%81%e0%b8%8a%e0%b8%99/','emoji'=>'🏥'),
	); }

function dth_news_img_url( $img ) {
	if ( ! $img ) { return ''; }
	if ( preg_match( '#^https?://#', $img ) ) { return $img; }
	return get_template_directory_uri() . '/Pic/external/' . rawurlencode( $img );
}

add_action( 'init', function () {
	register_post_type( 'dth_news', array(
		'labels' => array(
			'name' => 'ข่าวสาร', 'singular_name' => 'ข่าว',
			'add_new' => 'เพิ่มข่าว', 'add_new_item' => 'เพิ่มข่าวใหม่',
			'edit_item' => 'แก้ไขข่าว', 'all_items' => 'ข่าวทั้งหมด', 'menu_name' => 'ข่าวสาร',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-megaphone',
		'menu_position' => 24, 'supports' => array( 'title', 'page-attributes' ),
	) );
} );

add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_news_meta', 'ข้อมูลข่าว', function ( $post ) {
		wp_nonce_field( 'dth_news_save', 'dth_news_nonce' );
		$f = array(
			'dth_cat'     => array( 'หมวด (คั่นด้วยเว้นวรรค): pr / activity / report / knowledge / knowledge health / knowledge general / knowledge blind', get_post_meta( $post->ID, 'dth_cat', true ) ),
			'dth_badge'   => array( 'ป้ายบนรูป (เช่น ข่าวประชาสัมพันธ์ / สุขภาพ)', get_post_meta( $post->ID, 'dth_badge', true ) ),
			'dth_img'     => array( 'รูปหน้าปก (ชื่อไฟล์ใน Pic/external หรือ URL เต็ม)', get_post_meta( $post->ID, 'dth_img', true ) ),
			'dth_emoji'   => array( 'อีโมจิสำรอง (ถ้าไม่มีรูป)', get_post_meta( $post->ID, 'dth_emoji', true ) ),
			'dth_meta'    => array( 'ข้อความวันที่/ยอดวิว (เช่น 16-09-2567)', get_post_meta( $post->ID, 'dth_meta', true ) ),
			'dth_link'    => array( 'ลิงก์เมื่อคลิก (URL)', get_post_meta( $post->ID, 'dth_link', true ) ),
		);
		echo '<p style="color:#666">ชื่อข่าว = ช่องชื่อเรื่องด้านบน · ลำดับ = กล่อง "คุณลักษณะหน้า"</p>';
		foreach ( $f as $k => $v ) {
			echo '<p><label style="display:block;font-weight:600;margin-bottom:3px">' . esc_html( $v[0] ) . '</label><input type="text" name="' . esc_attr( $k ) . '" value="' . esc_attr( $v[1] ) . '" style="width:100%;max-width:640px;padding:6px"></p>';
		}
		$ex = get_post_meta( $post->ID, 'dth_excerpt', true );
		echo '<p><label style="display:block;font-weight:600;margin-bottom:3px">คำโปรย</label><textarea name="dth_excerpt" rows="3" style="width:100%;max-width:640px;padding:6px">' . esc_textarea( $ex ) . '</textarea></p>';
	}, 'dth_news', 'normal', 'high' );
} );
add_action( 'save_post_dth_news', function ( $id ) {
	if ( ! isset( $_POST['dth_news_nonce'] ) || ! wp_verify_nonce( $_POST['dth_news_nonce'], 'dth_news_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $id ) ) { return; }
	foreach ( array( 'dth_cat', 'dth_badge', 'dth_img', 'dth_emoji', 'dth_meta', 'dth_link' ) as $k ) {
		if ( isset( $_POST[ $k ] ) ) { update_post_meta( $id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) ); }
	}
	if ( isset( $_POST['dth_excerpt'] ) ) { update_post_meta( $id, 'dth_excerpt', sanitize_textarea_field( wp_unslash( $_POST['dth_excerpt'] ) ) ); }
} );

add_filter( 'manage_dth_news_posts_columns', function ( $c ) {
	return array( 'cb' => $c['cb'], 'title' => 'หัวข้อข่าว', 'cat' => 'หมวด', 'order' => 'ลำดับ' );
} );
add_action( 'manage_dth_news_posts_custom_column', function ( $col, $id ) {
	if ( 'cat' === $col ) { echo esc_html( get_post_meta( $id, 'dth_cat', true ) ); }
	elseif ( 'order' === $col ) { echo (int) get_post_field( 'menu_order', $id ); }
}, 10, 2 );

add_shortcode( 'dth_news', function () {
	$q = new WP_Query( array( 'post_type' => 'dth_news', 'posts_per_page' => -1,
		'orderby' => array( 'menu_order' => 'ASC', 'date' => 'ASC' ), 'no_found_rows' => true ) );
	if ( ! $q->have_posts() ) { return ''; }
	$clock = '<svg class="im" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>';
	$out = '<div class="hub-grid" id="hubGrid">';
	foreach ( $q->posts as $p ) {
		$cat = get_post_meta( $p->ID, 'dth_cat', true ) ?: 'all';
		$link = get_post_meta( $p->ID, 'dth_link', true ) ?: '#';
		$badge = get_post_meta( $p->ID, 'dth_badge', true );
		$img = dth_news_img_url( get_post_meta( $p->ID, 'dth_img', true ) );
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
			. '<div class="body"><div class="meta">' . $clock . ' ' . esc_html( $meta ) . '</div><h3>' . esc_html( $title ) . '</h3><p>' . esc_html( $ex ) . '</p></div></a>';
	}
	wp_reset_postdata();
	return $out . '</div>';
} );

add_action( 'admin_init', function () {
	if ( get_option( 'dth_news_seeded' ) ) { return; }
	$ex = get_posts( array( 'post_type' => 'dth_news', 'posts_per_page' => 1, 'fields' => 'ids' ) );
	if ( empty( $ex ) ) { $o = 0;
		foreach ( dth_news_seed_data() as $row ) {
			$id = wp_insert_post( array( 'post_type' => 'dth_news', 'post_status' => 'publish', 'post_title' => $row['title'], 'menu_order' => $o++ ) );
			if ( $id && ! is_wp_error( $id ) ) {
				foreach ( array( 'cat', 'badge', 'img', 'meta', 'excerpt', 'link', 'emoji' ) as $k ) {
					update_post_meta( $id, 'dth_' . $k, $row[ $k ] );
				}
			}
		}
	}
	update_option( 'dth_news_seeded', 1 );
} );
