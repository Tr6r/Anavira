<?php
function folds_enqueue_assets()
{

  // Load CSS tổng
      wp_enqueue_style('main-style', get_stylesheet_uri());

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
function custom_excerpt_length( $length ) {
    return 200; // Hiển thị 200 từ
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );
