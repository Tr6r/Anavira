<?php
/**
 * File: inc/function-js.php
 * Chứa mọi hàm trong js
 */
function anavira_enqueue_js_scripts() {
    wp_enqueue_script(
        'font-size-script',
        get_template_directory_uri() . '/assets/js/font-size.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'anavira_enqueue_js_scripts');

