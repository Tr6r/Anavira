  <div class="Blogmenu">
    <div class="Blogmenu_Title">
      Danh mục
    </div>
    <div class="DropdownMenu">
      <ul class="Blogmenu_List" id="category-list">
        <?php
        $categories = get_categories();
        foreach ($categories as $cat):
        ?>
          <li class="Blogmenu_List_Item">
            <a href="#" class="category-link"
              data-id="<?= $cat->term_id ?>"
              data-link="<?= get_category_link($cat->term_id) ?>">
              <?= esc_html($cat->name) ?>
            </a>
          </li>
          <div id="category-posts-<?= $cat->term_id ?>" class="category-posts">

          </div>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>