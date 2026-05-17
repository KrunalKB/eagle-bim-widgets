<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Eagle_BIM_Geo_Stats_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-geo-stats';
	}

	public function get_title() {
		return __( 'Geo Stats Strip', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-grid-children';
	}

	public function get_categories() {
		return [ 'eagle-bim-services' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_stats',
			[
				'label' => __( 'Stats List', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'stats_list',
			[
				'label'   => __( 'Stats List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'stat_num',
						'label'   => __( 'Number/Value', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '180',
					],
					[
						'name'    => 'stat_sfx',
						'label'   => __( 'Suffix (e.g. B+, hr, %)', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'B+',
					],
					[
						'name'    => 'stat_lbl',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Annual TX Construction',
					],
				],
				'default' => [
					[
						'stat_num' => '180',
						'stat_sfx' => 'B+',
						'stat_lbl' => 'Annual TX Construction',
					],
					[
						'stat_num' => '5',
						'stat_sfx' => '',
						'stat_lbl' => 'Major Cities Served',
					],
					[
						'stat_num' => '#1',
						'stat_sfx' => '',
						'stat_lbl' => 'State for Construction Jobs',
					],
					[
						'stat_num' => 'TX',
						'stat_sfx' => '',
						'stat_lbl' => 'Eagle BIM HQ State',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="eb-geo-stats-strip">
			<?php foreach ( $settings['stats_list'] as $stat ) : ?>
				<div class="eb-geo-stat-item reveal">
					<span class="eb-geo-stat-num">
						<?php echo esc_html( $stat['stat_num'] ); ?>
						<?php if ( ! empty( $stat['stat_sfx'] ) ) : ?>
							<span class="eb-geo-stat-sfx"><?php echo esc_html( $stat['stat_sfx'] ); ?></span>
						<?php endif; ?>
					</span>
					<div class="eb-geo-stat-lbl"><?php echo esc_html( $stat['stat_lbl'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
