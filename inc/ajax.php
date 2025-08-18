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

add_action('wp_ajax_get_posts_by_category',        'anavira_load_posts_by_category');
add_action('wp_ajax_nopriv_get_posts_by_category', 'anavira_load_posts_by_category');

function anavira_load_posts_by_category() {
    if (! isset($_GET['nonce']) || ! wp_verify_nonce($_GET['nonce'], 'anavira_load_posts_nonce')) {
        wp_send_json_error('Xác thực thất bại.');
        wp_die();
    }

    $cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
    $typepost = isset($_GET['typepost']) ? sanitize_text_field($_GET['typepost']) : 'blog';

    $args = [
        'post_type'      => $typepost . '-cpt',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
    ];

    if ($cat_id) {
        $args['tax_query'] = [
            [
                'taxonomy' => $typepost . '-categories',
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ]
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

    wp_die();
}