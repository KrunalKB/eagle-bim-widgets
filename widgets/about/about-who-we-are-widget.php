<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class About_Who_We_Are_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'about-who-we-are';
	}

	public function get_title() {
		return __( 'About: Who We Are', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-person';
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
			'eyebrow_left',
			[
				'label'   => __( 'Left Eyebrow', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Who We Are', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Full-Scope <em>BIM Services</em><br>Powered by BIMPRO LLC', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM is a <strong>BIM services</strong> provider operated by <strong>BIMPRO LLC</strong>, a leading <strong>BIM company</strong> headquartered in Pflugerville, Texas. We deliver precise, Revit-native <strong>BIM modeling</strong> and <strong>BIM coordination</strong> services to architectural firms, structural engineers, MEP consultants, and general contractors across the United States.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'eyebrow_right',
			[
				'label'   => __( 'Right Eyebrow', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Our Core Commitments', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'commitments',
			[
				'label'   => __( 'Commitments', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'icon',
						'label'   => __( 'SVG Icon', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Transparent, Affordable BIM Pricing',
					],
					[
						'name'    => 'desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'No hidden fees, no retainer requirements. You receive a clear deliverable list before any BIM services engagement begins.',
					],
				],
				'default' => [
					[
						'icon'  => '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>',
						'title' => 'Transparent, Affordable BIM Pricing',
						'desc'  => 'No hidden fees, no retainer requirements. You receive a clear deliverable list before any BIM services engagement begins.',
					],
					[
						'icon'  => '<svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
						'title' => 'Multi-Level QA on Every BIM Model',
						'desc'  => 'Every BIM model passes through structured internal QA before delivery — checking for LOD accuracy and field readiness.',
					],
				],
			]
		);

		$this->add_control(
			'mini_stats',
			[
				'label'   => __( 'Mini Stats', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'number',
						'label'   => __( 'Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '1,000+',
					],
					[
						'name'    => 'label',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'BIM Projects Delivered',
					],
				],
				'default' => [
					[
						'number' => '1,000+',
						'label'  => 'BIM Projects Delivered',
					],
					[
						'number' => '22+',
						'label'  => 'US States Served',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-about-intro reveal">
			<div class="eb-intro-left">
				<div class="eb-about-intro-tag"><?php echo esc_html( $settings['eyebrow_left'] ); ?></div>
				<h2><?php echo wp_kses_post( $settings['title'] ); ?></h2>
				<div class="eb-intro-desc">
					<?php echo wp_kses_post( $settings['description'] ); ?>
				</div>
			</div>
			<div class="eb-intro-right">
				<div class="eb-about-intro-tag"><?php echo esc_html( $settings['eyebrow_right'] ); ?></div>
				<div class="eb-value-list">
					<?php foreach ( $settings['commitments'] as $item ) : ?>
						<div class="eb-value-item">
							<div class="eb-value-icon"><?php echo $item['icon']; ?></div>
							<div>
								<div class="eb-value-title"><?php echo esc_html( $item['title'] ); ?></div>
								<div class="eb-value-desc"><?php echo esc_html( $item['desc'] ); ?></div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="eb-intro-mini-stats">
					<?php foreach ( $settings['mini_stats'] as $stat ) : ?>
						<div class="eb-intro-mini-stat">
							<div class="eb-intro-mini-num"><?php echo esc_html( $stat['number'] ); ?></div>
							<div class="eb-intro-mini-label"><?php echo esc_html( $stat['label'] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
