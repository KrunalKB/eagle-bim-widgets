<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Eagle_BIM_Geo_Project_Types_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-geo-project-types';
	}

	public function get_title() {
		return __( 'Geo Project Types', 'eagle-bim-widgets' );
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
				'default' => __( 'Project Types', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'The Projects We <em>Work On</em> in Austin', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'From UT expansion buildings to tech corporate campuses and the multifamily boom along the 183 and 35 corridors — Eagle BIM delivers across every major Austin project type.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_projects',
			[
				'label' => __( 'Project Types Grid', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'projects_list',
			[
				'label'   => __( 'Projects List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'proj_icon',
						'label'   => __( 'Icon SVG', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
					],
					[
						'name'    => 'proj_label',
						'label'   => __( 'Label', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Technology',
					],
					[
						'name'    => 'proj_title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Tech Campuses & Corporate HQ',
					],
					[
						'name'    => 'proj_desc',
						'label'   => __( 'Description', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Corporate campuses, tech office buildings, and R&D facilities for the companies that relocated to Austin and Round Rock — complex MEP coordination and structural BIM for large campus projects.',
					],
					[
						'name'    => 'proj_tags',
						'label'   => __( 'Tags (Comma separated)', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Tech Campus, Corporate HQ, R&D, Round Rock',
					],
				],
				'default' => [
					[
						'proj_icon'  => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="1"/><path d="M3 9h18M9 3v18"/></svg>',
						'proj_label' => 'Technology',
						'proj_title' => 'Tech Campuses & Corporate HQ',
						'proj_desc'  => 'Corporate campuses, tech office buildings, and R&D facilities for the companies that relocated to Austin and Round Rock — complex MEP coordination and structural BIM for large campus projects.',
						'proj_tags'  => 'Tech Campus, Corporate HQ, R&D, Round Rock',
					],
					[
						'proj_icon'  => '<svg viewBox="0 0 24 24"><path d="M2 20h20M4 20V10l8-8 8 8v10M10 20v-6h4v6"/></svg>',
						'proj_label' => 'Residential',
						'proj_title' => 'Multifamily & High-Rise Residential',
						'proj_desc'  => 'Mid-rise and high-rise multifamily, BTR developments, and mixed-income housing across the Downtown Austin core, East Austin, and the North Austin suburban growth corridors of Cedar Park and Georgetown.',
						'proj_tags'  => 'Multifamily, High-Rise, BTR, Mixed-Income',
					],
					[
						'proj_icon'  => '<svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
						'proj_label' => 'Education',
						'proj_title' => 'University & K–12',
						'proj_desc'  => 'University of Texas campus expansions, student housing, research facilities, and K–12 school district projects across Austin ISD, Round Rock ISD, and Pflugerville ISD — structural and MEP BIM.',
						'proj_tags'  => 'University, K-12, Research, Campus',
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
		<section class="eb-geo-proj-section">
			<div class="eb-geo-proj-head reveal">
				<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2><?php echo wp_kses_post( $heading ); ?></h2>
				<div class="sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>
			<div class="eb-geo-proj-grid reveal">
				<?php foreach ( $settings['projects_list'] as $project ) : ?>
					<div class="eb-geo-proj-card">
						<div class="eb-geo-proj-icon"><?php echo $project['proj_icon']; ?></div>
						<div class="eb-geo-proj-label"><?php echo esc_html( $project['proj_label'] ); ?></div>
						<div class="eb-geo-proj-title"><?php echo esc_html( $project['proj_title'] ); ?></div>
						<div class="eb-geo-proj-desc"><?php echo esc_html( $project['proj_desc'] ); ?></div>
						<div class="eb-geo-proj-tags">
							<?php
							$tags = explode( ',', $project['proj_tags'] );
							foreach ( $tags as $tag ) :
								?>
								<span class="eb-geo-proj-tag"><?php echo esc_html( trim( $tag ) ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
	}
}
