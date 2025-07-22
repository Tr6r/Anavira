<?php
  $iconState;
  if (! is_front_page()) {
    $iconState = true;
  } else {
    $iconState = false;
  }
?>

<div class="Toolbar <?php echo $iconState ? 'has-icon' : 'no-icon'; ?>">

    <?php if ($iconState) : ?>
      <i class='bx bx-menu Toolbar_Icon' id="Toolbar_Icon"></i>

    <?php endif; ?>
    <div class="Toolbar_Menu " id="Toolbar_Menu">
      <?php get_template_part('template-parts/desktop/blog/desktop-part-menu'); ?>

    </div>
    <?php get_template_part('template-parts/desktop/blog/desktop-part-setting'); ?>

</div>