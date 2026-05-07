<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Detail_Recent_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-detail-recent';
	}

	public function get_title() {
		return __( 'Blog Detail Recent Posts', 'eagle-bim-widgets' );
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
				'default' => __( 'Recent Articles', 'eagle-bim-widgets' ),
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

		$args = [
			'posts_per_page' => $settings['posts_count'],
			'post_status'    => 'publish',
		];

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) :
			?>
			<div class="eb-sidebar-recent">
				<div class="eb-sidebar-recent-header">
					<div class="eb-sidebar-recent-label"><?php echo esc_html( $settings['title'] ); ?></div>
				</div>
				<div class="eb-recent-list">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="eb-recent-item">
							<div class="eb-recent-item-date"><?php echo get_the_date( 'd M Y' ); ?></div>
							<div class="eb-recent-item-title"><?php the_title(); ?></div>
						</a>
					<?php endwhile; ?>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		else :
			echo '<p>No recent posts found.</p>';
		endif;
	}
}
