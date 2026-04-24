<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Geo_Coverage_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-geo-coverage';
	}

	public function get_title() {
		return __( 'Eagle BIM Geo Coverage', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-globe';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Header Section
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Service Area', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Services Across <em>the United States</em>',
			]
		);

		$this->add_control(
			'section_intro',
			[
				'label'   => __( 'Section Intro', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'We deliver BIM modeling and coordination services nationwide, with deep project experience in Texas and major metros across the USA. Remote collaboration, local code knowledge, and your time zone — wherever you build.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Primary Region Section
		$this->start_controls_section(
			'primary_region_section',
			[
				'label' => __( 'Primary Region', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'primary_label',
			[
				'label'   => __( 'Region Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Primary Region · Featured Service Area', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'primary_title',
			[
				'label'   => __( 'Region Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'BIM Services in Texas', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'primary_desc',
			[
				'label'   => __( 'Region Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Based in Pflugerville, TX — Eagle BIM serves the Texas market with unmatched depth. Houston, Dallas, Austin, San Antonio, Fort Worth, El Paso, and across the state. We understand Texas building codes, permitting workflows, and the fast-paced commercial and industrial construction environment that drives the state\'s AEC market.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// States Grid Section
		$this->start_controls_section(
			'states_section',
			[
				'label' => __( 'States Coverage', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'states',
			[
				'label'   => __( 'States', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'state_name',
						'label'   => __( 'State Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'California', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'state_link',
						'label'   => __( 'State Link', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'default' => [ 'url' => '#' ],
					],
					[
						'name'    => 'state_cities',
						'label'   => __( 'Major Cities', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'description' => __( 'Enter one city per line in the format: City Name|URL (e.g., Los Angeles|https://example.com/la)', 'eagle-bim-widgets' ),
						'default' => __( "Los Angeles|#\nSan Francisco|#\nSan Diego|#\nSacramento|#\nOakland|#", 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'state_name'   => 'California',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Los Angeles|#\nSan Francisco|#\nSan Diego|#\nSacramento|#\nOakland|#",
					],
					[
						'state_name'   => 'New York',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "New York City|#\nBuffalo|#\nAlbany|#\nRochester|#",
					],
					[
						'state_name'   => 'Florida',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Miami|#\nOrlando|#\nTampa|#\nJacksonville|#\nFort Lauderdale|#",
					],
					[
						'state_name'   => 'Illinois',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Chicago|#\nSpringfield|#\nAurora|#\nNaperville|#",
					],
					[
						'state_name'   => 'Washington',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Seattle|#\nSpokane|#\nTacoma|#\nBellevue|#",
					],
					[
						'state_name'   => 'Massachusetts',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Boston|#\nCambridge|#\nWorcester|#\nSpringfield|#",
					],
					[
						'state_name'   => 'Colorado',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Denver|#\nColorado Springs|#\nBoulder|#\nAurora|#",
					],
					[
						'state_name'   => 'Georgia & More',
						'state_link'   => [ 'url' => '#' ],
						'state_cities' => "Atlanta|#\nCharlotte|#\nNashville|#\nPhoenix|#\nLas Vegas|#",
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
		<div class="eb-geo-widget">
			<div class="eb-geo-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-geo-title"><?php echo $section_title; ?></h2>
				<p class="eb-geo-intro"><?php echo esc_html( $settings['section_intro'] ); ?></p>
			</div>

			<div class="eb-geo-primary">
				<div>
					<div class="eb-geo-primary-label"><?php echo esc_html( $settings['primary_label'] ); ?></div>
					<div class="eb-geo-primary-title"><?php echo esc_html( $settings['primary_title'] ); ?></div>
					<div class="eb-geo-primary-desc"><?php echo esc_html( $settings['primary_desc'] ); ?></div>
				</div>
			</div>

			<div class="eb-geo-grid">
				<?php if ( ! empty( $settings['states'] ) ) : ?>
					<?php foreach ( $settings['states'] as $state ) : ?>
						<div class="eb-geo-state">
							<a href="<?php echo esc_url( $state['state_link']['url'] ); ?>" class="eb-geo-state-name">
								<?php echo esc_html( $state['state_name'] ); ?>
							</a>
							<div class="eb-geo-cities">
								<?php 
								$cities_raw = $state['state_cities'];
								$cities_array = explode( "\n", $cities_raw );
								$links = [];
								foreach ( $cities_array as $city_line ) {
									$city_line = trim( $city_line );
									if ( empty( $city_line ) ) continue;
									$parts = explode( '|', $city_line );
									$city_name = $parts[0];
									$city_url  = isset( $parts[1] ) ? $parts[1] : '#';
									$links[] = '<a href="' . esc_url( $city_url ) . '">' . esc_html( $city_name ) . '</a>';
								}
								echo implode( ' · ', $links );
								?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
