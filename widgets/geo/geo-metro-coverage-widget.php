<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Eagle_BIM_Geo_Metro_Coverage_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-geo-metro-coverage';
	}

	public function get_title() {
		return __( 'Geo Metro Coverage', 'eagle-bim-widgets' );
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
				'default' => __( 'Austin Metro Area', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Covering the Full <em>Austin Metro</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM is based inside the Austin metro in Pflugerville — we serve every corner of the Greater Austin area.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_metro',
			[
				'label' => __( 'Metro Grid', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'metro_list',
			[
				'label'   => __( 'Metro List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'is_hq',
						'label'   => __( 'HQ Location?', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no',
					],
					[
						'name'    => 'county',
						'label'   => __( 'County', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Travis County',
					],
					[
						'name'    => 'city',
						'label'   => __( 'City', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Austin',
					],
					[
						'name'    => 'areas',
						'label'   => __( 'Areas/Notes', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Downtown · East Austin · South Congress · Domain · Mueller · Zilker',
					],
				],
				'default' => [
					[
						'is_hq'  => 'no',
						'county' => 'Travis County',
						'city'   => 'Austin',
						'areas'  => 'Downtown · East Austin · South Congress · Domain · Mueller · Zilker · North Loop · 6th Street corridor',
					],
					[
						'is_hq'  => 'yes',
						'county' => 'Travis County',
						'city'   => 'Pflugerville',
						'areas'  => 'Pflugerville · Dessau · Wells Branch — Eagle BIM\'s home city, in the heart of the Austin metro',
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
		<section class="eb-geo-metro-section">
			<div class="eb-geo-metro-head reveal">
				<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2><?php echo wp_kses_post( $heading ); ?></h2>
				<div class="sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>
			<div class="eb-geo-metro-grid reveal">
				<?php
				foreach ( $settings['metro_list'] as $metro ) :
					$featured_class = ( 'yes' === $metro['is_hq'] ) ? ' featured' : '';
					?>
					<div class="eb-geo-metro-card<?php echo esc_html( $featured_class ); ?>">
						<?php if ( 'yes' === $metro['is_hq'] ) : ?>
							<div class="eb-geo-metro-hq-badge">Eagle BIM HQ</div>
						<?php endif; ?>
						<div class="eb-geo-metro-county"><?php echo esc_html( $metro['county'] ); ?></div>
						<div class="eb-geo-metro-city"><?php echo esc_html( $metro['city'] ); ?></div>
						<div class="eb-geo-metro-areas"><?php echo esc_html( $metro['areas'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
