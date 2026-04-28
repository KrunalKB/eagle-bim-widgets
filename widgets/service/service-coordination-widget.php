<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Service_Coordination_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-coordination';
	}

	public function get_title() {
		return esc_html__( 'Service Coordination', 'eagle-bim' );
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
				'default' => esc_html__( 'Interdisciplinary Coordination', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => esc_html__( 'Section Title', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Architectural Coordination with <em style="color:var(--eb-gold-lt)">MEP and Structural</em> Disciplines', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'section_description',
			[
				'label'   => esc_html__( 'Introduction Text', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Interdisciplinary coordination is where architectural projects are won or lost. Unresolved clashes between architectural, structural, and MEP models do not disappear — they surface as change orders, delays, and cost overruns on site. Eagle BIM manages the coordination process proactively as part of our architectural BIM services, starting at the model stage and not stopping until every issue is cleared.<br><br>We use Navisworks and Revizto for federated model reviews, resolving issues before they leave the model environment. Every coordination cycle produces a clear report with 3D issue snapshots that give all project stakeholders a precise, actionable picture of what needs to be resolved.', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => esc_html__( 'CTA Text', 'eagle-bim' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Start a Coordination Project', 'eagle-bim' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label'       => esc_html__( 'CTA Link', 'eagle-bim' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://...', 'eagle-bim' ),
				'default'     => [
					'url' => 'mailto:info@eaglebim.com',
				],
			]
		);

		$this->add_control(
			'points_repeater',
			[
				'label'       => esc_html__( 'Coordination Points', 'eagle-bim' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => [
					[
						'name'        => 'point_icon',
						'label'       => esc_html__( 'Icon (SVG Code)', 'eagle-bim' ),
						'type'        => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'Paste the SVG code here', 'eagle-bim' ),
					],
					[
						'name'    => 'point_title',
						'label'   => esc_html__( 'Title', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Coordination Point Title', 'eagle-bim' ),
					],
					[
						'name'    => 'point_text',
						'label'   => esc_html__( 'Description', 'eagle-bim' ),
						'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Describe the coordination point here.', 'eagle-bim' ),
					],
				],
				'title_field' => '{{{ point_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings            = $this->get_settings_for_display();
		$points              = ! empty( $settings['points_repeater'] ) ? $settings['points_repeater'] : [];
		$section_title       = ! empty( $settings['section_title'] ) ? preg_replace( '/<\/?p>/', '', $settings['section_title'] ) : '';
		$section_description = ! empty( $settings['section_description'] ) ? $settings['section_description'] : '';

		$cta_link   = $settings['cta_link'];
		$cta_url    = ! empty( $cta_link['url'] ) ? $cta_link['url'] : '#';
		$cta_target = ! empty( $cta_link['is_external'] ) ? '_blank' : '_self';

		?>
		<section class="service-coordination">
			<div class="service-coord-layout">
				<div class="service-coord-left">
					<div class="service-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="service-coord-title"><?php echo wp_kses_post( $section_title ); ?></h2>
					<div class="service-coord-content">
						<?php echo wp_kses_post( $section_description ); ?>
					</div>
					<div class="service-coord-cta">
						<a href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>" class="eb-btn-gold">
							<?php echo esc_html( $settings['cta_text'] ); ?> <span class="btn-arrow">→</span>
						</a>
					</div>
				</div>

				<div class="service-coord-right">
					<div class="service-coord-points">
						<?php if ( ! empty( $points ) ) : ?>
							<?php foreach ( $points as $item ) : ?>
								<div class="service-coord-point">
									<div class="service-coord-icon">
										<?php echo $item['point_icon']; ?>
									</div>
									<div>
										<div class="service-coord-pt-title"><?php echo esc_html( $item['point_title'] ); ?></div>
										<div class="service-coord-pt-text"><?php echo wp_kses_post( $item['point_text'] ); ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
