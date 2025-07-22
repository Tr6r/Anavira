  <?php
  $iconState;
  if (! is_front_page()) {
    $iconState = true;
  } else {
    $iconState = false;
  }
  ?>

  <div class="MobileToolbar">
    <i class='bx  bx-caret-left bx-flip-vertical MobileToolbar_Icon' id="MobileToolbar_Back"></i>
    <div>


      <i class='bx  bx-cog BlogSetting_Icon' id="BlogSetting_Icon"></i>
      <?php if ($iconState) : ?>
        <i class='bx bx-menu BlogSetting_Icon' id="MobileToolbar_BtnMenu"></i>

      <?php endif; ?>


    </div>
<div class="MobileToolbar_Setting" id="MobileToolbar_Setting">
      <?php get_template_part('template-parts/mobile/blog/mobile-part-setting'); ?>
    </div>
    <div class="MobileToolbar_Menu " id="MobileToolbar_Menu">
      <?php get_template_part('template-parts/mobile/blog/mobile-part-menu'); ?>
    </div>
  </div>

