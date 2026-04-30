<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Discipline_Detail_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-discipline-detail';
	}

	public function get_title() {
		return __( 'Service Discipline Detail', 'eagle-bim-widgets' );
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
				'default' => __( 'Mechanical Electrical Plumbing BIM', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'What Our <em>MEP BIM Modeling</em> Covers in Each Discipline', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Our Revit MEP modeling team covers every system in every discipline — modeled to LOD, parametric schedules included, and ready for clash detection on delivery.', 'eagle-bim-widgets' ),
			]
		);

		// Column 1
		$this->add_control(
			'col1_label',
			[
				'label'   => __( 'Column 1 Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Mechanical',
			]
		);
		$this->add_control(
			'col1_title',
			[
				'label'   => __( 'Column 1 Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'HVAC Systems',
			]
		);
		$this->add_control(
			'col1_content',
			[
				'label'   => __( 'Column 1 List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<ul>
					<li>Supply and return ductwork systems</li>
					<li>Exhaust and fresh air risers</li>
					<li>Air handling units and FCUs</li>
					<li>VAV boxes and terminal units</li>
					<li>Diffusers and grilles</li>
					<li>Smoke control and pressurisation</li>
					<li>Mechanical equipment rooms</li>
					<li>Chiller and boiler plant piping</li>
					<li>Hydronic heating and cooling</li>
					<li>Refrigerant pipework</li>
				</ul>',
			]
		);

		// Column 2
		$this->add_control(
			'col2_label',
			[
				'label'   => __( 'Column 2 Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Electrical & Plumbing',
			]
		);
		$this->add_control(
			'col2_title',
			[
				'label'   => __( 'Column 2 Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Power, Lighting and Water',
			]
		);
		$this->add_control(
			'col2_content',
			[
				'label'   => __( 'Column 2 List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<ul>
					<li>HV and LV conduit routing</li>
					<li>Cable trays and busbar trunking</li>
					<li>Distribution boards and switchgear</li>
					<li>Emergency and exit lighting</li>
					<li>UPS and standby systems</li>
					<li>Domestic hot and cold water</li>
					<li>Waste, vent, and drainage</li>
					<li>Rainwater and grey water</li>
					<li>Gas pipework and meters</li>
					<li>Valve schedules and fixture counts</li>
				</ul>',
			]
		);

		// Column 3
		$this->add_control(
			'col3_label',
			[
				'label'   => __( 'Column 3 Label', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Fire Protection',
			]
		);
		$this->add_control(
			'col3_title',
			[
				'label'   => __( 'Column 3 Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Suppression and Life Safety',
			]
		);
		$this->add_control(
			'col3_content',
			[
				'label'   => __( 'Column 3 List', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<ul>
					<li>Wet and dry sprinkler systems</li>
					<li>Deluge and pre-action systems</li>
					<li>Sprinkler head placement and coverage</li>
					<li>Main and branch pipe runs</li>
					<li>Fire main and hydrant connections</li>
					<li>Alarm valve stations</li>
					<li>Clean agent suppression</li>
					<li>Fire pump rooms and risers</li>
					<li>NFPA 13 compliance verification</li>
					<li>RCP coordination and clearances</li>
				</ul>',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-disc-bg">
			<div class="reveal" style="max-width:700px">
				<div class="section-tag">
					<span style="display:inline-block;width:22px;height:2px;background:var(--eb-gold);border-radius:2px;margin-right:8px;vertical-align:middle"></span>
					<?php echo esc_html( $settings['section_tag'] ); ?>
				</div>
				<h2 class="eb-disc-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
				<p class="eb-disc-desc"><?php echo wp_kses_post( $settings['description'] ); ?></p>
			</div>
			<div class="eb-disc-cols reveal">
				<?php
				for ( $i = 1; $i <= 3; $i++ ) :
					$label   = $settings[ "col{$i}_label" ];
					$title   = $settings[ "col{$i}_title" ];
					$content = $settings[ "col{$i}_content" ];
					// Inject the CSS class into the UL generated by WYSIWYG
					$styled_content = str_replace( '<ul', '<ul class="eb-disc-col-list"', $content );
					?>
					<div class="eb-disc-col">
						<div class="eb-disc-col-label"><?php echo esc_html( $label ); ?></div>
						<div class="eb-disc-col-title"><?php echo esc_html( $title ); ?></div>
						<?php echo wp_kses_post( $styled_content ); ?>
					</div>
				<?php endfor; ?>
			</div>
		</section>
		<?php
	}
}
