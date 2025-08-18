<?php
// Không bắt buộc email, chỉ giữ trường Tên
add_filter('pre_option_require_name_email', '__return_zero');

    add_filter('comment_form_default_fields', function($fields) {
        $new_fields = [];
            $new_fields['author'] = $fields['author']; // Giữ lại trường Tên
        
        return $new_fields;
    });


function anavira_handle_submit_comment_reply() {
    // Kiểm tra nonce
    check_ajax_referer('anavira_comment_nonce', 'nonce');

    $post_id   = isset($_POST['comment_post_ID']) ? intval($_POST['comment_post_ID']) : 0;
    $parent_id = isset($_POST['comment_parent']) ? intval($_POST['comment_parent']) : 0;

    // Lấy và lọc dữ liệu từ form
    $content = isset($_POST['comment_content']) ? wp_kses_post(trim($_POST['comment_content'])) : '';
    $author  = isset($_POST['comment_author'])  ? sanitize_text_field(trim($_POST['comment_author'])) : '';

    if (!$post_id || !$content) {
        wp_send_json_error('Dữ liệu không hợp lệ.');
    }

    $user_id = get_current_user_id();

    $commentdata = [
        'comment_post_ID'  => $post_id,
        'comment_parent'   => $parent_id,
        'comment_content'  => $content,
        'user_id'          => $user_id,
        'comment_approved' => $user_id ? 1 : 0, // user login auto approve, khách chờ duyệt
    ];

    if (!$user_id) {
        $commentdata['comment_author']       = $author ?: 'Khách';
        $commentdata['comment_author_email'] = ''; // nếu có email thì cũng lọc tương tự
    }

    $comment_id = wp_new_comment($commentdata);

    if ($comment_id) {
        wp_send_json_success('Phản hồi đã được gửi!');
    } else {
        wp_send_json_error('Không thể gửi phản hồi.');
    }

    wp_die();
}


add_action('wp_ajax_submit_comment_reply', 'anavira_handle_submit_comment_reply');
add_action('wp_ajax_nopriv_submit_comment_reply', 'anavira_handle_submit_comment_reply');
