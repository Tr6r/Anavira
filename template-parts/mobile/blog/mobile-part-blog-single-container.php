<div class="MobileBlog_Container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="MobileBlog_Container_Single_Post">
                <h1 class="MobileBlog_Container_Single_Post_Title"><?php the_title(); ?></h1>

                <div class="MobileBlog_Container_Single_Post_Content">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile;
    else: ?>
        <p>Không tìm thấy bài viết.</p>
    <?php endif; ?>
</div>