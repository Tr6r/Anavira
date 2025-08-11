  <?php
  $iconState;
  if (! is_front_page() && ! is_page('About')) {
    $iconState = true; //front page là false
  } else {
    $iconState = false;
  }
  ?>
  <div class="Toolbar_Container">


    <div class="Desktop_Toolbar">


      <?php if ($iconState) : ?>
        <div class="Toolbar_Icon" id="Toolbar_Menu">
          <i class='bx bx-menu '></i>
        </div>
      <?php else : ?>

        <div></div>
      <?php endif; ?>

      <div class="Desktop_Toolbar_Midle">
        <div class="Desktop_Toolbar_Midle_Icon" title="Trang chủ" data-url="/">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/home.svg'); ?>
        </div>
        <div class="Desktop_Toolbar_Midle_Icon" title="Về chúng tôi" data-url="/about-us">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/aboutus.svg'); ?>
        </div>

        <div class="Desktop_Toolbar_Midle_Icon" title="Bài viết" data-url="/blog">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/blog.svg'); ?>
        </div>

        <div class="Desktop_Toolbar_Midle_Icon" title="Sản phẩm" data-url="/product">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
        </div>
        <div class="Desktop_Toolbar_Midle_Icon" title="Công thức WFPB" data-url="/recipe">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
        </div>
      </div>

      <div class="Desktop_Toolbar_Midle_Icon_Setting" id="Toolbar_Setting" title="Cài đặt">
        <?php echo file_get_contents(get_template_directory() . '/assets/images/setting.svg'); ?>
      </div>
    </div>

    <div class="Mobile_Toolbar">

      <div class="Mobile_Toolbar_Midle">
        <div class="Mobile_Toolbar_Midle_Icon" data-url="/">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/home.svg'); ?>
        </div>
        <div class="Mobile_Toolbar_Midle_Icon" data-url="/about-us">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/aboutus.svg'); ?>
        </div>

        <div class="Mobile_Toolbar_Midle_Icon" data-url="/blog">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/blog.svg'); ?>
        </div>

       <div class="Mobile_Toolbar_Midle_Icon" data-url="/product">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
        </div>

        <div class="Mobile_Toolbar_Midle_Icon" data-url="/recipe">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
        </div>

        <div class="Desktop_Toolbar_Midle_Icon_Setting" id="Mobile_Toolbar_Setting" title="Cài đặt">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/setting.svg'); ?>
        </div>

      </div>
      <?php if ($iconState) : ?>
        <div class="Toolbar_Icon" id="Mobile_Toolbar_Menu">
          <i class='bx bx-menu '></i>
        </div>
      <?php endif; ?>


    </div>



    <div class="Toolbar_Setting_Dropdown" id="Toolbar_Setting_Dropdown">
      <?php get_template_part('template-parts/blog/part-setting'); ?>
    </div>
    <div class="Toolbar_Menu_Dropdown " id="Toolbar_Menu_Dropdown">
      <?php get_template_part('template-parts/blog/part-menu'); ?>
    </div>
  </div>