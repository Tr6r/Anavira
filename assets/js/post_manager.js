
function getPostById() {

    document.querySelectorAll('.Menu_category_link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const catId = link.dataset.id;
            const archiveLink = link.dataset.link;
            const container = document.querySelector(`#Menu_category_posts-${catId}`);
            if (!container) return;

            // Ẩn tất cả khối bài viết khác
            const isOpen = container.children.length > 0;

            document.querySelectorAll('.Menu_category_posts').forEach(div => div.innerHTML = '');
            if (isOpen) return;

            // Nạp nội dung mới
            fetch(`/wp-admin/admin-ajax.php?action=get_posts_by_category&cat_id=${catId}`)
                .then(r => r.text())
                .then(html => {
                    container.innerHTML = `
            <a href="${archiveLink}" class="view-all-posts">Tất cả</a>
            ${html}
          `;
                })
                .catch(() => {
                    container.innerHTML = '<p>Lỗi khi tải bài viết.</p>';
                });
        });
    });
}
handlePostExpand();

function handlePostExpand() {

    document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.Items_Content_Expand').forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();

      // Lấy tên class từ id (ví dụ: "Blog_Introduction_Expand_Button" → "Blog_Introduction_Expand")
      const id = this.id.replace('_Button', '');
      const targets = document.querySelectorAll(`.${id}`);

      let anyExpanded = false;

      targets.forEach(target => {
        const isHidden = target.style.display === 'none' || !target.style.display;

        target.style.display = isHidden ? 'flex' : 'none';
        if (isHidden) anyExpanded = true;
      });

      // Cập nhật nội dung nút
      this.textContent = anyExpanded ? '' : 'Xem thêm...';
    });
  });
});


}