<?php
function anavira_enqueue_assets() {
    $css_files = [
        'styles' => 'styles.css',
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
    ];

    $js_files = [
        'dropdown' => 'assets/js/dropdown_manager.js',
        'fontsize'   => 'assets/js/fontsize_manager.js',
        'language'  => 'assets/js/language_manager.js',
        'route'   => 'assets/js/route_manager.js',
        'post'  => 'assets/js/post_manager.js',
        'video'  => 'assets/js/video_manager.js',

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

    // Enqueue JS
    foreach ($js_files as $handle => $rel_path) {
        $full_path = get_template_directory() . '/' . $rel_path;
        if (file_exists($full_path)) {
            wp_enqueue_script(
                $handle . '-script',
                get_template_directory_uri() . '/' . $rel_path,
                [],
                filemtime($full_path),
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'anavira_enqueue_assets');
