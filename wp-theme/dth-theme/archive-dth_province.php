<?php
/**
 * Provincial council chairpersons, grouped by region.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dth_regions = get_terms( array( 'taxonomy' => 'dth_region', 'hide_empty' => true ) );
$dth_regions = is_wp_error( $dth_regions ) ? array() : $dth_regions;
?>
<main id="main">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'title' => post_type_archive_title( '', false ) ) ); ?>

<section class="block">
  <div class="wrap">
	<?php dth_kicker( __( 'รายชื่อประธานสภาคนพิการประจำจังหวัด', 'dth' ) ); ?>

	<?php foreach ( $dth_regions as $dth_region ) : ?>
		<?php
		$dth_provinces = dth_get_posts( 'dth_province', -1, array(
			'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Small, cached set.
				array( 'taxonomy' => 'dth_region', 'field' => 'term_id', 'terms' => $dth_region->term_id ),
			),
		) );
		if ( ! $dth_provinces ) {
			continue;
		}
		?>
    <div class="prov-region">
      <h3 class="region-title">
        <?php echo esc_html( $dth_region->name ); ?>
        <span><?php /* translators: %d: number of provinces. */ printf( esc_html__( '%d จังหวัด', 'dth' ), count( $dth_provinces ) ); ?></span>
      </h3>

      <div class="table-wrap">
        <table class="board-table prov-table">
          <thead>
            <tr>
              <th scope="col"><?php esc_html_e( 'จังหวัด', 'dth' ); ?></th>
              <th scope="col"><?php esc_html_e( 'ชื่อประธานสภาจังหวัด', 'dth' ); ?></th>
              <th scope="col"><?php esc_html_e( 'ประเภทความพิการ', 'dth' ); ?></th>
              <th scope="col"><?php esc_html_e( 'เบอร์โทร', 'dth' ); ?></th>
            </tr>
          </thead>
          <tbody>
		<?php foreach ( $dth_provinces as $dth_province ) : ?>
			<?php $dth_tel = preg_replace( '/[^0-9+]/', '', (string) get_post_meta( $dth_province->ID, 'dth_phone', true ) ); ?>
            <tr>
              <td><?php echo esc_html( get_the_title( $dth_province ) ); ?></td>
              <td><?php echo esc_html( get_post_meta( $dth_province->ID, 'dth_chair', true ) ); ?></td>
              <td><?php echo esc_html( get_post_meta( $dth_province->ID, 'dth_disability', true ) ); ?></td>
              <td>
			<?php if ( $dth_tel ) : ?>
                <a href="tel:<?php echo esc_attr( $dth_tel ); ?>"><?php echo esc_html( get_post_meta( $dth_province->ID, 'dth_phone', true ) ); ?></a>
			<?php endif; ?>
              </td>
            </tr>
		<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
	<?php endforeach; ?>

	<?php if ( ! $dth_regions ) : ?>
    <div class="card dth-empty"><p><?php esc_html_e( 'ยังไม่มีข้อมูลสภาฯ ประจำจังหวัด', 'dth' ); ?></p></div>
	<?php endif; ?>
  </div>
</section>
</main>
<?php
get_footer();
