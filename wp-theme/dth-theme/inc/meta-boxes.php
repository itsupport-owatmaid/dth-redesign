<?php
/**
 * Editable fields for each DTH post type. Plain core meta boxes — no plugin required.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

/**
 * Field definitions keyed by post type.
 *
 * Supported types: text, url, textarea, lines (one item per line), file (media picker),
 * pairs (one "ป้ายกำกับ | ค่า" per line).
 *
 * @return array<string,array>
 */
function dth_meta_fields() {
	return array(
		'dth_news'     => array(
			'title'  => __( 'รายละเอียดข่าว', 'dth' ),
			'fields' => array(
				'dth_external_url' => array( 'label' => __( 'ลิงก์บทความฉบับเต็ม', 'dth' ), 'type' => 'url', 'desc' => __( 'ใส่เมื่อบทความอยู่บนเว็บอื่น เช่น dth.or.th — เว้นว่างไว้ถ้าต้องการให้เปิดอ่านในเว็บนี้', 'dth' ) ),
				'dth_date_label'   => array( 'label' => __( 'ข้อความวันที่', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น 16-09-2567 หรือ "ติดตามกำหนดการผ่านเพจ" — เว้นว่างไว้จะใช้วันที่เผยแพร่อัตโนมัติ', 'dth' ) ),
				'dth_views'        => array( 'label' => __( 'ยอดเข้าชม', 'dth' ), 'type' => 'text', 'desc' => __( 'ตัวเลขที่จะแสดงคู่กับไอคอนรูปตา เว้นว่างได้', 'dth' ) ),
			),
		),
		'dth_media'    => array(
			'title'  => __( 'รายละเอียดสื่อ/เอกสาร', 'dth' ),
			'fields' => array(
				'dth_file'         => array( 'label' => __( 'ไฟล์เอกสาร (PDF)', 'dth' ), 'type' => 'file', 'desc' => __( 'อัปโหลดหรือเลือกไฟล์จากคลังสื่อ', 'dth' ) ),
				'dth_external_url' => array( 'label' => __( 'ลิงก์ภายนอก', 'dth' ), 'type' => 'url', 'desc' => __( 'ใช้แทนไฟล์ ถ้าสื่ออยู่บนเว็บอื่น', 'dth' ) ),
				'dth_meta_label'   => array( 'label' => __( 'ข้อความใต้ชื่อเรื่อง', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น "24 ธันวาคม 2568 · PDF · 426 KB"', 'dth' ) ),
				'dth_views'        => array( 'label' => __( 'ยอดเข้าชม', 'dth' ), 'type' => 'text' ),
			),
		),
		'dth_person'   => array(
			'title'  => __( 'ข้อมูลบุคลากร', 'dth' ),
			'fields' => array(
				'dth_position' => array( 'label' => __( 'ตำแหน่ง', 'dth' ), 'type' => 'textarea', 'desc' => __( 'เช่น "อุปนายก คนที่ 1/เหรัญญิก/ประธานฝ่ายต่างประเทศ"', 'dth' ) ),
				'dth_phone'    => array( 'label' => __( 'เบอร์โทร', 'dth' ), 'type' => 'text' ),
			),
		),
		'dth_province' => array(
			'title'  => __( 'ข้อมูลสภาฯ จังหวัด', 'dth' ),
			'fields' => array(
				'dth_chair'      => array( 'label' => __( 'ชื่อประธานสภาจังหวัด', 'dth' ), 'type' => 'text' ),
				'dth_disability' => array( 'label' => __( 'ประเภทความพิการ', 'dth' ), 'type' => 'text' ),
				'dth_phone'      => array( 'label' => __( 'เบอร์โทร', 'dth' ), 'type' => 'text' ),
			),
		),
		'dth_proposal' => array(
			'title'  => __( 'รายละเอียดข้อเสนอ', 'dth' ),
			'fields' => array(
				'dth_file'       => array( 'label' => __( 'ไฟล์ PDF', 'dth' ), 'type' => 'file' ),
				'dth_meta_label' => array( 'label' => __( 'ข้อความใต้ชื่อเรื่อง', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น "24 ธันวาคม 2568 · PDF · 426 KB · ดาวน์โหลด"', 'dth' ) ),
				'dth_gallery'    => array( 'label' => __( 'ภาพประกอบเพิ่มเติม', 'dth' ), 'type' => 'gallery', 'desc' => __( 'เลือกได้หลายภาพ จะแสดงเป็นตารางใต้ปุ่มดาวน์โหลด', 'dth' ) ),
			),
		),
		'dth_slide'    => array(
			'title'  => __( 'ข้อความบนสไลด์', 'dth' ),
			'fields' => array(
				'dth_tag'      => array( 'label' => __( 'ป้ายกำกับ', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น "ยินดีต้อนรับ"', 'dth' ) ),
				'dth_subtitle' => array( 'label' => __( 'คำอธิบายใต้หัวข้อ', 'dth' ), 'type' => 'textarea' ),
				'dth_link'     => array( 'label' => __( 'ลิงก์เมื่อคลิกสไลด์', 'dth' ), 'type' => 'url' ),
			),
		),
		'dth_right'    => array(
			'title'  => __( 'เนื้อหาแท็บสิทธิ', 'dth' ),
			'fields' => array(
				'dth_kicker'     => array( 'label' => __( 'ป้ายหมวด', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น "เอกสารสำคัญ" "สวัสดิการ"', 'dth' ) ),
				'dth_tab_label'  => array( 'label' => __( 'ข้อความบนปุ่มแท็บ', 'dth' ), 'type' => 'text', 'desc' => __( 'เว้นว่างไว้จะใช้ชื่อเรื่อง', 'dth' ) ),
				'dth_bullets'    => array( 'label' => __( 'รายการหัวข้อย่อย', 'dth' ), 'type' => 'lines', 'desc' => __( 'พิมพ์บรรทัดละ 1 หัวข้อ', 'dth' ) ),
				'dth_cta_label'  => array( 'label' => __( 'ข้อความปุ่ม', 'dth' ), 'type' => 'text' ),
				'dth_cta_url'    => array( 'label' => __( 'ลิงก์ปุ่ม', 'dth' ), 'type' => 'url' ),
				'dth_card_badge' => array( 'label' => __( 'ป้ายบนการ์ดข้าง', 'dth' ), 'type' => 'text', 'desc' => __( 'เช่น "ข้อมูลอ้างอิง"', 'dth' ) ),
				'dth_card_title' => array( 'label' => __( 'หัวข้อการ์ดข้าง', 'dth' ), 'type' => 'text' ),
				'dth_pairs'      => array( 'label' => __( 'ตารางข้อมูลในการ์ดข้าง', 'dth' ), 'type' => 'pairs', 'desc' => __( 'พิมพ์บรรทัดละ 1 แถว รูปแบบ  ป้ายกำกับ | ค่า  เช่น  อายุบัตร | 8 ปี', 'dth' ) ),
			),
		),
		'dth_faq'      => array(
			'title'  => __( 'ปลายทางคำถาม', 'dth' ),
			'fields' => array(
				'dth_link' => array( 'label' => __( 'ลิงก์คำตอบ', 'dth' ), 'type' => 'url', 'desc' => __( 'เว้นว่างไว้จะเปิดหน้าคำตอบในเว็บนี้', 'dth' ) ),
			),
		),
		'dth_partner'  => array(
			'title'  => __( 'ข้อมูลองค์การ', 'dth' ),
			'fields' => array(
				'dth_link' => array( 'label' => __( 'ลิงก์เว็บไซต์/เพจ', 'dth' ), 'type' => 'url' ),
			),
		),
	);
}

add_action( 'add_meta_boxes', 'dth_add_meta_boxes' );
/**
 * Attach the field group to each post type that defines one.
 */
function dth_add_meta_boxes() {
	foreach ( dth_meta_fields() as $post_type => $group ) {
		add_meta_box( 'dth-fields', $group['title'], 'dth_render_meta_box', $post_type, 'normal', 'high' );
	}
}

/**
 * Render the field group for the post being edited.
 *
 * @param WP_Post $post Current post.
 */
function dth_render_meta_box( $post ) {
	$groups = dth_meta_fields();
	if ( empty( $groups[ $post->post_type ] ) ) {
		return;
	}

	wp_nonce_field( 'dth_save_meta', 'dth_meta_nonce' );

	echo '<div class="dth-fields">';
	foreach ( $groups[ $post->post_type ]['fields'] as $key => $field ) {
		$value = get_post_meta( $post->ID, $key, true );
		printf( '<p class="dth-field"><label for="%1$s"><strong>%2$s</strong></label><br>', esc_attr( $key ), esc_html( $field['label'] ) );

		switch ( $field['type'] ) {
			case 'textarea':
			case 'lines':
			case 'pairs':
				printf(
					'<textarea id="%1$s" name="%1$s" rows="%2$d" class="widefat">%3$s</textarea>',
					esc_attr( $key ),
					'textarea' === $field['type'] ? 3 : 5,
					esc_textarea( $value )
				);
				break;

			case 'file':
				printf(
					'<span class="dth-media"><input type="url" id="%1$s" name="%1$s" value="%2$s" class="widefat dth-media-input"> <button type="button" class="button dth-media-pick" data-target="%1$s">%3$s</button></span>',
					esc_attr( $key ),
					esc_attr( $value ),
					esc_html__( 'เลือกจากคลังสื่อ', 'dth' )
				);
				break;

			case 'gallery':
				printf(
					'<span class="dth-media"><input type="text" id="%1$s" name="%1$s" value="%2$s" class="widefat dth-media-input"> <button type="button" class="button dth-media-pick" data-target="%1$s" data-multiple="1">%3$s</button></span>',
					esc_attr( $key ),
					esc_attr( $value ),
					esc_html__( 'เลือกหลายภาพ', 'dth' )
				);
				break;

			case 'url':
				printf( '<input type="url" id="%1$s" name="%1$s" value="%2$s" class="widefat">', esc_attr( $key ), esc_attr( $value ) );
				break;

			default:
				printf( '<input type="text" id="%1$s" name="%1$s" value="%2$s" class="widefat">', esc_attr( $key ), esc_attr( $value ) );
		}

		if ( ! empty( $field['desc'] ) ) {
			printf( '<br><span class="description">%s</span>', esc_html( $field['desc'] ) );
		}
		echo '</p>';
	}
	echo '</div>';
}

add_action( 'save_post', 'dth_save_meta', 10, 2 );
/**
 * Persist the field group.
 *
 * @param int     $post_id Post being saved.
 * @param WP_Post $post    Post object.
 */
function dth_save_meta( $post_id, $post ) {
	$groups = dth_meta_fields();
	if ( empty( $groups[ $post->post_type ] ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['dth_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['dth_meta_nonce'] ) ), 'dth_save_meta' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( $groups[ $post->post_type ]['fields'] as $key => $field ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			continue;
		}
		$raw = wp_unslash( $_POST[ $key ] );

		switch ( $field['type'] ) {
			case 'url':
			case 'file':
				$clean = esc_url_raw( $raw );
				break;
			case 'textarea':
			case 'lines':
			case 'pairs':
				$clean = sanitize_textarea_field( $raw );
				break;
			default:
				$clean = sanitize_text_field( $raw );
		}

		if ( '' === $clean ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $clean );
		}
	}
}
