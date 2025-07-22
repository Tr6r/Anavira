<div class="MobileContainer_Content">
    <!-- <div class="MobileContainer_Items">
        <div class="MobileContainer_Items_Title">
            <h2 class="MobileContainer_Items_Welcome">Chào mừng bạn đến với Anavira</h2>

        </div>
    </div> -->
    <div class="MobileContainer_banner">

        <img class="MobileContainer_banner_Image" src="<?php echo site_url(); ?>/wp-content/uploads/2025/07/banner-scaled.jpg" alt="Banner">
    </div>
    <div class="MobileContainer_Items">
        <div class="MobileContainer_Items_Tilte">
            <div class="MobileContainer_Items_Tilte_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/willow.svg'); ?>
            </div>
            <h2 class='MobileContainer_Items_Tilte_Text'>Ý nghĩa của tên gọi “Anavira” </h2>
        </div>

        <div>
            <p class="MobileContainer_Items_Content">
                “Anavira” là một từ ghép mang cảm hứng từ tiếng Phạn cổ (Sanskrit): Ana có thể hiểu là sự sống, khởi nguyên, sự khởi sinh; Vira có nghĩa là người dũng cảm, kiên cường. Tên gọi này biểu trưng cho hành trình của những con người chọn đứng dậy – đối diện – và tái sinh bằng chính sức mạnh từ thực vật, lòng từ bi và sự thức tỉnh nội tâm.
            </p>
        </div>
    </div>
    <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>

    <div class="MobileContainer_Items">
        <div class="MobileContainer_Items_Tilte">
            <div class="MobileContainer_Items_Tilte_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/willow.svg'); ?>
            </div>
            <h2 class='MobileContainer_Items_Tilte_Text'>WFPB là gì?</h2>
        </div>

        <div>
            <p class="MobileContainer_Items_Content">
                “Anavira” là một từ ghép mang cảm hứng từ tiếng Phạn cổ (Sanskrit): Ana có thể hiểu là sự sống, khởi nguyên, sự khởi sinh; Vira có nghĩa là người dũng cảm, kiên cường. Tên gọi này biểu trưng cho hành trình của những con người chọn đứng dậy – đối diện – và tái sinh bằng chính sức mạnh từ thực vật, lòng từ bi và sự thức tỉnh nội tâm.
            </p>
        </div>
    </div>
    <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>

    <div class="MobileContainer_Guaranty">
        <div class="MobileContainer_Guaranty_Items">
            <div class="MobileContainer_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/vine.svg'); ?>
            </div>
            <div class="MobileContainer_Guaranty_Items_Title">
                Tự nhiên
            </div>
            <div class="MobileContainer_Guaranty_Items_content">
                100% nguyên liệu tự nhiên
            </div>
        </div>
        <div class="MobileContainer_Guaranty_Items">
            <div class="MobileContainer_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/heart.svg'); ?>
            </div>
            <div class="MobileContainer_Guaranty_Items_Title">
                Chữa lành
            </div>
            <div class="MobileContainer_Guaranty_Items_content">
                Giảm viêm, hỗ trợ trao đổi
            </div>
        </div>
        <div class="MobileContainer_Guaranty_Items">
            <div class="MobileContainer_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
            </div>
            <div class="MobileContainer_Guaranty_Items_Title">
                Cam kết
            </div>
            <div class="MobileContainer_Guaranty_Items_content">
                Không phụ gia, không đường
            </div>
        </div>
    </div>

    <p class="MobileHomeHeader_Content_Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>

    <div class="MobileContainer_Buttons">
        <div class="MobileContainer_Buttons_Item" data-url="/">
            <div class="MobileContainer_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/leaf.svg'); ?>
            </div>
            <a class="MobileContainer_Buttons_Item_Navigate" href="">Giới thiệu</a>

        </div>
        <div class="MobileContainer_Buttons_Item" data-url="/">
            <div class="MobileContainer_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
            </div>
            <a class="MobileContainer_Buttons_Item_Navigate" href="">Sản phẩm</a>

        </div>
        <div class="MobileContainer_Buttons_Item" data-url="/blog">
            <div class="MobileContainer_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/pen.svg'); ?>
            </div>
            <a class="MobileContainer_Buttons_Item_Navigate" href="/blog">Bài viết</a>

        </div>
        <div class="MobileContainer_Buttons_Item "data-url="/">
            <div class="MobileContainer_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
            </div>
            <a class="MobileContainer_Buttons_Item_Navigate" href="">Công thức WFPB</a>

        </div>
        <div class="MobileContainer_Buttons_Item" data-url="/">
            <div class="MobileContainer_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
            </div>
            <a class="MobileContainer_Buttons_Item_Navigate" href="">Đặt hàng</a>

        </div>
    </div>
</div>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/change-route.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            changeRouteMobile();
        });
    </script>