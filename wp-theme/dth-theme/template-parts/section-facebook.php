<?php
/**
 * Facebook page embed.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

$dth_page = dth_option( 'dth_facebook_page' );
if ( ! dth_option( 'dth_show_facebook' ) || ! $dth_page ) {
	return;
}

$dth_embed = add_query_arg(
	array(
		'href'                  => rawurlencode( $dth_page ),
		'tabs'                  => 'timeline',
		'width'                 => 500,
		'height'                => 750,
		'small_header'          => 'false',
		'adapt_container_width' => 'true',
		'hide_cover'            => 'false',
		'show_facepile'         => 'true',
	),
	'https://www.facebook.com/plugins/page.php'
);
?>
<section class="block wash-mint" id="follow">
  <div class="wrap">
	<?php dth_kicker( __( 'ติดตาม DTH', 'dth' ), $dth_page, __( 'ไปที่เพจ Facebook', 'dth' ) ); ?>
    <div class="fb-embed">
      <iframe title="<?php esc_attr_e( 'Facebook Page สมาคมสภาคนพิการทุกประเภทแห่งประเทศไทย', 'dth' ); ?>"
        src="<?php echo esc_url( $dth_embed ); ?>"
        width="500" height="750" style="border:none;overflow:hidden" scrolling="no" loading="lazy"
        allowfullscreen="true"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
  </div>
</section>
