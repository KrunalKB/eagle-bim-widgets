<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Benefits_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-benefits';
	}

	public function get_title() {
		return __( 'Service Benefits', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-rating-star';
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
				'default' => __( 'Why It Matters', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Benefits of Professional <em>Architectural BIM Services</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM architectural BIM services are trusted by architects and design firms across the USA — these are the outcomes our clients report consistently when their documentation is done right the first time.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'benefits_list',
			[
				'label'   => __( 'Benefits List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'number',
						'label'   => __( 'Number/Stat', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '80%',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Fewer Field Conflicts',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Early clash detection across coordinated architectural, structural, and MEP models eliminates costly conflicts before they reach the construction site.',
					],
				],
				'default' => [
					[
						'number' => '80%',
						'title'  => 'Fewer Field Conflicts',
						'text'   => 'Early clash detection across coordinated architectural, structural, and MEP models eliminates costly conflicts before they reach the construction site.',
					],
					[
						'number' => '1st',
						'title'  => 'Pass Permitting Approvals',
						'text'   => 'Coordinated documentation formatted to your title block standards and local code requirements moves through permitting without revision loops.',
					],
					[
						'number' => '60%',
						'title'  => 'Fewer RFIs on Site',
						'text'   => 'Precise, fully coordinated construction documents give contractors the information they need before they ask for it. Fewer RFIs. Fewer delays. Fewer change orders.',
					],
					[
						'number' => 'LOD',
						'title'  => '100 to 500 Compliance',
						'text'   => 'Every model element meets the LOD requirements agreed in your BIM Execution Plan, with consistent standards maintained across all project phases from SD through CD.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-benefits-section">
			<div class="eb-benefits-container">
				<div class="reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-benefits-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-benefits-sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-benefits-grid">
					<?php foreach ( $settings['benefits_list'] as $item ) : ?>
						<div class="eb-ben-card reveal">
							<span class="eb-ben-num"><?php echo esc_html( $item['number'] ); ?></span>
							<div class="eb-ben-title"><?php echo esc_html( $item['title'] ); ?></div>
							<div class="eb-ben-text"><?php echo esc_html( $item['text'] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
