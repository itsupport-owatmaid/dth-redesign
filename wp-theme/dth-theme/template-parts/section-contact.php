<?php
/**
 * Association address card and embedded map.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_phone = dth_option( 'dth_phone' );
$dth_tel   = preg_replace( '/[^0-9+]/', '', (string) $dth_phone );
$dth_map   = dth_option( 'dth_map_embed' );
?>
<section class="block wash-leaf" id="contact">
  <div class="wrap">
	<?php dth_kicker( __( 'ติดต่อสมาคม', 'dth' ) ); ?>
    <div class="cal-grid">
      <div class="card" style="padding:clamp(24px,3vw,34px)">
        <h3 style="color:var(--brand-dark);font-size:1.3rem;margin-bottom:14px"><?php echo esc_html( dth_option( 'dth_org_fullname' ) ); ?></h3>
        <p style="color:var(--muted);margin-bottom:14px"><?php echo esc_html( dth_option( 'dth_address' ) ); ?></p>
        <p style="color:var(--muted);margin-bottom:8px">
			<?php echo dth_icon( 'mail', 'im im-lg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
			<?php echo esc_html( dth_option( 'dth_email' ) ); ?>
        </p>
        <a href="tel:<?php echo esc_attr( $dth_tel ); ?>" class="pill-btn">
			<?php echo dth_icon( 'phone', 'im im-lg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
			<?php echo esc_html( $dth_phone ); ?>
        </a>
      </div>
	<?php if ( $dth_map ) : ?>
      <div class="card" style="overflow:hidden;min-height:320px;padding:0">
        <iframe title="<?php esc_attr_e( 'แผนที่ตั้งสมาคม', 'dth' ); ?>" loading="lazy"
          style="width:100%;height:100%;min-height:320px;border:0;display:block"
          src="<?php echo esc_url( $dth_map ); ?>"></iframe>
      </div>
	<?php endif; ?>
    </div>
  </div>
</section>
