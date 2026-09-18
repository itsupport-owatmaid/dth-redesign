<?php
/**
 * CPT "ภาพแบนเนอร์" (dth_hero) — จัดการสไลด์หน้าแรกผ่านหลังบ้าน
 * เพิ่ม/แก้/ลบ/สลับลำดับได้ เลือกรูปจากคลังสื่อ · shortcode [dth_hero]
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/** ลงทะเบียน CPT */
add_action( 'init', function () {
	register_post_type( 'dth_hero', array(
		'labels' => array(
			'name' => 'ภาพแบนเนอร์', 'singular_name' => 'ภาพแบนเนอร์',
			'add_new' => 'เพิ่มแบนเนอร์', 'add_new_item' => 'เพิ่มแบนเนอร์ใหม่',
			'edit_item' => 'แก้ไขแบนเนอร์', 'all_items' => 'แบนเนอร์ทั้งหมด', 'menu_name' => 'ภาพแบนเนอร์',
			'not_found' => 'ยังไม่มีแบนเนอร์', 'featured_image' => 'รูปแบนเนอร์',
			'set_featured_image' => 'เลือกรูปแบนเนอร์', 'remove_featured_image' => 'เอารูปออก',
			'use_featured_image' => 'ใช้เป็นรูปแบนเนอร์',
		),
		'public' => false, 'show_ui' => true, 'menu_icon' => 'dashicons-format-image',
		'menu_position' => 24, 'supports' => array( 'title', 'thumbnail', 'page-attributes' ),
	) );
} );

/** กล่องกรอกข้อความบนแบนเนอร์ */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'dth_hero_meta', 'ข้อความบนแบนเนอร์', function ( $post ) {
		wp_nonce_field( 'dth_hero_save', 'dth_hero_nonce' );
		$tag  = get_post_meta( $post->ID, 'dth_tag', true );
		$sub  = get_post_meta( $post->ID, 'dth_sub', true );
		$img  = get_post_meta( $post->ID, 'dth_img', true );
		$link = get_post_meta( $post->ID, 'dth_link', true );
		$ltxt = get_post_meta( $post->ID, 'dth_link_text', true );
		echo '<style>.dth-f{margin:0 0 16px}.dth-f label{display:block;font-weight:600;margin-bottom:4px}'
			. '.dth-f input[type=text],.dth-f textarea{width:100%;max-width:640px;padding:7px}'
			. '.dth-f .d{color:#666;font-size:.92em;margin-top:3px}</style>';

		echo '<p style="background:#f0f6fc;border-left:4px solid #72aee6;padding:10px 14px;margin:0 0 18px">'
			. 'หัวข้อใหญ่บนแบนเนอร์ = ช่อง <strong>"ชื่อเรื่อง"</strong> ด้านบนสุด · '
			. 'รูป = กล่อง <strong>"รูปแบนเนอร์"</strong> ด้านขวา (กดเลือกจากคลังสื่อหรืออัปโหลดใหม่ได้) · '
			. 'ลำดับสไลด์ = กล่อง <strong>"คุณลักษณะหน้า"</strong> ด้านขวา (เลขน้อยมาก่อน)</p>';

		echo '<div class="dth-f"><label for="dth_tag">ป้ายเล็กเหนือหัวข้อ</label>';
		echo '<input id="dth_tag" type="text" name="dth_tag" value="' . esc_attr( $tag ) . '" placeholder="เช่น ยินดีต้อนรับ">';
		echo '<div class="d">เว้นว่างไว้ = ไม่แสดงป้าย</div></div>';

		echo '<div class="dth-f"><label for="dth_sub">คำอธิบายใต้หัวข้อ</label>';
		echo '<textarea id="dth_sub" name="dth_sub" rows="2" placeholder="เช่น ส่งเสริมสิทธิ พัฒนาคุณภาพชีวิต…">' . esc_textarea( $sub ) . '</textarea></div>';

		echo '<div class="dth-f"><label for="dth_link">ลิงก์ปุ่ม (ถ้าต้องการปุ่มบนแบนเนอร์)</label>';
		echo '<input id="dth_link" type="text" name="dth_link" value="' . esc_attr( $link ) . '" placeholder="https://… หรือ /about/">';
		echo '<div class="d">เว้นว่างไว้ = ไม่มีปุ่ม</div></div>';

		echo '<div class="dth-f"><label for="dth_link_text">ข้อความบนปุ่ม</label>';
		echo '<input id="dth_link_text" type="text" name="dth_link_text" value="' . esc_attr( $ltxt ) . '" placeholder="เช่น อ่านเพิ่มเติม">';
		echo '</div>';

		if ( '' !== $img ) {
			echo '<div class="dth-f"><label for="dth_img">รูปสำรอง (ที่อยู่ไฟล์ในธีม)</label>';
			echo '<input id="dth_img" type="text" name="dth_img" value="' . esc_attr( $img ) . '">';
			echo '<div class="d">ใช้เมื่อยังไม่ได้เลือก "รูปแบนเนอร์" จากคลังสื่อ · <code>{{DTH}}</code> = โฟลเดอร์ธีม</div></div>';
		}

		echo '<p style="color:#666;margin:18px 0 0">ต้องการซ่อนแบนเนอร์ชั่วคราว: เปลี่ยนสถานะเป็น <strong>ฉบับร่าง</strong> (Draft) แบนเนอร์จะไม่แสดงบนเว็บ แต่ข้อมูลยังอยู่</p>';
	}, 'dth_hero', 'normal', 'high' );
} );

