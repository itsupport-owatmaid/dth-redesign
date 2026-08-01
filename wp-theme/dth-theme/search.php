<?php
/**
 * Search results.
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
	/* translators: %s: search term. */
	dth_kicker( sprintf( __( 'ผลการค้นหา “%s”', 'dth' ), get_search_query() ), '', '', 'h1' );
	?>

	<?php if ( have_posts() ) : ?>
    <div class="hub-grid">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/card', 'hub' );
		}
		?>
    </div>
		<?php dth_pagination(); ?>
	<?php else : ?>
    <div class="card dth-empty">
      <p><?php esc_html_e( 'ไม่พบเนื้อหาที่ตรงกับคำค้นหา ลองใช้คำอื่นหรือดูจากเมนูด้านบน', 'dth' ); ?></p>
		<?php get_search_form(); ?>
    </div>
	<?php endif; ?>
  </div>
</section>
</main>
<?php
get_footer();
