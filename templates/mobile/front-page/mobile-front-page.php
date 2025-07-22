    <body class="Mobileapp">
        <?php get_header('home'); ?>

        <?php get_template_part('template-parts/mobile/front-page/mobile-part-front-page'); ?>

        <?php get_footer(); ?>
    </body>
    
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/get-post-by-id.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/handle-dropdown.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/change-font-size.js"></script>

     <script>
    document.addEventListener('DOMContentLoaded', () => {

      mobileApplyFontSizes();

      mobileHandleSettingDropdown();

      mobileHandleBack();

      handleClickOutside();
      preventDropDownCloseOnClickInside();

      mobileGetPostById();


      mobileAdjustFontSize();


    });
  </script>