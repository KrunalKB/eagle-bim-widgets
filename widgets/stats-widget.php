<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Stats_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-stats';
	}

	public function get_title() {
		return __( 'Eagle BIM Stats Bar', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-comments';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Stats Section
		$this->start_controls_section(
			'stats_section',
			[
				'label' => __( 'Stats Items', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'stats',
			[
				'label'   => __( 'Stats List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'stat_num',
						'label'   => __( 'Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '450',
					],
					[
						'name'    => 'stat_sfx',
						'label'   => __( 'Suffix (%, +, etc)', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '+',
					],
					[
						'name'    => 'stat_lbl',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Projects Coordinated', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'stat_num' => '450',
						'stat_sfx' => '+',
						'stat_lbl' => 'Projects Coordinated',
					],
					[
						'stat_num' => '80',
						'stat_sfx' => '%',
						'stat_lbl' => 'Reduction in Site RFIs',
					],
					[
						'stat_num' => '11',
						'stat_sfx' => '+',
						'stat_lbl' => 'Service Lines',
					],
					[
						'stat_num' => '100',
						'stat_sfx' => '%',
						'stat_lbl' => 'Files in Client Formats',
					],
				],
			]
		);

		$this->end_controls_section();

		// Anchor Section
		$this->start_controls_section(
			'anchor_section',
			[
				'label' => __( 'Anchor Link', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'anchor_text',
			[
				'label'   => __( 'Link Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( '↓ See how we work', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'anchor_link',
			[
				'label'       => __( 'Link URL', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( '#process', 'eagle-bim-widgets' ),
				'default'     => [
					'url' => '#process',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-stats-widget">
			<?php if ( ! empty( $settings['stats'] ) ) : ?>
				<?php foreach ( $settings['stats'] as $item ) : ?>
					<div class="eb-stat-item">
						<span class="eb-stat-num">
							<span class="count-num" data-target="<?php echo esc_attr( $item['stat_num'] ); ?>">0</span>
							<span class="eb-stat-sfx"><?php echo esc_html( $item['stat_sfx'] ); ?></span>
						</span>
						<div class="eb-stat-lbl"><?php echo esc_html( $item['stat_lbl'] ); ?></div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $settings['anchor_link']['url'] ) ) : ?>
			<div class="eb-stats-anchor">
				<a href="<?php echo esc_url( $settings['anchor_link']['url'] ); ?>">
					<?php echo esc_html( $settings['anchor_text'] ); ?>
				</a>
			</div>
		<?php endif; ?>
		<?php
	}
}
