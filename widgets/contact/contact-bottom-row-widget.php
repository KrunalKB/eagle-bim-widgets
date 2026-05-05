<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Contact_Bottom_Row_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact-bottom-row';
	}

	public function get_title() {
		return __( 'Contact Bottom Row', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'eagle-bim-contact' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'map_section',
			[
				'label' => __( 'Map Settings', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'map_url',
			[
				'label'   => __( 'Google Maps Embed URL', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3437.8!2d-97.613!3d30.433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDI1JzU0LjgiTiA5N8KwMzYnNDYuOCJX!5e0!3m2!1sen!2sus!4v1700000000',
			]
		);

		$this->add_control(
			'map_address',
			[
				'label'   => __( 'Map Address Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Eagle BIM (BIMPRO LLC) · 16805 Guido Cv, Pflugerville, TX 78660 · Serving 22 US States',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'process_section',
			[
				'label' => __( 'Process Panel Settings', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'panel_eyebrow',
			[
				'label'   => __( 'Panel Eyebrow', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'How It Works', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'panel_title',
			[
				'label'   => __( 'Panel Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Sample First.<br>Commitment Never Before.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'panel_desc',
			[
				'label'   => __( 'Panel Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM\'s onboarding is built around one principle: see the quality before you decide.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'process_steps',
			[
				'label'   => __( 'Process Steps', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'title',
						'label'   => __( 'Step Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Share Your Drawings',
					],
					[
						'name'    => 'desc',
						'label'   => __( 'Step Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'Send PDFs, DWGs, or RVT files — any format accepted via the form or email.',
					],
				],
				'default' => [
					[
						'title' => 'Share Your Drawings',
						'desc'  => 'Send PDFs, DWGs, or RVT files — any format accepted via the form or email.',
					],
					[
						'title' => '48-Hour Sample Model',
						'desc'  => 'We return a working Revit BIM model within 48 hours. No charge, no contract.',
					],
					[
						'title' => 'Review the Quality',
						'desc'  => 'Check the LOD, the template, the coordination — in the actual Revit file.',
					],
					[
						'title' => 'Proceed on Your Terms',
						'desc'  => 'If it meets your standard, we align on scope and timeline. If not — no obligation.',
					],
				],
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Email Your Scope Directly →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_url',
			[
				'label'   => __( 'CTA URL', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'mailto:info@bim-services.us',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings    = $this->get_settings_for_display();
		$panel_title = preg_replace( '/<\/?p>/', '', $settings['panel_title'] );
		?>
		<div class="eb-contact-bottom-row reveal">
			<div class="eb-contact-map-wrap">
				<div class="eb-contact-map-label">Our Location</div>
				<div class="eb-contact-map-frame">
					<iframe src="<?php echo esc_url( $settings['map_url'] ); ?>" allowfullscreen="" loading="lazy"></iframe>
				</div>
				<div class="eb-contact-map-addr">
					<svg width="15" height="15" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
					<?php echo esc_html( $settings['map_address'] ); ?>
				</div>
			</div>

			<div class="eb-contact-process-panel">
				<div class="eb-contact-process-panel-inner">
					<div class="eb-contact-process-panel-eyebrow"><?php echo esc_html( $settings['panel_eyebrow'] ); ?></div>
					<h3 class="eb-contact-process-panel-title"><?php echo wp_kses_post( $panel_title ); ?></h3>
					<div class="eb-contact-process-panel-desc"><?php echo wp_kses_post( $settings['panel_desc'] ); ?></div>
					<ul class="eb-contact-process-steps-list">
						<?php foreach ( $settings['process_steps'] as $index => $item ) : ?>
							<li class="eb-contact-ps-item">
								<div class="eb-contact-ps-num"><?php echo $index + 1; ?></div>
								<div>
									<div class="eb-contact-ps-title"><?php echo esc_html( $item['title'] ); ?></div>
									<div class="eb-contact-ps-desc"><?php echo esc_html( $item['desc'] ); ?></div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="<?php echo esc_url( $settings['cta_url']['url'] ); ?>" class="eb-contact-ps-cta">
						<?php echo esc_html( $settings['cta_text'] ); ?>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}
