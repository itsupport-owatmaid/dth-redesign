<?php
/**
 * Shared layout for single posts and pages.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main">
<?php
while ( have_posts() ) :
	the_post();
	$dth_views    = get_post_meta( get_the_ID(), 'dth_views', true );
	$dth_date     = get_post_meta( get_the_ID(), 'dth_date_label', true );
	$dth_position = get_post_meta( get_the_ID(), 'dth_position', true );
	$dth_show_meta = in_array( get_post_type(), array( 'post', 'dth_news', 'dth_media' ), true );
	?>
  <article <?php post_class( 'block' ); ?>>
    <div class="wrap">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'title' => get_the_title() ) ); ?>

	<?php if ( $dth_show_meta ) : ?>
      <p class="entry-meta">
		<?php echo dth_icon( 'clock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
        <span><?php echo esc_html( $dth_date ? $dth_date : dth_thai_date() ); ?></span>
		<?php if ( $dth_views ) : ?>
			<?php echo dth_icon( 'eye' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
        <span><?php echo esc_html( $dth_views ); ?></span>
		<?php endif; ?>
		<?php the_terms( get_the_ID(), 'dth_news_cat', '<span>', ' · ', '</span>' ); ?>
		<?php the_terms( get_the_ID(), 'dth_media_cat', '<span>', ' · ', '</span>' ); ?>
      </p>
	<?php endif; ?>

	<?php if ( $dth_position ) : ?>
      <p class="entry-meta"><span><?php echo esc_html( $dth_position ); ?></span></p>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() && ! is_page() ) : ?>
      <div class="entry-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
	<?php endif; ?>

      <div class="prose entry-content">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<nav class="dth-pagination">',
			'after'  => '</nav>',
		) );
		?>
      </div>

	<?php
	$dth_file = get_post_meta( get_the_ID(), 'dth_file', true );
	if ( $dth_file ) :
		?>
      <p style="margin-top:clamp(20px,3vw,30px)">
        <a class="pill-btn" href="<?php echo esc_url( $dth_file ); ?>" target="_blank" rel="noopener">
			<?php echo dth_icon( 'doc', 'im im-lg' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Trusted inline SVG. ?>
			<?php esc_html_e( 'ดาวน์โหลดเอกสาร', 'dth' ); ?>
        </a>
      </p>
	<?php endif; ?>
    </div>
  </article>
	<?php
	if ( comments_open() || get_comments_number() ) {
		echo '<div class="wrap">';
		comments_template();
		echo '</div>';
	}
	?>
<?php endwhile; ?>
</main>
<?php
get_footer();
