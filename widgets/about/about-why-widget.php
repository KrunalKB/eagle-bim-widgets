<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class About_Why_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'about-why';
	}

	public function get_title() {
		return __( 'About: Why Choose Us', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-star-outline';
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
			'eyebrow',
			[
				'label'   => __( 'Eyebrow', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Why Choose Eagle BIM', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Why AEC Firms Choose Eagle BIM<br>for <em>BIM Services</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'The right <strong>BIM services</strong> partner reduces risk, protects your schedule, and makes every phase of design and construction smoother.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cards',
			[
				'label'   => __( 'Why Cards', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'icon',
						'label'   => __( 'SVG Icon', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '<svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Licensed BIM Software — Revit, Navisworks, BIM 360',
					],
					[
						'name'    => 'desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => 'Eagle BIM operates exclusively on licensed industry platforms — Autodesk Revit, Navisworks Manage, BIM 360, AutoCAD, Tekla Structures, and Procore.',
					],
				],
				'default' => [
					[
						'icon'  => '<svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>',
						'title' => 'Licensed BIM Software — Revit, Navisworks, BIM 360',
						'desc'  => 'Eagle BIM operates exclusively on licensed industry platforms — Autodesk Revit, Navisworks Manage, BIM 360, AutoCAD, Tekla Structures, and Procore.',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = preg_replace( '/<\/?p>/', '', $settings['title'] );
		?>
		<div class="eb-about-why-section">
			<div class="eb-about-why-header reveal">
				<div class="eb-about-why-section-tag center"><?php echo esc_html( $settings['eyebrow'] ); ?></div>
				<h2><?php echo wp_kses_post( $title ); ?></h2>
				<div><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>
			<div class="eb-about-why-grid reveal">
				<?php foreach ( $settings['cards'] as $index => $card ) : ?>
					<div class="eb-about-why-card">
						<div class="eb-about-why-card-num"><?php echo str_pad( $index + 1, 2, '0', STR_PAD_LEFT ); ?></div>
						<div class="eb-about-why-card-icon"><?php echo $card['icon']; ?></div>
						<h4><?php echo esc_html( $card['title'] ); ?></h4>
						<div class="eb-about-why-card-desc"><?php echo wp_kses_post( $card['desc'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}
