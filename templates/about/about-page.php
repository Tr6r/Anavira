    <body class="app">
        <?php get_header('home'); ?>

        <?php get_template_part('template-parts/about/part-about-page'); ?>

        <?php get_footer(); ?>
    </body>
    

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      RouteNavigation();

      handleSettingDropdown();
      handleMenuDropdown();

      handleBack();

      handlePostExpand();

      handleClickOutside();
      preventDropDownCloseOnClickInside();

      getPostById();

    });
  </script>