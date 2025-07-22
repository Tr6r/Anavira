  <body <?php body_class('app'); ?>>
    <?php get_header('home'); ?>
    <?php get_template_part('template-parts/desktop/blog/desktop-part-blog-page'); ?>
    <?php get_footer(); ?>
  </body>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/font-size.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/get-post-by-id.js"></script>
<script>  
    document.addEventListener('DOMContentLoaded', () => {

      // Lấy các phần tử
      const btnToolbar = document.getElementById('Toolbar_Icon');
      const menu = document.getElementById('Toolbar_Menu');
      const blogBody = document.getElementById('Blog_Container');

      if (!btnToolbar || !menu || !blogBody) {
        console.warn('Thiếu một trong ba phần tử Toolbar_Icon, Toolbar_Menu, Blog_Container');
        return;
      }

      applyFontSizes();

      /*------------- Toggle menu -------------*/
      btnToolbar.addEventListener('click', (e) => {
        e.stopPropagation(); // ⛔ ngăn sự kiện lan ra ngoài
        menu.classList.toggle('active');
        blogBody.classList.toggle('active');
      });

      /*------------- Click bên trong menu -------------*/
      menu.addEventListener('click', (e) => {
        e.stopPropagation(); // ⛔ click trong menu không đóng menu
      });

      /*-------------  Click ra ngoài đóng menu -------------*/
      document.addEventListener('click', () => {
        if (menu.classList.contains('active')) {
          menu.classList.remove('active');
          blogBody.classList.remove('active');
        }
      });

      /*-------------  AJAX load bài viết theo category -------------*/
      getPostById();
    });
  </script>