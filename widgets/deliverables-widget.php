<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Deliverables_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-deliverables';
	}

	public function get_title() {
		return __( 'Eagle BIM Deliverables', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-document-file';
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
				'default' => __( 'Deliverables', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Deliverables That <em>Fit Your Stack</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Every package formatted to your template, naming convention, and platform. Submission-ready from day one.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Deliverables Grid Section
		$this->start_controls_section(
			'grid_section',
			[
				'label' => __( 'Deliverables Grid', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'deliverables',
			[
				'label'   => __( 'Deliverables List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'del_title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Models', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'del_desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'Revit models, federated NWC/NWD, IFC files for interoperability and consultant exchange', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'del_title' => 'Models',
						'del_desc'  => 'Revit models, federated NWC/NWD, IFC files for interoperability and consultant exchange',
					],
					[
						'del_title' => 'Drawings',
						'del_desc'  => 'Plans, elevations, sections, wall sections, details, schedules, and room finish sheets',
					],
					[
						'del_title' => 'Reports',
						'del_desc'  => 'Clash logs, issue trackers, coordination transmittals, and full revision histories',
					],
					[
						'del_title' => 'Extras',
						'del_desc'  => 'Type catalogs, custom Revit families, Excel summaries, and BEP documentation',
					],
				],
			],
		);

		$this->end_controls_section();

		// File Formats Section
		$this->start_controls_section(
			'formats_section',
			[
				'label' => __( 'File Formats', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'formats_label',
			[
				'label'   => __( 'Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'File formats:', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'formats',
			[
				'label'   => __( 'Formats', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'format_text',
						'label'   => __( 'Format', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'RVT',
					],
				],
				'default' => [
					[ 'format_text' => 'RVT' ],
					[ 'format_text' => 'DWG' ],
					[ 'format_text' => 'IFC' ],
					[ 'format_text' => 'NWC/NWD' ],
					[ 'format_text' => 'PDF' ],
					[ 'format_text' => 'XLSX' ],
				],
			],
		);

		$this->add_control(
			'footer_text',
			[
				'label'   => __( 'Footer Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'All files delivered in your templates, naming conventions, and preferred formats — BEP-aligned before work begins.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-deliverables-widget">
			<div class="eb-del-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-del-section-title"><?php echo $section_title; ?></h2>
				<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
			</div>

			<div class="eb-del-grid">
				<?php if ( ! empty( $settings['deliverables'] ) ) : ?>
					<?php foreach ( $settings['deliverables'] as $del ) : ?>
						<div class="eb-del-item">
							<div class="eb-del-title"><?php echo esc_html( $del['del_title'] ); ?></div>
							<div class="eb-del-desc"><?php echo esc_html( $del['del_desc'] ); ?></div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

			<div class="eb-del-formats">
				<span class="eb-formats-label"><?php echo esc_html( $settings['formats_label'] ); ?></span>
				<div class="eb-formats-list">
					<?php if ( ! empty( $settings['formats'] ) ) : ?>
						<?php foreach ( $settings['formats'] as $format ) : ?>
							<span class="eb-del-fmt-chip"><?php echo esc_html( $format['format_text'] ); ?></span>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<p class="eb-del-footer"><?php echo esc_html( $settings['footer_text'] ); ?></p>
			</div>
		</div>
		<?php
	}
}
