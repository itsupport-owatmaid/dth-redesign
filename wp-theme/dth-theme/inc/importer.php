<?php
/**
 * One-click importer: turns the seed data into real, editable WordPress content.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

const DTH_IMAGE_QUEUE  = 'dth_import_image_queue';
const DTH_IMAGE_BATCH  = 4;

add_action( 'admin_menu', 'dth_import_menu' );
/**
 * Add the importer under Tools.
 */
function dth_import_menu() {
	add_management_page(
		__( 'นำเข้าเนื้อหา DTH', 'dth' ),
		__( 'นำเข้าเนื้อหา DTH', 'dth' ),
		'manage_options',
		'dth-import',
		'dth_import_page'
	);
}

/**
 * Render the importer screen.
 */
function dth_import_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$queue       = get_option( DTH_IMAGE_QUEUE, array() );
	$remaining   = is_array( $queue ) ? count( $queue ) : 0;
	$locations   = get_theme_mod( 'nav_menu_locations', array() );
	$menus_ready = ! empty( $locations['primary'] ) && wp_get_nav_menu_object( $locations['primary'] );
	$done      = isset( $_GET['dth_done'] ) ? sanitize_key( wp_unslash( $_GET['dth_done'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only notice.
	$auto      = isset( $_GET['dth_auto'] ) && '1' === $_GET['dth_auto']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only flag.
	?>
	<div class="wrap dth-import-panel">
		<h1><?php esc_html_e( 'นำเข้าเนื้อหา DTH', 'dth' ); ?></h1>

		<?php if ( 'content' === $done ) : ?>
			<div class="notice notice-success"><p><?php esc_html_e( 'นำเข้าเนื้อหาเรียบร้อยแล้ว — ขั้นตอนถัดไปคือดึงรูปภาพเข้าคลังสื่อ', 'dth' ); ?></p></div>
		<?php elseif ( 'images' === $done ) : ?>
			<div class="notice notice-success"><p><?php esc_html_e( 'ดึงรูปภาพเข้าคลังสื่อครบแล้ว', 'dth' ); ?></p></div>
		<?php elseif ( 'structure' === $done ) : ?>
			<div class="notice notice-success"><p><?php esc_html_e( 'สร้างเมนูและหน้าเว็บเรียบร้อยแล้ว', 'dth' ); ?></p></div>
		<?php endif; ?>

		<h2><?php esc_html_e( 'ขั้นที่ 1 — เนื้อหาทั้งหมด', 'dth' ); ?></h2>
		<p><?php esc_html_e( 'สร้างข่าว สื่อ คณะกรรมการ เจ้าหน้าที่ สภาฯ จังหวัด ข้อเสนอ สไลด์ สิทธิคนพิการ คำถามที่พบบ่อย องค์การเครือข่าย พร้อมหน้าเพจ เมนูหลัก และเมนูท้ายเว็บ จากเนื้อหาเว็บไซต์เดิมทั้งหมด', 'dth' ); ?></p>
		<p><strong><?php esc_html_e( 'กดซ้ำได้ปลอดภัย', 'dth' ); ?></strong> — <?php esc_html_e( 'รายการที่นำเข้าไปแล้วจะถูกข้าม ไม่สร้างซ้ำ และไม่ทับเนื้อหาที่คุณแก้ไขเอง', 'dth' ); ?></p>
		<form method="post">
			<?php wp_nonce_field( 'dth_import_content' ); ?>
			<input type="hidden" name="dth_action" value="content">
			<?php submit_button( __( 'นำเข้าเนื้อหาทั้งหมด', 'dth' ), 'primary', 'submit', false ); ?>
		</form>

		<hr>

		<h2><?php esc_html_e( 'ขั้นที่ 2 — เมนูและหน้าเว็บ', 'dth' ); ?></h2>
		<p><?php esc_html_e( 'ขั้นที่ 1 สร้างส่วนนี้ให้อยู่แล้ว ปุ่มนี้มีไว้เผื่อกรณีที่ขั้นที่ 1 ทำงานไม่จบเพราะเซิร์ฟเวอร์ตัดเวลาก่อน (เนื้อหาเข้าครบแต่เมนูยังไม่ขึ้น) — ทำงานเร็วเพราะสร้างเฉพาะเมนูและหน้าเพจ', 'dth' ); ?></p>
		<p>
			<?php
			if ( $menus_ready ) {
				esc_html_e( 'สถานะ: เมนูหลักและเมนูท้ายเว็บถูกตั้งค่าแล้ว', 'dth' );
			} else {
				echo '<strong>' . esc_html__( 'สถานะ: ยังไม่มีเมนู — กดปุ่มด้านล่างเพื่อสร้าง', 'dth' ) . '</strong>';
			}
			?>
		</p>
		<form method="post">
			<?php wp_nonce_field( 'dth_import_structure' ); ?>
			<input type="hidden" name="dth_action" value="structure">
			<?php submit_button( __( 'สร้างเมนูและหน้าเว็บ', 'dth' ), $menus_ready ? 'secondary' : 'primary', 'submit', false ); ?>
		</form>

		<hr>

		<h2><?php esc_html_e( 'ขั้นที่ 3 — ดึงรูปภาพเข้าคลังสื่อ', 'dth' ); ?></h2>
		<p><?php esc_html_e( 'รูปทั้งหมด (โลโก้ ภาพคณะกรรมการ ภาพข่าว อินโฟกราฟิก) จะถูกดาวน์โหลดเข้าคลังสื่อของเว็บนี้ เพื่อให้เจ้าหน้าที่เปลี่ยนรูปเองได้ในภายหลัง', 'dth' ); ?></p>
		<p>
			<?php
			printf(
				/* translators: %d: number of images left. */
				esc_html__( 'เหลือรูปที่ต้องดึง: %d รูป', 'dth' ),
				(int) $remaining
			);
			?>
		</p>

		<?php if ( $remaining ) : ?>
			<form method="post" id="dth-image-form">
				<?php wp_nonce_field( 'dth_import_images' ); ?>
				<input type="hidden" name="dth_action" value="images">
				<input type="hidden" name="dth_auto" value="1">
				<?php submit_button( __( 'เริ่มดึงรูปภาพ', 'dth' ), 'primary', 'submit', false ); ?>
			</form>
			<?php if ( $auto ) : ?>
				<p><em><?php esc_html_e( 'กำลังดึงรูปภาพ… กรุณาเปิดหน้านี้ค้างไว้จนกว่าจะครบ', 'dth' ); ?></em></p>
				<script>setTimeout(function () { document.getElementById('dth-image-form').submit(); }, 800);</script>
			<?php endif; ?>
		<?php else : ?>
			<p><em><?php esc_html_e( 'ไม่มีรูปค้างอยู่ในคิว', 'dth' ); ?></em></p>
		<?php endif; ?>

		<hr>

		<h2><?php esc_html_e( 'หลังนำเข้าเสร็จ', 'dth' ); ?></h2>
		<ol>
			<li><?php esc_html_e( 'ไปที่ การตั้งค่า > การอ่าน แล้วตรวจว่าหน้าแรกถูกตั้งเป็น "หน้าแรก" (ตัวนำเข้าตั้งให้อัตโนมัติแล้ว)', 'dth' ); ?></li>
			<li><?php esc_html_e( 'ไปที่ ตั้งค่า > ลิงก์ถาวร แล้วกดบันทึก 1 ครั้ง เพื่อให้ลิงก์ของข่าว/สื่อ/จังหวัดทำงาน', 'dth' ); ?></li>
			<li><?php esc_html_e( 'ไปที่ รูปแบบเว็บ > ปรับแต่ง > ตั้งค่าเว็บไซต์ DTH เพื่อแก้ที่อยู่ เบอร์โทร อีเมล และโซเชียลมีเดีย', 'dth' ); ?></li>
			<li><?php esc_html_e( 'ไปที่ รูปแบบเว็บ > เมนู เพื่อจัดลำดับเมนูเพิ่มเติมได้ตามต้องการ', 'dth' ); ?></li>
		</ol>
	</div>
	<?php
}

add_action( 'admin_init', 'dth_import_handle' );
/**
 * Run the requested import step.
 */
function dth_import_handle() {
	if ( ! isset( $_POST['dth_action'] ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$action = sanitize_key( wp_unslash( $_POST['dth_action'] ) );

	if ( 'content' === $action ) {
		check_admin_referer( 'dth_import_content' );
		dth_import_content();
		wp_safe_redirect( admin_url( 'tools.php?page=dth-import&dth_done=content' ) );
		exit;
	}

	if ( 'structure' === $action ) {
		check_admin_referer( 'dth_import_structure' );
		dth_import_structure();
		wp_safe_redirect( admin_url( 'tools.php?page=dth-import&dth_done=structure' ) );
		exit;
	}

	if ( 'images' === $action ) {
		check_admin_referer( 'dth_import_images' );
		$remaining = dth_import_images( DTH_IMAGE_BATCH );
		$url       = admin_url( 'tools.php?page=dth-import' );
		$url       = $remaining ? add_query_arg( 'dth_auto', '1', $url ) : add_query_arg( 'dth_done', 'images', $url );
		wp_safe_redirect( $url );
		exit;
	}
}

/**
 * Create every post, term, page and menu from the seed data.
 */
function dth_import_content() {
	dth_relax_limits();

	$seed  = dth_seed_data();
	$queue = array();

	$slide_ids = array();
	foreach ( $seed['slides'] as $slide ) {
		$id = dth_seed_post( 'dth_slide', 'slide-' . $slide['title'], array(
			'post_title'  => $slide['title'],
			'menu_order'  => 0,
		), array(
			'dth_tag'      => $slide['tag'],
			'dth_subtitle' => $slide['subtitle'],
		) );
		if ( $id ) {
			$slide_ids[] = $id;
			dth_queue_image( $queue, $id, $slide['image'] );
		}
	}

	foreach ( $seed['rights'] as $right ) {
		dth_seed_post( 'dth_right', 'right-' . $right['title'], array(
			'post_title'   => $right['title'],
			'post_content' => $right['content'],
			'menu_order'   => $right['order'],
		), array(
			'dth_kicker'     => $right['kicker'],
			'dth_tab_label'  => $right['tab_label'],
			'dth_bullets'    => implode( "\n", $right['bullets'] ),
			'dth_cta_label'  => $right['cta_label'],
			'dth_cta_url'    => $right['cta_url'],
			'dth_card_badge' => $right['card_badge'],
			'dth_card_title' => $right['card_title'],
			'dth_pairs'      => implode( "\n", $right['pairs'] ),
		) );
	}

	foreach ( $seed['faqs'] as $faq ) {
		dth_seed_post( 'dth_faq', 'faq-' . $faq['title'], array(
			'post_title' => $faq['title'],
			'menu_order' => $faq['order'],
		), array(
			'dth_link' => $faq['link'],
		) );
	}

	$partner_groups = array(
		'members'    => __( 'องค์การสมาชิก', 'dth' ),
		'government' => __( 'หน่วยงานที่เกี่ยวข้อง', 'dth' ),
	);
	foreach ( $seed['partners'] as $partner ) {
		$id = dth_seed_post( 'dth_partner', 'partner-' . $partner['title'], array(
			'post_title' => $partner['title'],
			'menu_order' => $partner['order'],
		), array(
			'dth_link' => $partner['link'],
		) );
		if ( $id ) {
			dth_set_term( $id, 'dth_partner_group', $partner_groups[ $partner['group'] ], $partner['group'] );
			dth_queue_image( $queue, $id, $partner['image'] );
		}
	}

	$person_groups = array(
		'board-executive' => __( 'คณะกรรมการบริหาร', 'dth' ),
		'board'           => __( 'คณะกรรมการสมาคม', 'dth' ),
		'staff'           => __( 'เจ้าหน้าที่สมาคม', 'dth' ),
	);
	foreach ( $seed['people'] as $person ) {
		$id = dth_seed_post( 'dth_person', 'person-' . $person['group'] . '-' . $person['title'], array(
			'post_title' => $person['title'],
			'menu_order' => $person['order'],
		), array(
			'dth_position' => $person['position'],
		) );
		if ( $id ) {
			dth_set_term( $id, 'dth_person_group', $person_groups[ $person['group'] ], $person['group'] );
			dth_queue_image( $queue, $id, $person['image'] );
		}
	}

	foreach ( $seed['provinces'] as $province ) {
		$id = dth_seed_post( 'dth_province', 'province-' . $province['title'], array(
			'post_title' => $province['title'],
			'menu_order' => $province['order'],
		), array(
			'dth_chair'      => $province['chair'],
			'dth_disability' => $province['disability'],
			'dth_phone'      => $province['phone'],
		) );
		if ( $id ) {
			dth_set_term( $id, 'dth_region', $province['region'] );
		}
	}

	foreach ( array( 'news' => 'dth_news', 'media' => 'dth_media' ) as $key => $post_type ) {
		$taxonomy = 'dth_news' === $post_type ? 'dth_news_cat' : 'dth_media_cat';

		foreach ( $seed[ $key ] as $item ) {
			$id = dth_seed_post( $post_type, $key . '-' . $item['title'], array(
				'post_title'   => $item['title'],
				'post_excerpt' => $item['excerpt'],
				'menu_order'   => $item['order'],
			), array(
				'dth_external_url' => $item['url'],
				'dth_date_label'   => $item['date_label'],
				'dth_views'        => $item['views'],
			) );

			if ( ! $id ) {
				continue;
			}

			foreach ( $item['cats'] as $slug ) {
				$name = isset( $seed['category_names'][ $slug ] ) ? $seed['category_names'][ $slug ] : $slug;
				dth_set_term( $id, $taxonomy, $name, $slug, true );
			}
			dth_queue_image( $queue, $id, $item['image'] );
		}
	}

	foreach ( $seed['proposals'] as $proposal ) {
		dth_seed_post( 'dth_proposal', 'proposal-' . $proposal['title'], array(
			'post_title' => $proposal['title'],
			'menu_order' => $proposal['order'],
		), array(
			'dth_file'       => $proposal['file'],
			'dth_meta_label' => $proposal['meta_label'],
			'dth_gallery'    => implode( ', ', $proposal['gallery'] ),
		) );
	}

	dth_queue_logo( $queue, $seed['asset_base'] );
	update_option( DTH_IMAGE_QUEUE, array_merge( (array) get_option( DTH_IMAGE_QUEUE, array() ), $queue ) );

	dth_import_structure();
}

/**
 * Create the pages, front page and menus.
 *
 * Kept separate from the bulk row import so it can be re-run on its own: on
 * slow shared hosting the content pass can hit max_execution_time before it
 * reaches this point, which leaves the site with content but no menus.
 */
function dth_import_structure() {
	dth_relax_limits();

	$seed = dth_seed_data();

	// Menu children point at news categories, which normally appear while the
	// news rows import. Make sure they exist even when that pass did not finish.
	foreach ( array( 'pr', 'activity', 'knowledge' ) as $slug ) {
		if ( ! get_term_by( 'slug', $slug, 'dth_news_cat' ) ) {
			$name = isset( $seed['category_names'][ $slug ] ) ? $seed['category_names'][ $slug ] : $slug;
			wp_insert_term( $name, 'dth_news_cat', array( 'slug' => $slug ) );
		}
	}

	$page_ids = array();
	foreach ( $seed['pages'] as $slug => $page ) {
		$page_ids[ $slug ] = dth_seed_page( $slug, $page['title'], $page['content'] );
	}

	$front_id = dth_seed_page( 'home', __( 'หน้าแรก', 'dth' ), '' );
	if ( $front_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_id );
	}

	dth_build_menus( $page_ids );
}

/**
 * Lift the PHP time and memory ceilings for the import, where the host allows it.
 */
function dth_relax_limits() {
	if ( function_exists( 'set_time_limit' ) ) {
		@set_time_limit( 0 ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged -- Disabled on some hosts.
	}
	@ini_set( 'memory_limit', WP_MAX_MEMORY_LIMIT ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged, WordPress.PHP.IniSet.memory_limit_Blacklisted -- Disabled on some hosts.
	ignore_user_abort( true );
}

/**
 * Create a seeded post once, keyed so re-runs skip it.
 *
 * @param string $post_type Post type.
 * @param string $key       Stable identity for this seed row.
 * @param array  $postarr   Arguments for wp_insert_post().
 * @param array  $meta      Meta fields to set.
 * @return int Post ID, or 0 when it already exists.
 */
function dth_seed_post( $post_type, $key, $postarr, $meta = array() ) {
	$hash     = md5( $key );
	$existing = get_posts( array(
		'post_type'      => $post_type,
		'post_status'    => 'any',
		'posts_per_page' => 1,
		'fields'         => 'ids',
		'meta_key'       => '_dth_seed_key', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- One-off admin import.
		'meta_value'     => $hash, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value -- One-off admin import.
		'no_found_rows'  => true,
	) );

	if ( $existing ) {
		return 0;
	}

	$post_id = wp_insert_post( wp_parse_args( $postarr, array(
		'post_type'   => $post_type,
		'post_status' => 'publish',
	) ), true );

	if ( is_wp_error( $post_id ) ) {
		return 0;
	}

	update_post_meta( $post_id, '_dth_seed_key', $hash );
	foreach ( $meta as $meta_key => $value ) {
		if ( '' !== $value && null !== $value ) {
			update_post_meta( $post_id, $meta_key, $value );
		}
	}

	return $post_id;
}

/**
 * Create a page by slug once.
 *
 * @param string $slug    Page slug.
 * @param string $title   Page title.
 * @param string $content Block markup.
 * @return int Page ID.
 */
function dth_seed_page( $slug, $title, $content ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return $existing->ID;
	}

	$page_id = wp_insert_post( array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_name'    => $slug,
		'post_title'   => $title,
		'post_content' => $content,
	), true );

	return is_wp_error( $page_id ) ? 0 : $page_id;
}

/**
 * Assign a term to a post, creating it when needed.
 *
 * @param int    $post_id  Post to tag.
 * @param string $taxonomy Taxonomy name.
 * @param string $name     Term name.
 * @param string $slug     Optional slug.
 * @param bool   $append   Whether to keep existing terms.
 */
function dth_set_term( $post_id, $taxonomy, $name, $slug = '', $append = false ) {
	$term = $slug ? get_term_by( 'slug', $slug, $taxonomy ) : get_term_by( 'name', $name, $taxonomy );

	if ( ! $term ) {
		$created = wp_insert_term( $name, $taxonomy, $slug ? array( 'slug' => $slug ) : array() );
		if ( is_wp_error( $created ) ) {
			return;
		}
		$term_id = $created['term_id'];
	} else {
		$term_id = $term->term_id;
	}

	wp_set_object_terms( $post_id, (int) $term_id, $taxonomy, $append );
}

/**
 * Add an image to the sideload queue.
 *
 * @param array  $queue   Queue, by reference.
 * @param int    $post_id Post that will own the image.
 * @param string $url     Remote image URL.
 */
function dth_queue_image( &$queue, $post_id, $url ) {
	if ( ! $post_id || ! $url ) {
		return;
	}
	$queue[] = array( 'post_id' => $post_id, 'url' => $url, 'target' => 'thumbnail' );
}

/**
 * Queue the site logo so it lands in the media library too.
 *
 * @param array  $queue Queue, by reference.
 * @param string $base  Asset base URL.
 */
function dth_queue_logo( &$queue, $base ) {
	if ( get_theme_mod( 'custom_logo' ) ) {
		return;
	}
	$queue[] = array( 'post_id' => 0, 'url' => $base . 'Pic/dth-logo.png', 'target' => 'custom_logo' );
	$queue[] = array( 'post_id' => 0, 'url' => $base . 'Pic/dth-logo-wide.png', 'target' => 'logo_wide' );
}

/**
 * Download the next few queued images into the media library.
 *
 * @param int $batch How many to process this run.
 * @return int Images still queued.
 */
function dth_import_images( $batch ) {
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$queue = (array) get_option( DTH_IMAGE_QUEUE, array() );

	for ( $i = 0; $i < $batch && $queue; $i++ ) {
		$job = array_shift( $queue );
		$id  = dth_sideload( $job['url'], isset( $job['post_id'] ) ? (int) $job['post_id'] : 0 );

		if ( ! $id ) {
			continue;
		}

		if ( 'thumbnail' === $job['target'] && $job['post_id'] ) {
			set_post_thumbnail( (int) $job['post_id'], $id );
		} elseif ( 'custom_logo' === $job['target'] ) {
			set_theme_mod( 'custom_logo', $id );
		} elseif ( 'logo_wide' === $job['target'] ) {
			set_theme_mod( 'dth_logo_wide', wp_get_attachment_url( $id ) );
		}
	}

	update_option( DTH_IMAGE_QUEUE, array_values( $queue ) );

	return count( $queue );
}

/**
 * Sideload one remote image, reusing an earlier download of the same URL.
 *
 * @param string $url     Remote URL, possibly containing non-ASCII path segments.
 * @param int    $post_id Post to attach to.
 * @return int Attachment ID, or 0 on failure.
 */
function dth_sideload( $url, $post_id = 0 ) {
	$existing = get_posts( array(
		'post_type'      => 'attachment',
		'post_status'    => 'any',
		'posts_per_page' => 1,
		'fields'         => 'ids',
		'meta_key'       => '_dth_source', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key -- One-off admin import.
		'meta_value'     => $url, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value -- One-off admin import.
		'no_found_rows'  => true,
	) );

	if ( $existing ) {
		return (int) $existing[0];
	}

	$parts = wp_parse_url( $url );
	if ( empty( $parts['scheme'] ) || empty( $parts['host'] ) ) {
		return 0;
	}

	$path = isset( $parts['path'] ) ? implode( '/', array_map( 'rawurlencode', explode( '/', $parts['path'] ) ) ) : '';
	$safe = $parts['scheme'] . '://' . $parts['host'] . $path;
	if ( ! empty( $parts['query'] ) ) {
		$safe .= '?' . $parts['query'];
	}

	$attachment_id = media_sideload_image( $safe, $post_id, null, 'id' );
	if ( is_wp_error( $attachment_id ) ) {
		return 0;
	}

	update_post_meta( $attachment_id, '_dth_source', $url );

	return (int) $attachment_id;
}

/**
 * Build the primary and footer menus from the imported content.
 *
 * @param array $page_ids Page IDs keyed by slug.
 */
function dth_build_menus( $page_ids ) {
	$about_id = isset( $page_ids['about'] ) ? $page_ids['about'] : 0;
	$rules_id = isset( $page_ids['regulations'] ) ? $page_ids['regulations'] : 0;

	$primary = array(
		array( 'title' => __( 'หน้าแรก', 'dth' ), 'url' => home_url( '/' ) ),
		array(
			'title'    => __( 'เกี่ยวกับเรา', 'dth' ),
			'page'     => $about_id,
			'children' => array(
				array( 'title' => __( 'ความเป็นมาและวัตถุประสงค์', 'dth' ), 'page' => $about_id ),
				array( 'title' => __( 'คณะกรรมการและเจ้าหน้าที่', 'dth' ), 'archive' => 'dth_person' ),
				array( 'title' => __( 'ข้อบังคับ/ระเบียบ', 'dth' ), 'page' => $rules_id ),
				array( 'title' => __( 'ติดต่อเรา', 'dth' ), 'url' => home_url( '/#contact' ) ),
			),
		),
		array(
			'title'    => __( 'เครือข่าย', 'dth' ),
			'url'      => home_url( '/#network' ),
			'children' => array(
				array( 'title' => __( 'องค์การคนพิการ', 'dth' ), 'url' => home_url( '/#network' ) ),
				array( 'title' => __( 'สภาฯ ประจำจังหวัด', 'dth' ), 'archive' => 'dth_province' ),
			),
		),
		array(
			'title'    => __( 'ข่าวสารและกิจกรรม', 'dth' ),
			'archive'  => 'dth_news',
			'children' => array(
				array( 'title' => __( 'ข่าวประชาสัมพันธ์', 'dth' ), 'term' => array( 'dth_news_cat', 'pr' ) ),
				array( 'title' => __( 'กิจกรรม', 'dth' ), 'term' => array( 'dth_news_cat', 'activity' ) ),
				array( 'title' => __( 'สาระน่ารู้', 'dth' ), 'term' => array( 'dth_news_cat', 'knowledge' ) ),
			),
		),
		array(
			'title'    => __( 'ข้อมูลสำคัญ', 'dth' ),
			'url'      => home_url( '/#rights' ),
			'children' => array(
				array( 'title' => __( 'สิทธิคนพิการที่ควรรู้', 'dth' ), 'url' => home_url( '/#rights' ) ),
				array( 'title' => __( 'คำถามที่พบบ่อย', 'dth' ), 'url' => home_url( '/#qa' ) ),
				array( 'title' => __( 'ข้อเสนอเชิงนโยบาย', 'dth' ), 'archive' => 'dth_proposal' ),
				array( 'title' => __( 'คลังสื่อและเอกสาร', 'dth' ), 'archive' => 'dth_media' ),
			),
		),
	);

	$footer = array(
		array( 'title' => __( 'หน้าแรก', 'dth' ), 'url' => home_url( '/' ) ),
		array( 'title' => __( 'เกี่ยวกับเรา', 'dth' ), 'page' => $about_id ),
		array( 'title' => __( 'คณะกรรมการและเจ้าหน้าที่', 'dth' ), 'archive' => 'dth_person' ),
		array( 'title' => __( 'สภาฯ ประจำจังหวัด', 'dth' ), 'archive' => 'dth_province' ),
		array( 'title' => __( 'ข่าวสารและกิจกรรม', 'dth' ), 'archive' => 'dth_news' ),
		array( 'title' => __( 'คลังสื่อและเอกสาร', 'dth' ), 'archive' => 'dth_media' ),
		array( 'title' => __( 'ข้อเสนอเชิงนโยบาย', 'dth' ), 'archive' => 'dth_proposal' ),
		array( 'title' => __( 'ข้อบังคับ/ระเบียบ', 'dth' ), 'page' => $rules_id ),
		array( 'title' => __( 'ติดต่อเรา', 'dth' ), 'url' => home_url( '/#contact' ) ),
	);

	dth_create_menu( __( 'เมนูหลัก DTH', 'dth' ), 'primary', $primary );
	dth_create_menu( __( 'เมนูท้ายเว็บ DTH', 'dth' ), 'footer', $footer );
}

/**
 * Create a menu and assign it to a location, unless one is already assigned.
 *
 * @param string $name     Menu name.
 * @param string $location Theme location.
 * @param array  $items    Menu item definitions.
 */
function dth_create_menu( $name, $location, $items ) {
	$locations = get_theme_mod( 'nav_menu_locations', array() );
	if ( ! empty( $locations[ $location ] ) && wp_get_nav_menu_object( $locations[ $location ] ) ) {
		return;
	}

	$menu = wp_get_nav_menu_object( $name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $name );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	} else {
		$menu_id = $menu->term_id;
	}

	foreach ( $items as $item ) {
		$parent_id = dth_add_menu_item( $menu_id, $item, 0 );
		foreach ( isset( $item['children'] ) ? $item['children'] : array() as $child ) {
			dth_add_menu_item( $menu_id, $child, $parent_id );
		}
	}

	$locations[ $location ] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/**
 * Add one item to a menu, resolving pages, archives and terms to URLs.
 *
 * @param int   $menu_id   Menu term ID.
 * @param array $item      Item definition.
 * @param int   $parent_id Parent menu item ID.
 * @return int Menu item ID.
 */
function dth_add_menu_item( $menu_id, $item, $parent_id ) {
	$url = isset( $item['url'] ) ? $item['url'] : '';

	if ( ! empty( $item['page'] ) ) {
		$url = get_permalink( $item['page'] );
	} elseif ( ! empty( $item['archive'] ) ) {
		$url = get_post_type_archive_link( $item['archive'] );
	} elseif ( ! empty( $item['term'] ) ) {
		$term = get_term_by( 'slug', $item['term'][1], $item['term'][0] );
		$url  = $term ? get_term_link( $term ) : '';
	}

	if ( ! $url || is_wp_error( $url ) ) {
		return 0;
	}

	$menu_item_id = wp_update_nav_menu_item( $menu_id, 0, array(
		'menu-item-title'     => $item['title'],
		'menu-item-url'       => $url,
		'menu-item-type'      => 'custom',
		'menu-item-status'    => 'publish',
		'menu-item-parent-id' => $parent_id,
	) );

	return is_wp_error( $menu_item_id ) ? 0 : (int) $menu_item_id;
}
