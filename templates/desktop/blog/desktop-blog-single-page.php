    <body <?php body_class('app'); ?>>
        <?php get_header('home'); ?>
        <?php get_template_part('template-parts/desktop/blog/desktop-part-blog-single-page'); ?>
        <?php get_footer(); ?>
    </body>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/font-size.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/get-post-by-id.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            /* ---------- Toolbar menu ---------- */
            const btnToolbar = document.getElementById('Toolbar_Icon');
            const menu = document.getElementById('Toolbar_Menu');
            const singlePost = document.getElementById('Single_Post_Container');


            applyFontSizes();

            if (btnToolbar && menu && singlePost) {
                // Toggle menu
                btnToolbar.addEventListener('click', (e) => {
                    e.stopPropagation(); // ngăn lan ra document
                    menu.classList.toggle('active');
                    singlePost.classList.toggle('active');
                });

                // Click bên trong menu không đóng
                menu.addEventListener('click', (e) => e.stopPropagation());

                // Click ra ngoài thì đóng
                document.addEventListener('click', (e) => {
                    if (
                        !e.target.closest('#Toolbar_Menu') && // không phải bên trong menu
                        !e.target.closest('#Toolbar_Icon') // không phải nút menu
                    ) {
                        menu.classList.remove('active');
                        singlePost.classList.remove('active');
                    }
                });
            }

            /* ---------- Dropdown category ---------- */
            const toggleBtn = document.querySelector('.DropdownToggle');
            const dropdown = document.querySelector('.DropdownList');

            if (toggleBtn && dropdown) {
                toggleBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
                });

                // Đóng dropdown nếu click ra ngoài
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.DropdownMenu')) {
                        dropdown.style.display = 'none';
                    }
                });
            }

            /* ---------- Load bài viết theo category ---------- */
                  getPostById();


        });
    </script>