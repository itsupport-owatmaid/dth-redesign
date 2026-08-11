<?php
/**
 * Board members and staff, grouped by "กลุ่มบุคลากร".
 *
 * Members with a photo render as portrait cards; the rest fall back to a table.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();

$dth_groups = get_terms( array(
	'taxonomy'   => 'dth_person_group',
	'hide_empty' => true,
	'orderby'    => 'term_order',
) );
$dth_groups = is_wp_error( $dth_groups ) ? array() : $dth_groups;
?>
<main id="main">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'title' => post_type_archive_title( '', false ) ) ); ?>

<?php foreach ( $dth_groups as $dth_group ) : ?>
	<?php
	$dth_people = dth_get_posts( 'dth_person', -1, array(
		'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Small, cached set.
			array( 'taxonomy' => 'dth_person_group', 'field' => 'term_id', 'terms' => $dth_group->term_id ),
		),
	) );
	if ( ! $dth_people ) {
		continue;
	}

	$dth_with_photo = array_filter( $dth_people, static function ( $person ) {
		return has_post_thumbnail( $person );
	} );
	$dth_rest = array_filter( $dth_people, static function ( $person ) {
		return ! has_post_thumbnail( $person );
	} );
	?>
<section class="block">
  <div class="wrap">
	<?php dth_kicker( $dth_group->name ); ?>
	<?php if ( $dth_group->description ) : ?>
    <p class="prov-note"><?php echo esc_html( $dth_group->description ); ?></p>
	<?php endif; ?>

	<?php if ( $dth_with_photo ) : ?>
    <div class="board-grid">
		<?php foreach ( $dth_with_photo as $dth_person ) : ?>
      <figure class="board-card">
		<?php echo get_the_post_thumbnail( $dth_person, 'dth-portrait', array( 'loading' => 'lazy', 'alt' => esc_attr( get_the_title( $dth_person ) ) ) ); ?>
        <figcaption>
          <strong><?php echo esc_html( get_the_title( $dth_person ) ); ?></strong>
          <span><?php echo esc_html( get_post_meta( $dth_person->ID, 'dth_position', true ) ); ?></span>
        </figcaption>
      </figure>
		<?php endforeach; ?>
    </div>
	<?php endif; ?>

	<?php if ( $dth_rest ) : ?>
    <div class="table-wrap" style="margin-top:clamp(28px,3.5vw,40px)">
      <table class="board-table">
        <thead>
          <tr>
            <th scope="col"><?php esc_html_e( 'ที่', 'dth' ); ?></th>
            <th scope="col"><?php esc_html_e( 'ชื่อ-นามสกุล', 'dth' ); ?></th>
            <th scope="col"><?php esc_html_e( 'ตำแหน่ง', 'dth' ); ?></th>
          </tr>
        </thead>
        <tbody>
		<?php $dth_row = 0; ?>
		<?php foreach ( $dth_rest as $dth_person ) : ?>
			<?php $dth_row++; ?>
          <tr>
            <td><?php echo esc_html( $dth_row ); ?></td>
            <td><?php echo esc_html( get_the_title( $dth_person ) ); ?></td>
            <td><?php echo esc_html( get_post_meta( $dth_person->ID, 'dth_position', true ) ); ?></td>
          </tr>
		<?php endforeach; ?>
        </tbody>
      </table>
    </div>
	<?php endif; ?>
  </div>
</section>
<?php endforeach; ?>

<?php if ( ! $dth_groups ) : ?>
<section class="block">
  <div class="wrap"><div class="card dth-empty"><p><?php esc_html_e( 'ยังไม่มีข้อมูลบุคลากร', 'dth' ); ?></p></div></div>
</section>
<?php endif; ?>
</main>
<?php
get_footer();
