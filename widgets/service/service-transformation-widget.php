<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Transformation_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-transformation';
	}

	public function get_title() {
		return __( 'Service Transformation (Before/After)', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-columns';
	}

	public function get_categories() {
		return [ 'eagle-bim-services' ];
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
				'default' => __( 'The Transformation', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'What Changes When You Move from <em>CAD to BIM</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Our CAD to BIM conversion does not just change the file format. It transforms what your team can do with the data.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'arrow_label',
			[
				'label'   => __( 'Arrow Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( "Eagle BIM\nCAD to BIM", 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'before_col_label',
			[
				'label'   => __( 'Before Column Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Before — 2D CAD', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'before_col_title',
			[
				'label'   => __( 'Before Column Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Working from flat drawings', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'before_items',
			[
				'label'   => __( 'Before Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'text',
						'label' => __( 'Item Text', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
					],
				],
				'default' => [
					[ 'text' => __( 'Static lines with no data or intelligence', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'No automatic schedules or quantity take-offs', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Clashes discovered on site, not on screen', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Manual updates required across every sheet', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Cannot federate with structural or MEP models', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Does not meet owner LOD requirements', 'eagle-bim-widgets' ) ],
				],
			]
		);

		$this->add_control(
			'after_col_label',
			[
				'label'   => __( 'After Column Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'After — 3D Revit BIM', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'after_col_title',
			[
				'label'   => __( 'After Column Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Working from an intelligent model', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'after_items',
			[
				'label'   => __( 'After Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'text',
						'label' => __( 'Item Text', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
					],
				],
				'default' => [
					[ 'text' => __( 'Parametric elements with data, dimensions, and relationships', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Automatic schedules, take-offs, and area calculations', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Clash detection resolved before construction begins', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Model-driven views update automatically', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'Federated with structural and MEP for full coordination', 'eagle-bim-widgets' ) ],
					[ 'text' => __( 'LOD-compliant and BEP-aligned from day one', 'eagle-bim-widgets' ) ],
				],
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Start Your CAD to BIM Conversion', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label'   => __( 'CTA Link', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'eagle-bim-widgets' ),
				'default' => [
					'url' => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-transform-section">
			<div class="eb-transform-header reveal">
				<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-transform-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
				<div class="eb-transform-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>

			<div class="eb-transform-grid reveal">
				<div class="eb-transform-col">
					<div class="eb-transform-col-label bad">● <?php echo esc_html( $settings['before_col_label'] ); ?></div>
					<div class="eb-transform-col-title"><?php echo esc_html( $settings['before_col_title'] ); ?></div>
					<?php foreach ( $settings['before_items'] as $item ) : ?>
						<div class="eb-transform-item">
							<div class="t-dot-bad"></div>
							<span><?php echo esc_html( $item['text'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="eb-transform-arrow">
					<div class="eb-arrow-circle">→</div>
					<div class="eb-arrow-label"><?php echo nl2br( esc_html( $settings['arrow_label'] ) ); ?></div>
				</div>

				<div class="eb-transform-col">
					<div class="eb-transform-col-label good">● <?php echo esc_html( $settings['after_col_label'] ); ?></div>
					<div class="eb-transform-col-title"><?php echo esc_html( $settings['after_col_title'] ); ?></div>
					<?php foreach ( $settings['after_items'] as $item ) : ?>
						<div class="eb-transform-item">
							<div class="t-dot-good"></div>
							<span><?php echo esc_html( $item['text'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="eb-transform-cta reveal">
				<?php
				$cta_url_attributes = [];
				if ( ! empty( $settings['cta_link']['url'] ) ) {
					$cta_url_attributes = \Elementor\Utils::get_link_attributes( $settings['cta_link'] );
				}
				?>
				<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" <?php echo $cta_url_attributes['attributes']; ?> class="btn-gold">
					<?php echo esc_html( $settings['cta_text'] ); ?> <span class="btn-arrow">→</span>
				</a>
			</div>
		</section>
		<?php
	}
}
