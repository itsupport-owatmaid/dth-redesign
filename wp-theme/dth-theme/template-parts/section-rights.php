<?php
/**
 * "สิทธิคนพิการที่ควรรู้" tab panel, driven by the dth_right post type.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_rights = dth_get_posts( 'dth_right' );
if ( ! $dth_rights ) {
	return;
}
?>
<section class="block" id="rights">
  <div class="wrap">
    <div class="rights-shell" data-rights-tabs>
      <div class="rights-head">
        <h2><?php echo esc_html( dth_option( 'dth_rights_title' ) ); ?></h2>
        <p><?php echo esc_html( dth_option( 'dth_rights_intro' ) ); ?></p>
      </div>

      <div class="rights-tabs" role="tablist" aria-label="<?php esc_attr_e( 'หมวดสิทธิคนพิการ', 'dth' ); ?>">
		<?php foreach ( $dth_rights as $index => $dth_right ) : ?>
			<?php $dth_label = get_post_meta( $dth_right->ID, 'dth_tab_label', true ); ?>
        <button class="rights-tab<?php echo 0 === $index ? ' active' : ''; ?>" role="tab"
          aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
          aria-controls="r-<?php echo (int) $dth_right->ID; ?>"
          data-target="r-<?php echo (int) $dth_right->ID; ?>"><?php echo esc_html( $dth_label ? $dth_label : get_the_title( $dth_right ) ); ?></button>
		<?php endforeach; ?>
      </div>

	<?php foreach ( $dth_rights as $index => $dth_right ) : ?>
		<?php
		$dth_kicker_txt = get_post_meta( $dth_right->ID, 'dth_kicker', true );
		$dth_bullets    = dth_parse_lines( get_post_meta( $dth_right->ID, 'dth_bullets', true ) );
		$dth_cta_label  = get_post_meta( $dth_right->ID, 'dth_cta_label', true );
		$dth_cta_url    = get_post_meta( $dth_right->ID, 'dth_cta_url', true );
		$dth_card_badge = get_post_meta( $dth_right->ID, 'dth_card_badge', true );
		$dth_card_title = get_post_meta( $dth_right->ID, 'dth_card_title', true );
		$dth_pairs      = dth_parse_pairs( get_post_meta( $dth_right->ID, 'dth_pairs', true ) );
		?>
      <article class="rights-panel<?php echo 0 === $index ? ' active' : ''; ?>" id="r-<?php echo (int) $dth_right->ID; ?>" role="tabpanel">
        <div class="rights-copy">
		<?php if ( $dth_kicker_txt ) : ?>
          <span class="right-kicker"><?php echo esc_html( $dth_kicker_txt ); ?></span>
		<?php endif; ?>
          <h3><?php echo esc_html( get_the_title( $dth_right ) ); ?></h3>
		<?php if ( $dth_right->post_content ) : ?>
          <p><?php echo esc_html( wp_strip_all_tags( $dth_right->post_content ) ); ?></p>
		<?php endif; ?>
		<?php if ( $dth_bullets ) : ?>
          <ul class="rights-list">
			<?php foreach ( $dth_bullets as $dth_bullet ) : ?>
            <li><?php echo esc_html( $dth_bullet ); ?></li>
			<?php endforeach; ?>
          </ul>
		<?php endif; ?>
		<?php if ( $dth_cta_url && $dth_cta_label ) : ?>
          <a href="<?php echo esc_url( $dth_cta_url ); ?>"<?php echo dth_is_external( $dth_cta_url ) ? ' target="_blank" rel="noopener"' : ''; ?> class="pill-btn rights-cta"><?php echo esc_html( $dth_cta_label ); ?></a>
		<?php endif; ?>
        </div>

		<?php if ( $dth_card_title || $dth_pairs ) : ?>
        <div class="rights-media-card">
			<?php if ( $dth_card_badge ) : ?>
          <span class="badge"><?php echo esc_html( $dth_card_badge ); ?></span>
			<?php endif; ?>
			<?php if ( $dth_card_title ) : ?>
          <h4><?php echo esc_html( $dth_card_title ); ?></h4>
			<?php endif; ?>
			<?php foreach ( $dth_pairs as $dth_pair ) : ?>
          <div class="row"><span><?php echo esc_html( $dth_pair[0] ); ?></span><strong><?php echo esc_html( $dth_pair[1] ); ?></strong></div>
			<?php endforeach; ?>
        </div>
		<?php endif; ?>
      </article>
	<?php endforeach; ?>
    </div>
  </div>
</section>
