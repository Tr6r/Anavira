<?php


// Load các file logic chia nhỏ trong inc/
require get_template_directory() . '/inc/function-js.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/timestamp.php';

// Bạn có thể thêm các file khác ở đây:
# require get_template_directory() . '/inc/menus.php';
# require get_template_directory() . '/inc/theme-support.php';
// Chặn cache trình duyệt & server

?>