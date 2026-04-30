<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Formats_LOD_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-formats-lod';
	}

	public function get_title() {
		return __( 'Service Formats & LOD', 'eagle-bim-widgets' );
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
				'default' => __( 'Input and Output', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'File Formats We <em>Accept and Deliver</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'We accept every source format your project holds and deliver output files your team can use immediately.', 'eagle-bim-widgets' ),
			]
		);

		// Formats Repeater
		$this->add_control(
			'formats_list',
			[
				'label'   => __( 'File Formats', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'input_fmt',
						'label' => __( 'Input Format', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'DWG',
					],
					[
						'name'  => 'output_fmt',
						'label' => __( 'Output Format', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'RVT',
					],
					[
						'name'  => 'description',
						'label' => __( 'Description', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'AutoCAD drawings to Revit architectural, structural, or MEP models',
					],
				],
				'default' => [
					[
						'input_fmt'  => 'DWG',
						'output_fmt' => 'RVT',
						'description' => 'AutoCAD drawings to Revit architectural, structural, or MEP models',
					],
					[
						'input_fmt'  => 'PDF',
						'output_fmt' => 'RVT',
						'description' => 'Vector and scanned PDFs to accurate 3D Revit models',
					],
					[
						'input_fmt'  => 'DXF',
						'output_fmt' => 'RVT',
						'description' => 'DXF exchange files converted and rebuilt in Revit',
					],
					[
						'input_fmt'  => 'TIFF/JPG',
						'output_fmt' => 'RVT',
						'description' => 'Scanned raster drawings modeled in 3D from image reference',
					],
					[
						'input_fmt'  => 'RVT',
						'output_fmt' => 'IFC / DWG',
						'description' => 'Revit output also exported to IFC, DWG, NWC, and PDF on delivery',
					],
				],
			]
		);

		$this->add_control(
			'lod_heading',
			[
				'label'   => __( 'LOD Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'LOD Output for Every Project Stage', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'lod_description',
			[
				'label'   => __( 'LOD Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'LOD level is agreed in your BIM Execution Plan before conversion begins — and we deliver to it without deviation.', 'eagle-bim-widgets' ),
			]
		);

		// LOD Repeater
		$this->add_control(
			'lod_list',
			[
				'label'   => __( 'LOD Levels', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'num',
						'label' => __( 'LOD Number', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'LOD 100',
					],
					[
						'name'  => 'title',
						'label' => __( 'LOD Title', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'Conceptual',
					],
					[
						'name'  => 'text',
						'label' => __( 'LOD Text', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'Overall massing and approximate size. Suitable for feasibility and early design review stages.',
					],
					[
						'name'  => 'border_color',
						'label' => __( 'Border Top Color', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::COLOR,
						'default' => '#8a9db8',
					],
				],
				'default' => [
					[
						'num'          => 'LOD 100',
						'title'        => 'Conceptual',
						'text'         => 'Overall massing and approximate size. Suitable for feasibility and early design review stages.',
						'border_color' => '#8a9db8',
					],
					[
						'num'          => 'LOD 200',
						'title'        => 'Schematic',
						'text'         => 'Approximate geometry with basic properties. Suitable for schematic design and area calculations.',
						'border_color' => '#687d9c',
					],
					[
						'num'          => 'LOD 300',
						'title'        => 'Defined',
						'text'         => 'Accurate geometry and relationships. Standard output for design development and coordination.',
						'border_color' => '#4a6080',
					],
					[
						'num'          => 'LOD 400',
						'title'        => 'Fabrication',
						'text'         => 'Full fabrication-level detail with connections, fixings, and assembly information for construction.',
						'border_color' => '#deaa57',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-fmt-lod-section">
			<div class="eb-fmt-lod-layout">
				<div class="reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-fmt-lod-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-fmt-lod-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>

					<div class="eb-fmt-list">
						<?php foreach ( $settings['formats_list'] as $item ) : ?>
							<div class="eb-fmt-row">
								<span class="eb-fmt-chip"><?php echo esc_html( $item['input_fmt'] ); ?></span>
								<span class="eb-fmt-arrow">→</span>
								<span class="eb-fmt-chip-out"><?php echo esc_html( $item['output_fmt'] ); ?></span>
								<span class="eb-fmt-desc"><?php echo esc_html( $item['description'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="reveal">
					<div class="section-tag"><?php echo __( 'LOD Compliance', 'eagle-bim-widgets' ); ?></div>
					<h2 class="eb-fmt-lod-heading"><?php echo esc_html( $settings['lod_heading'] ); ?></h2>
					<div class="eb-fmt-lod-desc"><?php echo wp_kses_post( $settings['lod_description'] ); ?></div>

					<div class="eb-lod-grid">
						<?php foreach ( $settings['lod_list'] as $item ) : ?>
							<div class="eb-lod-card" style="border-top-color: <?php echo esc_attr( $item['border_color'] ); ?>">
								<div class="eb-lod-num"><?php echo esc_html( $item['num'] ); ?></div>
								<div class="eb-lod-title"><?php echo esc_html( $item['title'] ); ?></div>
								<div class="eb-lod-text"><?php echo esc_html( $item['text'] ); ?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
