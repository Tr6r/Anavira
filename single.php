
<?php
if (wp_is_mobile()) {
    include get_theme_file_path( 'templates/mobile/blog/mobile-blog-single-page.php' );
    return;
}

    include get_theme_file_path( 'templates/desktop/blog/desktop-blog-single-page.php' );
return;
?>
