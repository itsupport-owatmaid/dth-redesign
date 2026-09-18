<?php
/**
 * ฟอร์ม "ส่งข้อความถึงทีมงาน" ของจริง
 * - เก็บทุกข้อความไว้ในหลังบ้าน (CPT dth_message) ดูย้อนหลังได้เสมอ แม้อีเมล/LINE ส่งไม่ออก
 * - แจ้งเตือนต่อไปที่อีเมล (wp_mail) และ/หรือ LINE Official Account (Messaging API)
 * - ตั้งค่าอีเมลผู้รับ + token LINE ได้ในหลังบ้าน: ข้อความติดต่อ > ตั้งค่าการแจ้งเตือน
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

const DTH_MSG_CPT   = 'dth_message';
const DTH_MSG_OPT   = 'dth_contact_settings';
const DTH_MSG_LIMIT = 5;    // จำนวนข้อความสูงสุดต่อ IP
const DTH_MSG_WINDOW = 600; // ต่อช่วงเวลา (วินาที) = 10 นาที

/** ค่าตั้งต้น + ค่าที่ผู้ดูแลตั้งไว้ */
function dth_contact_settings() {
	$saved = get_option( DTH_MSG_OPT, array() );
	return wp_parse_args( is_array( $saved ) ? $saved : array(), array(
		'email_on'   => 1,
		'email_to'   => 'disabilitiesth@gmail.com',
		'line_on'    => 0,
		'line_token' => '',
		'line_to'    => '',
	) );
}

/* ------------------------------------------------------------------ *
 * 1) กล่องเก็บข้อความในหลังบ้าน
 * ------------------------------------------------------------------ */
add_action( 'init', function () {
	register_post_type( DTH_MSG_CPT, array(
		'labels' => array(
			'name' => 'ข้อความติดต่อ', 'singular_name' => 'ข้อความติดต่อ',
			'edit_item' => 'ดูข้อความ', 'all_items' => 'ข้อความทั้งหมด', 'menu_name' => 'ข้อความติดต่อ',
			'not_found' => 'ยังไม่มีข้อความ', 'search_items' => 'ค้นหาข้อความ',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-email-alt',
		'menu_position' => 29, 'supports' => array( 'title' ),
		// ข้อความมาจากฟอร์มหน้าเว็บเท่านั้น ไม่ต้องให้กด "เพิ่มใหม่" ในหลังบ้าน
		'capabilities' => array( 'create_posts' => 'do_not_allow' ),
		'map_meta_cap' => true,
	) );
} );

/** กล่องแสดงรายละเอียดข้อความ (อ่านอย่างเดียว) */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_message_meta', 'รายละเอียดข้อความ', function ( $post ) {
		$rows = array(
			'ช่องทางติดต่อกลับ' => get_post_meta( $post->ID, 'dth_contact', true ),
			'ส่งจากหน้า'        => get_post_meta( $post->ID, 'dth_source', true ),
			'แจ้งเตือนอีเมล'    => get_post_meta( $post->ID, 'dth_mail_status', true ),
			'แจ้งเตือน LINE'    => get_post_meta( $post->ID, 'dth_line_status', true ),
		);
		echo '<table class="widefat striped" style="max-width:760px"><tbody>';
		foreach ( $rows as $label => $value ) {
			if ( '' === $value ) { $value = '—'; }
			echo '<tr><th style="width:190px">' . esc_html( $label ) . '</th><td>' . esc_html( $value ) . '</td></tr>';
		}
		echo '</tbody></table>';
		echo '<p style="font-weight:600;margin:18px 0 6px">ข้อความ</p>';
		echo '<div style="background:#fff;border:1px solid #dcdcde;border-radius:6px;padding:12px;max-width:760px;white-space:pre-wrap;line-height:1.8">';
		echo esc_html( get_post_meta( $post->ID, 'dth_body', true ) );
		echo '</div>';
	}, DTH_MSG_CPT, 'normal', 'high' );
} );

