<?php

/**
 * File: inc/ajax.php
 * Chứa mọi hàm & hook AJAX.
 */

add_action('wp_enqueue_scripts', function () {
    wp_localize_script('your-script-handle', 'PostAjaxVars', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('anavira_load_posts_nonce'),
    ]);
});

// Lấy BÀI VIẾT (giữ nguyên, không include_children)
add_action('wp_ajax_get_posts_by_category',        'anavira_load_posts_by_category');
add_action('wp_ajax_nopriv_get_posts_by_category', 'anavira_load_posts_by_category');

function anavira_load_posts_by_category() {
    if (! isset($_GET['nonce']) || ! wp_verify_nonce($_GET['nonce'], 'anavira_load_posts_nonce')) {
        wp_send_json_error('Xác thực thất bại.');
    }

    $cat_id   = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
    $typepost = isset($_GET['typepost']) ? sanitize_text_field($_GET['typepost']) : 'blog';

    $args = [
        'post_type'      => $typepost . '-cpt',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'tax_query'      => [],
    ];

    if ($cat_id) {
        $args['tax_query'][] = [
            'taxonomy' => $typepost . '-categories',
            'field'    => 'term_id',
            'terms'    => $cat_id,
            // KHÔNG include_children -> click lá thì chỉ hiện bài của lá
        ];
    }

    $posts = get_posts($args);

    if ($posts) {
        $posts_data = [];
        foreach ($posts as $post) {
            $posts_data[] = [
                'id'    => $post->ID,
                'title' => get_the_title($post),
                'url'   => get_permalink($post),
            ];
        }
        wp_send_json_success($posts_data);
    } else {
        wp_send_json_error('Không có bài viết nào.');
    }
}

// ✅ Lấy DANH MỤC CON
add_action('wp_ajax_get_child_terms',        'anavira_get_child_terms');
add_action('wp_ajax_nopriv_get_child_terms', 'anavira_get_child_terms');

function anavira_get_child_terms() {
    if (! isset($_GET['nonce']) || ! wp_verify_nonce($_GET['nonce'], 'anavira_load_posts_nonce')) {
        wp_send_json_error('Xác thực thất bại.');
    }

    $parent_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
    $typepost  = isset($_GET['typepost']) ? sanitize_text_field($_GET['typepost']) : 'blog';
    $taxonomy  = $typepost . '-categories';

    $children = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => $parent_id,
    ]);

    if (is_wp_error($children)) {
        wp_send_json_error('Không lấy được danh mục con.');
    }

    $data = [];
    foreach ($children as $child) {
        // Kiểm tra child có con nữa không (để biết có cần xổ tiếp không)
        $grandkids = get_terms([
            'taxonomy'   => $taxonomy,
            'hide_empty' => false,
            'parent'     => $child->term_id,
            'number'     => 1,
            'fields'     => 'ids',
        ]);

        $data[] = [
            'id'           => $child->term_id,
            'name'         => $child->name,
            'link'         => get_term_link($child),
            'has_children' => !empty($grandkids),
        ];
    }

    wp_send_json_success($data);
}
