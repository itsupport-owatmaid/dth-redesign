<?php
/**
 * Policy proposals — download cards plus their attached page images.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'title' => post_type_archive_title( '', false ) ) ); ?>

<section class="block">
  <div class="wrap">
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			$dth_file  = get_post_meta( get_the_ID(), 'dth_file', true );
			$dth_label = get_post_meta( get_the_ID(), 'dth_meta_label', true );
			$dth_shots = array_filter( array_map( 'trim', explode( ',', (string) get_post_meta( get_the_ID(), 'dth_gallery', true ) ) ) );
			?>
    <a class="card mag-card" href="<?php echo esc_url( $dth_file ? $dth_file : get_permalink() ); ?>"<?php echo $dth_file ? ' target="_blank" rel="noopener"' : ''; ?>
      style="max-width:560px;margin-bottom:clamp(22px,3vw,32px)">
      <span class="mag-ic" aria-hidden="true"><?php echo dth_icon( 'doc', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?></span>
      <div class="body">
        <h3><?php the_title(); ?></h3>
		<?php if ( $dth_label ) : ?>
        <div class="meta"><?php echo esc_html( $dth_label ); ?></div>
		<?php endif; ?>
      </div>
    </a>

		<?php if ( $dth_shots ) : ?>
    <div class="prov-grid">
			<?php foreach ( $dth_shots as $dth_index => $dth_shot ) : ?>
      <figure class="board-poster">
        <a href="<?php echo esc_url( $dth_shot ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'ดูภาพขนาดเต็ม', 'dth' ); ?>">
          <img src="<?php echo esc_url( $dth_shot ); ?>"
            alt="<?php /* translators: 1: proposal title, 2: page number. */ echo esc_attr( sprintf( __( '%1$s หน้า %2$d', 'dth' ), get_the_title(), $dth_index + 1 ) ); ?>" loading="lazy">
        </a>
      </figure>
			<?php endforeach; ?>
    </div>
		<?php endif; ?>

		<?php if ( get_the_content() ) : ?>
    <div class="prose entry-content"><?php the_content(); ?></div>
		<?php endif; ?>
		<?php endwhile; ?>

		<?php dth_pagination(); ?>
	<?php else : ?>
    <div class="card dth-empty"><p><?php esc_html_e( 'ยังไม่มีข้อเสนอเผยแพร่ในขณะนี้', 'dth' ); ?></p></div>
	<?php endif; ?>
  </div>
</section>
</main>
<?php
get_footer();
