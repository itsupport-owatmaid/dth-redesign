<?php
/**
 * Member organisations and related government bodies.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_members = dth_get_posts( 'dth_partner', -1, array(
	'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Small, cached set.
		array( 'taxonomy' => 'dth_partner_group', 'field' => 'slug', 'terms' => 'members' ),
	),
) );

$dth_gov = dth_get_posts( 'dth_partner', -1, array(
	'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Small, cached set.
		array( 'taxonomy' => 'dth_partner_group', 'field' => 'slug', 'terms' => 'government' ),
	),
) );
?>
<?php if ( $dth_members ) : ?>
<section class="block" id="network">
  <div class="wrap">
	<?php dth_kicker( dth_option( 'dth_members_title' ), dth_page_url( 'about' ) . '#members', __( 'ข้อมูลติดต่อทุกสมาคม', 'dth' ) ); ?>
	<?php dth_render_partners( $dth_members ); ?>
  </div>
</section>
<?php endif; ?>

<?php if ( $dth_gov ) : ?>
<section class="block wash-mint">
  <div class="wrap">
	<?php dth_kicker( dth_option( 'dth_partners_title' ) ); ?>
	<?php dth_render_partners( $dth_gov, 'gov' ); ?>
  </div>
</section>
<?php endif; ?>
