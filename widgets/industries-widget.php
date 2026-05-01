<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Industries_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-industries';
	}

	public function get_title() {
		return __( 'Eagle BIM Industries', 'eagle-bim-widgets' );
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
				'default' => __( 'Who We Serve', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Services Across <em>Every Building Type</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Eagle BIM brings sector-specific expertise to every project type. Each industry has unique requirements — and our modelers know them.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Industries Grid Section
		$this->start_controls_section(
			'industries_section',
			[
				'label' => __( 'Industries List', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'industries',
			[
				'label'   => __( 'Industries', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'        => 'ind_icon_svg',
						'label'       => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => __( 'Enter SVG path or full SVG code', 'eagle-bim-widgets' ),
						'default'     => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><rect x="2" y="7" width="20" height="14"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
					],
					[
						'name'    => 'ind_name',
						'label'   => __( 'Industry Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Commercial', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'ind_desc',
						'label'   => __( 'Industry Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'Coordinated models for office buildings, mixed-use towers, and high-rise commercial developments from SD through CD.', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><rect x="2" y="7" width="20" height="14"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
						'ind_name'     => 'Commercial',
						'ind_desc'     => 'Coordinated models for office buildings, mixed-use towers, and high-rise commercial developments from SD through CD.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
						'ind_name'     => 'Multi-Family Residential',
						'ind_desc'     => 'Efficient Revit modeling and documentation for apartment complexes, condominiums, and large residential developments.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
						'ind_name'     => 'Healthcare',
						'ind_desc'     => 'Coordinated MEP and phased renovation models for hospitals, clinics, and medical facilities — strict compliance and infection control requirements met.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"/></svg>',
						'ind_name'     => 'Education',
						'ind_desc'     => 'BIM documentation for K–12 schools, universities, and campus facilities — phased construction and multi-building coordination handled seamlessly.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><rect x="2" y="7" width="20" height="14"/><path d="M2 7l10-5 10 5"/><line x1="12" y1="2" x2="12" y2="7"/></svg>',
						'ind_name'     => 'Industrial',
						'ind_desc'     => 'Complex MEP and structural BIM for manufacturing plants, warehouses, distribution centers, and process facilities.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><path d="M3 22V7c0-1.1.9-2 2-2h14a2 2 0 012 2v15M2 22h20M7 10h10M7 14h10"/></svg>',
						'ind_name'     => 'Hospitality',
						'ind_desc'     => 'Detailed BIM models for hotels, resorts, and mixed-use hospitality projects with complex MEP and interior coordination.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>',
						'ind_name'     => 'Retail',
						'ind_desc'     => 'Fast-track BIM documentation for retail fit-outs, shopping centers, and ground-up retail developments across the USA.',
					],
					[
						'ind_icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
						'ind_name'     => 'Data Centers',
						'ind_desc'     => 'High-density MEP coordination and structural BIM for mission-critical data center facilities where precision is non-negotiable.',
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
		<div class="eb-industries-widget">
			<div class="eb-ind-header">
				<div>
					<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-ind-title"><?php echo $section_title; ?></h2>
					<p class="eb-ind-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
				</div>
			</div>

			<div class="eb-ind-grid">
				<?php if ( ! empty( $settings['industries'] ) ) : ?>
					<?php foreach ( $settings['industries'] as $industry ) : ?>
						<div class="eb-ind-card">
							<?php if ( ! empty( $industry['ind_icon_svg'] ) ) : ?>
								<div class="eb-ind-icon">
									<?php echo $industry['ind_icon_svg']; ?>
								</div>
							<?php endif; ?>
							<div>
								<div class="eb-ind-name"><?php echo esc_html( $industry['ind_name'] ); ?></div>
								<div class="eb-ind-desc"><?php echo esc_html( $industry['ind_desc'] ); ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
