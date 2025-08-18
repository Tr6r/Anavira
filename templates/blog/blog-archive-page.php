 <body class="app">
   <?php get_header('home'); ?>

   <?php
$post_type = get_post_type(); // lấy CPT hiện tại

    if ($post_type == 'recipe-cpt') {
      get_template_part('template-parts/recipe/part-recipe-page');
    } elseif ($post_type == 'product-cpt') {
      get_template_part('template-parts/product/part-product-page');
    } else {
      get_template_part('template-parts/blog/part-blog-archive-page');
    }
    ?>

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