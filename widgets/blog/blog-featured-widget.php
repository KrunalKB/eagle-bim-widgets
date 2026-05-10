<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Featured_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-featured';
	}

	public function get_title() {
		return __( 'Blog Featured Post', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-featured';
	}

	public function get_categories() {
		return [ 'eagle-bim-blog' ];
	}

	protected function register_controls() {
		// No content controls as it's dynamic, but we could add a category filter
		$this->start_controls_section(
			'settings_section',
			[
				'label' => __( 'Settings', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'category',
			[
				'label'       => __( 'Category Filter', 'eagle-bim-widgets' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'e.g. BIM Services', 'eagle-bim-widgets' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = [
			'posts_per_page' => 1,
			'post_status'    => 'publish',
		];

		if ( ! empty( $settings['category'] ) ) {
			$args['category_name'] = $settings['category'];
		}

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				$permalink = get_permalink();
				$title     = get_the_title();
				$content   = get_the_content();
				$content   = wp_strip_all_tags( $content );
				$trimmed   = wp_trim_words( $content, 25, '...' );
				$date      = get_the_date( 'j M Y' );
				$cat       = get_the_category();
				$cat_name  = ! empty( $cat ) ? $cat[0]->name : __( 'Blog', 'eagle-bim-widgets' );
				$img_url   = get_the_post_thumbnail_url( get_the_ID(), 'full' );
				?>
				<div class="featured-wrap reveal">
					<a href="<?php echo esc_url( $permalink ); ?>" class="featured-card">
						<div class="featured-visual">
							<div class="featured-visual-art">
								<?php if ( $img_url ) : ?>
									<img src="<?php echo esc_url( $img_url ); ?>" class="feat-svg" alt="<?php echo esc_attr( $title ); ?>">
								<?php else : ?>
									<div class="feat-bg-text"><?php echo esc_html( substr( $title, 0, 10 ) ); ?></div>
								<?php endif; ?>
							</div>
							<div class="feat-gold-bar"></div>
						</div>
						<div class="featured-body">
							<div class="feat-label">Latest Article</div>
							<div class="feat-title"><?php echo esc_html( $title ); ?></div>
							<p class="feat-excerpt"><?php echo esc_html( $trimmed ); ?></p>
							<div class="feat-footer">
								<span class="feat-date"><?php echo esc_html( $date ); ?></span>
								<span class="feat-cta">Read Article →</span>
							</div>
						</div>
					</a>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No posts found.</p>';
		endif;
	}
}