/** คอลัมน์ในตารางรายการ */
add_filter( 'manage_' . DTH_MSG_CPT . '_posts_columns', function () {
	return array(
		'cb' => '<input type="checkbox">', 'title' => 'ผู้ส่ง',
		'dth_contact' => 'ช่องทางติดต่อกลับ', 'dth_excerpt' => 'ข้อความ',
		'dth_sent' => 'แจ้งเตือน', 'date' => 'วันที่',
	);
} );
add_action( 'manage_' . DTH_MSG_CPT . '_posts_custom_column', function ( $col, $id ) {
	if ( 'dth_contact' === $col ) {
		echo esc_html( get_post_meta( $id, 'dth_contact', true ) ?: '—' );
	} elseif ( 'dth_excerpt' === $col ) {
		echo esc_html( wp_trim_words( get_post_meta( $id, 'dth_body', true ), 18, '…' ) );
	} elseif ( 'dth_sent' === $col ) {
		$out = array();
		foreach ( array( 'dth_mail_status' => 'อีเมล', 'dth_line_status' => 'LINE' ) as $meta => $label ) {
			$st = get_post_meta( $id, $meta, true );
			if ( '' === $st || 'ปิดไว้' === $st ) { continue; }
			$ok   = ( 'ส่งแล้ว' === $st );
			$out[] = '<span style="color:' . ( $ok ? '#1a7f37' : '#b32d2e' ) . '">'
				. ( $ok ? '✔' : '✕' ) . ' ' . esc_html( $label ) . '</span>';
		}
		echo $out ? implode( ' · ', $out ) : '—'; // phpcs:ignore WordPress.Security.EscapeOutput -- ประกอบจากสตริงที่ esc แล้ว
	}
}, 10, 2 );

/* ------------------------------------------------------------------ *
 * 2) หน้าตั้งค่าการแจ้งเตือน
 * ------------------------------------------------------------------ */
add_action( 'admin_menu', function () {
	add_submenu_page(
		'edit.php?post_type=' . DTH_MSG_CPT,
		'ตั้งค่าการแจ้งเตือน', 'ตั้งค่าการแจ้งเตือน',
		'manage_options', 'dth-contact-settings', 'dth_contact_settings_page'
	);
} );

add_action( 'admin_init', function () {
	register_setting( 'dth_contact_group', DTH_MSG_OPT, array(
		'type' => 'array',
		'sanitize_callback' => function ( $in ) {
			$in = is_array( $in ) ? $in : array();
			$emails = array();
			foreach ( explode( ',', (string) ( $in['email_to'] ?? '' ) ) as $e ) {
				$e = sanitize_email( trim( $e ) );
				if ( $e && is_email( $e ) ) { $emails[] = $e; }
			}
			return array(
				'email_on'   => empty( $in['email_on'] ) ? 0 : 1,
				'email_to'   => implode( ', ', $emails ),
				'line_on'    => empty( $in['line_on'] ) ? 0 : 1,
				'line_token' => trim( sanitize_text_field( (string) ( $in['line_token'] ?? '' ) ) ),
				'line_to'    => trim( sanitize_text_field( (string) ( $in['line_to'] ?? '' ) ) ),
			);
		},
		'default' => array(),
	) );
} );