add_action( 'save_post_dth_hero', function ( $id ) {
	if ( ! isset( $_POST['dth_hero_nonce'] ) || ! wp_verify_nonce( $_POST['dth_hero_nonce'], 'dth_hero_save' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $id ) ) { return; }
	foreach ( array( 'dth_tag', 'dth_link', 'dth_link_text', 'dth_img' ) as $k ) {
		if ( isset( $_POST[ $k ] ) ) { update_post_meta( $id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) ); }
	}
	if ( isset( $_POST['dth_sub'] ) ) {
		update_post_meta( $id, 'dth_sub', sanitize_textarea_field( wp_unslash( $_POST['dth_sub'] ) ) );
	}
} );

/** คอลัมน์ในตารางรายการ — เห็นรูปย่อทันที */
add_filter( 'manage_dth_hero_posts_columns', function () {
	return array(
		'cb' => '<input type="checkbox">', 'dth_thumb' => 'รูป', 'title' => 'หัวข้อบนแบนเนอร์',
		'dth_tag' => 'ป้าย', 'order' => 'ลำดับ', 'dth_state' => 'แสดงบนเว็บ',
	);
} );
add_action( 'manage_dth_hero_posts_custom_column', function ( $col, $id ) {
	if ( 'dth_thumb' === $col ) {
		$url = dth_hero_image_url( $id );
		echo $url
			? '<img src="' . esc_url( $url ) . '" alt="" style="width:120px;height:56px;object-fit:cover;border-radius:6px">'
			: '<span style="color:#b32d2e">ยังไม่มีรูป</span>';
	} elseif ( 'dth_tag' === $col ) {
		echo esc_html( get_post_meta( $id, 'dth_tag', true ) ?: '—' );
	} elseif ( 'order' === $col ) {
		echo (int) get_post_field( 'menu_order', $id );
	} elseif ( 'dth_state' === $col ) {
		echo 'publish' === get_post_status( $id )
			? '<span style="color:#1a7f37">✔ แสดง</span>'
			: '<span style="color:#996800">ซ่อน (ฉบับร่าง)</span>';
	}
}, 10, 2 );

/** ตารางในหลังบ้านเรียงตามลำดับสไลด์จริง ไม่ใช่วันที่ ผู้ดูแลจึงเห็นลำดับตรงกับหน้าเว็บ */
add_action( 'pre_get_posts', function ( $q ) {
	if ( ! is_admin() || ! $q->is_main_query() ) { return; }
	if ( 'dth_hero' !== $q->get( 'post_type' ) ) { return; }
	if ( $q->get( 'orderby' ) ) { return; } // ผู้ดูแลกดเรียงคอลัมน์เองแล้ว
	$q->set( 'orderby', array( 'menu_order' => 'ASC', 'date' => 'ASC' ) );
} );

/** หา URL รูปของแบนเนอร์: รูปแบนเนอร์จากคลังสื่อมาก่อน ถ้าไม่มีใช้รูปสำรองในธีม */
function dth_hero_image_url( $id ) {
	$url = get_the_post_thumbnail_url( $id, 'full' );
	if ( $url ) { return $url; }
	$img = (string) get_post_meta( $id, 'dth_img', true );
	if ( '' === $img ) { return ''; }
	return str_replace(
		array( '{{DTH}}', '{{HOME}}' ),
		array( get_template_directory_uri(), untrailingslashit( home_url() ) ),
		$img
	);
}

