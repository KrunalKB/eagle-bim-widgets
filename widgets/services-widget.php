<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Services_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-services';
	}

	public function get_title() {
		return __( 'Eagle BIM Services', 'eagle-bim-widgets' );
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
				'default' => __( 'What We Do', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Services Built for <em>Every Trade</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'From architectural Revit modeling to full MEP coordination — one team, all disciplines. Expert BIM services provider serving the USA.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'View All BIM Services →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label'       => __( 'CTA Button Link', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'eagle-bim-widgets' ),
				'default'     => [
					'url' => '#contact',
				],
			]
		);

		$this->end_controls_section();

		// Services Grid Section
		$this->start_controls_section(
			'services_section',
			[
				'label' => __( 'Services List', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'services',
			[
				'label'   => __( 'Services', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'        => 'svc_icon_svg',
						'label'       => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => __( 'Enter SVG path or full SVG code', 'eagle-bim-widgets' ),
						'default'     => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
					],
					[
						'name'    => 'svc_name',
						'label'   => __( 'Service Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Architectural BIM Services', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'svc_desc',
						'label'   => __( 'Service Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'Revit architectural modeling and construction documentation from SD through CD — aligned to your templates and BIM standards.', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'svc_link',
						'label'   => __( 'Service Link', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'default' => [
							'url' => '#',
						],
					],
				],
				'default' => [
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
						'svc_name'     => 'Architectural BIM Services',
						'svc_desc'     => 'Revit architectural modeling and construction documentation from SD through CD — aligned to your templates and BIM standards.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M9 18h6M10 22h4M12 2a7 7 0 017 7c0 2.5-1.3 4.7-3.3 6L15 17H9l-.7-2C6.3 13.7 5 11.5 5 9a7 7 0 017-7z"/></svg>',
						'svc_name'     => 'BIM Consulting Services',
						'svc_desc'     => 'BIM Execution Plans, Revit templates, workflow strategy, and team training. BIM implementation that delivers lasting change.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
						'svc_name'     => 'BIM Coordination Services',
						'svc_desc'     => 'Federated model coordination across all disciplines. One model, clear ownership, fewer surprises on site.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M5 3h4v4H5zM15 3h4v4h-4zM5 17h4v4H5z"/><path d="M9 5h6M19 7v6M7 17V9"/><path d="M15 17l4 4M19 17l-4 4"/></svg>',
						'svc_name'     => 'CAD to BIM Conversion',
						'svc_desc'     => 'Legacy 2D DWG, PDF, and paper drawings converted into intelligent 3D Revit models with full data and parametric components.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M3 3h18v3H3zM3 18h18v3H3z"/><line x1="7" y1="6" x2="7" y2="18"/><line x1="12" y1="6" x2="12" y2="18"/><line x1="17" y1="6" x2="17" y2="18"/></svg>',
						'svc_name'     => 'Structural BIM Services',
						'svc_desc'     => 'Steel, concrete, and precast models built from structural drawings — coordinated with architectural and MEP disciplines.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><circle cx="9" cy="9" r="5"/><circle cx="15" cy="15" r="5"/><path d="M12 6l-3 3 3 3M12 18l3-3-3-3"/></svg>',
						'svc_name'     => 'Clash Detection Services',
						'svc_desc'     => 'Hard and soft clash testing in Navisworks — categorized reports, assigned ownership, tracked to final clearance.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M3 6h4v4H3zM17 6h4v4h-4zM3 14h4v4H3z"/><path d="M7 8h3a1 1 0 011 1v6a1 1 0 001 1h3M7 16h2"/></svg>',
						'svc_name'     => 'MEP BIM Services',
						'svc_desc'     => 'Mechanical, electrical, plumbing, and fire protection modeled for fabrication — routing, clearances, and shop drawing prep included.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="1.5"/><circle cx="6" cy="8" r="1"/><circle cx="18" cy="8" r="1"/><circle cx="6" cy="16" r="1"/><circle cx="18" cy="16" r="1"/><circle cx="9" cy="5" r="1"/><circle cx="15" cy="5" r="1"/><circle cx="9" cy="19" r="1"/><circle cx="15" cy="19" r="1"/><circle cx="4" cy="12" r="1"/><circle cx="20" cy="12" r="1"/><path d="M8 3.5A9.5 9.5 0 013.5 8M16 3.5A9.5 9.5 0 0120.5 8M8 20.5A9.5 9.5 0 013.5 16M16 20.5A9.5 9.5 0 0020.5 16"/></svg>',
						'svc_name'     => 'Scan to BIM Services',
						'svc_desc'     => 'Point cloud data from laser scans transformed into accurate as-built Revit models for renovation, retrofit, and facility management.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="12" y2="17"/><line x1="8" y1="9" x2="10" y2="9"/></svg>',
						'svc_name'     => 'Revit Drafting Services',
						'svc_desc'     => 'Plans, elevations, sections, details, and schedules set to your sheet standards — submission-ready documentation every time.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="1"/><path d="M6 8h.01M6 12h.01M6 16h.01"/><line x1="9" y1="8" x2="18" y2="8"/><line x1="9" y1="12" x2="18" y2="12"/><line x1="9" y1="16" x2="14" y2="16"/></svg>',
						'svc_name'     => 'Shop Drawing Services',
						'svc_desc'     => 'Build-ready fabrication drawings for MEP, structural steel, and architectural packages — extracted from coordinated Revit models.',
						'svc_link'     => [ 'url' => '#' ],
					],
					[
						'svc_icon_svg' => '<svg viewBox="0 0 24 24"><rect x="2" y="14" width="6" height="6" rx="1"/><rect x="9" y="14" width="6" height="6" rx="1"/><rect x="16" y="14" width="6" height="6" rx="1"/><rect x="5.5" y="7" width="6" height="6" rx="1"/><rect x="12.5" y="7" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="4" rx="1"/></svg>',
						'svc_name'     => 'Revit Family Creation',
						'svc_desc'     => 'Custom parametric Revit families built to your LOD, naming conventions, and minimal file size specifications. Type catalogs, nested families, and enterprise-wide content libraries for every discipline.',
						'svc_link'     => [ 'url' => '#' ],
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
		<div class="eb-services-widget">
			<div class="eb-svc-header">
				<div>
					<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-svc-title"><?php echo $section_title; ?></h2>
					<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
				</div>
				<?php if ( $settings['cta_link']['url'] ) : ?>
					<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" class="eb-btn-blue">
						<?php echo esc_html( $settings['cta_text'] ); ?>
					</a>
				<?php endif; ?>
			</div>

			<div class="eb-services-grid">
				<?php if ( ! empty( $settings['services'] ) ) : ?>
					<?php foreach ( $settings['services'] as $index => $service ) : ?>
						<a href="<?php echo esc_url( $service['svc_link']['url'] ); ?>" class="eb-svc-card<?php echo ( $index === 10 ) ? ' eb-svc-card-span-2' : ''; ?>">
							<div class="eb-svc-icon">
								<?php echo $service['svc_icon_svg']; ?>
							</div>
							<div class="eb-svc-name"><?php echo esc_html( $service['svc_name'] ); ?></div>
							<div class="eb-svc-desc"><?php echo esc_html( $service['svc_desc'] ); ?></div>
							<span class="eb-svc-arr">→</span>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
