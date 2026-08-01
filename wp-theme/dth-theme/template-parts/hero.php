<?php
/**
 * Hero slider, driven by the "สไลด์หน้าแรก" post type.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_slides = dth_get_posts( 'dth_slide' );
if ( ! $dth_slides ) {
	return;
}
?>
<section class="hero" aria-label="<?php esc_attr_e( 'ภาพสไลด์', 'dth' ); ?>">
  <div class="slides" id="slides" aria-live="polite">
	<?php foreach ( $dth_slides as $index => $dth_slide ) : ?>
		<?php
		$dth_bg       = get_the_post_thumbnail_url( $dth_slide, 'dth-hero' );
		$dth_tag      = get_post_meta( $dth_slide->ID, 'dth_tag', true );
		$dth_subtitle = get_post_meta( $dth_slide->ID, 'dth_subtitle', true );
		$dth_link     = get_post_meta( $dth_slide->ID, 'dth_link', true );
		?>
    <div class="slide<?php echo 0 === $index ? ' on' : ''; ?>"<?php echo $dth_bg ? ' style="background-image:url(\'' . esc_url( $dth_bg ) . '\')"' : ''; ?>>
      <div class="cap">
		<?php if ( $dth_tag ) : ?>
        <span class="tag"><?php echo esc_html( $dth_tag ); ?></span>
		<?php endif; ?>
        <h2><?php echo esc_html( get_the_title( $dth_slide ) ); ?></h2>
		<?php if ( $dth_subtitle ) : ?>
        <p><?php echo esc_html( $dth_subtitle ); ?></p>
		<?php endif; ?>
		<?php if ( $dth_link ) : ?>
        <a class="pill-btn" href="<?php echo esc_url( $dth_link ); ?>"><?php esc_html_e( 'อ่านเพิ่มเติม', 'dth' ); ?> <span class="arr" aria-hidden="true">&rarr;</span></a>
		<?php endif; ?>
      </div>
    </div>
	<?php endforeach; ?>
  </div>
	<?php if ( count( $dth_slides ) > 1 ) : ?>
  <button class="hero-arrow prev" id="prev" aria-label="<?php esc_attr_e( 'สไลด์ก่อนหน้า', 'dth' ); ?>">&lsaquo;</button>
  <button class="hero-arrow next" id="next" aria-label="<?php esc_attr_e( 'สไลด์ถัดไป', 'dth' ); ?>">&rsaquo;</button>
	<?php endif; ?>
  <div class="hero-dots" id="dots" role="tablist" aria-label="<?php esc_attr_e( 'เลือกสไลด์', 'dth' ); ?>"></div>
</section>
