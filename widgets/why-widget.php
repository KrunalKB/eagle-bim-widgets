<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Why_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-why';
	}

	public function get_title() {
		return __( 'Why Choose Eagle BIM', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-star';
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
				'default' => __( 'Why Eagle BIM', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Why Choose Eagle BIM as Your<br><em>BIM Company in the USA?</em>',
			]
		);

		$this->end_controls_section();

		// Cards Section
		$this->start_controls_section(
			'cards_section',
			[
				'label' => __( 'Value Props', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'why_cards',
			[
				'label'   => __( 'Cards List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'        => 'card_icon_svg',
						'label'       => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => __( 'Enter SVG path or full SVG code', 'eagle-bim-widgets' ),
						'default'     => '<svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/></svg>',
					],
					[
						'name'    => 'card_title',
						'label'   => __( 'Card Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Coordination That Reduces Rework', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'card_text',
						'label'   => __( 'Card Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => __( 'We bring architectural, structural, and MEP models into a federated environment and run systematic clash detection before anything reaches the field.', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'card_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/></svg>',
						'card_title'    => 'Coordination That Reduces Rework',
						'card_text'     => 'We bring architectural, structural, and MEP models into a federated environment and run systematic clash detection before anything reaches the field. Clashes are categorized, ownership is assigned, and every issue is tracked to resolution — with clear logs your team can audit. The result is up to 80% fewer site RFIs and change orders that don\'t eat your contingency.',
					],
					[
						'card_icon_svg' => '<svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/></svg>',
						'card_title'    => 'Documentation That Gets Approved First Time',
						'card_text'     => 'Our Revit BIM services are built around your title blocks, naming conventions, sheet standards, and BIM Execution Plan — not ours. By aligning to your templates before a single element is placed, we eliminate the revision loops that cost firms weeks. Sheets go out formatted for permitting, contractor bidding, and consultant review — ready on the first submission.',
					],
					[
						'card_icon_svg' => '<svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
						'card_title'    => 'Delivery Formatted to Your Workflow',
						'card_text'     => 'Files in RVT, DWG, IFC, NWC, NWD, and PDF — delivered through your platform of choice, whether that\'s BIM 360, Procore, Bluebeam Studio, or direct transfer. We adapt to your time zone, attend coordination meetings remotely, and treat your workflow as the standard — not an obstacle.',
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
		<div class="eb-why-us-widget">
			<div class="eb-why-header">
				<div class="eb-why-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-why-title"><?php echo $section_title; ?></h2>
			</div>
			<div class="eb-why-cols">
				<?php if ( ! empty( $settings['why_cards'] ) ) : ?>
					<?php foreach ( $settings['why_cards'] as $card ) : ?>
						<div class="eb-why-col">
							<div class="eb-why-col-icon">
								<?php echo $card['card_icon_svg']; ?>
							</div>
							<div class="eb-why-col-title"><?php echo esc_html( $card['card_title'] ); ?></div>
							<div class="eb-why-col-text"><?php echo esc_html( $card['card_text'] ); ?></div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
