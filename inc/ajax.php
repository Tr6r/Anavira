<?php
/**
 * File: inc/ajax.php
 * Chứa mọi hàm & hook AJAX.
 */

if ( ! function_exists( 'anavira_load_posts_by_category' ) ) {
	function anavira_load_posts_by_category() {
		// Lấy và lọc cat_id
		$cat_id = isset( $_GET['cat_id'] ) ? intval( $_GET['cat_id'] ) : 0;

		$posts = get_posts( [
			'category'        => $cat_id,
			'posts_per_page'  => 10,
			'post_status'     => 'publish',
		] );

		if ( $posts ) {
			echo '<ul class="CategoryPosts">';
			foreach ( $posts as $post ) {
				setup_postdata( $post );
				echo '<li><a href="' . esc_url( get_permalink( $post ) ) . '">' . esc_html( get_the_title( $post ) ) . '</a></li>';
			}
			echo '</ul>';
			wp_reset_postdata();
		} else {
			echo '<p>Không có bài viết nào.</p>';
		}
		wp_die(); // Kết thúc AJAX
	}
}

// Đăng ký hook cho cả người dùng đã login & khách
add_action( 'wp_ajax_get_posts_by_category',        'anavira_load_posts_by_category' );
add_action( 'wp_ajax_nopriv_get_posts_by_category', 'anavira_load_posts_by_category' );
