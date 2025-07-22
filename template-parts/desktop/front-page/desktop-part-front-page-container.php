<div class="HomePage_Container">
    <!-- <div class="HomePage_Container_Items">
        <h1 class="HomePage_Container_Items_Welcome">Chào mừng bạn đến với Anavira</h1>
    </div> -->
    <div class="HomePage_Container_banner">

        <img class="HomePage_Container_banner_Image" src="<?php echo site_url(); ?>/wp-content/uploads/2025/07/banner-scaled.jpg" alt="Banner">
    </div>
    <div class="HomePage_Container_Items">
        <div class="HomePage_Container_Items_Tilte">
            <div class="HomePage_Container_Items_Tilte_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/willow.svg'); ?>
            </div>
            <h1 class='HomePage_Container_Items_Tilte_Text'>Ý nghĩa của tên gọi “Anavira” </h1>
        </div>


        <div>
            <p class="HomePage_Container_Items_Text">
                “Anavira” là một từ ghép mang cảm hứng từ tiếng Phạn cổ (Sanskrit): Ana có thể hiểu là sự sống, khởi nguyên, sự khởi sinh; Vira có nghĩa là người dũng cảm, kiên cường. Tên gọi này biểu trưng cho hành trình của những con người chọn đứng dậy – đối diện – và tái sinh bằng chính sức mạnh từ thực vật, lòng từ bi và sự thức tỉnh nội tâm.
            </p>
        </div>
    </div>
    <p class="Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>

    <div class="HomePage_Container_Items">
        <div class="HomePage_Container_Items_Tilte">
            <div class="HomePage_Container_Items_Tilte_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/willow.svg'); ?>
            </div>
            <h1 class='HomePage_Container_Items_Tilte_Text'>WFPB là gì? </h1>
        </div>


        <div>
            <p class="HomePage_Container_Items_Text">
                WFPB là viết tắt của Whole Food, Plant-Based – ăn thuần chay toàn phần từ thực phẩm nguyên chất chưa qua tinh luyện. Không dầu, không chất bảo quản, không hương liệu nhân tạo. Chỉ thực vật nguyên bản – lành mạnh – đủ chất – chữa lành từ bên trong. </p>
        </div>
    </div>
    <p class="Slogan">Thức tỉnh - Mạnh mẽ - Tái sinh</p>
    <div class="HomePage_Container_Guaranty">
        <div class="HomePage_Container_Guaranty_Items">
            <div class="HomePage_Container_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/vine.svg'); ?>
            </div>
            <div class="HomePage_Container_Guaranty_Items_Title">
                Tự nhiên
            </div>
            <div class="HomePage_Container_Guaranty_Items_content">
                100% nguyên liệu toàn phần
            </div>
        </div>
        <div class="HomePage_Container_Guaranty_Items">
            <div class="HomePage_Container_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/heart.svg'); ?>
            </div>
            <div class="HomePage_Container_Guaranty_Items_Title">
                Chữa lành
            </div>
            <div class="HomePage_Container_Guaranty_Items_content">
                Giảm viêm, hỗ trợ trao đổi
            </div>
        </div>
        <div class="HomePage_Container_Guaranty_Items">
            <div class="HomePage_Container_Guaranty_Items_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
            </div>
            <div class="HomePage_Container_Guaranty_Items_Title">
                Không thỏa hiệp
            </div>
            <div class="HomePage_Container_Guaranty_Items_content">
                Không phụ gia, không đường, không dầu
            </div>
        </div>
    </div>



    <div class="HomePage_Container_Buttons">
        <div class="HomePage_Container_Buttons_Item" data-url="/gioi-thieu">
            <div class="HomePage_Container_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/leaf.svg'); ?>
            </div>
            <div class="HomePage_Container_Buttons_Item_Content">Giới thiệu</div>
        </div>

        <div class="HomePage_Container_Buttons_Item" data-url="/san-pham">
            <div class="HomePage_Container_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/food.svg'); ?>
            </div>
            <div class="HomePage_Container_Buttons_Item_Content">Sản phẩm</div>
        </div>

        <div class="HomePage_Container_Buttons_Item" data-url="/blog">
            <div class="HomePage_Container_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/pen.svg'); ?>
            </div>
            <div class="HomePage_Container_Buttons_Item_Content">Bài viết</div>
        </div>

        <div class="HomePage_Container_Buttons_Item" data-url="/cong-thuc-wfpb">
            <div class="HomePage_Container_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/recipe.svg'); ?>
            </div>
            <div class="HomePage_Container_Buttons_Item_Content">Công thức WFPB</div>
        </div>

        <div class="HomePage_Container_Buttons_Item" data-url="/dat-hang">
            <div class="HomePage_Container_Buttons_Item_Icon">
                <?php echo file_get_contents(get_template_directory() . '/assets/images/cart.svg'); ?>
            </div>
            <div class="HomePage_Container_Buttons_Item_Content">Đặt hàng</div>
        </div>
    </div>



    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/change-route.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            changeRoute();
        });
    </script>