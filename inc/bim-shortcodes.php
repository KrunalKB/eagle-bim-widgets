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
	$breadcrumb .= ' <span>/</span> ';

	// Current page title.
	$breadcrumb .= '<span>' . get_the_title() . '</span>';

	$breadcrumb .= '</div>';

	return $breadcrumb;
}
add_shortcode( 'eb_breadcrumb', 'eb_breadcrumb_shortcode' );