function dth_contact_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) { return; }
	$o = dth_contact_settings();
	?>
	<div class="wrap">
		<h1>ตั้งค่าการแจ้งเตือนข้อความติดต่อ</h1>
		<?php settings_errors(); // เมนูย่อยแบบกำหนดเองต้องเรียกเอง ไม่งั้นกดบันทึกแล้วไม่มีข้อความยืนยัน ?>
		<p>ทุกข้อความจาก "ส่งข้อความถึงทีมงาน" จะถูกเก็บไว้ที่
			<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=' . DTH_MSG_CPT ) ); ?>">ข้อความติดต่อ</a>
			เสมอ ส่วนด้านล่างคือช่องทางแจ้งเตือนเพิ่มเติม</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'dth_contact_group' ); ?>
			<h2 class="title">อีเมล</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row">เปิดใช้</th>
					<td><label><input type="checkbox" name="<?php echo esc_attr( DTH_MSG_OPT ); ?>[email_on]" value="1" <?php checked( $o['email_on'], 1 ); ?>> ส่งอีเมลแจ้งเตือนเมื่อมีข้อความใหม่</label></td>
				</tr>
				<tr>
					<th scope="row"><label for="dth_email_to">อีเมลผู้รับ</label></th>
					<td>
						<input id="dth_email_to" type="text" class="regular-text" name="<?php echo esc_attr( DTH_MSG_OPT ); ?>[email_to]" value="<?php echo esc_attr( $o['email_to'] ); ?>">
						<p class="description">ใส่ได้มากกว่า 1 อีเมล คั่นด้วยเครื่องหมายจุลภาค (,)</p>
					</td>
				</tr>
			</table>

			<h2 class="title">LINE Official Account</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row">เปิดใช้</th>
					<td><label><input type="checkbox" name="<?php echo esc_attr( DTH_MSG_OPT ); ?>[line_on]" value="1" <?php checked( $o['line_on'], 1 ); ?>> ส่งข้อความเข้า LINE OA เมื่อมีข้อความใหม่</label></td>
				</tr>
				<tr>
					<th scope="row"><label for="dth_line_token">Channel access token</label></th>
					<td>
						<input id="dth_line_token" type="password" class="large-text" autocomplete="off" name="<?php echo esc_attr( DTH_MSG_OPT ); ?>[line_token]" value="<?php echo esc_attr( $o['line_token'] ); ?>">
						<p class="description">จาก LINE Developers Console &gt; ช่อง Messaging API ของ OA &gt; Channel access token (long-lived)</p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="dth_line_to">ผู้รับ (User / Group ID)</label></th>
					<td>
						<input id="dth_line_to" type="text" class="regular-text" name="<?php echo esc_attr( DTH_MSG_OPT ); ?>[line_to]" value="<?php echo esc_attr( $o['line_to'] ); ?>">
						<p class="description">ไอดีผู้รับปลายทาง (ขึ้นต้นด้วย U หรือ C) — เว้นว่างไว้ = ยังไม่ส่ง LINE</p>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/* ------------------------------------------------------------------ *
 * 3) รับข้อมูลจากฟอร์ม
 * ------------------------------------------------------------------ */

/** จำกัดจำนวนครั้งต่อ IP กัน spam */
function dth_contact_rate_key() {
	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	return 'dth_cf_' . md5( $ip );
}

/** ส่งอีเมลแจ้งเตือน — คืนค่าสถานะเป็นข้อความไทย */
function dth_contact_notify_email( $name, $contact, $body, $source ) {
	$o = dth_contact_settings();
	if ( empty( $o['email_on'] ) || '' === $o['email_to'] ) { return 'ปิดไว้'; }

	$to      = array_map( 'trim', explode( ',', $o['email_to'] ) );
	$subject = 'ข้อความใหม่จากเว็บไซต์: ' . $name;
	$lines   = array(
		'มีผู้ส่งข้อความผ่านฟอร์ม "ส่งข้อความถึงทีมงาน" บนเว็บไซต์',
		'',
		'ชื่อผู้ส่ง: ' . $name,
		'ช่องทางติดต่อกลับ: ' . ( '' !== $contact ? $contact : '(ไม่ระบุ)' ),
		'ส่งจากหน้า: ' . $source,
		'',
		'ข้อความ:',
		$body,
		'',
		'— ระบบเว็บไซต์สภาคนพิการทุกประเภทแห่งประเทศไทย',
	);
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
	if ( is_email( $contact ) ) { $headers[] = 'Reply-To: ' . $contact; }

	return wp_mail( $to, $subject, implode( "\n", $lines ), $headers ) ? 'ส่งแล้ว' : 'ส่งไม่ออก';
}

/** ส่งเข้า LINE OA ผ่าน Messaging API — คืนค่าสถานะเป็นข้อความไทย */
function dth_contact_notify_line( $name, $contact, $body, $source ) {
	$o = dth_contact_settings();
	if ( empty( $o['line_on'] ) || '' === $o['line_token'] || '' === $o['line_to'] ) { return 'ปิดไว้'; }

	$text = "ข้อความใหม่จากเว็บไซต์\n\nชื่อผู้ส่ง: {$name}\nติดต่อกลับ: "
		. ( '' !== $contact ? $contact : '(ไม่ระบุ)' ) . "\nหน้า: {$source}\n\n{$body}";

	$res = wp_remote_post( 'https://api.line.me/v2/bot/message/push', array(
		'timeout' => 15,
		'headers' => array(
			'Content-Type'  => 'application/json',
			'Authorization' => 'Bearer ' . $o['line_token'],
		),
		'body' => wp_json_encode( array(
			'to'       => $o['line_to'],
			'messages' => array( array( 'type' => 'text', 'text' => mb_substr( $text, 0, 4900 ) ) ),
		) ),
	) );

	if ( is_wp_error( $res ) ) { return 'ส่งไม่ออก: ' . $res->get_error_message(); }
	$code = (int) wp_remote_retrieve_response_code( $res );
	if ( 200 === $code ) { return 'ส่งแล้ว'; }
	return 'ส่งไม่ออก (HTTP ' . $code . ')';
}

