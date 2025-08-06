

document.addEventListener('DOMContentLoaded', function () {
    videoManager();
    const video_container = document.getElementById('video_container');

    var videoFlag = sessionStorage.getItem('video_intro');// true la da xem
        if (videoFlag !== 'true') {
        // Chưa xem → gỡ active để hiện video
        video_container.classList.remove('active');

        // Đánh dấu là đã xem
        sessionStorage.setItem('video_intro', 'true');
    }
});


function videoManager() {
    const video = document.getElementById('video_intro');
    const video_container = document.getElementById('video_container');

    if (video && video_container) {
        video.addEventListener('ended', function () {

            setTimeout(function () {
                video_container.classList.add('active');
            }, 1);
        });
    }
}

    function turnOffVideo() {
    const container = document.getElementById('video_container');
    if (container) {
      container.classList.add('active');
    }
  }
