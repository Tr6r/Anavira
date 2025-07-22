    <body class="app">
        <?php get_header('home'); ?>
        
        <?php get_template_part('template-parts/desktop/front-page/desktop-part-front-page'); ?>
        <?php get_footer(); ?>
    </body>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/font-size.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', () => {
                  applyFontSizes();
        });
    </script>