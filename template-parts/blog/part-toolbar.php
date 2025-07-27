  <?php
  $iconState;
  if (! is_front_page()) {
    $iconState = true; //front page là false
  } else {
    $iconState = false;
  }
  ?>

  <div class="Desktop_Toolbar">

    <?php if ($iconState) : ?>
      <i class='bx bx-menu Toolbar_Icon' id="Toolbar_Menu"></i>
    <?php else : ?>

      <div></div>
    <?php endif; ?>

    <div class="Desktop_Toolbar_Midle">
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/about-us">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/leaf.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/blog">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/pen.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
      </div>
    </div>



    <i class='bx  bx-cog Toolbar_Icon' id="Toolbar_Setting"></i>


    <!-- Drop down -->
    <div class="Toolbar_Setting_Dropdown" id="Toolbar_Setting_Dropdown">
      <?php get_template_part('template-parts/blog/part-setting'); ?>
    </div>

    <div class="Toolbar_Menu_Dropdown " id="Toolbar_Menu_Dropdown">
      <?php get_template_part('template-parts/blog/part-menu'); ?>
    </div>
  </div>

  <div class="Mobile_Toolbar">
    <?php if ($iconState) : ?>
      <i class='bx  bx-caret-left bx-flip-vertical Toolbar_Back' id="Mobile_Toolbar_Back"></i>
    <?php else : ?>

      <div></div>
    <?php endif; ?>
  <div class="Desktop_Toolbar_Midle">
      <div class="Desktop_Toolbar_Midle_Icon" data-url="/about-us">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/leaf.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon"  data-url="/">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon"  data-url="/blog">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/pen.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon"  data-url="/">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
      </div>
      <div class="Desktop_Toolbar_Midle_Icon"  data-url="/">
            <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
      </div>
    </div>


    <div class="Toolbar_Right">


      <i class='bx  bx-cog Toolbar_Icon' id="Mobile_Toolbar_Setting"></i>
      <?php if ($iconState) : ?>
        <i class='bx bx-menu Toolbar_Icon' id="Mobile_Toolbar_Menu"></i>

      <?php endif; ?>


    </div>
    <div class="Toolbar_Setting_Dropdown" id="Mobile_Toolbar_Setting_Dropdown">
      <?php get_template_part('template-parts/blog/part-setting'); ?>
    </div>
    <div class="Toolbar_Menu_Dropdown " id="Mobile_Toolbar_Menu_Dropdown">
      <?php get_template_part('template-parts/blog/part-menu'); ?>
    </div>
  </div>