<?php
/**
 * Homepage: hero slider, Facebook feed, rights tabs, FAQ, networks, hotline, contact.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/hero' );
?>

<main id="main">
	<?php
	get_template_part( 'template-parts/section', 'facebook' );
	get_template_part( 'template-parts/section', 'rights' );
	get_template_part( 'template-parts/section', 'faq' );
	get_template_part( 'template-parts/section', 'partners' );
	get_template_part( 'template-parts/section', 'hotline' );
	get_template_part( 'template-parts/section', 'contact' );
	?>
</main>

<?php
get_footer();
