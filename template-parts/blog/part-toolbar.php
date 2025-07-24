  <?php
  $iconState;
  if (! is_front_page()) {
    $iconState = true; //front page là false
  } else {
    $iconState = false;
  }
  ?>

  <div class="Toolbar">
    <?php if ($iconState) : ?>
    <i class='bx  bx-caret-left bx-flip-vertical Toolbar_Back' id="Toolbar_Back"></i>
    <?php else : ?>
      <div></div>
    <?php endif; ?>
    <div>


      <i class='bx  bx-cog Toolbar_Icon' id="Toolbar_Setting"></i>
      <?php if ($iconState) : ?>
        <i class='bx bx-menu Toolbar_Icon' id="Toolbar_Menu"></i>

      <?php endif; ?>


    </div>
    <div class="Toolbar_Setting_Dropdown" id="Toolbar_Setting_Dropdown">
      <?php get_template_part('template-parts/blog/part-setting'); ?>
    </div>
    <div class="Toolbar_Menu_Dropdown " id="Toolbar_Menu_Dropdown">
      <?php get_template_part('template-parts/blog/part-menu'); ?>
    </div>
  </div>