<?php
/**
 * Disability hotline call-to-action.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_hotline = dth_option( 'dth_hotline' );
if ( ! $dth_hotline ) {
	return;
}
?>
<section class="block">
  <div class="wrap">
    <div class="hotline">
      <div class="l">
        <h3><?php esc_html_e( 'สายด่วนคนพิการ', 'dth' ); ?></h3>
        <p><?php echo esc_html( dth_option( 'dth_hotline_note' ) ); ?></p>
      </div>
      <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $dth_hotline ) ); ?>" class="call"
        aria-label="<?php /* translators: %s: hotline number. */ echo esc_attr( sprintf( __( 'โทรสายด่วนคนพิการ %s', 'dth' ), $dth_hotline ) ); ?>">
		<?php echo dth_icon( 'phone', 'im im-lg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
		<?php echo esc_html( $dth_hotline ); ?>
      </a>
    </div>
  </div>
</section>
