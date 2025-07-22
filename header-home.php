<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anavira - Thức tỉnh mạnh mẽ tái sinh</title>
    <?php wp_head(); ?>
</head>

<?php if (wp_is_mobile()): ?>
    <div class="MobileHomeHeader">
                
        <img class="MobileHomeHeader_Logo"
            src="<?php echo site_url(); ?>/wp-content/uploads/2025/07/9-nam-02-1.png" height="60" alt="Logo">


        <div class="MobileHomeHeader_Content">
            <div class="MobileHomeHeader_Content_Brand">
                ANAVIRA
            </div>
            <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>

        </div>
       
    </div>
<?php else: ?>

    <body <?php body_class(); ?>>
        <header class="HomeHeader">
            <div class="HomeHeader_Container">
                <div class="HomeHeader_Container_Logo">
                    <img class="HomeHeader_Container_Logo_Image"
                         src="<?php echo site_url(); ?>/wp-content/uploads/2025/07/9-nam-02-1.png" height="60" alt="Logo">
                    <div class="HomeHeader_Container_Logo_Brand">
                        ANAVIRA
                    </div>
                    <div class="HomeHeader_Container_Logo_Slogan">
                        WFPB
                    </div>
                </div>
                <p class="Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>
            </div>
        </header>
    <?php endif; ?>