<?php
/**
 * Shared markup helpers.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

/**
 * Inline SVG icons used across the templates.
 *
 * @param string $name  Icon key.
 * @param string $class Extra CSS classes.
 * @return string
 */
function dth_icon( $name, $class = 'im' ) {
	$paths = array(
		'clock'    => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'eye'      => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>',
		'mail'     => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>',
		'phone'    => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/>',
		'doc'      => '<path d="M14 2H7a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7Z"/><path d="M14 2v5h5"/><path d="M9 13h6M9 17h6"/>',
		'search'   => '<path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/>',
		'arrow-up' => '<path d="M12 19V5"/><path d="m5 12 7-7 7 7"/>',
		'pin'      => '<path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/>',
	);

	if ( empty( $paths[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="%s" viewBox="0 0 24 24" aria-hidden="true">%s</svg>',
		esc_attr( $class ),
		$paths[ $name ]
	);
}

/**
 * Brand-coloured social icons for the top bar.
 *
 * @param string $name Network key.
 * @return string
 */
function dth_social_icon( $name ) {
	$paths = array(
		'facebook' => 'M13.5 21v-8h2.5l.4-3h-2.9V8.2c0-.9.3-1.5 1.5-1.5H16.5V4.1S15.4 4 14.3 4c-2.3 0-3.8 1.4-3.8 3.9V10H8v3h2.5v8h3Z',
		'x'        => 'M18.24 2.25h3.31l-7.23 8.26L23 21.75h-6.66l-5.22-6.82-5.97 6.82H1.84l7.73-8.84L1.25 2.25h6.83l4.71 6.23 5.45-6.23Zm-1.16 17.52h1.83L7.01 4.13H5.04l12.04 15.64Z',
		'youtube'  => 'M23 7.5s-.22-1.55-.9-2.23c-.86-.9-1.82-.9-2.26-.96C16.7 4.05 12 4.05 12 4.05s-4.7 0-7.84.26c-.44.06-1.4.06-2.26.96C1.22 5.95 1 7.5 1 7.5S.77 9.31.77 11.13v1.7C.77 14.65 1 16.46 1 16.46s.22 1.55.9 2.23c.86.9 1.99.87 2.49.97 1.8.17 7.61.22 7.61.22s4.7-.01 7.84-.27c.44-.06 1.4-.06 2.26-.96.68-.68.9-2.23.9-2.23s.23-1.81.23-3.63v-1.7c0-1.82-.23-3.63-.23-3.63ZM9.75 14.6V8.74l6.02 2.94-6.02 2.92Z',
		'tiktok'   => 'M16.5 2h-3v13.5a2.5 2.5 0 1 1-2.5-2.5c.27 0 .53.04.78.12V9.9a5.6 5.6 0 0 0-.78-.06A5.55 5.55 0 1 0 16.5 15V8.4a6.86 6.86 0 0 0 4 1.28V6.6a3.86 3.86 0 0 1-4-3.83V2Z',
	);

	if ( empty( $paths[ $name ] ) ) {
		return '';
	}

	return '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="' . $paths[ $name ] . '"/></svg>';
}

/**
 * Format a post date in the Thai Buddhist calendar, e.g. 16-09-2567.
 *
 * @param int|WP_Post|null $post Post to read.
 * @return string
 */
function dth_thai_date( $post = null ) {
	$timestamp = (int) get_post_time( 'U', true, $post );
	if ( ! $timestamp ) {
		return '';
	}

	return gmdate( 'd-m-', $timestamp + ( (int) get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ) . ( (int) gmdate( 'Y', $timestamp ) + 543 );
}

/**
 * The URL a card should point at: the external link when set, otherwise the post.
 *
 * @param int|WP_Post|null $post Post to read.
 * @return string
 */
function dth_link_for( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}

	foreach ( array( 'dth_external_url', 'dth_link', 'dth_file' ) as $key ) {
		$value = get_post_meta( $post->ID, $key, true );
		if ( $value ) {
			return $value;
		}
	}

	return get_permalink( $post );
}

/**
 * Whether a card link leaves the site.
 *
 * @param string $url Link being rendered.
 * @return bool
 */
function dth_is_external( $url ) {
	$host = wp_parse_url( $url, PHP_URL_HOST );
	return $host && $host !== wp_parse_url( home_url(), PHP_URL_HOST );
}

/**
 * Split a "label | value" textarea into rows.
 *
 * @param string $raw Stored meta value.
 * @return array<int,array{0:string,1:string}>
 */
function dth_parse_pairs( $raw ) {
	$rows = array();
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $raw ) as $line ) {
		if ( '' === trim( $line ) ) {
			continue;
		}
		$parts = array_map( 'trim', explode( '|', $line, 2 ) );
		$rows[] = array( $parts[0], isset( $parts[1] ) ? $parts[1] : '' );
	}
	return $rows;
}

/**
 * Split a newline-separated textarea into a list.
 *
 * @param string $raw Stored meta value.
 * @return string[]
 */
function dth_parse_lines( $raw ) {
	return array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) $raw ) ), 'strlen' ) );
}

