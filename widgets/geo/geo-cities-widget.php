<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Eagle_BIM_Geo_Cities_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-geo-cities';
	}

	public function get_title() {
		return __( 'Geo City Grid', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-grid-children';
	}

	public function get_categories() {
		return [ 'eagle-bim-services' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_header',
			[
				'label' => __( 'Section Header', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Texas Cities', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'BIM Services Across <em>Every Major Texas City</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM delivers BIM services to AEC firms across all five major Texas metros — each with its own construction market, project types, and BIM demands.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cities',
			[
				'label' => __( 'Cities Grid', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'cities_list',
			[
				'label'   => __( 'Cities List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'is_featured',
						'label'   => __( 'Featured?', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no',
					],
					[
						'name'    => 'city_tag',
						'label'   => __( 'City Tag', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Energy · Healthcare · Industrial',
					],
					[
						'name'    => 'city_name',
						'label'   => __( 'City Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Houston',
					],
					[
						'name'    => 'city_desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'America\'s 4th largest city and one of the most active construction markets in the US.',
					],
					[
						'name'        => 'city_url',
						'label'       => __( 'Link URL', 'eagle-bim-widgets' ),
						'type'        => \Elementor\Controls_Manager::URL,
						'placeholder' => 'https://your-link.com',
					],
					[
						'name'    => 'city_link_text',
						'label'   => __( 'Link Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'View City Page',
					],
				],
				'default' => [
					[
						'is_featured'    => 'yes',
						'city_tag'       => 'Energy · Healthcare · Industrial',
						'city_name'      => 'Houston',
						'city_desc'      => 'America\'s 4th largest city and one of the most active construction markets in the US — energy, healthcare, industrial, commercial, and residential projects across Harris, Fort Bend, and Montgomery Counties.',
						'city_url'       => [
							'url'         => '#',
							'is_external' => false,
							'nofollow'    => false,
						],
						'city_link_text' => 'View Houston Page',
					],
					[
						'is_featured'    => 'no',
						'city_tag'       => 'Commercial · Corporate · Mixed-Use',
						'city_name'      => 'Dallas',
						'city_desc'      => 'One of the fastest-growing commercial markets in the US — office towers, mixed-use developments, data centres, logistics facilities, and a major residential pipeline across the Dallas-Fort Worth Metroplex.',
						'city_url'       => [
							'url'         => '#',
							'is_external' => false,
							'nofollow'    => false,
						],
						'city_link_text' => 'View Dallas Page',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$heading  = preg_replace( '/<\/?p>/', '', $settings['heading'] );
		?>
		<section class="eb-geo-cities-section">
			<div class="eb-geo-container">
				<div class="reveal">
					<div class="geo-cities-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="geo-cities-title"><?php echo wp_kses_post( $heading ); ?></h2>
					<div class="geo-cities-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-geo-cities-grid reveal">
					<?php
					foreach ( $settings['cities_list'] as $city ) :
						$featured_class = ( 'yes' === $city['is_featured'] ) ? ' featured' : '';
						$url            = $city['city_url']['url'];
						?>
						<a href="<?php echo esc_url( $url ); ?>" class="eb-geo-city-card<?php echo esc_html( $featured_class ); ?>">
							<div class="eb-geo-city-tag"><?php echo esc_html( $city['city_tag'] ); ?></div>
							<div class="eb-geo-city-name"><?php echo esc_html( $city['city_name'] ); ?></div>
							<div class="eb-geo-city-desc"><?php echo esc_html( $city['city_desc'] ); ?></div>
							<span class="eb-geo-city-lnk"><?php echo esc_html( $city['city_link_text'] ); ?> <span>→</span></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
