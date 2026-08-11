<?php
/**
 * Top bar, accessibility bar, masthead and primary navigation.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main" class="skip"><?php esc_html_e( 'ข้ามไปยังเนื้อหาหลัก', 'dth' ); ?></a>

<div class="topbar">
  <div class="wrap">
    <div class="left"><span><?php echo esc_html( dth_option( 'dth_tagline' ) ); ?></span></div>
    <div class="right">
      <span class="top-social" aria-label="<?php esc_attr_e( 'โซเชียลมีเดีย', 'dth' ); ?>">
	<?php
	$dth_socials = array(
		'facebook' => array( dth_option( 'dth_facebook' ), 'Facebook' ),
		'x'        => array( dth_option( 'dth_x' ), 'X (Twitter)' ),
		'youtube'  => array( dth_option( 'dth_youtube' ), 'YouTube' ),
		'tiktok'   => array( dth_option( 'dth_tiktok' ), 'TikTok' ),
	);
	foreach ( $dth_socials as $dth_key => $dth_social ) {
		if ( ! $dth_social[0] ) {
			continue;
		}
		printf(
			'<a href="%s" target="_blank" rel="noopener" aria-label="%s">%s</a>',
			esc_url( $dth_social[0] ),
			esc_attr( $dth_social[1] ),
			dth_social_icon( $dth_key ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG.
		);
	}
	?>
      </span>
    </div>
  </div>
</div>

<div class="a11y-bar" role="region" aria-label="<?php esc_attr_e( 'ปรับการแสดงผลเพื่อการเข้าถึง', 'dth' ); ?>">
  <div class="wrap">
    <div class="a11y-group">
      <span><?php esc_html_e( 'ขนาดตัวอักษร', 'dth' ); ?></span>
      <button class="a11y-btn" data-fs=".9" aria-label="<?php esc_attr_e( 'อักษรขนาดเล็ก', 'dth' ); ?>">ก</button>
      <button class="a11y-btn active" data-fs="1" aria-label="<?php esc_attr_e( 'อักษรขนาดปกติ', 'dth' ); ?>" style="font-size:1rem">ก</button>
      <button class="a11y-btn" data-fs="1.18" aria-label="<?php esc_attr_e( 'อักษรขนาดใหญ่', 'dth' ); ?>" style="font-size:1.2rem">ก</button>
    </div>
    <div class="a11y-group">
      <span><?php esc_html_e( 'การแสดงผล', 'dth' ); ?></span>
      <button class="a11y-btn active" data-theme="" aria-label="<?php esc_attr_e( 'แสดงผลปกติ', 'dth' ); ?>">C</button>
      <button class="a11y-btn sw-white" data-theme="hc-white" aria-label="<?php esc_attr_e( 'อักษรขาวพื้นดำ', 'dth' ); ?>">C</button>
      <button class="a11y-btn sw-yellow" data-theme="hc-yellow" aria-label="<?php esc_attr_e( 'อักษรเหลืองพื้นดำ', 'dth' ); ?>">C</button>
    </div>
  </div>
</div>

<header class="site" id="top">
  <div class="nav">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="<?php esc_attr_e( 'หน้าแรก สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย', 'dth' ); ?>">
      <span class="logo">
	<?php
	$dth_logo_id = get_theme_mod( 'custom_logo' );
	if ( $dth_logo_id ) {
		echo wp_get_attachment_image( $dth_logo_id, 'full', false, array( 'alt' => esc_attr__( 'โลโก้ Disabilities Thailand', 'dth' ) ) );
	} else {
		printf(
			'<img src="%s" alt="%s">',
			esc_url( DTH_URI . '/assets/img/dth-logo.png' ),
			esc_attr__( 'โลโก้ Disabilities Thailand', 'dth' )
		);
	}
	?>
      </span>
      <span class="name"><b><?php echo esc_html( dth_option( 'dth_org_name' ) ); ?></b><span><?php echo esc_html( dth_option( 'dth_org_name_en' ) ); ?></span></span>
    </a>

    <nav class="nav-pill" id="menu" aria-label="<?php esc_attr_e( 'เมนูหลัก', 'dth' ); ?>">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => false,
		'items_wrap'     => '%3$s',
		'depth'          => 2,
		'walker'         => new DTH_Nav_Walker(),
		'fallback_cb'    => 'dth_menu_fallback',
	) );
	?>
    </nav>

    <div class="nav-actions">
      <form class="search-mini" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'ค้นหา…', 'dth' ); ?>" aria-label="<?php esc_attr_e( 'ค้นหา', 'dth' ); ?>">
        <button type="submit" aria-label="<?php esc_attr_e( 'ค้นหา', 'dth' ); ?>">&#8981;</button>
      </form>
    </div>

    <button class="burger" id="burger" aria-label="<?php esc_attr_e( 'เปิดเมนู', 'dth' ); ?>" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>
