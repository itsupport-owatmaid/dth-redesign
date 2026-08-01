<?php
/**
 * Fallback archive and blog listing.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
<section class="block" style="padding-top:clamp(20px,2.5vw,30px)">
  <div class="wrap">
	<?php
	if ( is_home() && ! is_front_page() ) {
		dth_kicker( get_the_title( get_option( 'page_for_posts' ) ), '', '', 'h1' );
	} elseif ( is_archive() ) {
		dth_kicker( wp_strip_all_tags( get_the_archive_title() ), '', '', 'h1' );
	} else {
		dth_kicker( get_bloginfo( 'name' ), '', '', 'h1' );
	}

	if ( is_archive() && get_the_archive_description() ) {
		echo '<p class="prov-note">' . wp_kses_post( get_the_archive_description() ) . '</p>';
	}
	?>

	<?php if ( have_posts() ) : ?>
    <div class="hub-grid" id="hubGrid">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/card', 'hub' );
		}
		?>
    </div>
    <div id="hubEmpty" class="card dth-empty" style="display:none">
      <p><?php esc_html_e( 'ยังไม่มีรายการในหมวดนี้', 'dth' ); ?></p>
    </div>
		<?php dth_pagination(); ?>
	<?php else : ?>
    <div class="card dth-empty"><p><?php esc_html_e( 'ยังไม่มีเนื้อหาในขณะนี้', 'dth' ); ?></p></div>
	<?php endif; ?>
  </div>
</section>
</main>
<?php
get_footer();
