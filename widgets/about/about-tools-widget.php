<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class About_Tools_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'about-tools';
	}

	public function get_title() {
		return __( 'About: Tools', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-device';
	}

	public function get_categories() {
		return [ 'eagle-bim-about' ];
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
			'eyebrow',
			[
				'label'   => __( 'Eyebrow', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Technology Stack', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'BIM Software & Platforms We Master', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Eagle BIM operates on the same licensed industry platforms your team uses — ensuring zero compatibility friction.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'tools',
			[
				'label'   => __( 'Tools', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'logo',
						'label'   => __( 'Tool Logo', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name'    => 'name',
						'label'   => __( 'Tool Name', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Autodesk Revit',
					],
					[
						'name'    => 'type',
						'label'   => __( 'Tool Type', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'BIM Authoring',
					],
				],
				'default' => [
					[
						'logo' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'name' => 'Autodesk Revit',
						'type' => 'BIM Authoring',
					],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$title    = preg_replace( '/<\/?p>/', '', $settings['title'] );
		?>
		<div class="eb-about-tools-section">
			<div class="eb-about-tools-header reveal">
				<div class="eb-about-tool-tag center"><?php echo esc_html( $settings['eyebrow'] ); ?></div>
				<h2><?php echo wp_kses_post( $title ); ?></h2>
				<div><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>
			<div class="eb-about-tools-grid reveal">
				<?php foreach ( $settings['tools'] as $tool ) : ?>
					<div class="eb-about-tool-card">
						<div class="eb-about-tool-logo-wrap">
							<?php if ( ! empty( $tool['logo']['url'] ) ) : ?>
								<img src="<?php echo esc_url( $tool['logo']['url'] ); ?>" alt="<?php echo esc_attr( $tool['name'] ); ?>">
							<?php endif; ?>
						</div>
						<div class="eb-about-tool-name"><?php echo esc_html( $tool['name'] ); ?></div>
						<div class="eb-about-tool-type"><?php echo esc_html( $tool['type'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}
