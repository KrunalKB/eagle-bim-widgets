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

			require_once __DIR__ . '/widgets/service/service-deliverables-software-widget.php';
			$widgets_manager->register( new Service_Deliverables_Software_Widget() );

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
			$widgets_manager->register( new \Service_Produce_Widget() );  // revit drafting.

			// about page.
			require_once __DIR__ . '/widgets/about/about-who-we-are-widget.php';
			$widgets_manager->register( new \About_Who_We_Are_Widget() );

			require_once __DIR__ . '/widgets/about/about-mv-widget.php';
			$widgets_manager->register( new \About_MV_Widget() );

			require_once __DIR__ . '/widgets/about/about-why-widget.php';
			$widgets_manager->register( new \About_Why_Widget() );

			require_once __DIR__ . '/widgets/about/about-tools-widget.php';
			$widgets_manager->register( new \About_Tools_Widget() );

			// contact page.
			require_once __DIR__ . '/widgets/contact/contact-hero-widget.php';
			$widgets_manager->register( new \Contact_Hero_Widget() );

			require_once __DIR__ . '/widgets/contact/contact-form-widget.php';
			$widgets_manager->register( new \Contact_Form_Widget() );

			require_once __DIR__ . '/widgets/contact/contact-info-strip-widget.php';
			$widgets_manager->register( new \Contact_Info_Strip_Widget() );

			require_once __DIR__ . '/widgets/contact/contact-bottom-row-widget.php';
			$widgets_manager->register( new \Contact_Bottom_Row_Widget() );

			// blog page.
			require_once __DIR__ . '/widgets/blog/blog-hero-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Hero_Widget() );

			require_once __DIR__ . '/widgets/blog/blog-featured-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Featured_Widget() );

			require_once __DIR__ . '/widgets/blog/blog-grid-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Grid_Widget() );

			// blog detail.
			require_once __DIR__ . '/widgets/blog-detail/blog-detail-hero-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_Hero_Widget() );

			require_once __DIR__ . '/widgets/blog-detail/blog-detail-toc-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_TOC_Widget() );

			require_once __DIR__ . '/widgets/blog-detail/blog-detail-mobile-toc-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_Mobile_TOC_Widget() );

			require_once __DIR__ . '/widgets/blog-detail/blog-detail-cta-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_CTA_Widget() );

			require_once __DIR__ . '/widgets/blog-detail/blog-detail-recent-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_Recent_Widget() );

			require_once __DIR__ . '/widgets/blog-detail/blog-detail-related-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Blog_Detail_Related_Widget() );

			// geo pages.
			require_once __DIR__ . '/widgets/geo/geo-stats-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Geo_Stats_Widget() );

			require_once __DIR__ . '/widgets/geo/geo-cities-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Geo_Cities_Widget() );

			require_once __DIR__ . '/widgets/geo/geo-project-types-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Geo_Project_Types_Widget() );

			require_once __DIR__ . '/widgets/geo/geo-metro-coverage-widget.php';
			$widgets_manager->register( new \Eagle_BIM_Geo_Metro_Coverage_Widget() );
		}
	);

	// Enqueue styles and scripts
	add_action(
		'wp_enqueue_scripts',
		function () {
			// Load Google Fonts
			wp_enqueue_style( 'eagle-bim-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Playfair+Display:wght@600;700;800&display=swap', [], null );

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
			wp_enqueue_style( 'eagle-bim-service-deliverables-software-style', plugins_url( '/assets/css/service/service-deliverables-software.css', __FILE__ ) );
			// bim cons.
			wp_enqueue_style( 'eagle-bim-service-consulting-process-style', plugins_url( '/assets/css/service/service-consulting-process.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-engagement-style', plugins_url( '/assets/css/service/service-engagement-models.css', __FILE__ ) );
			// bim coordination.
			wp_enqueue_style( 'eagle-bim-service-clash-process-style', plugins_url( '/assets/css/service/service-clash-process.css', __FILE__ ) );
			// mep bim.
			wp_enqueue_style( 'eagle-bim-service-discipline-detail-style', plugins_url( '/assets/css/service/service-discipline-detail.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-model-process-style', plugins_url( '/assets/css/service/service-model-process.css', __FILE__ ) );
			// cad to bim.
			wp_enqueue_style( 'eagle-bim-service-transformation-style', plugins_url( '/assets/css/service/service-transformation-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-service-formats-lod-style', plugins_url( '/assets/css/service/service-formats-lod-widget.css', __FILE__ ) );
			// revit drafting.
			wp_enqueue_style( 'eagle-bim-service-produce-style', plugins_url( '/assets/css/service/service-produce-widget.css', __FILE__ ) );
			// about page styles.
			wp_enqueue_style( 'eagle-bim-about-who-we-are-style', plugins_url( '/assets/css/about/about-who-we-are.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-about-mv-style', plugins_url( '/assets/css/about/about-mv.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-about-why-style', plugins_url( '/assets/css/about/about-why.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-about-tools-style', plugins_url( '/assets/css/about/about-tools.css', __FILE__ ) );
			// contact page styles.
			wp_enqueue_style( 'eagle-bim-contact-hero-style', plugins_url( '/assets/css/contact/contact-hero.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-contact-form-style', plugins_url( '/assets/css/contact/contact-form.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-contact-info-style', plugins_url( '/assets/css/contact/contact-info-strip.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-contact-bottom-style', plugins_url( '/assets/css/contact/contact-bottom-row.css', __FILE__ ) );
			// blog page styles.
			wp_enqueue_style( 'eagle-bim-blog-hero-style', plugins_url( '/assets/css/blog/blog-hero.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-featured-style', plugins_url( '/assets/css/blog/blog-featured.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-grid-style', plugins_url( '/assets/css/blog/blog-grid.css', __FILE__ ) );
			// blog detail styles.
			wp_enqueue_style( 'eagle-bim-blog-detail-hero-style', plugins_url( '/assets/css/blog-detail/blog-detail-hero.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-content-style', plugins_url( '/assets/css/blog-detail/blog-detail-content.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-toc-style', plugins_url( '/assets/css/blog-detail/blog-detail-toc.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-mobile-toc-style', plugins_url( '/assets/css/blog-detail/blog-detail-mobile-toc.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-cta-style', plugins_url( '/assets/css/blog-detail/blog-detail-cta.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-recent-style', plugins_url( '/assets/css/blog-detail/blog-detail-recent.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-blog-detail-related-style', plugins_url( '/assets/css/blog-detail/blog-detail-related.css', __FILE__ ) );
			// geo pages.
			wp_enqueue_style( 'eagle-bim-geo-stats-style', plugins_url( '/assets/css/geo/geo-stats-widget.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-geo-cities-style', plugins_url( '/assets/css/geo/geo-cities.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-geo-project-types-style', plugins_url( '/assets/css/geo/geo-project-types.css', __FILE__ ) );
			wp_enqueue_style( 'eagle-bim-geo-metro-coverage-style', plugins_url( '/assets/css/geo/geo-metro-coverage.css', __FILE__ ) );
		}
	);

	// scripts.
	wp_enqueue_script( 'eagle-bim-stats-script', plugins_url( '/assets/js/stats-widget.js', __FILE__ ), [], '1.0.0', true );
	wp_enqueue_script( 'eagle-bim-faq-script', plugins_url( '/assets/js/faqs-widget.js', __FILE__ ), [], '1.0.0', true );
	wp_enqueue_script( 'eagle-bim-contact-form-script', plugins_url( '/assets/js/contact-form.js', __FILE__ ), [], '1.0.0', true );
	wp_enqueue_script( 'eagle-bim-blog-detail-script', plugins_url( '/assets/js/blog-detail.js', __FILE__ ), [], '1.0.0', true );
}
add_action( 'plugins_loaded', 'eagle_bim_widgets_init' );
