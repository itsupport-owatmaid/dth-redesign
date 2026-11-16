<?php
/**
 * Fallback template — ใช้เมื่อไม่มี template ที่เจาะจงกว่า
 */
get_header();
?>
<main id="main">
	<section class="block">
		<div class="wrap">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					echo '<article><h1>' . esc_html( get_the_title() ) . '</h1>';
					the_content();
					echo '</article>';
				endwhile;
			else :
				echo '<h1>ไม่พบเนื้อหา</h1>';
			endif;
			?>
		</div>
	</section>
</main>
<?php
get_footer();
