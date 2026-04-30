<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Clash_Process_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-clash-process';
	}

	public function get_title() {
		return __( 'Service Clash Process', 'eagle-bim-widgets' );
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
				'default' => __( 'Our Process', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'How Our <em>BIM Coordination Services</em> Work', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Every BIM coordination services project follows the same structured process — clear stages, clear ownership, no surprises.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'stages_list',
			[
				'label'   => __( 'Coordination Stages', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'step_num',
						'label'   => __( 'Step Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '01',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Model Intake and Standards Setup',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'We receive all discipline models, verify shared coordinates and naming conventions, and establish the coordination environment in Navisworks or Revizto. Clash detection rules, clearance requirements, and reporting formats are agreed before the first test runs.',
					],
				],
				'default' => [
					[
						'step_num' => '01',
						'title'    => 'Model Intake and Standards Setup',
						'text'     => 'We receive all discipline models, verify shared coordinates and naming conventions, and establish the coordination environment in Navisworks or Revizto. Clash detection rules, clearance requirements, and reporting formats are agreed before the first test runs.',
					],
					[
						'step_num' => '02',
						'title'    => 'Clash Detection and Categorization',
						'text'     => 'Hard and soft clash tests are run across all discipline pairs. Results are filtered, de-duplicated, and categorized by severity, discipline, and location. Duplicate and minor clashes are removed so the report your team receives contains only actionable issues.',
					],
					[
						'step_num' => '03',
						'title'    => 'Coordination Meeting and Resolution',
						'text'     => 'Clash reports are presented to all discipline teams. Issues are reviewed, resolution responsibility is assigned, and deadlines are set. Our coordination team facilitates the discussion and captures every decision in the coordination log.',
					],
					[
						'step_num' => '04',
						'title'    => 'Model Update and Re-Testing',
						'text'     => 'Disciplines update their models to resolve assigned clashes. We re-run clash detection to verify all resolutions and identify any new conflicts introduced by model changes. The cycle continues until all clashes are cleared.',
					],
					[
						'step_num' => '05',
						'title'    => 'Final Coordination Package',
						'text'     => 'When all clashes are resolved, we deliver the final coordinated models, clash-free NWD file, coordination drawings, penetration schedules, and full resolution log — everything your construction team needs to build without surprises.',
					],
				],
			],
		);

		$this->add_control(
			'clash_types_title',
			[
				'label'   => __( 'Clash Types Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Types of Clashes We Detect',
			]
		);

		$this->add_control(
			'clash_types_list',
			[
				'label'   => __( 'Clash Types List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'label',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Type 01',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Hard Clashes',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'Two building elements physically occupying the same space — a duct running through a structural beam, a pipe through a wall without a sleeve. These are critical and must be resolved before construction.',
					],
				],
				'default' => [
					[
						'label' => 'Type 01',
						'title' => 'Hard Clashes',
						'text'  => 'Two building elements physically occupying the same space — a duct running through a structural beam, a pipe through a wall without a sleeve. These are critical and must be resolved before construction.',
					],
					[
						'label' => 'Type 02',
						'title' => 'Soft Clashes',
						'text'  => 'Elements that do not physically intersect but violate required clearance zones — insufficient maintenance access to equipment, MEP services too close to structural elements, or inadequate ceiling zone depth.',
					],
					[
						'label' => 'Type 03',
						'title' => 'Workflow Clashes',
						'text'  => 'Séquencing and constructability conflicts — elements that are geometrically clear but cannot be installed in the required construction sequence without removing previously installed components.',
					],
				],
			],
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Start a Coordination Project →',
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
			],
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-clash-process-section">
			<div class="eb-clash-process-container">
				<div class="eb-clash-process-header reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-clash-process-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-clash-sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-clash-process-grid reveal">
					<div class="eb-clash-stages">
						<?php foreach ( $settings['stages_list'] as $item ) : ?>
							<div class="eb-clash-stage">
								<div class="eb-clash-stage-num"><?php echo esc_html( $item['step_num'] ); ?></div>
								<div>
									<div class="eb-clash-stage-title"><?php echo esc_html( $item['title'] ); ?></div>
									<div class="eb-clash-stage-text"><?php echo esc_html( $item['text'] ); ?></div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="eb-clash-types">
						<div class="eb-clash-types-heading"><?php echo esc_html( $settings['clash_types_title'] ); ?></div>
						<?php foreach ( $settings['clash_types_list'] as $item ) : ?>
							<div class="eb-clash-type">
								<div class="eb-clash-type-label"><?php echo esc_html( $item['label'] ); ?></div>
								<div class="eb-clash-type-title"><?php echo esc_html( $item['title'] ); ?></div>
								<div class="eb-clash-type-text"><?php echo esc_html( $item['text'] ); ?></div>
							</div>
						<?php endforeach; ?>
						<div class="eb-clash-cta-wrapper">
							<a href="<?php echo esc_url( $settings['cta_url']['url'] ); ?>" class="eb-btn-gold" target="<?php echo esc_attr( $settings['cta_url']['is_external'] ? '_blank' : '_self' ); ?>">
								<?php echo esc_html( $settings['cta_text'] ); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
