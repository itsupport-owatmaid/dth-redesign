<?php
/**
 * Nav walkers that reproduce the original DTH markup from WordPress menus.
 *
 * @package DTH
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'wp_nav_menu_objects', 'dth_menu_ignore_anchor_current' );
/**
 * Keep in-page anchors out of the active state.
 *
 * WordPress compares a custom link against the current URL with its fragment
 * stripped, so on the front page every "/#contact"-style item counts as the
 * current item and drags its parents in as ancestors — the design highlights
 * one pill, not five. Recompute the current/ancestor flags from links that
 * actually point at another page.
 *
 * @param array $items Menu items.
 * @return array Menu items.
 */
function dth_menu_ignore_anchor_current( $items ) {
	$current = array();

	foreach ( $items as $item ) {
		if ( in_array( 'current-menu-item', $item->classes, true ) && false === strpos( (string) $item->url, '#' ) ) {
			$current[ $item->ID ] = true;
		}
	}

	$stale  = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' );
	$by_id  = array();

	foreach ( $items as $item ) {
		$item->classes     = array_values( array_diff( $item->classes, $stale ) );
		$item->current     = isset( $current[ $item->ID ] );
		$by_id[ $item->ID ] = $item;
	}

	foreach ( array_keys( $current ) as $id ) {
		$by_id[ $id ]->classes[] = 'current-menu-item';

		$parent = (int) $by_id[ $id ]->menu_item_parent;
		while ( $parent && isset( $by_id[ $parent ] ) ) {
			$by_id[ $parent ]->classes[] = 'current-menu-ancestor';
			$parent                      = (int) $by_id[ $parent ]->menu_item_parent;
		}
	}

	return $items;
}

/**
 * Primary menu: flat anchors at depth 0, wrapped in .has-sub/.sub when a
 * menu item has children.
 */
class DTH_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Open a submenu container.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '<div class="sub">';
	}

	/**
	 * Close a submenu container.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</div>';
	}

	/**
	 * Render one menu item.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Menu item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_sub     = in_array( 'menu-item-has-children', $classes, true );
		$is_current  = in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-ancestor', $classes, true );
		$extra       = array_values( array_intersect( $classes, array( 'pending' ) ) );
		$link_class  = trim( ( $is_current ? 'active ' : '' ) . implode( ' ', $extra ) );

		if ( 0 === $depth && $has_sub ) {
			$output .= '<div class="has-sub">';
		}

		$attrs  = ' href="' . esc_url( $item->url ? $item->url : '#' ) . '"';
		$attrs .= $link_class ? ' class="' . esc_attr( $link_class ) . '"' : '';
		$attrs .= $item->target ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attrs .= 'blank' === trim( $item->target, '_' ) ? ' rel="noopener"' : '';
		$attrs .= $item->attr_title ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';

		if ( 0 === $depth && $has_sub ) {
			$attrs .= ' aria-haspopup="true" aria-expanded="false"';
		}

		$title  = apply_filters( 'the_title', $item->title, $item->ID );
		$caret  = ( 0 === $depth && $has_sub ) ? ' <span class="caret" aria-hidden="true">&#9662;</span>' : '';

		$output .= '<a' . $attrs . '>' . esc_html( $title ) . $caret . '</a>';
	}

	/**
	 * Close the .has-sub wrapper for top-level parents.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( 0 === $depth && in_array( 'menu-item-has-children', $classes, true ) ) {
			$output .= '</div>';
		}
	}
}

/**
 * Footer menu: a flat run of anchors, ignoring hierarchy.
 */
class DTH_Footer_Walker extends Walker_Nav_Menu {

	/**
	 * No submenu markup in the footer.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * No submenu markup in the footer.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	/**
	 * Render one footer link.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Menu item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$target  = $item->target ? ' target="' . esc_attr( $item->target ) . '" rel="noopener"' : '';
		$output .= '<a href="' . esc_url( $item->url ? $item->url : '#' ) . '"' . $target . '>' . esc_html( apply_filters( 'the_title', $item->title, $item->ID ) ) . '</a>';
	}

	/**
	 * Nothing to close.
	 *
	 * @param string   $output Menu HTML, by reference.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Current depth.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
