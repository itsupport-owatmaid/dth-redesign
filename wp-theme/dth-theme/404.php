<?php
/**
 * Not found.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
<section class="block">
  <div class="wrap">
	<?php
	get_template_part( 'template-parts/page-hero', null, array(
		'title' => __( 'ไม่พบหน้าที่ต้องการ', 'dth' ),
		'lead'  => __( 'หน้าที่คุณเปิดอาจถูกย้ายหรือลบไปแล้ว ลองค้นหาอีกครั้ง หรือกลับไปหน้าแรกเพื่อเริ่มต้นใหม่', 'dth' ),
	) );
	?>
    <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-top:clamp(20px,3vw,30px)">
      <a class="pill-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'กลับหน้าแรก', 'dth' ); ?></a>
    </div>
    <div style="max-width:520px;margin:clamp(24px,3vw,34px) auto 0"><?php get_search_form(); ?></div>
  </div>
</section>
</main>
<?php
get_footer();
