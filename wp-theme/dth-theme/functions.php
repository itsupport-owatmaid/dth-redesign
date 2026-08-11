<?php
/**
 * DTH theme bootstrap.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

define( 'DTH_VERSION', '2.1.0' );
define( 'DTH_DIR', get_template_directory() );
define( 'DTH_URI', get_template_directory_uri() );

require_once DTH_DIR . '/inc/setup.php';
require_once DTH_DIR . '/inc/enqueue.php';
require_once DTH_DIR . '/inc/post-types.php';
require_once DTH_DIR . '/inc/meta-boxes.php';
require_once DTH_DIR . '/inc/customizer.php';
require_once DTH_DIR . '/inc/nav-walker.php';
require_once DTH_DIR . '/inc/template-tags.php';
require_once DTH_DIR . '/inc/seed-data.php';
require_once DTH_DIR . '/inc/importer.php';
