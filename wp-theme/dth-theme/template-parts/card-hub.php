<?php
/**
 * One card in a news/media grid. Expects the loop to be set up.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_url      = dth_link_for();
$dth_external = dth_is_external( $dth_url );
$dth_views    = get_post_meta( get_the_ID(), 'dth_views', true );
$dth_date     = get_post_meta( get_the_ID(), 'dth_date_label', true );
$dth_meta_lbl = get_post_meta( get_the_ID(), 'dth_meta_label', true );

$dth_taxonomy = 'dth_media' === get_post_type() ? 'dth_media_cat' : 'dth_news_cat';
$dth_terms    = get_the_terms( get_the_ID(), $dth_taxonomy );
$dth_terms    = is_array( $dth_terms ) ? $dth_terms : array();
$dth_slugs    = wp_list_pluck( $dth_terms, 'slug' );
$dth_label    = $dth_terms ? $dth_terms[0]->name : '';
?>
<a class="card hub-card" data-cat="<?php echo esc_attr( implode( ' ', $dth_slugs ) ); ?>"
  href="<?php echo esc_url( $dth_url ); ?>"<?php echo $dth_external ? ' target="_blank" rel="noopener"' : ''; ?>>
  <div class="thumb">
	<?php if ( $dth_label ) : ?>
    <span class="mtype"><?php echo esc_html( $dth_label ); ?></span>
	<?php endif; ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'dth-card', array( 'loading' => 'lazy', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
	<?php else : ?>
    <div class="ph" style="display:grid;place-items:center;width:100%;height:100%">
		<?php echo dth_icon( 'doc', 'ph-svg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
    </div>
	<?php endif; ?>
  </div>
  <div class="body">
    <div class="meta">
	<?php if ( $dth_meta_lbl ) : ?>
		<?php echo esc_html( $dth_meta_lbl ); ?>
	<?php else : ?>
		<?php if ( 'dth_media' !== get_post_type() ) : ?>
			<?php echo dth_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
			<?php echo esc_html( $dth_date ? $dth_date : dth_thai_date() ); ?>
		<?php endif; ?>
		<?php if ( $dth_views ) : ?>
			<?php echo 'dth_media' !== get_post_type() ? ' &middot; ' : ''; ?>
			<?php echo dth_icon( 'eye' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
			<?php echo esc_html( $dth_views ); ?>
		<?php endif; ?>
	<?php endif; ?>
    </div>
    <h3><?php the_title(); ?></h3>
	<?php if ( has_excerpt() ) : ?>
    <p><?php echo esc_html( get_the_excerpt() ); ?></p>
	<?php endif; ?>
  </div>
</a>
