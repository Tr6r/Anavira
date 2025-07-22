<div class="BlogSetting">
  <i class='bx  bx-cog BlogSetting_Icon' id="BlogSetting_Icon"></i>

  <div class="BlogSetting_Container" id="BlogSetting_Container">
    <div class="BlogSetting_Container_Title">
      Cài đặt
    </div>
    <div class="BlogSetting_Container_Language">
      <div class="BlogSetting_Container_Language_Title">
        Ngôn ngữ
      </div>
      <div class="BlogSetting_Container_Language_Option">
        <?php echo do_shortcode('[language-switcher]'); ?>
      </div>
    </div>
    <div class="BlogSetting_Container_Fontsize">
      Cỡ chữ
      <div class="BlogSetting_Container_Fontsize_Option">
        <button id="decreaseBtn">
          <i class="bx bx-minus"></i>
        </button>

        <button id="increaseBtn">
          <i class="bx bx-plus"></i>
        </button>
      </div>

    </div>
  </div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/change-font-size.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const icon = document.getElementById('BlogSetting_Icon');
    const container = document.getElementById('BlogSetting_Container');

    if (!icon || !container) return;
    // Toggle menu khi click icon
    icon.addEventListener('click', (e) => {
      e.stopPropagation();

      container.classList.toggle('active');

      if (container.classList.contains('active')) {
        container.style.maxHeight = '200px'; // hiện ra
        container.style.padding = '10px';
      } else {
        container.style.maxHeight = '0'; // thu lại
        container.style.padding = '0';
      }
    });

    // Click ngoài thì đóng
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.BlogSetting')) {
        if (container.classList.contains('active')) {
          container.classList.remove('active');
          container.style.maxHeight = '0';
        }
      }
    });

  
    document.getElementById('increaseBtn').addEventListener('click', () => {
      console.log('click');
      increaseFontSize();
    });

    document.getElementById('decreaseBtn').addEventListener('click', () => {
      decreaseFontSize();
    });

  });
</script>