/** Shortcode [dth_hero] — สไลด์แบนเนอร์หน้าแรก (markup เดิมทุกคลาส) */
add_shortcode( 'dth_hero', function () {
	$q = new WP_Query( array(
		'post_type' => 'dth_hero', 'posts_per_page' => -1, 'post_status' => 'publish',
		'orderby' => array( 'menu_order' => 'ASC', 'date' => 'ASC' ), 'no_found_rows' => true,
	) );
	if ( ! $q->have_posts() ) { return ''; }

	$slides = '';
	$first  = true;
	foreach ( $q->posts as $p ) {
		$url = dth_hero_image_url( $p->ID );
		if ( '' === $url ) { continue; }
		$tag  = (string) get_post_meta( $p->ID, 'dth_tag', true );
		$sub  = (string) get_post_meta( $p->ID, 'dth_sub', true );
		$link = (string) get_post_meta( $p->ID, 'dth_link', true );
		$ltxt = (string) get_post_meta( $p->ID, 'dth_link_text', true );

		$cap  = '';
		if ( '' !== $tag ) { $cap .= '<span class="tag">' . esc_html( $tag ) . '</span>'; }
		$cap .= '<h2>' . esc_html( get_the_title( $p ) ) . '</h2>';
		if ( '' !== $sub ) { $cap .= '<p>' . esc_html( $sub ) . '</p>'; }
		if ( '' !== $link ) {
			$cap .= '<a class="pill-btn" style="margin-top:18px" href="' . esc_url( $link ) . '">'
				. esc_html( '' !== $ltxt ? $ltxt : 'อ่านเพิ่มเติม' ) . ' →</a>';
		}

		$slides .= '<div class="slide welcome-slide' . ( $first ? ' on' : '' ) . '"'
			. ' style="background-image:url(\'' . esc_url( $url ) . '\')">'
			. '<div class="cap">' . $cap . '</div></div>';
		$first = false;
	}
	wp_reset_postdata();
	if ( '' === $slides ) { return ''; }

	$many = ( substr_count( $slides, 'class="slide' ) > 1 );
	$out  = '<section class="hero" aria-label="ภาพสไลด์">';
	$out .= '<div class="slides" id="slides" aria-live="polite">' . $slides . '</div>';
	if ( $many ) {
		// มีสไลด์เดียวไม่ต้องมีปุ่มเลื่อน — ปุ่มที่กดแล้วไม่เกิดอะไรทำให้ screen reader สับสน
		$out .= '<button class="hero-arrow prev" id="prev" aria-label="สไลด์ก่อนหน้า">‹</button>';
		$out .= '<button class="hero-arrow next" id="next" aria-label="สไลด์ถัดไป">›</button>';
		$out .= '<div class="hero-dots" id="dots" role="tablist" aria-label="เลือกสไลด์"></div>';
	}
	$out .= '</section>';
	return $out;
} );

/** Seed แบนเนอร์ตั้งต้น (ของเดิมในหน้าแรก) ครั้งเดียว */
function dth_seed_hero() {
	if ( get_option( 'dth_hero_seeded' ) ) { return; }
	$existing = get_posts( array( 'post_type' => 'dth_hero', 'posts_per_page' => 1, 'post_status' => 'any', 'fields' => 'ids' ) );
	if ( ! $existing ) {
		$id = wp_insert_post( array(
			'post_type'   => 'dth_hero',
			'post_title'  => 'สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย',
			'post_status' => 'publish',
			'menu_order'  => 0,
			'meta_input'  => array(
				'dth_tag' => 'ยินดีต้อนรับ',
				'dth_sub' => 'ส่งเสริมสิทธิ พัฒนาคุณภาพชีวิต และสร้างสังคมที่เท่าเทียมสำหรับทุกคน',
				'dth_img' => '{{DTH}}/Pic/hero-welcome.png',
			),
		) );
		if ( is_wp_error( $id ) ) { return; }
	}
	update_option( 'dth_hero_seeded', 1 );
}
add_action( 'admin_init', 'dth_seed_hero' );

/* ------------------------------------------------------------------ *
 * ย้ายแบนเนอร์เดิมที่ฝังอยู่ในเนื้อหาหน้าแรก มาให้เมนูนี้จัดการ
 * เว็บที่ติดตั้งไปก่อนหน้านี้ เนื้อหาหน้าแรกจะมี markup แบนเนอร์ฝังไว้ตรง ๆ
 * ปุ่มนี้แทน markup ก้อนนั้นด้วย [dth_hero] ครั้งเดียว หน้าตาเว็บไม่เปลี่ยน
 * แต่หลังจากนั้นเปลี่ยนรูป/ข้อความได้จากเมนู "ภาพแบนเนอร์" เลย
 * ------------------------------------------------------------------ */

