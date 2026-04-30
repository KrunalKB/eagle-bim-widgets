<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Model_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-model-process';
	}

	public function get_title() {
		return __( 'Service Model Process', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-checklist';
	}

	public function get_categories() {
		return [ 'eagle-bim-services' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Revit MEP Modeling', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'How We Build Your <em>MEP BIM Models</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p class="body-text" style="margin-top:16px">Every Eagle BIM <strong>MEP BIM modeling</strong> engagement starts with a thorough review of your project information — drawings, specifications, BEP requirements, and coordination schedule. Our <strong>MEP modeling services</strong> process does not start until we understand exactly what the model needs to do and how it will be used in coordination.</p>
				<p class="body-text">Our <strong>Revit MEP modeling</strong> team works from your templates and your families wherever possible — importing your title blocks, applying your view templates, and following your naming conventions exactly. Where templates are not available, we build them to your standards before <strong>Revit MEP modeling</strong> begins.</p>
				<p class="body-text">Every MEP BIM model we produce is delivered as a complete <strong>mechanical electrical plumbing BIM</strong> package — not just individual files. That means coordinated system parameters, linked model references, clash-tested routing, and parametric schedules all included. As a <strong>mechanical electrical plumbing BIM</strong> specialist, Eagle BIM ensures every discipline model connects and performs as a unified system from day one.</p>',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Discuss Your MEP Project →',
			]
		);

		$this->add_control(
			'cta_url',
			[
				'label'   => __( 'CTA Button URL', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'process_steps',
			[
				'label'   => __( 'Process Steps', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'num',
						'label'   => __( 'Step Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '01',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Project Setup and Template Review',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'BEP, drawing review, template import, naming conventions confirmed, and LOD requirements agreed before modeling begins.',
					],
				],
				'default' => [
					[
						'num'   => '01',
						'title' => 'Project Setup and Template Review',
						'text'  => 'BEP, drawing review, template import, naming conventions confirmed, and LOD requirements agreed before modeling begins.',
					],
					[
						'num'   => '02',
						'title' => 'System Routing and Sizing',
						'text'  => 'All MEP systems routed in 3D from engineering drawings — duct sizing, pipe slopes, conduit spacing, and clearance zones applied throughout.',
					],
					[
						'num'   => '03',
						'title' => 'Equipment and Family Placement',
						'text'  => 'Mechanical, electrical, and plumbing equipment placed from manufacturer families or project-specific Revit families built to your specifications.',
					],
					[
						'num'   => '04',
						'title' => 'Schedule and Tag Extraction',
						'text'  => 'Equipment schedules, pipe schedules, panel schedules, and fixture counts extracted directly from the model and formatted to your project documentation standards.',
					],
					[
						'num'   => '05',
						'title' => 'Coordination-Ready Delivery',
						'text'  => 'RVT, IFC, NWC, and DWG delivered with linked model references intact — ready to federate for clash detection without any additional model preparation.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-model-bg">
			<div class="eb-model-layout">
				<div class="eb-model-content reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-model-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-model-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
					<div style="margin-top:28px">
						<a href="<?php echo esc_url( $settings['cta_url']['url'] ); ?>" class="btn-blue" target="<?php echo esc_attr( $settings['cta_url']['is_external'] ? '_blank' : '_self' ); ?>">
							<?php echo esc_html( $settings['cta_text'] ); ?>
						</a>
					</div>
				</div>
				<div class="eb-model-list reveal">
					<?php foreach ( $settings['process_steps'] as $item ) : ?>
						<div class="eb-model-row">
							<div class="eb-model-num"><?php echo esc_html( $item['num'] ); ?></div>
							<div>
								<div class="eb-model-title"><?php echo esc_html( $item['title'] ); ?></div>
								<div class="eb-model-text"><?php echo esc_html( $item['text'] ); ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
