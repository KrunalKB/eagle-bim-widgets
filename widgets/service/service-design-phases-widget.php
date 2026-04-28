<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Service_Design_Phases_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-design-phases';
	}

	public function get_title() {
		return esc_html__( 'Service Design Phases', 'eagle-bim' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'eagle-bim' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'eagle-bim' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => esc_html__( 'Section Tag', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Design Phase Support', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => esc_html__( 'Section Title', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Supporting Every Phase From <em>SD Through CD</em>', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => esc_html__( 'Section Description', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Eagle BIM scales to match your project phase. Whether you need early massing studies or a full construction document set, our architectural BIM services maintain model quality and project momentum at every milestone — so you never have to slow down for documentation.', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'phases_repeater',
			[
				'label'       => esc_html__( 'Design Phases', 'eagle-bim' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'    => 'ph_num',
						'label'   => esc_html__( 'Phase Number', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '01',
					],
					[
						'name'    => 'ph_label',
						'label'   => esc_html__( 'Phase Label', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'SD Phase', 'eagle-bim' ),
					],
					[
						'name'    => 'ph_title',
						'label'   => esc_html__( 'Phase Title', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Schematic Design', 'eagle-bim' ),
					],
					[
						'name'    => 'ph_text',
						'label'   => esc_html__( 'Phase Description', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Massing studies, concept layouts, and preliminary plans that establish project scope and design direction for stakeholder review and early approvals.', 'eagle-bim' ),
					],
					[
						'name'        => 'ph_items',
						'label'       => esc_html__( 'Phase Items', 'eagle-bim' ),
						'type'        => \Elementor\Controls_Manager::REPEATER,
						'fields'      => [
							[
								'name'    => 'item_text',
								'label'   => esc_html__( 'Item Text', 'eagle-bim' ),
								'type'    => \Elementor\Controls_Manager::TEXT,
								'default' => esc_html__( 'Massing and site study models', 'eagle-bim' ),
							],
						],
						'title_field' => '{{{ item_text }}}',
					],
				],
				'title_field' => '{{{ ph_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$phases        = ! empty( $settings['phases_repeater'] ) ? $settings['phases_repeater'] : [];
		$section_title = ! empty( $settings['section_title'] ) ? preg_replace( '/<\/?p>/', '', $settings['section_title'] ) : '';
		$section_desc  = ! empty( $settings['section_desc'] ) ? $settings['section_desc'] : '';
		?>
		<section class="service-design-phases">
			<div class="service-phases-header">
				<div class="service-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="service-phases-title"><?php echo wp_kses_post( $section_title ); ?></h2>
				<div class="service-phases-desc"><?php echo wp_kses_post( $section_desc ); ?></div>
			</div>

			<div class="service-phases-grid">
				<?php if ( ! empty( $phases ) ) : ?>
					<?php foreach ( $phases as $phase ) : ?>
						<div class="service-ph-card">
							<div class="service-ph-num"><?php echo esc_html( $phase['ph_num'] ); ?></div>
							<div class="service-ph-label"><?php echo esc_html( $phase['ph_label'] ); ?></div>
							<div class="service-ph-title"><?php echo esc_html( $phase['ph_title'] ); ?></div>
							<div class="service-ph-text"><?php echo wp_kses_post( $phase['ph_text'] ); ?></div>

							<?php if ( ! empty( $phase['ph_items'] ) ) : ?>
								<div class="service-ph-items">
									<?php foreach ( $phase['ph_items'] as $item ) : ?>
										<div class="service-ph-item">
											<div class="service-ph-dot"></div>
											<div><?php echo esc_html( $item['item_text'] ); ?></div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}