/** ตัวจัดการฟอร์ม */
function dth_contact_handle() {
	$is_ajax = ! empty( $_POST['dth_ajax'] );
	$back    = wp_get_referer() ?: home_url( '/' );

	$fail = function ( $msg ) use ( $is_ajax, $back ) {
		if ( $is_ajax ) { wp_send_json_error( array( 'message' => $msg ), 200 ); }
		wp_safe_redirect( add_query_arg( 'dth_sent', 'error', remove_query_arg( 'dth_sent', $back ) ) );
		exit;
	};

	if ( ! isset( $_POST['dth_contact_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['dth_contact_nonce'] ) ), 'dth_contact_submit' ) ) {
		$fail( 'หมดเวลาการกรอกฟอร์ม กรุณารีเฟรชหน้าเว็บแล้วส่งอีกครั้ง' );
	}
	// honeypot — บอทมักกรอกทุกช่อง คนจริงจะเว้นว่าง
	if ( ! empty( $_POST['dth_website'] ) ) { $fail( 'ไม่สามารถส่งข้อความได้' ); }

	$key   = dth_contact_rate_key();
	$count = (int) get_transient( $key );
	if ( $count >= DTH_MSG_LIMIT ) {
		$fail( 'ส่งข้อความถี่เกินไป กรุณารออีกสักครู่แล้วลองใหม่' );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['dth_name'] ?? '' ) );
	$contact = sanitize_text_field( wp_unslash( $_POST['dth_reply'] ?? '' ) );
	$body    = sanitize_textarea_field( wp_unslash( $_POST['dth_body'] ?? '' ) );
	$source  = sanitize_text_field( wp_unslash( $_POST['dth_source'] ?? '' ) );

	$name    = mb_substr( trim( $name ), 0, 120 );
	$contact = mb_substr( trim( $contact ), 0, 160 );
	$body    = mb_substr( trim( $body ), 0, 5000 );
	if ( '' === $source ) { $source = $back; }

	if ( '' === $name || '' === $body ) {
		$fail( 'กรุณากรอกชื่อและข้อความให้ครบ' );
	}

	// เก็บลงหลังบ้านก่อนเสมอ ถึงแจ้งเตือนล้มเหลวก็ไม่หาย
	$id = wp_insert_post( array(
		'post_type'   => DTH_MSG_CPT,
		'post_title'  => $name,
		'post_status' => 'publish',
		'meta_input'  => array(
			'dth_contact' => $contact,
			'dth_body'    => $body,
			'dth_source'  => $source,
		),
	), true );

	if ( is_wp_error( $id ) ) {
		$fail( 'ระบบขัดข้อง ไม่สามารถบันทึกข้อความได้ กรุณาติดต่อทางโทรศัพท์หรืออีเมล' );
	}

	set_transient( $key, $count + 1, DTH_MSG_WINDOW );

	$mail_status = dth_contact_notify_email( $name, $contact, $body, $source );
	$line_status = dth_contact_notify_line( $name, $contact, $body, $source );
	update_post_meta( $id, 'dth_mail_status', $mail_status );
	update_post_meta( $id, 'dth_line_status', $line_status );

	if ( $is_ajax ) {
		wp_send_json_success( array( 'message' => 'ส่งข้อความเรียบร้อย' ) );
	}
	wp_safe_redirect( add_query_arg( 'dth_sent', 'ok', remove_query_arg( 'dth_sent', $back ) ) );
	exit;
}
add_action( 'admin_post_nopriv_dth_contact_submit', 'dth_contact_handle' );
add_action( 'admin_post_dth_contact_submit', 'dth_contact_handle' );
