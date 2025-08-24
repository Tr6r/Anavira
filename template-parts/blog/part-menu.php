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

$taxonomy = $typepost . '-categories';

// ✅ Chỉ lấy category CHA
$parents = get_terms([
    'taxonomy'   => $taxonomy,
    'hide_empty' => false,
    'parent'     => 0,
]);
?>

<div class="Menu">
    <div class="Menu_Title">Danh mục</div>
    <ul class="Menu_List" id="category-list">
        <?php if (!is_wp_error($parents) && !empty($parents)) : ?>
            <?php foreach ($parents as $cat): ?>
                <li class="Menu_List_Item" data-cat-id="<?= esc_attr($cat->term_id) ?>">
                    <a href="#"
                       class="Menu_category_link"
                       data-id="<?= esc_attr($cat->term_id) ?>"
                       data-link="<?= esc_url(get_term_link($cat)) ?>"
                       data-typepost="<?= esc_attr($typepost) ?>">
                        <?= esc_html($cat->name) ?>
                    </a>

                    <!-- nơi để render CON -->
                    <div id="Menu_children-<?= esc_attr($cat->term_id) ?>" class="Menu_children"></div>
                    <!-- nơi để render POSTS -->
                    <div id="Menu_category_posts-<?= esc_attr($cat->term_id) ?>" class="Menu_category_posts"></div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>
