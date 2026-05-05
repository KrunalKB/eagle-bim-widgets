<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class About_MV_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'about-mv';
	}

	public function get_title() {
		return __( 'About: Mission Vision Value', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-star';
	}

	public function get_categories() {
		return [ 'eagle-bim-about' ];
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
			'cards',
			[
				'label'   => __( 'MV Cards', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'eyebrow',
						'label'   => __( 'Eyebrow', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Our Mission',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => 'Precise BIM Services That Help AEC Teams Build with Confidence',
					],
					[
						'name'    => 'desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => 'Our mission is to deliver high-quality, reliable BIM services that help architects, structural engineers, MEP consultants, and contractors plan, coordinate, and build more efficiently.',
					],
					[
						'name'    => 'accent_color',
						'label'   => __( 'Accent Color', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::COLOR,
						'default' => '#deaa57',
					],
				],
				'default' => [
					[
						'eyebrow'      => 'Our Mission',
						'title'        => 'Precise BIM Services That Help AEC Teams Build with Confidence',
						'desc'         => 'Our mission is to deliver high-quality, reliable BIM services that help architects, structural engineers, MEP consultants, and contractors plan, coordinate, and build more efficiently.',
						'accent_color' => '#deaa57',
					],
					[
						'eyebrow'      => 'Our Vision',
						'title'        => 'The Most Trusted BIM Services Partner for US AEC Firms',
						'desc'         => 'Our vision is to be the most trusted BIM outsourcing partner for architectural, engineering, and construction firms across the United States.',
						'accent_color' => '#687d9c',
					],
					[
						'eyebrow'      => 'Our Value Proposition',
						'title'        => 'BIM Services That Reduce Risk, Rework, and Project Cost',
						'desc'         => 'Eagle BIM delivers scalable BIM services that solve the problems that cost AEC firms the most.',
						'accent_color' => '#ecc278',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-mv-section">
			<div class="eb-mv-inner reveal">
				<?php foreach ( $settings['cards'] as $index => $card ) : ?>
					<div class="eb-mv-card" style="--card-accent: <?php echo esc_attr( $card['accent_color'] ); ?>">
						<div class="eb-mv-eyebrow"><?php echo esc_html( $card['eyebrow'] ); ?></div>
						<h3><?php echo wp_kses_post( preg_replace( '/<\/?p>/', '', $card['title'] ) ); ?></h3>
						<div><?php echo wp_kses_post( $card['desc'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
