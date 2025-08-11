<div class="video_container active" id="video_container">
    <div  id="video_intro" >

        <video class="video" autoplay controls muted playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/overplay.mp4" type="video/mp4">

        </video>
        <div class="video_controls">
            <button class="video_button" onclick="turnOffVideo()">
                Trang chủ

                <div class="video_controls_icon" title="Trang chủ" data-url="/">
                    <?php echo file_get_contents(get_template_directory() . '/assets/images/home.svg'); ?>
                </div>
            </button>

        </div>
    </div>
</div>