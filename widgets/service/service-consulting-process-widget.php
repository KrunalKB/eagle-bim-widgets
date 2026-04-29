<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Consulting_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-consulting-process';
	}

	public function get_title() {
		return __( 'Service Consulting Process', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => __( 'How It Works', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Our BIM Consulting <em>Process</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Every BIM consulting services engagement starts with understanding your situation — not pitching a pre-packaged solution.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'process_steps',
			[
				'label'   => __( 'Process Steps', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'step_num',
						'label'   => __( 'Step Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '01',
					],
					[
						'name'    => 'step_title',
						'label'   => __( 'Step Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Discovery',
					],
					[
						'name'    => 'step_text',
						'label'   => __( 'Step Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'We review your workflows, technology stack, team structure, and BIM maturity to build an honest picture of where your firm stands today.',
					],
					[
						'name'         => 'is_highlighted',
						'label'        => __( 'Highlight Step', 'eagle-bim-widgets' ),
						'type'         => \Elementor\Controls_Manager::SWITCHER,
						'label_on'     => __( 'Yes', 'eagle-bim-widgets' ),
						'label_off'    => __( 'No', 'eagle-bim-widgets' ),
						'return_value' => 'yes',
						'default'      => 'no',
					],
				],
				'default' => [
					[
						'step_num'   => '01',
						'step_title' => 'Discovery',
						'step_text'  => 'We review your workflows, technology stack, team structure, and BIM maturity to build an honest picture of where your firm stands today.',
					],
					[
						'step_num'   => '02',
						'step_title' => 'Strategy',
						'step_text'  => 'We define the scope, deliverables, priorities, and phased roadmap with clear milestones your team can plan around.',
					],
					[
						'step_num'   => '03',
						'step_title' => 'Delivery',
						'step_text'  => 'We build your BEP, templates, standards, or training program — working directly alongside your team so nothing gets lost in handover.',
					],
					[
						'step_num'   => '04',
						'step_title' => 'Pilot Test',
						'step_text'  => 'New standards and workflows are tested on a live project. Our BIM consultants refine everything before firm-wide rollout.',
					],
					[
						'step_num'   => '05',
						'step_title' => 'Ongoing Support',
						'step_text'  => 'Ongoing advisory support, model audits, and refresher training as your BIM capability grows. We stay available as your long-term BIM consulting partner.',
					],
				],
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Schedule a BIM Strategy Session', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_url',
			[
				'label'       => __( 'CTA URL', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default'     => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-consult-process-section">
			<div class="eb-consult-process-header">
				<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-consult-process-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
				<div class="eb-consult-process-desc">
					<?php echo wp_kses_post( $settings['description'] ); ?>
				</div>
			</div>
			<div class="eb-consult-process-grid">
				<?php foreach ( $settings['process_steps'] as $item ) : ?>
					<div class="eb-consult-process-step">
						<span class="eb-consult-process-num"><?php echo esc_html( $item['step_num'] ); ?></span>
						<div class="eb-consult-process-title"><?php echo esc_html( $item['step_title'] ); ?></div>
						<div class="eb-consult-process-text"><?php echo esc_html( $item['step_text'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="eb-consult-process-cta-wrapper">
				<a href="<?php echo esc_url( $settings['cta_url']['url'] ); ?>" class="eb-btn-gold" target="<?php echo esc_attr( $settings['cta_url']['is_external'] ? '_blank' : '_self' ); ?>">
					<?php echo esc_html( $settings['cta_text'] ); ?> <span class="btn-arrow">→</span>
				</a>
			</div>
		</section>
		<?php
	}
}
