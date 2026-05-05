<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Grid_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-grid';
	}

	public function get_title() {
		return __( 'Blog Posts Grid', 'eagle-bim-widgets' );
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

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$featured = new WP_Query(
			[
				'posts_per_page' => 1,
				'post_status'    => 'publish',
			]
		);

		$exclude_ids = [];

		if ( $featured->have_posts() ) {
			$featured->the_post();
			$exclude_ids[] = get_the_ID();
		}
		wp_reset_postdata();

		$args = [
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'post__not_in'   => $exclude_ids,
		];

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			?>
			<div class="posts-wrap">
				<div class="posts-grid">
					<?php
					$count = 2; // Start counting from 02 since 01 is featured
					while ( $query->have_posts() ) :
						$query->the_post();
						$permalink = get_permalink();
						$title     = get_the_title();
						$date      = get_the_date( 'd M Y' );
						$cat       = get_the_category();
						$cat_name  = ! empty( $cat ) ? $cat[0]->name : __( 'Blog', 'eagle-bim-widgets' );
						$img_url   = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						?>
						<a href="<?php echo esc_url( $permalink ); ?>" class="post-card reveal">
							<div class="post-num"><?php echo sprintf( '%02d', $count ); ?></div>
							<div class="post-thumb">
								<?php if ( $img_url ) : ?>
									<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
								<?php else : ?>
									<div class="post-thumb-placeholder"></div>
								<?php endif; ?>
							</div>
							<div class="post-cat-bar">
								<span class="post-cat"><?php echo esc_html( $cat_name ); ?></span>
								<span class="post-cat-line"></span>
								<span class="post-date"><?php echo esc_html( $date ); ?></span>
							</div>
							<div class="post-title"><?php echo esc_html( $title ); ?></div>
							<span class="post-lnk">Read Article →</span>
						</a>
						<?php
						$count++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php
		else :
			echo '<p>No more posts found.</p>';
		endif;
	}
}
