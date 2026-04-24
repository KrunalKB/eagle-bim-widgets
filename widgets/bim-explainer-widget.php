<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Explainer_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-explainer';
	}

	public function get_title() {
		return __( 'What is BIM Explainer', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Content Section
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
				'default' => __( 'Understanding BIM', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'What Are BIM Services and<br><em>Why Do They Matter?</em>',
			]
		);

		$this->add_control(
			'prose_content',
			[
				'label'   => __( 'Prose Content', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p><strong>Building Information Modeling (BIM) services</strong> go far beyond drawing in 3D. A BIM model is an intelligent digital representation of a building — every wall, duct, beam, and fitting carries data about what it is, how it connects, and what it costs.</p><p>For contractors and owners across the USA, <strong>BIM modeling services</strong> are increasingly a project requirement, not a nice-to-have.</p><p>Without proper BIM coordination, teams discover clashes in the field — a duct running through a structural beam, a pipe conflicting with a ceiling grid.</p>',
			]
		);

		$this->end_controls_section();

		// Points Section
		$this->start_controls_section(
			'points_section',
			[
				'label' => __( 'Feature Points', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bim_points',
			[
				'label'   => __( 'Points List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'pt_title',
						'label'   => __( 'Point Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'What is a BIM model?', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'pt_text',
						'label'   => __( 'Point Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'An intelligent 3D model where every element carries data about type, dimensions, cost, and connections.', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'pt_title' => 'What is a BIM model?',
						'pt_text'  => 'An intelligent 3D model where every element — walls, ducts, beams — carries data about type, dimensions, cost, and connections. Far more than a 3D drawing.',
					],
					[
						'pt_title' => 'Why do US contractors use BIM?',
						'pt_text'  => 'To reduce field conflicts, eliminate unnecessary RFIs, meet owner LOD requirements, and produce construction documents that get approved fast.',
					],
					[
						'pt_title' => 'What goes wrong without BIM coordination?',
						'pt_text'  => 'Clashes discovered on site. Change orders that spike the budget. Delayed schedules. Documentation that fails permitting.',
					],
					[
						'pt_title' => 'What does Eagle BIM deliver?',
						'pt_text'  => 'Coordinated, build-ready models in Revit. Clash-free, LOD-compliant, formatted to your templates — delivered on time across Texas and the USA.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-bim-explainer-widget">
			<div class="eb-bim-inner">
				<div class="eb-bim-left">
					<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-bim-title"><?php echo $section_title; ?></h2>
					<div class="eb-bim-prose">
						<?php echo $settings['prose_content']; ?>
					</div>
				</div>
				<div class="eb-bim-right">
					<div class="eb-bim-visual-box">
						<?php if ( ! empty( $settings['bim_points'] ) ) : ?>
							<?php foreach ( $settings['bim_points'] as $point ) : ?>
								<div class="eb-bim-point">
									<div class="eb-bim-dot"></div>
									<div>
										<div class="eb-bim-pt-title"><?php echo esc_html( $point['pt_title'] ); ?></div>
										<div class="eb-bim-pt-text"><?php echo esc_html( $point['pt_text'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
