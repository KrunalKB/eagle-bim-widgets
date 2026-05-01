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

	require_once __DIR__ . '/inc/bim-shortcodes.php';

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
			$widgets_manager->register( new \Eagle_BIM_Blog_Widget() );     // end home.

			require_once __DIR__ . '/widgets/service/service-consulting-intro-widget.php';
			$widgets_manager->register( new \Service_Consulting_Intro_Widget() );   // start arch.

			require_once __DIR__ . '/widgets/service/service-core-areas-widget.php';
			$widgets_manager->register( new \Service_Core_Areas_Widget() );

			require_once __DIR__ . '/widgets/service/service-design-phases-widget.php';
			$widgets_manager->register( new \Service_Design_Phases_Widget() );

			require_once __DIR__ . '/widgets/service/service-coordination-widget.php';
			$widgets_manager->register( new \Service_Coordination_Widget() );

			require_once __DIR__ . '/widgets/service/service-detailing-scope-widget.php';
			$widgets_manager->register( new \Service_Detailing_Scope_Widget() );

			require_once __DIR__ . '/widgets/service/service-asbuilt-widget.php';
			$widgets_manager->register( new \Service_AsBuilt_Widget() );

			require_once __DIR__ . '/widgets/service/service-benefits-widget.php';
			$widgets_manager->register( new \Service_Benefits_Widget() );

			require_once __DIR__ . '/widgets/service/service-deliverables-widget.php';
			$widgets_manager->register( new \Service_Deliverables_Widget() );   // end arch.

			require_once __DIR__ . '/widgets/service/service-consulting-process-widget.php';
			$widgets_manager->register( new \Service_Consulting_Process_Widget() );     // bim cons.

			require_once __DIR__ . '/widgets/service/service-engagement-models-widget.php';
			$widgets_manager->register( new \Service_Engagement_Models_Widget() );

			require_once __DIR__ . '/widgets/service/service-clash-process-widget.php';
			$widgets_manager->register( new \Service_Clash_Process_Widget() );      // bim coordination.

			require_once __DIR__ . '/widgets/service/service-transformation-widget.php';
			$widgets_manager->register( new \Service_Transformation_Widget() );  // cad to bim.

			require_once __DIR__ . '/widgets/service/service-formats-lod-widget.php';
			$widgets_manager->register( new \Service_Formats_LOD_Widget() );

			require_once __DIR__ . '/widgets/service/service-discipline-detail-widget.php';
			$widgets_manager->register( new \Service_Discipline_Detail_Widget() );  // mep bim.

			require_once __DIR__ . '/widgets/service/service-model-process-widget.php';
			$widgets_manager->register( new \Service_Model_Process_Widget() );

			require_once __DIR__ . '/widgets/service/service-produce-widget.php';
			$widgets_manager->register( new \Service_Produce_Widget() );
		}
	);

	// Enqueue styles and scripts
	add_action(
		'wp_enqueue_scripts',
		function () {
			wp_enqueue_style( 'eagle-bim-global-style', plugins_url( '/assets/css/global.css', __FILE__ ) );
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
			// arch service.
			wp_enqueue_style( 'eagle-bim-service-consulting-style', plugins_url( '/assets/css/service/service-consulting-intro.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-core-style', plugins_url( '/assets/css/service/service-core-areas.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-design-phases-style', plugins_url( '/assets/css/service/service-design-phases.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-coordination-style', plugins_url( '/assets/css/service/service-coordination.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-detailing-style', plugins_url( '/assets/css/service/service-detailing-scope.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-asbuilt-style', plugins_url( '/assets/css/service/service-asbuilt-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-benefits-style', plugins_url( '/assets/css/service/service-benefits-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-deliverables-style', plugins_url( '/assets/css/service/service-deliverables-widget.css', __FILE__ ) );
			// bim cons.
			wp_enqueue_style( 'eagle-bim-service-consulting-process-style', plugins_url( '/assets/css/service/service-consulting-process.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-engagement-style', plugins_url( '/assets/css/service/service-engagement-models.css', __FILE__ ) );
			// bim coordination.
			wp_enqueue_style( 'eagle-bim-service-clash-process-style', plugins_url( '/assets/css/service/service-clash-process.css', __FILE__ ) );
			// mep bim.
			wp_enqueue_style( 'eagle-bim-service-discipline-detail-style', plugins_url( '/assets/css/service/service-discipline-detail.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-model-process-style', plugins_url( '/assets/css/service/service-model-process.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-transformation-style', plugins_url( '/assets/css/service/service-transformation-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-formats-lod-style', plugins_url( '/assets/css/service/service-formats-lod-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-produce-style', plugins_url( '/assets/css/service/service-produce-widget.css', __FILE__ ) );
		}
	);

	// scripts.
	wp_enqueue_script( 'eagle-bim-stats-script', plugins_url( '/assets/js/stats-widget.js', __FILE__ ), [], '1.0.0', true );
	wp_enqueue_script( 'eagle-bim-faq-script', plugins_url( '/assets/js/faqs-widget.js', __FILE__ ), [], '1.0.0', true );
}
add_action( 'plugins_loaded', 'eagle_bim_widgets_init' );
