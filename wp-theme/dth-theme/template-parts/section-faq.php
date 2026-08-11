<?php
/**
 * Frequently asked questions, with the two shortcut tiles beside them.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_faqs    = dth_get_posts( 'dth_faq', 6 );
$dth_members = dth_get_posts( 'dth_partner', 6, array(
	'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- Small, cached set.
		array(
			'taxonomy' => 'dth_partner_group',
			'field'    => 'slug',
			'terms'    => 'members',
		),
	),
) );

if ( ! $dth_faqs ) {
	return;
}

$dth_logo_id  = get_theme_mod( 'custom_logo' );
$dth_logo_url = $dth_logo_id ? wp_get_attachment_image_url( $dth_logo_id, 'full' ) : DTH_URI . '/assets/img/dth-logo.png';
?>
<section class="block wash-leaf" id="qa">
  <div class="wrap">
    <div class="qa-grid">
      <div class="qa-visual">
        <a class="qa-tile t1" href="<?php echo esc_url( dth_page_url( 'about' ) ); ?>">
          <span class="qa-logo"><img src="<?php echo esc_url( $dth_logo_url ); ?>" alt="" aria-hidden="true"></span>
          <h3><?php esc_html_e( 'รู้จักการทำงานของสมาคม', 'dth' ); ?></h3>
        </a>
        <a class="qa-tile t2" href="#network">
		<?php if ( $dth_members ) : ?>
          <span class="qa-logos" aria-hidden="true">
			<?php
			foreach ( $dth_members as $dth_member ) {
				$dth_logo = get_the_post_thumbnail_url( $dth_member, 'thumbnail' );
				if ( $dth_logo ) {
					printf( '<img src="%s" alt="">', esc_url( $dth_logo ) );
				}
			}
			?>
          </span>
		<?php endif; ?>
          <h3><?php esc_html_e( 'องค์การสมาชิกและเครือข่าย', 'dth' ); ?></h3>
        </a>
      </div>

      <div>
		<?php dth_kicker( __( 'คำถามที่พบบ่อย', 'dth' ) ); ?>
        <div class="qa-list">
		<?php foreach ( $dth_faqs as $dth_faq ) : ?>
			<?php $dth_url = dth_link_for( $dth_faq ); ?>
          <a class="qa-item" href="<?php echo esc_url( $dth_url ); ?>"<?php echo dth_is_external( $dth_url ) ? ' target="_blank" rel="noopener"' : ''; ?>>
            <span><?php echo esc_html( get_the_title( $dth_faq ) ); ?></span>
            <span class="arr" aria-hidden="true">&rarr;</span>
          </a>
		<?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
