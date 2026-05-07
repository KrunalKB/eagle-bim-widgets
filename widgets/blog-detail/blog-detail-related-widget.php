<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Detail_Related_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-detail-related';
	}

	public function get_title() {
		return __( 'Blog Detail Related Posts', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'eagle-bim-blog' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'settings_section',
			[
				'label' => __( 'Settings', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => __( 'Section Title', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Related Articles', 'eagle-bim-widgets' ),
			]
		);

		$this->add_control(
			'posts_count',
			[
				'label'   => __( 'Post Count', 'eagle-bim-widgets' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 4,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$post_id  = get_the_ID();

		if ( ! $post_id ) {
			return;
		}

		// $categories = get_the_category( $post_id );
		// if ( empty( $categories ) ) {
		// 	return;
		// }

		// $cat_ids = wp_list_pluck( $categories, 'term_id' );

		$args = [
			// 'category__in'   => $cat_ids,
			'post__not_in'   => [ $post_id ],
			'posts_per_page' => $settings['posts_count'],
			'post_status'    => 'publish',
			'orderby'        => 'rand', // Randomize for variety
		];

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) :
			?>
			<div class="eb-related-posts">
				<div class="eb-related-label">
					<?php echo esc_html( $settings['title'] ); ?>
				</div>
				<div class="eb-related-grid">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" class="eb-related-card">
							<div class="eb-related-date"><?php echo get_the_date( 'd M Y' ); ?></div>
							<div class="eb-related-title"><?php the_title(); ?></div>
						</a>
					<?php endwhile; ?>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		else :
			// Optionally show nothing or a fallback if no related posts are found
		endif;
	}
}
