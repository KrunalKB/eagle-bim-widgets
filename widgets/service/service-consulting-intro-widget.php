<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Service_Consulting_Intro_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-consulting-intro';
	}

	public function get_title() {
		return esc_html__( 'Service Consulting Intro', 'eagle-bim' );
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
				'default' => esc_html__( 'BIM Consulting Services', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => esc_html__( 'Section Title', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '<em>BIM Consulting Services</em> Built for How AEC Firms Actually Work', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => esc_html__( 'Introduction Text', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Eagle BIM delivers <strong>BIM consulting services</strong> that help architecture, engineering, and construction firms adopt BIM effectively...', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'who_we_help_repeater',
			[
				'label'       => esc_html__( 'Who We Help', 'eagle-bim' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'    => 'who_title',
						'label'   => esc_html__( 'Target Audience', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Firms Transitioning from CAD to BIM', 'eagle-bim' ),
					],
					[
						'name'    => 'who_text',
						'label'   => esc_html__( 'Description', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'You have been working in 2D and need to move to Revit...', 'eagle-bim' ),
					],
				],
				'title_field' => '{{{ who_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$who_we_help   = ! empty( $settings['who_we_help_repeater'] ) ? $settings['who_we_help_repeater'] : [];
		$section_title = ! empty( $settings['section_title'] ) ? preg_replace( '/<\/?p>/', '', $settings['section_title'] ) : '';
		$section_desc  = ! empty( $settings['section_desc'] ) ? $settings['section_desc'] : '';
		?>
		<section class="service-consulting-intro">
			<div class="service-intro-layout">
				<div class="service-intro-left">
					<div class="service-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="service-intro-title"><?php echo wp_kses_post( $section_title ); ?></h2>
					<div class="service-intro-content">
						<?php echo wp_kses_post( $section_desc ); ?>
					</div>
				</div>

				<div class="service-intro-right">
					<div class="service-who-cards">
						<?php if ( ! empty( $who_we_help ) ) : ?>
							<?php foreach ( $who_we_help as $item ) : ?>
								<div class="service-who-card">
									<div class="service-who-title"><?php echo esc_html( $item['who_title'] ); ?></div>
									<div class="service-who-text"><?php echo wp_kses_post( $item['who_text'] ); ?></div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
