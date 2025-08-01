    <body class="app">
        <?php get_header('home'); ?>

        <?php get_template_part('template-parts/about/part-about-page'); ?>

        <?php get_footer(); ?>
    </body>
    
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/dropdown_manager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/route_manager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/fontsize_manager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/language_manager.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/post_manager.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      RouteNavigation();
      changeToHomePage();

      handleSettingDropdown();
      handleMenuDropdown();

      handleBack();

      handlePostExpand();

      handleClickOutside();
      preventDropDownCloseOnClickInside();

      getPostById();

    });
  </script>