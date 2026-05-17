<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function eb_breadcrumb_shortcode() {
	// Do not display on homepage.
	if ( is_front_page() || is_home() ) {
		return '';
	}

	$breadcrumb = '<div class="eb-breadcrumb">';

	// Home link.
	$breadcrumb .= '<a href="' . home_url() . '">Home</a>';

	// Check if current page has parent pages.
	if ( is_page() ) {

		$parents = get_post_ancestors( get_the_ID() );

		if ( ! empty( $parents ) ) {

			// Reverse to show top-level parent first.
			$parents = array_reverse( $parents );

			foreach ( $parents as $parent_id ) {

				$breadcrumb .= ' <span>/</span> ';
				$breadcrumb .= '<a href="' . get_permalink( $parent_id ) . '">';
				$breadcrumb .= get_the_title( $parent_id );
				$breadcrumb .= '</a>';
			}
		}
	}

	// Current page title.
	$breadcrumb .= ' <span>/</span> ';
	$breadcrumb .= '<span>' . get_the_title() . '</span>';

	$breadcrumb .= '</div>';

	return $breadcrumb;
}
add_shortcode( 'eb_breadcrumb', 'eb_breadcrumb_shortcode' );
