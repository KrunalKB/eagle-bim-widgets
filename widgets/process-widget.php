<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-process';
	}

	public function get_title() {
		return __( 'Our BIM Process', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => __( 'How It Works', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Our BIM Services Process —<br><em>Simple, Structured, Transparent</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Every Eagle BIM engagement follows a proven 5-step process that eliminates surprises, maintains transparency, and keeps your project on schedule.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Process Steps Section
		$this->start_controls_section(
			'steps_section',
			[
				'label' => __( 'Process Steps', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'steps',
			[
				'label'   => __( 'Steps List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'step_title',
						'label'   => __( 'Step Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Scope & Setup', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'step_text',
						'label'   => __( 'Step Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'Templates, BIM Execution Plan, shared coordinates, naming conventions, and file formats agreed before any modeling begins.', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'step_title' => 'Scope & Setup',
						'step_text'  => 'Templates, BIM Execution Plan, shared coordinates, naming conventions, and file formats agreed before any modeling begins.',
					],
					[
						'step_title' => 'Model & Draft',
						'step_text'  => 'Discipline-specific Revit models built to your LOD requirements with structured quality checks at every milestone.',
					],
					[
						'step_title' => 'Coordinate & Test',
						'step_text'  => 'Federated model in Navisworks. Hard and soft clash detection with visual reports, issue snapshots, and clear action items.',
					],
					[
						'step_title' => 'Review & Update',
						'step_text'  => 'Markups incorporated. Issues resolved. Revision logs maintained. Models re-tested and verified against project requirements.',
					],
					[
						'step_title' => 'Deliver & Support',
						'step_text'  => 'Final files issued in your preferred formats with transmittals, clash reports, and post-delivery technical support.',
					],
				],
			]
		);

		$this->end_controls_section();

		// CTA Section
		$this->start_controls_section(
			'cta_section',
			[
				'label' => __( 'CTA Button', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Request a Sample Deliverable Package →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label'       => __( 'Button Link', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'mailto:info@eaglebim.com', 'eagle-bim-widgets' ),
				'default'     => [
					'url' => 'mailto:info@eaglebim.com',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-process-widget">
			<div class="eb-process-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-process-title"><?php echo $section_title; ?></h2>
				<p class="eb-process-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
			</div>

			<div class="eb-process-steps">
				<?php if ( ! empty( $settings['steps'] ) ) : ?>
					<?php foreach ( $settings['steps'] as $index => $step ) : ?>
						<div class="eb-ps">
							<div class="eb-ps-circle">
								<span class="eb-ps-num"><?php echo sprintf( '%02d', $index + 1 ); ?></span>
							</div>
							<div class="eb-ps-title"><?php echo esc_html( $step['step_title'] ); ?></div>
							<div class="eb-ps-text"><?php echo esc_html( $step['step_text'] ); ?></div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

			<div class="eb-process-cta">
				<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" class="eb-btn-blue">
					<?php echo esc_html( $settings['cta_text'] ); ?>
				</a>
			</div>
		</div>
		<?php
	}
}
