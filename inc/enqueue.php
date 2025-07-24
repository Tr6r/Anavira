<?php
function folds_enqueue_assets()
{

  // Load CSS tổng
      wp_enqueue_style('main-style', get_stylesheet_uri());

  wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css');
  wp_enqueue_style('toolbar-style', get_template_directory_uri() . '/assets/css/toolbar.css');
  wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/css/home.css');
  wp_enqueue_style('setting-style', get_template_directory_uri() . '/assets/css/setting.css');
  wp_enqueue_style('blog-style', get_template_directory_uri() . '/assets/css/blog.css');
  wp_enqueue_style('blog-menu-style', get_template_directory_uri() . '/assets/css/menu.css');
  wp_enqueue_style('blog-container-style', get_template_directory_uri() . '/assets/css/blog-container.css');
  wp_enqueue_style('blog-single-style', get_template_directory_uri() . '/assets/css/blog-single.css');



  //load Icon Font Awesome
  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'
  );

  wp_enqueue_style(
    'boxicons',
    'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css',
    array(),    
    '2.1.4'     
  );

  //load font text 
  wp_enqueue_style(
    'google-font-merriweather',
    'https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap',
    false
  );

  if (is_page('contact')) {
    wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact.css');
  }

}
add_action('wp_enqueue_scripts', 'folds_enqueue_assets');

//plugin WP
function add_firelight_assets() {
    wp_enqueue_style('firelight-css', 'https://cdn.jsdelivr.net/npm/firelight@1.0.2/firelight.css');
    wp_enqueue_script('firelight-js', 'https://cdn.jsdelivr.net/npm/firelight@1.0.2/firelight.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'add_firelight_assets');

function anavira_theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'anavira_theme_setup');
