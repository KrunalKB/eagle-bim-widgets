<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Contact_Info_Strip_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'contact-info-strip';
	}

	public function get_title() {
		return __( 'Contact Info Strip', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-contact-info';
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
			'info_cards',
			[
				'label'   => __( 'Contact Cards', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name' => 'label',
						'label' => __( 'Card Label', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Phone',
					],
					[
						'name' => 'value',
						'label' => __( 'Card Value', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '+1 (346) 588-2960',
					],
					[
						'name' => 'subtext',
						'label' => __( 'Card Subtext', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'Mon–Fri, 8:00am–5:00pm CT',
					],
					[
						'name' => 'icon',
						'label' => __( 'SVG Icon', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => '<svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 12 19.79 19.79 0 011.17 3.38 2 2 0 013.12 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121 16.92z"/></svg>',
					],
					[
						'name' => 'is_link',
						'label' => __( 'Is Link?', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'yes',
					],
					[
						'name' => 'link_url',
						'label' => __( 'Link URL', 'eagle-bim-widgets' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => [
							'url' => 'tel:+13465882960',
						],
					],
				],
				'default' => [
					[
						'label' => 'Phone',
						'value' => '+1 (346) 588-2960',
						'subtext' => 'Mon–Fri, 8:00am–5:00pm CT',
						'icon' => '<svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 12 19.79 19.79 0 011.17 3.38 2 2 0 013.12 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121 16.92z"/></svg>',
						'is_link' => 'yes',
						'link_url' => ['url' => 'tel:+13465882960'],
					],
					[
						'label' => 'Email',
						'value' => 'info@bim-services.us',
						'subtext' => 'Response within 1 business day',
						'icon' => '<svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
						'is_link' => 'yes',
						'link_url' => ['url' => 'mailto:info@bim-services.us'],
					],
					[
						'label' => 'Office',
						'value' => '16805 Guido Cv',
						'subtext' => 'Pflugerville, TX 78660, USA',
						'icon' => '<svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>',
						'is_link' => 'no',
					],
					[
						'label' => 'Hours',
						'value' => 'Mon – Fri',
						'subtext' => '8:00am – 5:00pm Central Time',
						'icon' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
						'is_link' => 'no',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-contact-info-strip reveal">
			<?php foreach ( $settings['info_cards'] as $item ) : ?>
				<div class="eb-contact-info-card">
					<div class="eb-contact-info-card-icon"><?php echo $item['icon']; ?></div>
					<div>
						<div class="eb-contact-info-card-label"><?php echo esc_html( $item['label'] ); ?></div>
						<?php if ( $item['is_link'] === 'yes' ) : ?>
							<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" class="eb-contact-info-card-value"><?php echo esc_html( $item['value'] ); ?></a>
						<?php else : ?>
							<span class="eb-contact-info-card-value"><?php echo esc_html( $item['value'] ); ?></span>
						<?php endif; ?>
						<div class="eb-contact-info-card-sub"><?php echo esc_html( $item['subtext'] ); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
