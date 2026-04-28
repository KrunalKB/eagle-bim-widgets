<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Service_Core_Areas_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-core-areas';
	}

	public function get_title() {
		return esc_html__( 'Service Core Areas', 'eagle-bim' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'eagle-bim' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'eagle-bim' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => esc_html__( 'Section Tag', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'What We Deliver', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => esc_html__( 'Section Title', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Core <em>Architectural BIM</em> Service Areas', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => esc_html__( 'Section Description', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Every architectural BIM service we deliver is handled by experienced modelers who have worked across commercial, residential, healthcare, hospitality, and institutional project types.', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'services_repeater',
			[
				'label'       => esc_html__( 'Service Areas', 'eagle-bim' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'        => 'svc_icon',
						'label'       => esc_html__( 'Icon (SVG Code)', 'eagle-bim' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'Paste the SVG code here', 'eagle-bim' ),
					],
					[
						'name'    => 'svc_title',
						'label'   => esc_html__( 'Title', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Service Title', 'eagle-bim' ),
					],
					[
						'name'    => 'svc_text',
						'label'   => esc_html__( 'Description', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Describe the service area here.', 'eagle-bim' ),
					],
				],
				'title_field' => '{{{ svc_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$services      = $settings['services_repeater'];
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<section class="service-core-areas">
			<div class="service-core-header">
				<div class="service-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="service-core-title"><?php echo wp_kses_post( $section_title ); ?></h2>
				<div class="service-core-desc"><?php echo wp_kses_post( $settings['section_desc'] ); ?></div>
			</div>

			<div class="service-core-grid">
				<?php foreach ( $services as $item ) : ?>
					<div class="service-core-card">
						<div class="service-core-icon">
							<?php echo $item['svc_icon']; // SVG code should be sanitized/handled by Elementor’s trusted SVG if configured, otherwise basic output here ?>
						</div>
						<div class="service-core-title-card"><?php echo esc_html( $item['svc_title'] ); ?></div>
						<div class="service-core-text"><?php echo wp_kses_post( $item['svc_text'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
