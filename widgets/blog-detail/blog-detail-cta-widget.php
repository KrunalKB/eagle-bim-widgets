<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Detail_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-detail-cta';
	}

	public function get_title() {
		return __( 'Blog Detail Sidebar CTA', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-button';
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
				'default' => __( 'Eagle BIM · 48hr Sample', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Get a Sample Model Before You Commit', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Send your drawings. We return a working Revit sample in 48 hours — no charge, no obligation.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label'   => __( 'Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Share Your Scope →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label'   => __( 'Button Link', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'mailto:info@bim-services.us', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-sidebar-cta">
			<div class="eb-sidebar-cta-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></div>
			<h4><?php echo esc_html( $settings['title'] ); ?></h4>
			<p><?php echo esc_html( $settings['description'] ); ?></p>
			<a href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>" class="eb-sidebar-cta-btn">
				<?php echo esc_html( $settings['btn_text'] ); ?>
			</a>
		</div>
		<?php
	}
}
