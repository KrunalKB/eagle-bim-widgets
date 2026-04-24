<?php
/**
 * Plugin Name: Eagle BIM Custom Elementor Widgets
 * Description: Custom Elementor widgets for Eagle BIM website.
 * Version: 1.0.0
 * Author: WP Developer
 * Text Domain: eagle-bim-widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function eagle_bim_widgets_init() {
	// Check if Elementor is installed and active
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	// Register the widget category
	add_action(
		'elementor/widgets/register',
		function( $widgets_manager ) {
			require_once __DIR__ . '/widgets/hero-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Hero_Widget() );

			require_once __DIR__ . '/widgets/stats-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Stats_Widget() );

			require_once __DIR__ . '/widgets/services-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Services_Widget() );

			require_once __DIR__ . '/widgets/bim-explainer-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Explainer_Widget() );

			require_once __DIR__ . '/widgets/why-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Why_Widget() );

			require_once __DIR__ . '/widgets/process-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Process_Widget() );

			require_once __DIR__ . '/widgets/industries-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Industries_Widget() );

			require_once __DIR__ . '/widgets/geo-coverage-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Geo_Coverage_Widget() );

			require_once __DIR__ . '/widgets/deliverables-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Deliverables_Widget() );

			require_once __DIR__ . '/widgets/tools-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Tools_Widget() );

			require_once __DIR__ . '/widgets/testimonials-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Testimonials_Widget() );

			require_once __DIR__ . '/widgets/faqs-widget.php';
			$widgets_manager->register( new \Eagle_BIM_FAQs_Widget() );

			require_once __DIR__ . '/widgets/final-cta-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Final_CTA_Widget() );

			require_once __DIR__ . '/widgets/projects-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Projects_Widget() );

			require_once __DIR__ . '/widgets/blog-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Widget() );
		}
	);

	// Enqueue styles and scripts
	add_action(
		'wp_enqueue_scripts',
		function() {
			wp_enqueue_style( 'eagle-bim-hero-style', plugins_url( '/assets/css/hero-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-stats-style', plugins_url( '/assets/css/stats-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-services-style', plugins_url( '/assets/css/services-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-explainer-style', plugins_url( '/assets/css/bim-explainer-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-why-style', plugins_url( '/assets/css/why-us-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-process-style', plugins_url( '/assets/css/process-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-industries-style', plugins_url( '/assets/css/industries-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-geo-style', plugins_url( '/assets/css/geo-coverage-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-deliverables-style', plugins_url( '/assets/css/deliverables-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-tools-style', plugins_url( '/assets/css/tools-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-testimonials-style', plugins_url( '/assets/css/testimonials-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-faqs-style', plugins_url( '/assets/css/faqs-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-final-cta-style', plugins_url( '/assets/css/final-cta-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-projects-style', plugins_url( '/assets/css/projects-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-style', plugins_url( '/assets/css/blog-widget.css', __FILE__ ) );
			wp_enqueue_script( 'eagle-bim-stats-script', plugins_url( '/assets/js/stats-widget.js', __FILE__ ), [ 'jquery' ], '1.0.0', true );
		}
	);
}
add_action( 'plugins_loaded', 'eagle_bim_widgets_init' );
