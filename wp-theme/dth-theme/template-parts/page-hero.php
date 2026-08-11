<?php
/**
 * Page banner: title, logo badge and lead paragraph.
 *
 * Pass values with get_template_part( 'template-parts/page-hero', null, array( ... ) ).
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_title = isset( $args['title'] ) ? $args['title'] : get_the_title();
$dth_lead  = isset( $args['lead'] ) ? $args['lead'] : '';

$dth_logo_id  = get_theme_mod( 'custom_logo' );
$dth_logo_url = $dth_logo_id ? wp_get_attachment_image_url( $dth_logo_id, 'full' ) : DTH_URI . '/assets/img/dth-logo.png';
?>
<section class="page-hero">
  <div class="ic-row"><h1><?php echo esc_html( $dth_title ); ?></h1></div>
  <div class="logo-badge"><img src="<?php echo esc_url( $dth_logo_url ); ?>" alt=""></div>
	<?php if ( $dth_lead ) : ?>
  <p class="lead"><?php echo wp_kses_post( $dth_lead ); ?></p>
	<?php endif; ?>
</section>
