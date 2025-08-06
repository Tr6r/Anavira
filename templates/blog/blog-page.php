  <body class="app">
    <?php get_header('home'); ?>

    <?php get_template_part('template-parts/blog/part-blog-page'); ?>

    <?php get_footer(); ?>
  </body>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      RouteNavigation();
      
      handleSettingDropdown();
      handleMenuDropdown();

      handleBack();

      handleClickOutside();
      preventDropDownCloseOnClickInside();

      getPostById();

    });
  </script>