<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Final_CTA_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-final-cta';
	}

	public function get_title() {
		return __( 'Eagle BIM Final CTA', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
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
				'default' => __( 'Ready to Build?', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Start Your BIM Project Today',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Share your scope. We\'ll return a clear project plan and a firm quote — usually within 24–48 hours.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Primary Action
		$this->start_controls_section(
			'primary_action',
			[
				'label' => __( 'Primary Action', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'primary_text',
			[
				'label'   => __( 'Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Share Your Scope →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'primary_link',
			[
				'label'   => __( 'Button Link', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'mailto:info@eaglebim.com',
				],
			]
		);

		$this->end_controls_section();

		// Secondary Actions
		$this->start_controls_section(
			'secondary_actions',
			[
				'label' => __( 'Secondary Actions', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ghost_actions',
			[
				'label'   => __( 'Secondary Actions', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'ghost_text',
						'label'   => __( 'Button Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Call Us', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'ghost_link',
						'label'   => __( 'Button Link', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'default' => [
							'url' => 'tel:+13465882960',
						],
					],
					[
						'name'    => 'ghost_icon',
						'label'   => __( 'Icon (Emoji/Text)', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '📞',
					],
				],
				'default' => [
					[
						'ghost_text' => 'Call Us',
						'ghost_link' => [ 'url' => 'tel:+13465882960' ],
						'ghost_icon' => '📞',
					],
					[
						'ghost_text' => 'Email Us',
						'ghost_link' => [ 'url' => 'mailto:info@bim-services.us' ],
						'ghost_icon' => '✉️',
					],
				],
			],
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-final-cta-widget">
			<div class="eb-cta-inner">
				<div class="eb-cta-section-tag" style="justify-content:center; margin-bottom:22px;"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-cta-title"><?php echo $section_title; ?></h2>
				<p class="eb-cta-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>

				<div class="eb-cta-acts">
					<a href="<?php echo esc_url( $settings['primary_link']['url'] ); ?>" class="eb-cta-btn-primary">
						<?php echo esc_html( $settings['primary_text'] ); ?>
					</a>

					<div class="eb-cta-secondary-row">
						<?php if ( ! empty( $settings['ghost_actions'] ) ) : ?>
							<?php foreach ( $settings['ghost_actions'] as $action ) : ?>
								<a href="<?php echo esc_url( $action['ghost_link']['url'] ); ?>" class="eb-cta-btn-ghost">
									<?php echo esc_html( $action['ghost_icon'] ); ?> <?php echo esc_html( $action['ghost_text'] ); ?>
								</a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
