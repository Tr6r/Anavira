<?php
// Không bắt buộc email, chỉ giữ trường Tên
add_filter('pre_option_require_name_email', '__return_zero');

add_filter('comment_form_default_fields', function($fields) {
    $new_fields = [];
    if (isset($fields['author'])) {
        $new_fields['author'] = $fields['author']; // Giữ lại trường Tên
    }
    return $new_fields;
});

// Giới hạn 10 giây giữa 2 bình luận để chống spam
remove_filter('comment_flood_filter', 'wp_throttle_comment_flood', 10);
