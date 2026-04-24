<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Testimonials_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-testimonials';
	}

	public function get_title() {
		return __( 'Eagle BIM Testimonials', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Header Section
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Client Feedback', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'What Our Clients Say',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'AEC firms across the USA trust Eagle BIM for coordinated, on-time, build-ready deliverables.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Testimonials Grid Section
		$this->start_controls_section(
			'testimonials_section',
			[
				'label' => __( 'Testimonials List', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonials',
			[
				'label'   => __( 'Testimonials', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'quote',
						'label'   => __( 'Quote', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( '"Eagle BIM cut our coordination loops in half and got our drawings approved on the first submission. No RFIs, no rework. Our GC was shocked by how clean the model was."', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'name',
						'label'   => __( 'Client Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Director of Project Delivery', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'role',
						'label'   => __( 'Client Role/Company', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'General Contractor · Commercial Office Project · Houston, TX', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'quote' => '"Eagle BIM cut our coordination loops in half and got our drawings approved on the first submission. No RFIs, no rework. Our GC was shocked by how clean the model was."',
						'name'  => 'Director of Project Delivery',
						'role'  => 'General Contractor · Commercial Office Project · Houston, TX',
					],
					[
						'quote' => '"They matched our Revit template exactly, hit every milestone, and flagged three major MEP clashes that would have cost us weeks on site. Exactly what a BIM services company should be."',
						'name'  => 'MEP Project Manager',
						'role'  => 'Mechanical Engineering Firm · Healthcare Facility · Dallas, TX',
					],
					[
						'quote' => '"We were switching from 2D CAD to full BIM. Eagle BIM guided us through the BEP, converted our legacy drawings, and had our team modeling in Revit within weeks. Outstanding BIM consulting."',
						'name'  => 'Principal Architect',
						'role'  => 'Architecture Firm · Multi-Family Residential · Austin, TX',
					],
				],
			],
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-testimonials-widget">
			<div class="eb-testi-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-testi-title"><?php echo $section_title; ?></h2>
				<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
			</div>

			<div class="eb-testi-grid">
				<?php if ( ! empty( $settings['testimonials'] ) ) : ?>
					<?php foreach ( $settings['testimonials'] as $testi ) : ?>
						<div class="eb-testi-card">
							<div class="eb-testi-quote">
								<?php echo esc_html( $testi['quote'] ); ?>
							</div>
							<div class="eb-testi-divider"></div>
							<div class="eb-testi-name"><?php echo esc_html( $testi['name'] ); ?></div>
							<div class="eb-testi-role"><?php echo esc_html( $testi['role'] ); ?></div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
