<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-hero';
	}

	public function get_title() {
		return __( 'Blog Hero', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'eagle-bim-blog' ];
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
				'default' => __( 'Eagle BIM Insights', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Knowledge<br>for <em>US AEC Firms</em>',
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'   => __( 'Subtitle', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Practical guides on BIM coordination, Revit, clash detection, and LOD', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$count    = wp_count_posts( 'post' )->publish;
		?>
		<div class="eb-blog-hero">
			<div class="eb-blog-hero-inner">
				<div>
					<?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
						<div class="eb-blog-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></div>
					<?php endif; ?>
					<h1><?php echo wp_kses_post( $settings['title'] ); ?></h1>
				</div>
				<div class="eb-blog-hero-meta">
					<div class="eb-blog-hero-count"><?php echo $count; ?></div>
					<div class="eb-blog-hero-sub"><?php echo esc_html( $settings['subtitle'] ); ?></div>
				</div>
			</div>
		</div>
		<?php
	}
}
