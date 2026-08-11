<?php
/**
 * Search form.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_id = wp_unique_id( 'dth-search-' );
?>
<form class="hub-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="screen-reader-text" for="<?php echo esc_attr( $dth_id ); ?>"><?php esc_html_e( 'ค้นหา', 'dth' ); ?></label>
  <input type="search" id="<?php echo esc_attr( $dth_id ); ?>" name="s" value="<?php echo esc_attr( get_search_query() ); ?>"
    placeholder="<?php esc_attr_e( 'ใส่คำที่ต้องการค้นหา…', 'dth' ); ?>">
  <?php echo dth_icon( 'search', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
</form>