/**
 * Fetch published posts of a DTH type in menu order.
 *
 * @param string $post_type Post type name.
 * @param int    $limit     Maximum posts.
 * @param array  $extra     Extra WP_Query arguments.
 * @return WP_Post[]
 */
function dth_get_posts( $post_type, $limit = -1, $extra = array() ) {
	return get_posts( array_merge( array(
		'post_type'      => $post_type,
		'posts_per_page' => $limit,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
		'no_found_rows'  => true,
	), $extra ) );
}

/**
 * Section heading with icon and optional "see all" link.
 *
 * @param string $title    Heading text.
 * @param string $more_url Optional link URL.
 * @param string $more_txt Optional link text.
 * @param string $tag      Heading tag to use.
 */
function dth_kicker( $title, $more_url = '', $more_txt = '', $tag = 'h2' ) {
	echo '<div class="kicker">';
	printf( '<%1$s>%2$s</%1$s>', esc_html( $tag ), esc_html( $title ) );
	if ( $more_url && $more_txt ) {
		printf(
			'<a href="%s" class="more see-all">%s <span class="arr" aria-hidden="true">&rarr;</span></a>',
			esc_url( $more_url ),
			esc_html( $more_txt )
		);
	}
	echo '</div>';
}

/**
 * Numbered pagination for archives.
 */
function dth_pagination() {
	$links = paginate_links( array(
		'type'      => 'plain',
		'prev_text' => __( '&laquo; ก่อนหน้า', 'dth' ),
		'next_text' => __( 'ถัดไป &raquo;', 'dth' ),
	) );

	if ( ! $links ) {
		return;
	}

	printf(
		'<nav class="dth-pagination" aria-label="%s">%s</nav>',
		esc_attr__( 'หน้าถัดไป', 'dth' ),
		wp_kses_post( $links )
	);
}

/**
 * Render a grid of partner logos.
 *
 * @param WP_Post[] $partners Partner posts.
 * @param string    $extra    Modifier prefix, e.g. 'gov'.
 */
function dth_render_partners( $partners, $extra = '' ) {
	echo '<div class="partners' . ( $extra ? ' ' . esc_attr( $extra ) . '-partners' : '' ) . '">';

	foreach ( $partners as $partner ) {
		$url  = get_post_meta( $partner->ID, 'dth_link', true );
		$logo = get_the_post_thumbnail_url( $partner, 'medium' );
		$name = get_the_title( $partner );

		printf(
			'<a class="partner%1$s" href="%2$s"%3$s>%4$s<span>%5$s</span></a>',
			$extra ? ' ' . esc_attr( $extra ) . '-partner' : '',
			esc_url( $url ? $url : '#' ),
			$url && dth_is_external( $url ) ? ' target="_blank" rel="noopener"' : '',
			$logo ? sprintf( '<img src="%s" alt="%s" loading="lazy">', esc_url( $logo ), esc_attr( $name ) ) : '',
			esc_html( $name )
		);
	}

	echo '</div>';
}

/**
 * Permalink of a theme page by slug, falling back to the home page.
 *
 * @param string $slug Page slug created by the importer, e.g. 'about'.
 * @return string
 */
function dth_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' );
}

/**
 * Shown in place of the primary menu until one is assigned.
 */
function dth_menu_fallback() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		printf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), esc_html__( 'หน้าแรก', 'dth' ) );
		return;
	}

	printf(
		'<a href="%s">%s</a>',
		esc_url( admin_url( 'nav-menus.php' ) ),
		esc_html__( 'ตั้งค่าเมนูหลัก', 'dth' )
	);
}

add_action( 'wp_ajax_dth_contact', 'dth_handle_contact' );
add_action( 'wp_ajax_nopriv_dth_contact', 'dth_handle_contact' );
/**
 * Email the floating contact form to the association.
 */
function dth_handle_contact() {
	check_ajax_referer( 'dth_contact', 'nonce' );

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$reply   = isset( $_POST['contact'] ) ? sanitize_text_field( wp_unslash( $_POST['contact'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || '' === $message ) {
		wp_send_json_error( array( 'message' => __( 'กรุณากรอกชื่อและข้อความ', 'dth' ) ), 400 );
	}

	$to = dth_option( 'dth_contact_to' );
	if ( ! is_email( $to ) ) {
		$to = dth_option( 'dth_email' );
	}
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}

	$body = sprintf(
		/* translators: 1: sender name, 2: contact detail, 3: message body. */
		__( "มีข้อความใหม่จากเว็บไซต์\n\nชื่อ: %1\$s\nช่องทางติดต่อกลับ: %2\$s\n\nข้อความ:\n%3\$s", 'dth' ),
		$name,
		$reply ? $reply : '-',
		$message
	);

	$sent = wp_mail(
		$to,
		/* translators: %s: sender name. */
		sprintf( __( '[เว็บไซต์ DTH] ข้อความจาก %s', 'dth' ), $name ),
		$body
	);

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => __( 'ส่งข้อความไม่สำเร็จ กรุณาติดต่อทางโทรศัพท์', 'dth' ) ), 500 );
	}

	wp_send_json_success();
}
