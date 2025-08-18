<?php
global $typepost;

// Xác định loại post hiện tại
if (is_page()) {
    $current_page = get_query_var('pagename');
} else {
    $current_page = get_post_type();
}

switch ($current_page) {
    case 'blog':
    case 'blog-cpt':
        $typepost = 'blog';
        break;
    case 'product':
    case 'product-cpt':
        $typepost = 'product';
        break;
    case 'recipe':
    case 'recipe-cpt':
        $typepost = 'recipe';
        break;
    default:
        $typepost = 'blog';
}

// Lấy categories của CPT tương ứng
$categories = get_terms([
    'taxonomy'   => $typepost . '-categories',
    'hide_empty' => false,
]);
?>

<div class="Menu">
    <div class="Menu_Title">Danh mục</div>
    <ul class="Menu_List" id="category-list">
        <?php foreach ($categories as $cat): ?>
            <li class="Menu_List_Item">
                <a href="#" class="Menu_category_link"
                    data-id="<?= $cat->term_id ?>"
                    data-link="<?= get_term_link($cat) ?>"
                    data-typepost="<?= esc_attr($typepost) ?>">
                    <?= esc_html($cat->name) ?>
                </a>
            </li>
            <div id="Menu_category_posts-<?= $cat->term_id ?>" class="Menu_category_posts"></div>
        <?php endforeach; ?>
    </ul>
</div>