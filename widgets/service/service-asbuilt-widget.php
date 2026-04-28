<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_AsBuilt_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-asbuilt';
	}

	public function get_title() {
		return __( 'Service As-Built Documentation', 'eagle-bim-widgets' );
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
				'default' => __( 'As-Built Documentation', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'As-Built and Record <em>BIM Documentation</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'body_text',
			[
				'label'   => __( 'Main Body Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p>An accurate as-built record is the foundation for every renovation, expansion, and facility management decision that follows. Our architectural BIM services include incorporating field changes, redlines, and construction markups into final record models that reflect the building as it was actually constructed — not as it was designed.</p><p>As part of our architectural BIM services, we include site survey integration, point cloud registration, and as-built model verification. Deliverables support operations and maintenance manuals, facility management systems, and future capital projects, available in RVT, DWG, IFC, and PDF formats.</p>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'asbuilt_items',
			[
				'label'   => __( 'As-Built Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'        => 'icon_svg',
						'label'       => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => __( 'Paste SVG code here', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'label',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Field Redline Integration', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'sub_label',
						'label'   => __( 'Sub Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Markups incorporated into final record model', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'icon_svg'  => '<svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
						'label'     => __( 'Field Redline Integration', 'eagle-bim-widgets' ),
						'sub_label' => __( 'Markups incorporated into final record model', 'eagle-bim-widgets' ),
					],
					[
						'icon_svg'  => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="1.5"/><circle cx="6" cy="8" r="1"/><circle cx="18" cy="8" r="1"/><circle cx="6" cy="16" r="1"/><circle cx="18" cy="16" r="1"/><circle cx="4" cy="12" r="1"/><circle cx="20" cy="12" r="1"/></svg>',
						'label'     => __( 'Point Cloud Registration', 'eagle-bim-widgets' ),
						'sub_label' => __( 'Laser scan data verified against BIM model', 'eagle-bim-widgets' ),
					],
					[
						'icon_svg'  => '<svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
						'label'     => __( 'As-Built Model Verification', 'eagle-bim-widgets' ),
						'sub_label' => __( 'Final model checked against constructed conditions', 'eagle-bim-widgets' ),
					],
					[
						'icon_svg'  => '<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/></svg>',
						'label'     => __( 'O&M Documentation Support', 'eagle-bim-widgets' ),
						'sub_label' => __( 'Models ready for facility management integration', 'eagle-bim-widgets' ),
					],
					[
						'icon_svg'  => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
						'label'     => __( 'Record Drawing Sets', 'eagle-bim-widgets' ),
						'sub_label' => __( 'Updated plans, sections, and detail sheets', 'eagle-bim-widgets' ),
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-asbuilt-section">
			<div class="eb-asbuilt-layout">
				<div class="eb-asbuilt-left reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-asbuilt-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-body-content"><?php echo wp_kses_post( $settings['body_text'] ); ?></div>
				</div>
				<div class="eb-asbuilt-visual reveal">
					<?php foreach ( $settings['asbuilt_items'] as $item ) : ?>
						<div class="eb-asbuilt-row">
							<div class="eb-asbuilt-icon">
								<?php echo $item['icon_svg']; ?>
							</div>
							<div>
								<div class="eb-asbuilt-label"><?php echo esc_html( $item['label'] ); ?></div>
								<div class="eb-asbuilt-sub"><?php echo esc_html( $item['sub_label'] ); ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
