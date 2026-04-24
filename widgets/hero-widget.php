<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-hero';
	}

	public function get_title() {
		return __( 'Eagle BIM Hero', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_tag',
			[
				'label'   => __( 'Hero Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Texas-Based · BIM Specialists · USA Nationwide', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label'   => __( 'Hero Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Services in USA |<br><em>Build-Ready Models</em><br>&amp; Coordination',
			]
		);

		$this->add_control(
			'hero_sub',
			[
				'label'   => __( 'Hero Subtitle', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Accurate BIM modeling, coordination, and drafting for contractors, engineers, and owners across Texas and the United States. From architectural Revit models to full MEP coordination — precision at every project phase.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Buttons Section
		$this->start_controls_section(
			'buttons_section',
			[
				'label' => __( 'Buttons', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_gold_text',
			[
				'label'   => __( 'Primary Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Share Your Scope', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'btn_gold_link',
			[
				'label'       => __( 'Primary Button Link', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'btn_blue_text',
			[
				'label'   => __( 'Secondary Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Explore Services', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'btn_blue_link',
			[
				'label'       => __( 'Secondary Button Link', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Badges Section (Repeater)
		$this->start_controls_section(
			'badges_section',
			[
				'label' => __( 'Badges', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'badges',
			[
				'label'   => __( 'Badges List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'badge_text',
						'label'   => __( 'Badge Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Revit', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[ 'badge_text' => 'Revit' ],
					[ 'badge_text' => 'Navisworks' ],
					[ 'badge_text' => 'IFC' ],
					[ 'badge_text' => 'RVT · DWG · NWC' ],
					[ 'badge_text' => 'LOD 100–500' ],
					[ 'badge_text' => 'Clash Detection' ],
				],
			]
		);

		$this->end_controls_section();

		// Visual Section
		$this->start_controls_section(
			'visual_section',
			[
				'label' => __( 'Visual', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'hero_image',
			[
				'label'   => __( 'Hero SVG/Image', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = preg_replace( '/<\/?p>/', '', $settings['hero_title'] );
		?>
		<div class="eb-hero-widget">
			<div class="eb-hero-content">
				<?php if ( ! empty( $settings['hero_tag'] ) ) : ?>
					<div class="eb-hero-tag"><?php echo esc_html( $settings['hero_tag'] ); ?></div>
				<?php endif; ?>

				<h1 class="eb-hero-title"><?php echo $title; ?></h1>

				<?php if ( ! empty( $settings['hero_sub'] ) ) : ?>
					<p class="eb-hero-sub"><?php echo esc_html( $settings['hero_sub'] ); ?></p>
				<?php endif; ?>

				<div class="eb-hero-actions">
					<?php
					if ( ! empty( $settings['btn_gold_text'] ) ) :
						$btn_gold_url = $settings['btn_gold_link']['url'] ?? '#';
						?>
						<a href="<?php echo esc_url( $btn_gold_url ); ?>" class="eb-btn-gold">
							<?php echo esc_html( $settings['btn_gold_text'] ); ?> <span class="eb-btn-arrow">→</span>
						</a>
					<?php endif; ?>

					<?php
					if ( ! empty( $settings['btn_blue_text'] ) ) :
						$btn_blue_url = $settings['btn_blue_link']['url'] ?? '#';
						?>
						<a href="<?php echo esc_url( $btn_blue_url ); ?>" class="eb-btn-blue">
							<?php echo esc_html( $settings['btn_blue_text'] ); ?> <span class="eb-btn-arrow">↓</span>
						</a>
					<?php endif; ?>
				</div>

				<div class="eb-hero-badges">
					<?php if ( ! empty( $settings['badges'] ) ) : ?>
						<?php foreach ( $settings['badges'] as $badge ) : ?>
							<span class="eb-badge"><?php echo esc_html( $badge['badge_text'] ); ?></span>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="eb-hero-visual">
				<?php if ( ! empty( $settings['hero_image']['url'] ) ) : ?>
					<img src="<?php echo esc_url( $settings['hero_image']['url'] ); ?>" class="eb-building-svg" alt="Hero Visual">
				<?php else : ?>
					<!-- Placeholder for the SVG based on the provided HTML -->
					<div style="color: var(--eb-blue); font-style: italic;">Please upload your SVG image</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
