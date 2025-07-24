<div class="Blog_Container_Content" >
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 10,
            'paged'          => $paged
        ]);

        if ($query->have_posts()):
            while ($query->have_posts()): $query->the_post();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
                <div class="Blog_Container_Content_Item">
                    <div class="Blog_Container_Content_Item_Thumbnail">
                        <?php if ($thumbnail_url): ?>
                            <a href="<?php echo esc_url($thumbnail_url); ?>" data-firelight>
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="Blog_Container_Content_Item_Content">
                        <h2>
                            <a class="Blog_Container_Content_Item_Content_Title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <?php the_excerpt(); ?>
                        <p class="Blog_Container_Content_Item_Content_Date"><?php the_time('d/m/Y'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>


            <div class="pagination">
                <?php
                echo paginate_links([
                    'total'        => $query->max_num_pages,
                    'current'      => $paged,
                    'prev_text'    => '« Trước',
                    'next_text'    => 'Tiếp »',
                    'type'         => 'list',
                ]);
                ?>
            </div>

        <?php else: ?>
            <p>Không có bài viết nào.</p>
        <?php endif;

        wp_reset_postdata();
        ?>
    </div>