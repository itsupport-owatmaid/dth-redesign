<?php
/**
 * Site-wide editable settings (Appearance > Customize).
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

/**
 * Every customizer setting with its default and sanitizer.
 *
 * @return array<string,array>
 */
function dth_customizer_settings() {
	return array(
		'identity' => array(
			'title'  => __( 'DTH — ข้อความและอัตลักษณ์', 'dth' ),
			'fields' => array(
				'dth_tagline'      => array( 'label' => __( 'ข้อความแถบบนสุด', 'dth' ), 'type' => 'text', 'default' => 'ปากเสียงเพื่อสิทธิและคุณภาพชีวิตที่เท่าเทียมของคนพิการทุกคน' ),
				'dth_org_name'     => array( 'label' => __( 'ชื่อสมาคม (ไทย)', 'dth' ), 'type' => 'text', 'default' => 'สภาคนพิการทุกประเภทแห่งประเทศไทย' ),
				'dth_org_name_en'  => array( 'label' => __( 'ชื่อสมาคม (อังกฤษ)', 'dth' ), 'type' => 'text', 'default' => 'Disabilities Thailand' ),
				'dth_org_fullname' => array( 'label' => __( 'ชื่อเต็มที่ใช้ในส่วนติดต่อ', 'dth' ), 'type' => 'text', 'default' => 'สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย' ),
				'dth_copyright'    => array( 'label' => __( 'ข้อความลิขสิทธิ์ท้ายเว็บ', 'dth' ), 'type' => 'text', 'default' => '© 2569 สงวนลิขสิทธิ์โดยสมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย (Disabilities Thailand)' ),
				'dth_logo_wide'    => array( 'label' => __( 'โลโก้แนวนอน (ท้ายเว็บ)', 'dth' ), 'type' => 'image', 'default' => '' ),
			),
		),
		'contact'  => array(
			'title'  => __( 'DTH — ข้อมูลติดต่อ', 'dth' ),
			'fields' => array(
				'dth_address'      => array( 'label' => __( 'ที่อยู่', 'dth' ), 'type' => 'textarea', 'default' => '255 ห้อง 6-8 ชั้น 3 อาคารศูนย์พัฒนาและฝึกอบรมคนพิการแห่งเอเชียและแปซิฟิก (APCD) ถนนราชวิถี แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400' ),
				'dth_address_short' => array( 'label' => __( 'ที่อยู่แบบย่อ (ท้ายเว็บ)', 'dth' ), 'type' => 'textarea', 'default' => "255 ห้อง 6-8 ชั้น 3 อาคาร APCD ถนนราชวิถี\nแขวงทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400" ),
				'dth_phone'        => array( 'label' => __( 'เบอร์โทรศัพท์', 'dth' ), 'type' => 'text', 'default' => '02-354-4260' ),
				'dth_email'        => array( 'label' => __( 'อีเมล', 'dth' ), 'type' => 'text', 'default' => 'disabilitiesth@gmail.com' ),
				'dth_contact_to'   => array( 'label' => __( 'อีเมลผู้รับข้อความจากฟอร์มติดต่อ', 'dth' ), 'type' => 'text', 'default' => '' ),
				'dth_hotline'      => array( 'label' => __( 'เบอร์สายด่วน', 'dth' ), 'type' => 'text', 'default' => '1479' ),
				'dth_hotline_note' => array( 'label' => __( 'คำอธิบายสายด่วน', 'dth' ), 'type' => 'text', 'default' => 'กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ' ),
				'dth_map_embed'    => array( 'label' => __( 'ลิงก์ฝังแผนที่ Google Maps', 'dth' ), 'type' => 'url', 'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.15139515162!2d100.52614701483063!3d13.769742190335837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29952a2cdf38b%3A0x184a992ec58439a3!2z4Liq4Lih4Liy4LiE4Lih4Liq4Lig4Liy4LiE4LiZ4Lie4Li04LiB4Liy4Lij4LiX4Li44LiB4Lib4Lij4Liw4LmA4Lig4LiX4LmB4Lir4LmI4LiH4Lib4Lij4Liw4LmA4LiX4Lio4LmE4LiX4Lii!5e0!3m2!1sen!2sth!4v1649090216442!5m2!1sen!2sth' ),
			),
		),
		'social'   => array(
			'title'  => __( 'DTH — โซเชียลมีเดีย', 'dth' ),
			'fields' => array(
				'dth_facebook'      => array( 'label' => __( 'Facebook (ลิงก์แชร์)', 'dth' ), 'type' => 'url', 'default' => 'https://www.facebook.com/share/1Ez81X9Yjh/' ),
				'dth_facebook_page' => array( 'label' => __( 'Facebook Page (สำหรับกล่องฝังหน้าแรก)', 'dth' ), 'type' => 'url', 'default' => 'https://www.facebook.com/disabilitiesth' ),
				'dth_x'             => array( 'label' => __( 'X (Twitter)', 'dth' ), 'type' => 'url', 'default' => 'https://x.com/disabilitiesth' ),
				'dth_youtube'       => array( 'label' => __( 'YouTube', 'dth' ), 'type' => 'url', 'default' => 'https://youtube.com/@disabilitiesthailand945' ),
				'dth_tiktok'        => array( 'label' => __( 'TikTok', 'dth' ), 'type' => 'url', 'default' => 'https://www.tiktok.com/@disabilitiesth' ),
			),
		),
		'home'     => array(
			'title'  => __( 'DTH — หน้าแรก', 'dth' ),
			'fields' => array(
				'dth_slide_seconds'  => array( 'label' => __( 'เวลาเปลี่ยนสไลด์ (วินาที)', 'dth' ), 'type' => 'number', 'default' => 5 ),
				'dth_rights_title'   => array( 'label' => __( 'หัวข้อส่วนสิทธิคนพิการ', 'dth' ), 'type' => 'text', 'default' => 'สิทธิคนพิการที่ควรรู้' ),
				'dth_rights_intro'   => array( 'label' => __( 'คำอธิบายส่วนสิทธิคนพิการ', 'dth' ), 'type' => 'textarea', 'default' => 'เลือกดูข้อมูลสำคัญตามหมวดที่ต้องการ เพื่อเข้าถึงสิทธิพื้นฐานและช่องทางช่วยเหลือได้รวดเร็วขึ้น' ),
				'dth_members_title'  => array( 'label' => __( 'หัวข้อส่วนองค์การสมาชิก', 'dth' ), 'type' => 'text', 'default' => 'องค์การสมาชิก 6 องค์การ' ),
				'dth_partners_title' => array( 'label' => __( 'หัวข้อส่วนหน่วยงานที่เกี่ยวข้อง', 'dth' ), 'type' => 'text', 'default' => 'หน่วยงานที่เกี่ยวข้อง' ),
				'dth_show_facebook'  => array( 'label' => __( 'แสดงกล่อง Facebook บนหน้าแรก', 'dth' ), 'type' => 'checkbox', 'default' => 1 ),
			),
		),
	);
}

