    <div class="Toolbar_Setting_Dropdown_Title">
        Cài đặt
    </div>
    <div class="Toolbar_Setting_Dropdown_Language">
        <div class="Toolbar_Setting_Dropdown_Language_Title">
            Ngôn ngữ
        </div>
        <div class="Toolbar_Setting_Dropdown_Language_Option">
            <?php echo do_shortcode('[language-switcher]'); ?>
        </div>
    </div>
    <div class="Toolbar_Setting_Dropdown_Fontsize">
        Cỡ chữ
        <div class="Toolbar_Setting_Dropdown_Fontsize_Option">
            <button id="decreaseBtn" onclick="decreaseFontSize()">
                <i class="bx bx-minus"></i>
            </button>

            <button id="increaseBtn" onclick="increaseFontSize()">
                <i class="bx bx-plus"></i>
            </button>
        </div>

    </div>
