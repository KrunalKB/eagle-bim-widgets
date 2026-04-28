<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Detailing_Scope_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-detailing-scope';
	}

	public function get_title() {
		return __( 'Service Detailing Scope', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => __( 'Architectural Detailing', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Specialty Components and <em>Large-Scale Detailing</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Short Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Complex design elements demand precision. Our architectural BIM services include detailing for every component that requires large-scale documentation and submittal-ready preparation — from curtain wall assemblies to custom millwork.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'detailing_items',
			[
				'label'   => __( 'Detailing Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'item_text',
						'label'   => __( 'Item Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Facade and curtain wall systems', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[ 'item_text' => __( 'Facade and curtain wall systems', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Storefront and glazing assemblies', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Partition and wall assembly details', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Ceiling assembly systems', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Millwork, casework, and custom fixtures', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Waterproofing and flashing details', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Stair and railing construction details', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Custom Revit family creation', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Submittal package preparation', 'eagle-bim-widgets' ) ],
					[ 'item_text' => __( 'Material and product specifications', 'eagle-bim-widgets' ) ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-detail-section">
			<div class="eb-detail-layout">
				<div class="eb-detail-left reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-detail-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-detail-sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-detail-right reveal">
					<div class="eb-detail-list">
						<?php foreach ( $settings['detailing_items'] as $item ) : ?>
							<div class="eb-detail-item">
								<div class="eb-detail-dot"></div>
								<div class="eb-detail-item-txt"><?php echo esc_html( $item['item_text'] ); ?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