add_action( 'customize_register', 'dth_customize_register' );
/**
 * Register the DTH panels, sections, settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function dth_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'dth_panel', array(
		'title'       => __( 'ตั้งค่าเว็บไซต์ DTH', 'dth' ),
		'description' => __( 'ข้อความ ข้อมูลติดต่อ และโซเชียลมีเดียที่ใช้ทั่วทั้งเว็บไซต์', 'dth' ),
		'priority'    => 20,
	) );

	foreach ( dth_customizer_settings() as $section_id => $section ) {
		$wp_customize->add_section( 'dth_' . $section_id, array(
			'title' => $section['title'],
			'panel' => 'dth_panel',
		) );

		foreach ( $section['fields'] as $key => $field ) {
			$wp_customize->add_setting( $key, array(
				'default'           => $field['default'],
				'sanitize_callback' => dth_sanitizer_for( $field['type'] ),
				'transport'         => 'refresh',
			) );

			if ( 'image' === $field['type'] ) {
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, array(
					'label'   => $field['label'],
					'section' => 'dth_' . $section_id,
				) ) );
				continue;
			}

			$wp_customize->add_control( $key, array(
				'label'   => $field['label'],
				'section' => 'dth_' . $section_id,
				'type'    => 'number' === $field['type'] ? 'number' : ( 'checkbox' === $field['type'] ? 'checkbox' : ( 'textarea' === $field['type'] ? 'textarea' : ( 'url' === $field['type'] ? 'url' : 'text' ) ) ),
			) );
		}
	}
}

/**
 * Map a field type to its sanitize callback.
 *
 * @param string $type Field type.
 * @return callable
 */
function dth_sanitizer_for( $type ) {
	switch ( $type ) {
		case 'url':
			return 'esc_url_raw';
		case 'image':
			return 'esc_url_raw';
		case 'textarea':
			return 'sanitize_textarea_field';
		case 'number':
			return 'absint';
		case 'checkbox':
			return 'dth_sanitize_checkbox';
		default:
			return 'sanitize_text_field';
	}
}

/**
 * Normalise a checkbox value to 1 or 0.
 *
 * @param mixed $value Raw value.
 * @return int
 */
function dth_sanitize_checkbox( $value ) {
	return $value ? 1 : 0;
}

/**
 * Read a DTH setting, falling back to its registered default.
 *
 * @param string $key Setting name.
 * @return mixed
 */
function dth_option( $key ) {
	static $defaults = null;

	if ( null === $defaults ) {
		$defaults = array();
		foreach ( dth_customizer_settings() as $section ) {
			foreach ( $section['fields'] as $name => $field ) {
				$defaults[ $name ] = $field['default'];
			}
		}
	}

	return get_theme_mod( $key, isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}
