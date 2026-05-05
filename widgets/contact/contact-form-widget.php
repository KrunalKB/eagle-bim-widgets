<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Contact_Form_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact-form';
	}

	public function get_title() {
		return __( 'Contact Form', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-contact-form';
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
			'form_shortcode',
			[
				'label'   => __( 'CF7 Shortcode', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '[contact-form-7 id="your-id" title="Contact form 1"]',
				'placeholder' => '[contact-form-7 id="123" title="Contact Form"]',
			]
		);

		$this->add_control(
			'header_title',
			[
				'label'   => __( 'Header Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Send Your Project Scope', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'header_subtext',
			[
				'label'   => __( 'Header Sub-text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Fill in the form — we review and respond within 1 business day.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'badges',
			[
				'label'   => __( 'Header Badges', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name' => 'title',
						'label' => __( 'Badge Title', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '48-Hour',
					],
					[
						'name' => 'subtext',
						'label' => __( 'Badge Sub-text', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Sample Model',
					],
					[
						'name' => 'icon',
						'label' => __( 'SVG Icon', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
					],
				],
				'default' => [
					[
						'title' => '48-Hour',
						'subtext' => 'Sample Model',
						'icon' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
					],
					[
						'title' => 'No Charge',
						'subtext' => 'No Commitment',
						'icon' => '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-contact-form-section reveal">
			<div class="eb-contact-form-card">
				<div class="eb-contact-form-header">
					<div class="eb-contact-form-header-left">
						<h2><?php echo esc_html( $settings['header_title'] ); ?></h2>
						<p><?php echo esc_html( $settings['header_subtext'] ); ?></p>
					</div>
					<div class="eb-contact-form-badges">
						<?php foreach ( $settings['badges'] as $item ) : ?>
							<div class="eb-contact-form-badge">
								<div class="eb-contact-badge-icon"><?php echo $item['icon']; ?></div>
								<div class="eb-contact-badge-text">
									<strong><?php echo esc_html( $item['title'] ); ?></strong>
									<span><?php echo esc_html( $item['subtext'] ); ?></span>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="eb-contact-form-body">
					<?php echo do_shortcode( $settings['form_shortcode'] ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}
