<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Produce_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-produce';
	}

	public function get_title() {
		return __( 'Service What We Produce', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-table';
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
				'default' => __( 'Revit Drawing Services', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'What Our <em>Revit Documentation Services</em> Produce', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'body_text',
			[
				'label'   => __( 'Body Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<p>Our <strong>Revit drafting services</strong> team produces every drawing type your project requires — all extracted directly from the model, annotated with your project standards, and formatted to your title block. As a dedicated <strong>Revit drafting company</strong>, we do not freelance a different drafter to every project — the same experienced team handles your documentation from first drawing to final issue.</p><p>Every drawing we produce follows your <strong>Revit documentation services</strong> requirements precisely — your view template names, your keynote files, your annotation families, your sheet naming conventions. We work inside your Revit project files, not in a separate environment that requires translation or reformatting on delivery.</p>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Discuss Your Drawing Scope', 'eagle-bim-widgets' ),
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

		$this->add_control(
			'produce_items',
			[
				'label'   => __( 'Produced Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'  => 'name',
						'label' => __( 'Drawing Name', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'Floor Plans — All Levels',
					],
					[
						'name'  => 'format',
						'label' => __( 'Format', 'eagle-bim-widgets' ),
						'type'  => \Elementor\Controls_Manager::TEXT,
						'default' => 'RVT / PDF',
					],
				],
				'default' => [
					[ 'name' => 'Floor Plans — All Levels', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Reflected Ceiling Plans', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Building Elevations', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Wall Sections and Details', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Stair and Lift Sections', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Structural Framing Plans', 'format' => 'RVT / PDF' ],
					[ 'name' => 'MEP Plan Sets', 'format' => 'RVT / PDF' ],
					[ 'name' => 'Room and Finish Schedules', 'format' => 'RVT / XLSX' ],
					[ 'name' => 'Door and Window Schedules', 'format' => 'RVT / XLSX' ],
					[ 'name' => 'Full Issued Sheet Sets', 'format' => 'PDF / DWG' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-produce-section">
			<div class="eb-produce-layout">
				<div class="reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-produce-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-produce-body"><?php echo wp_kses_post( $settings['body_text'] ); ?></div>
					<div class="eb-produce-cta-wrapper">
						<?php
						$cta_url_attributes = [];
						if ( ! empty( $settings['cta_link']['url'] ) ) {
							$cta_url_attributes = \Elementor\Utils::get_link_attributes( $settings['cta_link'] );
						}
						?>
						<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" <?php echo $cta_url_attributes['attributes']; ?> class="btn-blue">
							<?php echo esc_html( $settings['cta_text'] ); ?> <span class="btn-arrow">→</span>
						</a>
					</div>
				</div>

				<div class="reveal">
					<div class="eb-produce-table">
						<div class="eb-produce-row-hdr">
							<span class="eb-produce-hdr-text"><?php _e( 'Drawing / Deliverable', 'eagle-bim-widgets' ); ?></span>
							<span class="eb-produce-hdr-text"><?php _e( 'Format', 'eagle-bim-widgets' ); ?></span>
						</div>
						<?php foreach ( $settings['produce_items'] as $item ) : ?>
							<div class="eb-produce-row">
								<span class="eb-produce-name"><?php echo esc_html( $item['name'] ); ?></span>
								<span class="eb-produce-fmt"><?php echo esc_html( $item['format'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
