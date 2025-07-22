<div class="Single_Post_Container" id="Single_Post_Container">
    <div class="Single_Post_Container_Items">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="Single_Post">
            <h1 class="Single_Post_Title"><?php the_title(); ?></h1>
            
            <div class="Single_Post_Content">
                <?php the_content(); ?>
            </div>
        </div>
        
        <?php endwhile;
    else: ?>
        <p>Không tìm thấy bài viết.</p>
        <?php endif; ?>
    </div>
</div>