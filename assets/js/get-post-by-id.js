function getPostById() {

    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const catId = link.dataset.id;
            const archiveLink = link.dataset.link;
            const container = document.querySelector(`#category-posts-${catId}`);
            if (!container) return;

            // Ẩn tất cả khối bài viết khác
            const isOpen = container.children.length > 0;
            
            document.querySelectorAll('.category-posts').forEach(div => div.innerHTML = '');
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

function mobileGetPostById() {

    document.querySelectorAll('.MobileBlogmenu-category-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const catId = link.dataset.id;
            const archiveLink = link.dataset.link;
            const container = document.querySelector(`#MobileBlogmenu-category-posts-${catId}`);
            if (!container) return;

            // Ẩn tất cả khối bài viết khác
            const isOpen = container.children.length > 0;
            
            document.querySelectorAll('.MobileBlogmenu-category-posts').forEach(div => div.innerHTML = '');
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

