<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Projects_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-projects';
	}

	public function get_title() {
		return __( 'Eagle BIM Projects', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-slider-album';
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
				'default' => __( 'Portfolio', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Our BIM Projects <em>Across the USA</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Real coordination. Real deliverables. Real results — from Texas to New York, California to Florida.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Projects Selection Section
		$this->start_controls_section(
			'projects_selection',
			[
				'label' => __( 'Project Selection', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'selected_projects',
			[
				'label'       => __( 'Select Projects', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->get_portfolio_projects(),
				'description' => __( 'Select up to 3 projects from your portfolio', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Dynamically fetch tm_portfolio projects for the Select2 control
	 */
	private function get_portfolio_projects() {
		$options = [];
		$args    = [
			'post_type'      => 'tm_portfolio',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		];

		$projects = get_posts( $args );

		if ( ! empty( $projects ) ) {
			foreach ( $projects as $project ) {
				$options[ $project->ID ] = $project->post_title;
			}
		}

		return $options;
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-projects-widget">
			<div class="eb-proj-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-proj-sec-title"><?php echo $section_title; ?></h2>
				<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
			</div>

			<div class="eb-proj-grid">
				<?php
				if ( ! empty( $settings['selected_projects'] ) ) :
					$selected_ids = (array) $settings['selected_projects'];
					$count        = 0;
					foreach ( $selected_ids as $post_id ) :
						if ( $count >= 3 ) {
							break;
						}
						$count++;

						$post = get_post( $post_id );
						if ( ! $post ) {
							continue;
						}

						// Get Featured Image
						$image_url    = get_the_post_thumbnail_url( $post_id, 'full' );
						$project_link = get_permalink( $post_id );

						// Get Category (first term of first associated taxonomy)
						$category = '';
						$terms    = get_the_terms( $post_id, 'tm_portfolio_category' );
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							$category = $terms[0]->name;
						}
						?>
						<a href="<?php echo esc_url( $project_link ); ?>" class="eb-proj-card">
							<div class="eb-proj-img">
								<?php if ( $image_url ) : ?>
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
								<?php else : ?>
									<div class="eb-proj-img-placeholder">
										<div class="eb-proj-img-inner">
											<div class="eb-proj-img-icon">🏢</div>
											<div class="eb-proj-img-label"><?php echo esc_html( $category ); ?></div>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="eb-proj-info">
								<div class="eb-proj-tag"><?php echo esc_html( $category ); ?></div>
								<div class="eb-proj-title"><?php echo esc_html( get_the_title( $post_id ) ); ?></div>
							</div>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
