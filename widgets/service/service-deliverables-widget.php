<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Deliverables_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-deliverables';
	}

	public function get_title() {
		return __( 'Service Deliverables', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-checklist';
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
				'default' => __( 'Deliverables', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'What You Receive from Our <em>Architectural BIM Services</em>', 'eagle-bim-widgets' ),
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
						'default' => 'Architectural BIM Models',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Clean, well-structured 3D models organized to your naming conventions, view templates, and sheet standards',
					],
				],
				'default' => [
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
						'title'    => 'Architectural BIM Models',
						'text'     => 'Clean, well-structured 3D models organized to your naming conventions, view templates, and sheet standards',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="12" y2="17"/><line x1="8" y1="9" x2="10" y2="9"/></svg>',
						'title'    => 'Construction Drawing Sets',
						'text'     => 'Fully annotated plans, elevations, sections, details, and schedules formatted to your title blocks',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><circle cx="9" cy="9" r="5"/><circle cx="15" cy="15" r="5"/><line x1="13" y1="5" x2="19" y2="5"/></svg>',
						'title'    => 'Clash Reports and Coordination Logs',
						'text'     => 'Visual clash reports, issue trackers, and coordination transmittals for every discipline review cycle',
					],
					[
						'icon_svg' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#687d9c" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>',
						'title'    => 'IFC and Exchange Files',
						'text'     => 'IFC, DWG, NWC, and PDF exports formatted for consultant coordination and BIM 360 upload',
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
					[ 'chip_text' => 'PDF' ],
					[ 'chip_text' => 'XLSX' ],
				],
			]
		);

		$this->add_control(
			'cta_heading',
			[
				'label'   => __( 'CTA Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Ready to Start Your Architectural BIM Project?',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Send us your sample drawings, PDFs, or a brief scope description. We will review your requirements, outline how our architectural BIM services fit your project, and return a clear delivery plan and a firm quote — typically within 24 to 48 hours.',
			]
		);

		$this->add_control(
			'cta_primary_text',
			[
				'label'   => __( 'Primary CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Send Sample Drawings for Quote →',
			]
		);

		$this->add_control(
			'cta_primary_url',
			[
				'label'       => __( 'Primary CTA URL', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default'     => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'cta_ghost_text',
			[
				'label'   => __( 'Ghost CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Discuss Your Architectural Project',
			]
		);

		$this->add_control(
			'cta_ghost_url',
			[
				'label'       => __( 'Ghost CTA URL', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default'     => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'trust_items',
			[
				'label'   => __( 'Trust Pointers', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'item_text',
						'label'   => __( 'Item Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Practical deliverables your team will actually use',
					],
				],
				'default' => [
					[ 'item_text' => 'All 4 MEP disciplines — full MEP coordination BIM included' ],
					[ 'item_text' => 'Built to your templates and naming standards' ],
					[ 'item_text' => 'Coordination-ready — no additional cleanup' ],
					[ 'item_text' => 'LOD agreed in writing before work begins' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-del-section">
			<div class="eb-del-container">
				<div class="reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-del-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
				</div>
				<div class="eb-del-cols">
					<div>
						<div class="eb-del-list reveal">
							<?php foreach ( $settings['deliverables_list'] as $item ) : ?>
								<div class="eb-del-row">
									<div class="eb-del-row-icon">
										<?php echo $item['icon_svg']; ?>
									</div>
									<div>
										<div class="eb-del-row-title"><?php echo esc_html( $item['title'] ); ?></div>
										<div class="eb-del-row-text"><?php echo esc_html( $item['text'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="eb-fmt-row reveal">
							<?php foreach ( $settings['format_chips'] as $chip ) : ?>
								<span class="eb-fmt-chip"><?php echo esc_html( $chip['chip_text'] ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="eb-del-right-box reveal">
						<h3><?php echo esc_html( $settings['cta_heading'] ); ?></h3>
						<p><?php echo wp_kses_post( $settings['cta_text'] ); ?></p>
						<a href="<?php echo esc_url( $settings['cta_primary_url']['url'] ); ?>" class="eb-del-cta-gold" target="<?php echo esc_attr( $settings['cta_primary_url']['is_external'] ? '_blank' : '_self' ); ?>">
							<?php echo esc_html( $settings['cta_primary_text'] ); ?>
						</a><br>
						<a href="<?php echo esc_url( $settings['cta_ghost_url']['url'] ); ?>" class="eb-del-cta-ghost" target="<?php echo esc_attr( $settings['cta_ghost_url']['is_external'] ? '_blank' : '_self' ); ?>">
							<?php echo esc_html( $settings['cta_ghost_text'] ); ?>
						</a>
						<div class="eb-del-trust">
							<?php foreach ( $settings['trust_items'] as $item ) : ?>
								<div class="eb-del-trust-item">
									<div class="eb-del-trust-check">
										<svg viewBox="0 0 9 9"><polyline points="1.5,4.5 3.5,7 7.5,2"/></svg>
									</div>
									<div><?php echo esc_html( $item['item_text'] ); ?></div>
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
