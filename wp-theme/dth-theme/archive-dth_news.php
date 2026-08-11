<?php
/**
 * News & activities hub with category chips and in-page search.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dth_terms = get_terms( array( 'taxonomy' => 'dth_news_cat', 'hide_empty' => true ) );
$dth_terms = is_wp_error( $dth_terms ) ? array() : $dth_terms;
?>
<main id="main">
<section class="block" style="padding-top:clamp(20px,2.5vw,30px)">
  <div class="wrap">
	<?php dth_kicker( post_type_archive_title( '', false ), '', '', 'h1' ); ?>

	<?php if ( $dth_terms ) : ?>
    <div class="tabbar" id="catBar" aria-label="<?php esc_attr_e( 'หมวดหมู่ข่าวสาร', 'dth' ); ?>" style="margin-bottom:clamp(18px,2.5vw,26px)">
      <button class="tab active" data-cat="all" type="button"><?php esc_html_e( 'ทั้งหมด', 'dth' ); ?></button>
		<?php foreach ( $dth_terms as $dth_term ) : ?>
      <button class="tab" data-cat="<?php echo esc_attr( $dth_term->slug ); ?>" type="button"><?php echo esc_html( $dth_term->name ); ?></button>
		<?php endforeach; ?>
    </div>
	<?php endif; ?>

    <div class="hub-toolbar">
      <div class="hub-search">
        <input type="text" id="hubSearch" placeholder="<?php esc_attr_e( 'ใส่คำที่ต้องการค้นหา…', 'dth' ); ?>" aria-label="<?php esc_attr_e( 'ค้นหาข่าวสาร', 'dth' ); ?>">
		<?php echo dth_icon( 'search', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
      </div>
    </div>

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

    <div class="pager">
      <div class="total"><?php esc_html_e( 'จำนวนทั้งหมด', 'dth' ); ?> <b id="hubCount"><?php echo esc_html( $GLOBALS['wp_query']->post_count ); ?></b> <?php esc_html_e( 'รายการ', 'dth' ); ?></div>
    </div>

		<?php dth_pagination(); ?>
	<?php else : ?>
    <div class="card dth-empty"><p><?php esc_html_e( 'ยังไม่มีข่าวสารในขณะนี้', 'dth' ); ?></p></div>
	<?php endif; ?>
  </div>
</section>
</main>
<?php
get_footer();
