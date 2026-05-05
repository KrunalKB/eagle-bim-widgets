<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Contact_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact-hero';
	}

	public function get_title() {
		return __( 'Contact Hero', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'eagle-bim-contact' ];
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
			'eyebrow',
			[
				'label'   => __( 'Eyebrow Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Eagle BIM · BIMPRO LLC', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Send Your Scope.<br><em>Get a Sample in 48 Hours.</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'subheading',
			[
				'label'   => __( 'Sub-heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM delivers structural BIM, MEP BIM, BIM coordination, clash detection, and scan to BIM services to AEC firms across 22 US states — with a free working sample model in 48 hours, built from your actual drawings, before any engagement begins.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading  = preg_replace( '/<\/?p>/', '', $settings['heading'] );
		?>
		<section class="eb-contact-hero">
			<div class="eb-contact-hero-inner reveal">
				<div class="eb-contact-breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>/</span><span>Contact Us</span></div>
				<div class="eb-contact-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></div>
				<h1 class="eb-contact-hero-title"><?php echo wp_kses_post( $heading ); ?></h1>
				<div class="eb-contact-hero-sub"><?php echo wp_kses_post( $settings['subheading'] ); ?></div>
			</div>
		</section>
		<?php
	}
}
