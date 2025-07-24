<div class="Menu">
  <div class="Menu_Title">
    Danh mục
  </div>
  <div >
    <ul class="Menu_List" id="category-list">
      <?php
      $categories = get_categories();
      foreach ($categories as $cat):
      ?>
        <li class="Menu_List_Item">
          <a href="#" class="Menu_category_link"
            data-id="<?= $cat->term_id ?>"
            data-link="<?= get_category_link($cat->term_id) ?>">
            <?= esc_html($cat->name) ?>
          </a>
        </li>
        <div id="Menu_category_posts-<?= $cat->term_id ?>" class="Menu_category_posts">

        </div>
      <?php endforeach; ?>
    </ul>
  </div>
</div>