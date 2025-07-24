<div class="Blog_Container_Content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="Blog_Container_Content_Single_Post">
                <h1 class="Blog_Container_Content_Single_Post_Title"><?php the_title(); ?></h1>

                <div class="Blog_Container_Content_Single_Post_Content">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile;
    else: ?>
        <p>Không tìm thấy bài viết.</p>
    <?php endif; ?>
</div>