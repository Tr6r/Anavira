<main class="MobileBlog_Container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>

            <div class="MobileBlog_Container_Item">
                <div class="MobileBlog_Container_Item_Thumbnail">
                    <?php if ($thumbnail_url): ?>
                        <a href="<?php echo esc_url($thumbnail_url); ?>" data-firelight>
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="MobileBlog_Container_Item_Content">
                    <h2>
                        <a class="MobileBlog_Container_Item_Content_Title" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <?php the_excerpt(); ?>
                        <p class="MobileBlog_Container_Item_Content_Date"><?php the_time('d/m/Y'); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
        <div class="pagination">
            <?php
            the_posts_pagination([
                'prev_text' => '« Trước',
                'next_text' => 'Tiếp »',
                'mid_size'  => 2,
                'type'      => 'list',
            ]);
            ?>
        </div>

    <?php else : ?>
        <p>Không có bài viết nào.</p>
    <?php endif; ?>
</main>