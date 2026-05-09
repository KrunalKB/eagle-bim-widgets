<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Deliverables_Software_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-deliverables-software';
	}

	public function get_title() {
		return __( 'Service Deliverables & Software', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-checklist';
	}

	public function get_categories() {
		return [ 'eagle-bim-services' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_header',
			[
				'label' => __( 'Section Header', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Deliverables & Software Stack', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'What You Receive from Our <em>BIM Services</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Every Eagle BIM engagement ends with a complete, organized deliverables package, built using the industry-standard BIM software your team and your consultants already work with.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_deliverables',
			[
				'label' => __( 'Deliverables', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'del_title',
			[
				'label'   => __( 'Deliverables Column Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Standard Deliverables', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'deliverables_list',
			[
				'label'   => __( 'Deliverables List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'icon_svg',
						'label' => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					],
				],
				'default' => [
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
						'title'    => 'Federated BIM Models',
						'text'     => 'Architectural, structural, and MEP Revit models organized to your naming conventions and view templates',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
						'title'    => 'Construction Drawing Sets',
						'text'     => 'Plans, elevations, sections, details, and schedules formatted to your title blocks and submission standards',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><circle cx="9" cy="9" r="5"/><circle cx="15" cy="15" r="5"/></svg>',
						'title'    => 'Clash Reports & Coordination Logs',
						'text'     => 'Visual clash reports, BCF exchanges, issue trackers, and coordination transmittals for every review cycle',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>',
						'title'    => 'Quantity Take-offs & Schedules',
						'text'     => 'Door, window, room, finish, and material schedules exported to Excel for procurement and cost estimation',
					],
				],
			]
		);

		$this->add_control(
			'format_chips',
			[
				'label'   => __( 'Format Chips', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'chip_text',
						'label'   => __( 'Chip Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'RVT',
					],
				],
				'default' => [
					[ 'chip_text' => 'RVT' ],
					[ 'chip_text' => 'DWG' ],
					[ 'chip_text' => 'IFC' ],
					[ 'chip_text' => 'NWC' ],
					[ 'chip_text' => 'NWD' ],
					[ 'chip_text' => 'PDF' ],
					[ 'chip_text' => 'XLSX' ],
					[ 'chip_text' => 'RCS' ],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_software',
			[
				'label' => __( 'Software Stack', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sw_title',
			[
				'label'   => __( 'Software Column Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Software Stack', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'software_list',
			[
				'label'   => __( 'Software List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'badge_text',
						'label'   => __( 'Badge Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'RVT',
					],
					[
						'name'    => 'name',
						'label'   => __( 'Software Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Autodesk Revit',
					],
					[
						'name'    => 'description',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Architectural, structural & MEP modeling and documentation',
					],
				],
				'default' => [
					[
						'badge_text' => 'RVT',
						'name'       => 'Autodesk Revit',
						'description' => 'Architectural, structural & MEP modeling and documentation',
					],
					[
						'badge_text' => 'NW',
						'name'       => 'Autodesk Navisworks',
						'description' => 'Federated coordination & clash detection',
					],
					[
						'badge_text' => 'RZ',
						'name'       => 'Revizto',
						'description' => 'Issue tracking and stakeholder coordination',
					],
					[
						'badge_text' => 'CAD',
						'name'       => 'AutoCAD',
						'description' => 'Legacy 2D drafting and CAD-to-BIM source files',
					],
					[
						'badge_text' => 'RC',
						'name'       => 'Autodesk ReCap',
						'description' => 'Point-cloud processing for scan-to-BIM workflows',
					],
					[
						'badge_text' => 'D365',
						'name'       => 'Autodesk Construction Cloud',
						'description' => 'BIM 360 collaboration, transmittals & document control',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-del-soft-bg">
			<div class="eb-del-soft-container">
				<div class="eb-section-head-center reveal">
					<div class="eb-del-soft-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-del-soft-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-del-soft-sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-del-soft-cols">
					<div class="reveal">
						<h3 class="eb-del-soft-col-title"><?php echo esc_html( $settings['del_title'] ); ?></h3>
						<div class="eb-del-soft-list">
							<?php foreach ( $settings['deliverables_list'] as $item ) : ?>
								<div class="eb-del-soft-row">
									<div class="eb-del-soft-row-icon">
										<?php echo $item['icon_svg']; ?>
									</div>
									<div>
										<div class="eb-del-soft-row-title"><?php echo esc_html( $item['title'] ); ?></div>
										<div class="eb-del-soft-row-text"><?php echo esc_html( $item['text'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="eb-del-soft-fmt-row">
							<?php foreach ( $settings['format_chips'] as $chip ) : ?>
								<span class="eb-sdel-fmt-chip"><?php echo esc_html( $chip['chip_text'] ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="reveal eb-del-soft-right-box">
						<h3 class="eb-del-soft-col-title"><?php echo esc_html( $settings['sw_title'] ); ?></h3>
						<div class="eb-sw-stack">
							<?php foreach ( $settings['software_list'] as $item ) : ?>
								<div class="eb-sw-row">
									<div class="eb-sw-badge"><?php echo esc_html( $item['badge_text'] ); ?></div>
									<div>
										<div class="eb-sw-name"><?php echo esc_html( $item['name'] ); ?></div>
										<div class="eb-sw-desc"><?php echo esc_html( $item['description'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
