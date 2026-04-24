<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Tools_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-tools';
	}

	public function get_title() {
		return __( 'Eagle BIM Tools & Standards', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-settings';
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
				'default' => __( 'Tools & Standards', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Software & <em>Standards We Work With</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'We model in Autodesk Revit, coordinate in Navisworks, and deliver to your BEP, shared coordinates, and sheet standards.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Certifications Section
		$this->start_controls_section(
			'certs_section',
			[
				'label' => __( 'Certifications', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'certs',
			[
				'label'   => __( 'Certification Badges', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'cert_text',
						'label'   => __( 'Badge Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Autodesk Revit Certified', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[ 'cert_text' => 'Autodesk Revit Certified' ],
					[ 'cert_text' => 'IFC Compliant' ],
					[ 'cert_text' => 'BEP Aligned' ],
					[ 'cert_text' => 'LOD 100–500' ],
				],
			],
		);

		$this->end_controls_section();

		// Tools Grid Section
		$this->start_controls_section(
			'tools_section',
			[
				'label' => __( 'Tools Grid', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'tools',
			[
				'label'   => __( 'Tools List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'tool_name',
						'label'   => __( 'Tool Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Autodesk Revit', 'eagle-bim-widgets' ),
					],
					[
						'name'        => 'tool_icon_svg',
						'label'       => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => __( 'Enter SVG path or full SVG code', 'eagle-bim-widgets' ),
						'default'     => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 3v18"/></svg>',
					],
				],
				'default' => [
					[
						'tool_name'     => 'Autodesk Revit',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 3v18"/></svg>',
					],
					[
						'tool_name'     => 'Navisworks',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
					],
					[
						'tool_name'     => 'BIM 360 / ACC',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
					],
					[
						'tool_name'     => 'Procore',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
					],
					[
						'tool_name'     => 'Bluebeam',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>',
					],
					[
						'tool_name'     => 'Revizto',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>',
					],
					[
						'tool_name'     => 'AutoCAD',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><polyline points="5 3 19 3 19 21 5 21 5 3"/><line x1="9" y1="7" x2="15" y2="7"/><line x1="9" y1="11" x2="15" y2="11"/><line x1="9" y1="15" x2="13" y2="15"/></svg>',
					],
					[
						'tool_name'     => 'Tekla Structures',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"/></svg>',
					],
					[
						'tool_name'     => '3ds Max',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
					],
					[
						'tool_name'     => 'MicroStation',
						'tool_icon_svg' => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="4"/><path d="M7 12h10M12 7v10"/></svg>',
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
		<div class="eb-tools-widget">
			<div class="eb-tools-header">
				<div class="eb-tools-text">
					<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-tools-title"><?php echo $section_title; ?></h2>
					<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
				</div>
				<div class="eb-tools-certs">
					<?php if ( ! empty( $settings['certs'] ) ) : ?>
						<?php foreach ( $settings['certs'] as $cert ) : ?>
							<span class="eb-cert-badge"><?php echo esc_html( $cert['cert_text'] ); ?></span>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="eb-tools-grid">
				<?php if ( ! empty( $settings['tools'] ) ) : ?>
					<?php foreach ( $settings['tools'] as $tool ) : ?>
						<div class="eb-tool-item">
							<div class="eb-tool-icon">
								<?php echo $tool['tool_icon_svg']; ?>
							</div>
							<span class="eb-tool-name"><?php echo esc_html( $tool['tool_name'] ); ?></span>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
