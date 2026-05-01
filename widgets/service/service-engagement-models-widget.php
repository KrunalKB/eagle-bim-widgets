<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Service_Engagement_Models_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'service-engagement-models';
	}

	public function get_title() {
		return __( 'Service Engagement Models', 'eagle-bim-widgets' );
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
				'default' => __( 'Flexible Engagements', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'heading',
			[
				'label'   => __( 'Heading', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'BIM Consulting <em>Engagement Models</em>', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label'   => __( 'Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Every firm is at a different stage of BIM maturity. Our BIM consulting services are structured to match your goals, timeline, and internal resources — with no padding and no lock-in.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'engagement_cards',
			[
				'label'   => __( 'Engagement Cards', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'number',
						'label'   => __( 'Number', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => '01',
					],
					[
						'name'    => 'title',
						'label'   => __( 'Title', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'BIM Readiness Assessment',
					],
					[
						'name'    => 'text',
						'label'   => __( 'Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => 'A focused diagnostic of your BIM capabilities, workflows, and technology stack. Our BIM consultants deliver a clear report with specific recommendations and a prioritized action plan.',
					],
					[
						'name'    => 'border_color',
						'label'   => __( 'Border Color', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::COLOR,
						'default' => '#deaa57',
					],
				],
				'default' => [
					[
						'number'       => '01',
						'title'        => 'BIM Readiness Assessment',
						'text'         => 'A focused diagnostic of your BIM capabilities, workflows, and technology stack. Our BIM consultants deliver a clear report with specific recommendations and a prioritized action plan.',
						'border_color' => '#deaa57',
					],
					[
						'number'       => '02',
						'title'        => 'Project-Specific BEP',
						'text'         => 'A complete BIM Execution Plan, modeling standards, and template package for a specific project — covering owner, design team, and contractor alignment from day one.',
						'border_color' => '#687d9c',
					],
					[
						'number'       => '03',
						'title'        => 'Firm-Wide BIM Implementation',
						'text'         => 'An end-to-end engagement covering strategy, standards, templates, training, and pilot project support. A structured multi-month program with clear milestones and measurable outcomes.',
						'border_color' => '#deaa57',
					],
					[
						'number'       => '04',
						'title'        => 'Ongoing Advisory and Audits',
						'text'         => 'Periodic model audits, workflow reviews, and advisory sessions for firms with BIM in place. Our BIM consulting firm provides this as a retainer or on a project-by-project basis.',
						'border_color' => '#687d9c',
					],
				],
			]
		);

		$this->add_control(
			'cta_title',
			[
				'label'   => __( 'CTA Box Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Not sure which is right for you?',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Box Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Tell us where your team is and what you want to fix. We will come back with an honest recommendation — usually within 24 hours.',
			]
		);

		$this->add_control(
			'primary_btn_text',
			[
				'label'   => __( 'Primary Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Schedule a Strategy Session →',
			]
		);

		$this->add_control(
			'primary_btn_url',
			[
				'label'   => __( 'Primary Button URL', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'ghost_btn_text',
			[
				'label'   => __( 'Ghost Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Request an Assessment',
			]
		);

		$this->add_control(
			'ghost_btn_url',
			[
				'label'   => __( 'Ghost Button URL', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url'         => 'mailto:info@eaglebim.com',
					'is_external' => true,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'trust_title',
			[
				'label'   => __( 'Trust Box Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'What every engagement includes',
			]
		);

		$this->add_control(
			'trust_items',
			[
				'label'   => __( 'Included Items', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'item_text',
						'label'   => __( 'Item Text', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => 'Practical deliverables your team will actually use',
					],
				],
				'default' => [
					[ 'item_text' => 'Practical deliverables your team will actually use' ],
					[ 'item_text' => 'Standards aligned to AIA, BIMForum, and your clients' ],
					[ 'item_text' => 'Templates tested on live projects before delivery' ],
					[ 'item_text' => 'Knowledge transfer built into every engagement' ],
					[ 'item_text' => 'Ongoing support after delivery' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="eb-engage-section">
			<div class="eb-engage-container">
				<div class="eb-engage-header reveal">
					<div class="section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-engage-heading"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
					<div class="eb-engage-sec-desc"><?php echo wp_kses_post( $settings['description'] ); ?></div>
				</div>
				<div class="eb-engage-grid reveal">
					<?php foreach ( $settings['engagement_cards'] as $card ) : ?>
						<div class="eb-engage-card" style="border-top-color: <?php echo esc_attr( $card['border_color'] ); ?>">
							<span class="eb-engage-num" style="color: <?php echo esc_attr( $card['border_color'] ); ?>"><?php echo esc_html( $card['number'] ); ?></span>
							<div class="eb-engage-title"><?php echo esc_html( $card['title'] ); ?></div>
							<div class="eb-engage-text"><?php echo esc_html( $card['text'] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="eb-engage-bottom-row reveal">
					<div class="eb-engage-cta-box">
						<h3><?php echo esc_html( $settings['cta_title'] ); ?></h3>
						<p><?php echo wp_kses_post( $settings['cta_text'] ); ?></p>
						<div class="eb-engage-cta-actions">
							<a href="<?php echo esc_url( $settings['primary_btn_url']['url'] ); ?>" class="eb-engage-btn-gold" target="<?php echo esc_attr( $settings['primary_btn_url']['is_external'] ? '_blank' : '_self' ); ?>">
								<?php echo esc_html( $settings['primary_btn_text'] ); ?>
							</a>
							<a href="<?php echo esc_url( $settings['ghost_btn_url']['url'] ); ?>" class="eb-engage-btn-ghost" target="<?php echo esc_attr( $settings['ghost_btn_url']['is_external'] ? '_blank' : '_self' ); ?>">
								<?php echo esc_html( $settings['ghost_btn_text'] ); ?>
							</a>
						</div>
					</div>
					<div class="eb-engage-trust-box">
						<div class="eb-engage-trust-title"><?php echo esc_html( $settings['trust_title'] ); ?></div>
						<div class="eb-engage-trust-items">
							<?php foreach ( $settings['trust_items'] as $item ) : ?>
								<div class="eb-engage-trust-item">
									<div class="eb-engage-trust-check">
										<svg viewBox="0 0 10 10" fill="none" stroke="#c8943d" stroke-width="2.5"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg>
									</div>
									<div><?php echo esc_html( $item['item_text'] ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