/** หา ID หน้าแรก และบอกว่ายังมี markup แบนเนอร์ฝังอยู่ไหม */
function dth_hero_inline_page_id() {
	$id = (int) get_option( 'page_on_front' );
	if ( ! $id ) {
		$home = get_page_by_path( 'home' );
		if ( $home ) { $id = (int) $home->ID; }
	}
	if ( ! $id ) { return 0; }
	$post = get_post( $id );
	if ( ! $post || false === strpos( $post->post_content, '<section class="hero"' ) ) { return 0; }
	return $id;
}

add_action( 'admin_notices', function () {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-dth_hero' !== $screen->id ) { return; }
	if ( ! current_user_can( 'edit_pages' ) ) { return; }
	$id = dth_hero_inline_page_id();
	if ( ! $id ) { return; }
	?>
	<div class="notice notice-warning">
		<p><strong>แบนเนอร์บนหน้าแรกยังไม่ได้ใช้เมนูนี้</strong></p>
		<p>เนื้อหาหน้าแรกมี markup แบนเนอร์ฝังอยู่ในตัวหน้า การแก้รูปในเมนูนี้จึงยังไม่มีผลกับหน้าแรก<br>
			กดปุ่มด้านล่างเพื่อเปลี่ยนให้หน้าแรกดึงแบนเนอร์จากเมนูนี้ — <strong>หน้าตาเว็บไม่เปลี่ยน</strong>
			แต่หลังจากนั้นจะเปลี่ยนรูป เพิ่มสไลด์ หรือแก้ข้อความได้จากที่นี่เลย</p>
		<p>
			<a class="button button-primary" href="<?php echo esc_url( wp_nonce_url( admin_url( 'edit.php?post_type=dth_hero&dth_hero_migrate=1' ), 'dth_hero_migrate' ) ); ?>">
				เปลี่ยนให้หน้าแรกใช้แบนเนอร์จากเมนูนี้
			</a>
			<a class="button" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">ดูเนื้อหาหน้าแรกก่อน</a>
		</p>
	</div>
	<?php
} );

add_action( 'admin_init', function () {
	if ( empty( $_GET['dth_hero_migrate'] ) ) { return; }
	if ( ! current_user_can( 'edit_pages' ) ) { return; }
	check_admin_referer( 'dth_hero_migrate' );

	$id = dth_hero_inline_page_id();
	if ( ! $id ) {
		wp_safe_redirect( admin_url( 'edit.php?post_type=dth_hero&dth_hero_done=none' ) );
		exit;
	}
	$post    = get_post( $id );
	$content = (string) $post->post_content;

	// แทน <section class="hero"> … </section> ก้อนแรกด้วย shortcode
	$new = preg_replace( '#<section class="hero".*?</section>#s', '[dth_hero]', $content, 1 );
	if ( null === $new || $new === $content ) {
		wp_safe_redirect( admin_url( 'edit.php?post_type=dth_hero&dth_hero_done=fail' ) );
		exit;
	}

	// เก็บเนื้อหาเดิมไว้กู้คืนได้
	update_post_meta( $id, 'dth_hero_backup', $content );
	wp_update_post( array( 'ID' => $id, 'post_content' => $new ) );
	wp_safe_redirect( admin_url( 'edit.php?post_type=dth_hero&dth_hero_done=ok' ) );
	exit;
} );

add_action( 'admin_notices', function () {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-dth_hero' !== $screen->id || empty( $_GET['dth_hero_done'] ) ) { return; }
	$state = sanitize_key( wp_unslash( $_GET['dth_hero_done'] ) );
	$map   = array(
		'ok'   => array( 'success', 'เรียบร้อย — หน้าแรกดึงแบนเนอร์จากเมนูนี้แล้ว ลองเปลี่ยนรูปแล้วเปิดหน้าแรกดูได้เลย (ถ้าเว็บเปิดระบบแคชไว้ ให้ล้างแคชก่อน)' ),
		'none' => array( 'info', 'หน้าแรกใช้แบนเนอร์จากเมนูนี้อยู่แล้ว ไม่ต้องทำอะไรเพิ่ม' ),
		'fail' => array( 'error', 'ไม่พบ markup แบนเนอร์ในรูปแบบที่รู้จัก — แก้เองได้โดยเปิดหน้าแรกในตัวแก้ไขโค้ด แล้วแทนก้อน &lt;section class="hero"&gt;…&lt;/section&gt; ด้วย [dth_hero]' ),
	);
	if ( ! isset( $map[ $state ] ) ) { return; }
	printf(
		'<div class="notice notice-%s is-dismissible"><p>%s</p></div>',
		esc_attr( $map[ $state ][0] ),
		wp_kses( $map[ $state ][1], array( 'strong' => array(), 'code' => array() ) )
	);
} );
