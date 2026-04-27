<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog';
	}

	public function get_title() {
		return __( 'Eagle BIM Blog', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
				'default' => __( 'Resources', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'BIM Resources <em>&amp; Insights</em>',
			]
		);

		$this->add_control(
			'section_desc',
			[
				'label'   => __( 'Section Description', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Practical guides on BIM coordination, Revit modeling, clash detection, and construction workflows for AEC professionals across the USA.', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();

		// Blog Selection Section
		$this->start_controls_section(
			'blog_selection',
			[
				'label' => __( 'Blog Selection', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'selected_blogs',
			[
				'label'       => __( 'Select Blogs', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'multiple'    => true,
				'options'     => $this->get_blog_posts(),
				'description' => __( 'Select up to 3 blogs from your posts', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Dynamically fetch posts for the Select2 control
	 */
	private function get_blog_posts() {
		$options = [];
		$args    = [
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
		];

		$posts = get_posts( $args );

		if ( ! empty( $posts ) ) {
			foreach ( $posts as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		}

		return $options;
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$section_title = preg_replace( '/<\/?p>/', '', $settings['section_title'] );
		?>
		<div class="eb-blog-widget">
			<div class="eb-blog-header">
				<div class="eb-section-tag"><?php echo esc_html( $settings['section_tag'] ); ?></div>
				<h2 class="eb-blog-sec-title"><?php echo $section_title; ?></h2>
				<p class="eb-sec-desc"><?php echo esc_html( $settings['section_desc'] ); ?></p>
			</div>

			<div class="eb-blog-grid">
				<?php
				if ( ! empty( $settings['selected_blogs'] ) ) :
					$selected_ids = (array) $settings['selected_blogs'];
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
						$image_url = get_the_post_thumbnail_url( $post_id, 'full' );
						$permalink = get_permalink( $post_id );
						$date      = get_the_date( 'F j, Y', $post_id );
						?>
						<a href="<?php echo esc_url( $permalink ); ?>" class="blog-card">
							<div class="blog-img">
								<?php if ( $image_url ) : ?>
									<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
								<?php else : ?>
									<div class="blog-img-placeholder">
										<div class="blog-img-inner">
											<div class="blog-img-icon">📝</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="blog-title"><?php echo esc_html( get_the_title( $post_id ) ); ?></div>
							<div class="blog-meta"><?php echo esc_html( $date ); ?></div>
						</a>
						<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
