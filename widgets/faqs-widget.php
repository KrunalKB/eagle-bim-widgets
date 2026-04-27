<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_FAQs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-faqs';
	}

	public function get_title() {
		return __( 'Eagle BIM FAQs', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-columns';
	}

	public function get_categories() {
		return [ 'eagle-bim-category' ];
	}

	protected function register_controls() {

		// Header Section
		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Header', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_tag',
			[
				'label'   => __( 'Section Tag', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'FAQs', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Frequently Asked Questions About <em>BIM Services</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
											'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Everything you need to know before getting started with Eagle BIM.', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'   => __( 'CTA Button Text', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Ask Us Anything →', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label'   => __( 'CTA Button Link', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'mailto:info@eaglebim.com',
				],
			]
		);

		$this->end_controls_section();

		// FAQs Grid Section
		$this->start_controls_section(
			'faqs_section',
			[
				'label' => __( 'FAQs List', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'faqs',
			[
				'label'   => __( 'FAQs', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => [
					[
						'name'    => 'faq_question',
						'label'   => __( 'Question', 'eagle-bim-widgets' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'What are BIM services?', 'eagle-bim-widgets' ),
					],
					[
						'name'    => 'faq_answer',
						'label'   => __( 'Answer', 'eagle-bim-widgets' ),
													'type'    => \Elementor\Controls_Manager::WYSIWYG,
						'default' => __( 'BIM services refer to the full range of Building Information Modeling support provided to AEC firms — including 3D Revit modeling, MEP coordination, clash detection, construction documentation, BIM consulting, and Scan to BIM.', 'eagle-bim-widgets' ),
					],
				],
				'default' => [
					[
						'faq_question' => 'What are BIM services?',
						'faq_answer'   => 'BIM services refer to the full range of Building Information Modeling support provided to AEC firms — including 3D Revit modeling, MEP coordination, clash detection, construction documentation, BIM consulting, and Scan to BIM. Eagle BIM provides all of these under one coordinated team.',
					],
					[
						'faq_question' => 'What is the difference between BIM modeling and BIM coordination?',
						'faq_answer'   => 'BIM modeling involves creating discipline-specific 3D models — architectural, structural, or MEP. BIM coordination is the process of combining those models into a federated environment to identify and resolve conflicts (clashes) between disciplines before construction begins. Both are core Eagle BIM services.',
					],
					[
						'faq_question' => 'Do you provide Revit BIM services for all trades?',
						'faq_answer'   => 'Yes. Eagle BIM provides Revit modeling services for architectural, structural, MEP (mechanical, electrical, plumbing, fire protection), and civil disciplines. We also offer Revit Family Creation, CAD to BIM conversion, and Revit drafting services across all project types.',
					],
					[
						'faq_question' => 'Which states do you serve?',
						'faq_answer'   => 'Eagle BIM is based in Texas and serves clients nationwide across all 50 states. We have deep project experience in Texas, California, New York, Florida, Illinois, Washington, Massachusetts, Colorado, and more. Our remote collaboration model means location is never a barrier.',
					],
					[
						'faq_question' => 'How do we get started with Eagle BIM?',
						'faq_answer'   => 'Share your scope — drawings, PDFs, or a brief project description — and we\'ll respond with a short project plan and a firm quote within 24–48 hours. No obligation, no long intake forms. Just email info@eaglebim.com or hit "Share Your Scope" above.',
					],
					[
						'faq_question' => 'What LOD levels do you support?',
						'faq_answer'   => 'We model to LOD 100 through LOD 500 depending on project phase and requirements. LOD levels are defined in the BIM Execution Plan (BEP) at project kickoff, with clear progression milestones aligned to AIA phases and BIMForum LOD specifications.',
					],
				],
			],
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-faq-widget">
			<div class="eb-faq-layout">
				<div class="eb-faq-intro">
					<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
					<h2 class="eb-faq-title"><?php echo $section_title; ?></h2>
					<p class="eb-sec-desc"><?php echo wp_kses_post( $settings['section_desc'] ); ?></p>
					<div class="eb-faq-cta">
						<a href="<?php echo esc_url( $settings['cta_link']['url'] ); ?>" class="eb-btn-gold">
							<?php echo esc_html( $settings['cta_text'] ); ?>
						</a>
					</div>
				</div>

				<div class="eb-faq-list">
					<?php if ( ! empty( $settings['faqs'] ) ) : ?>
						<?php foreach ( $settings['faqs'] as $index => $faq ) : ?>
							<div class="eb-faq-item <?php echo $index === 0 ? 'open' : ''; ?>">
								<div class="eb-faq-q">
									<?php echo esc_html( $faq['faq_question'] ); ?>
									<div class="eb-faq-icon">+</div>
								</div>
								<div class="eb-faq-a">
									<?php echo wp_kses_post( $faq['faq_answer'] ); ?>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
