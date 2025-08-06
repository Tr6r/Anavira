<!DOCTYPE html>
<html <?php language_attributes(); ?>>

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
            src="<?php echo site_url(); ?>/wp-content/uploads/2025/07/9-nam-02-1.png" height="60" alt="Logo">
        </img>

        <div class="MobileHomeHeader_Content">
            <div class="MobileHomeHeader_Content_Brand">
                ANAVIRA
            </div>
            <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>
        </div>
    </div>
</div>