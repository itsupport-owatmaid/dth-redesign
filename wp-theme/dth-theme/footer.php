<?php
/**
 * Footer, floating contact button, message dialog and back-to-top control.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_phone = dth_option( 'dth_phone' );
$dth_tel   = preg_replace( '/[^0-9+]/', '', (string) $dth_phone );
$dth_email = dth_option( 'dth_email' );
$dth_fb    = dth_option( 'dth_facebook' );
?>
<footer class="site">
  <div class="wrap">
    <div class="foot">
      <div class="flogo">
	<?php
	$dth_wide = dth_option( 'dth_logo_wide' );
	printf(
		'<img src="%s" alt="%s">',
		esc_url( $dth_wide ? $dth_wide : DTH_URI . '/assets/img/dth-logo-wide.png' ),
		esc_attr__( 'โลโก้ DTH', 'dth' )
	);
	?>
      </div>
      <div>
        <h4><?php echo esc_html( dth_option( 'dth_org_fullname' ) ); ?></h4>
        <address>
          <?php echo wp_kses_post( nl2br( esc_html( dth_option( 'dth_address_short' ) ) ) ); ?><br>
          <?php esc_html_e( 'โทรศัพท์', 'dth' ); ?> <a href="tel:<?php echo esc_attr( $dth_tel ); ?>"><?php echo esc_html( $dth_phone ); ?></a><br>
          <?php esc_html_e( 'อีเมล', 'dth' ); ?> <a href="mailto:<?php echo esc_attr( $dth_email ); ?>"><?php echo esc_html( $dth_email ); ?></a>
        </address>
      </div>
    </div>

    <div class="foot-policy">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'footer',
		'container'      => false,
		'items_wrap'     => '%3$s',
		'depth'          => 1,
		'walker'         => new DTH_Footer_Walker(),
		'fallback_cb'    => '__return_empty_string',
	) );
	?>
    </div>

    <div class="foot-copy"><?php echo esc_html( dth_option( 'dth_copyright' ) ); ?></div>
  </div>
</footer>

<div class="fab-wrap" id="fab">
  <div class="fab-panel" id="fabPanel" role="menu" aria-label="<?php esc_attr_e( 'ช่องทางติดต่อ', 'dth' ); ?>">
    <button class="fab-item" type="button" id="openMsg" role="menuitem"><span class="ico ico-msg" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 11 21 3l-8 18-2.5-7.5L3 11Z"/></svg></span> <?php esc_html_e( 'ส่งข้อความถึงทีมงาน', 'dth' ); ?></button>
	<?php if ( $dth_fb ) : ?>
    <a class="fab-item" href="<?php echo esc_url( $dth_fb ); ?>" target="_blank" rel="noopener" role="menuitem"><span class="ico ico-fb" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-8h2.5l.4-3h-2.9V8.2c0-.9.3-1.5 1.5-1.5H16.5V4.1S15.4 4 14.3 4c-2.3 0-3.8 1.4-3.8 3.9V10H8v3h2.5v8h3Z"/></svg></span> Facebook</a>
	<?php endif; ?>
    <a class="fab-item" href="tel:<?php echo esc_attr( $dth_tel ); ?>" role="menuitem"><span class="ico ico-tel" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1A17 17 0 0 1 3 4c0-.6.4-1 1-1h3.6c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.4 0 .8-.3 1l-2.3 2.2Z"/></svg></span> <?php printf( esc_html__( 'โทร %s', 'dth' ), esc_html( $dth_phone ) ); ?></a>
    <a class="fab-item" href="mailto:<?php echo esc_attr( $dth_email ); ?>" role="menuitem"><span class="ico ico-mail" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m4 7 8 6 8-6"/></svg></span> <?php esc_html_e( 'อีเมล', 'dth' ); ?></a>
  </div>
  <button class="fab-main" id="fabMain" aria-label="<?php esc_attr_e( 'เปิดช่องทางติดต่อ', 'dth' ); ?>" aria-expanded="false" aria-controls="fabPanel">
    <img class="ic-open" src="<?php echo esc_url( DTH_URI . '/assets/img/dth-logo.png' ); ?>" alt="" aria-hidden="true">
    <svg class="ic-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M6 6l12 12M18 6 6 18"/></svg>
  </button>
</div>

<div class="modal-back" id="msgBack">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="msgTitle">
    <div class="modal-head"><h3 id="msgTitle"><?php esc_html_e( 'ส่งข้อความถึงทีมงาน', 'dth' ); ?></h3><button class="modal-x" id="closeMsg" aria-label="<?php esc_attr_e( 'ปิด', 'dth' ); ?>">&#10005;</button></div>
    <div id="msgForm">
      <div class="field"><label for="mName"><?php esc_html_e( 'ชื่อของคุณ', 'dth' ); ?></label><input id="mName" type="text" placeholder="<?php esc_attr_e( 'ชื่อ-นามสกุล', 'dth' ); ?>"></div>
      <div class="field"><label for="mContact"><?php esc_html_e( 'ช่องทางติดต่อกลับ', 'dth' ); ?></label><input id="mContact" type="text" placeholder="<?php esc_attr_e( 'เบอร์โทร / อีเมล / LINE ID', 'dth' ); ?>"></div>
      <div class="field"><label for="mMsg"><?php esc_html_e( 'ข้อความ', 'dth' ); ?></label><textarea id="mMsg" rows="4" placeholder="<?php esc_attr_e( 'พิมพ์ข้อความที่ต้องการสอบถาม…', 'dth' ); ?>"></textarea></div>
      <button class="pill-btn" id="sendMsg" type="button" style="width:100%;justify-content:center"><?php esc_html_e( 'ส่งข้อความ', 'dth' ); ?> &rarr;</button>
    </div>
    <div id="msgDone" style="display:none;text-align:center;padding:14px 0">
      <div class="ok-ic" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m8 12.5 2.8 2.8L16 9.5"/></svg></div>
      <h3 style="color:var(--brand-dark);margin:8px 0"><?php esc_html_e( 'ส่งข้อความเรียบร้อย', 'dth' ); ?></h3>
      <p style="color:var(--muted)"><?php esc_html_e( 'ทีมงานจะติดต่อกลับโดยเร็วที่สุด ขอบคุณครับ/ค่ะ', 'dth' ); ?></p>
    </div>
  </div>
</div>

<button class="to-top" id="toTop" type="button">
  <?php echo dth_icon( 'arrow-up', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
  <?php esc_html_e( 'กลับไปด้านบนเว็บไซต์', 'dth' ); ?>
</button>

<?php wp_footer(); ?>
</body>
</html>
