<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$headerState;
if (is_page('Product') || is_page('Recipe')) {
    $headerState = true; //Product là true
} else {
    $headerState = false;
}
?>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anavira - Thức tỉnh mạnh mẽ tái sinh</title>
    <?php wp_head(); ?>
</head>


<div class="MobileHomeHeader" id="mobileHeader">
    <?php get_template_part('template-parts/video/part-video'); ?>

    <div class="MobileHomeHeader_Container">
        <img class="MobileHomeHeader_Logo"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/static/logo.png" height="60" alt="Logo">
        </img>

        <div class="MobileHomeHeader_Content">
            <div class="MobileHomeHeader_Content_Brand">
                ANAVIRA
            </div>
            <?php if ($headerState) : ?>
                <p class="MobileHomeHeader_Content_WFPB">WFPB</p>
            <?php endif; ?>
            <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>
        </div>
    </div>
</div>