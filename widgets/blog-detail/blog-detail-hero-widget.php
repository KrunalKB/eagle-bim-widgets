<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Eagle_BIM_Blog_Detail_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eagle-bim-blog-detail-hero';
	}

	public function get_title() {
		return __( 'Blog Detail Hero', 'eagle-bim-widgets' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'eagle-bim-blog' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'eagle-bim-widgets' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// $this->add_control(
		// 'bg_text',
		// [
		// 'label'   => __( 'Background Text', 'eagle-bim-widgets' ),
		// 'type'    => \Elementor\Controls_Manager::TEXT,
		// 'default' => 'BIM',
		// ]
		// );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Get current post data
		$post_id = get_the_ID();
		if ( ! $post_id ) {
			return;
		}

		$title    = get_the_title( $post_id );
		$date     = get_the_date( 'F j, Y', $post_id );
		$category = get_the_category( $post_id );
		$cat_name = ! empty( $category ) ? $category[0]->name : __( 'Blog', 'eagle-bim-widgets' );
		$excerpt  = get_the_excerpt( $post_id );
		$img_url  = get_the_post_thumbnail_url( $post_id, 'full' );

		?>
		<div class="eb-art-header">
			<!-- <div class="eb-art-header-bg"> -->
				<?php // echo esc_html( $settings['bg_text'] ); ?>
			<!-- </div> -->
			<div class="eb-art-header-inner">
				<div class="eb-art-breadcrumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>/</span>
					<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'blog' ) ) ); ?>">Blog</a><span>/</span>
					<span>
					<?php
					$words = explode( ' ', $title );
					echo esc_html( ( str_word_count( $title ) > 5 ) ? implode( ' ', array_slice( $words, 0, 5 ) ) . '...' : $title );
					?>
					</span>
				</div>

				<div class="eb-art-eyebrow">
					<span class="eb-art-cat-pill"><?php echo esc_html( $cat_name ); ?></span>
					<span class="eb-art-date"><?php echo esc_html( $date ); ?></span>
					<span class="eb-art-readtime">
						<?php
						$content    = get_post_field( 'post_content', $post_id );
						$word_count = str_word_count( strip_tags( $content ) );
						$read_time  = ceil( $word_count / 200 );
						echo '· ' . $read_time . ' min read';
						?>
					</span>
				</div>
				<h1><?php echo esc_html( $title ); ?></h1>
				<p class="eb-art-header-intro"><?php echo esc_html( wp_strip_all_tags( $excerpt ) ); ?></p>
			</div>
			<div class="eb-art-hero-illus">
				<?php if ( $img_url ) : ?>
					<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>">
				<?php else : ?>
					<!-- Fallback Illustration if no image -->
					<div class="eb-art-hero-fallback"></div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
