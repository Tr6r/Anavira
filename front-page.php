
<?php
if (wp_is_mobile()) {
    include get_theme_file_path('templates/mobile/front-page/mobile-front-page.php');
    return;
}

include get_theme_file_path('templates/desktop/front-page/desktop-front-page.php');
return;
?>
