<?php
function anavira_enqueue_assets()
{
    $css_files = [
        'style' => 'style.css',
        'about' => 'assets/css/about.css',
        'blog-single'  => 'assets/css/blog-single.css',
        'blog'  => 'assets/css/blog.css',
        'header' =>  'assets/css/header.css',
        'home' => 'assets/css/home.css',
        'menu'  => 'assets/css/menu.css',
        'page-introduction'  => 'assets/css/page-introduction.css',
        'setting' =>  'assets/css/setting.css',
        'toolbar' => 'assets/css/toolbar.css',
        'video'  => 'assets/css/video.css',
        'comment'  => 'assets/css/comment.css',
        'footer'  => 'assets/css/footer.css',
        'product'  => 'assets/css/product.css',
        'feedback'  => 'assets/css/feedback.css',
    ];



    // Enqueue CSS
    foreach ($css_files as $handle => $rel_path) {
        $full_path = get_template_directory() . '/' . $rel_path;
        if (file_exists($full_path)) {
            wp_enqueue_style(
                $handle . '-style',
                get_template_directory_uri() . '/' . $rel_path,
                [],
                filemtime($full_path)
            );
        }
    }
    $js_files = [
        'dropdown' => 'assets/js/dropdown_manager.js',
        'fontsize' => 'assets/js/fontsize_manager.js',
        'language' => 'assets/js/language_manager.js',
        'route'    => 'assets/js/route_manager.js',
        'post'     => 'assets/js/post_manager.js',
        'video'    => 'assets/js/video_manager.js',
        'comment'  => 'assets/js/comment_manager.js',
        'feedback'  => 'assets/js/feedback_manager.js',
        'toolbar'  => 'assets/js/toolbar_manager.js',
    ];

    foreach ($js_files as $handle => $rel_path) {
        $full_path = get_template_directory() . '/' . $rel_path;
        $uri_path = get_template_directory_uri() . '/' . $rel_path;

        if (file_exists($full_path)) {
            wp_enqueue_script(
                $handle . '-script',
                $uri_path,
                [],
                filemtime($full_path),
                true
            );

            // Nếu là file post_manager.js thì localize biến cho nó
            if ($handle === 'post') {
                wp_localize_script($handle . '-script', 'PostAjaxVars', [
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce'   => wp_create_nonce('anavira_load_posts_nonce'),
                    'post_id' => get_the_ID() ?: 0,
                    'typepost' => $typepost ?? 'blog',
                ]);
            }

            if ($handle === 'comment') {
                wp_localize_script($handle . '-script', 'CommentAjaxVars', [
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce'   => wp_create_nonce('anavira_comment_nonce'),
                    'post_id' => get_the_ID(),
                ]);
            }
        } else {
            error_log("JS file not found: " . $full_path);
        }
    }
}
add_action('wp_enqueue_scripts', 'anavira_enqueue_assets');
