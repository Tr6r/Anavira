  <!-- <div class="MobileBlogmenu">
    <div class="MobileBlogmenu_Title">
      Categories
    </div>

    <div class="MobileBlogmenu_List">
      <ul class="MobileBlogmenu_Ul">
        <?php
        wp_list_categories([
          'title_li'    => '',          
          'show_count'  => false,       
          'hierarchical' => false,     
        ]);
        ?>
      </ul>
    </div>
  </div> -->

   <div class="MobileBlogmenu">
    <div class="MobileBlogmenu_Title">
      Danh mục
    </div>
    <div class="MobileDropdownMenu">
      <ul class="MobileBlogmenu_List" id="category-list">
        <?php
        $categories = get_categories();
        foreach ($categories as $cat):
        ?>
          <li class="MobileBlogmenu_List_Item">
            <a href="#" class="MobileBlogmenu-category-link"
              data-id="<?= $cat->term_id ?>"
              data-link="<?= get_category_link($cat->term_id) ?>">
              <?= esc_html($cat->name) ?>
            </a>
          </li>
          <div id="MobileBlogmenu-category-posts-<?= $cat->term_id ?>" class="MobileBlogmenu-category-posts">

          </div>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>