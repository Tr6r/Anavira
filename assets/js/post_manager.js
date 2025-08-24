function getPostById() {
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.Menu_category_link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const catId = link.dataset.id;
                const archiveLink = link.dataset.link;
                const container = document.querySelector(`#Menu_category_posts-${catId}`);
                if (!container) return;

                // Ẩn tất cả các category khác
                const isOpen = container.children.length > 0;
                document.querySelectorAll('.Menu_category_posts').forEach(div => div.innerHTML = '');
                if (isOpen) return;
                const typepost = link.dataset.typepost;

                // Fetch bài viết từ AJAX
                fetch(`${PostAjaxVars.ajaxurl}?action=get_posts_by_category&cat_id=${catId}&typepost=${typepost}&nonce=${PostAjaxVars.nonce}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const posts = data.data;
                            const htmlPosts = posts.map(post => `<li><a href="${post.url}">${post.title}</a></li>`).join('');
                            container.innerHTML = `
                            <a href="${archiveLink}" class="view-all-posts">Tất cả</a>
                            <ul>${htmlPosts}</ul>
                        `;
                        } else {
                            container.innerHTML = `<p>${data.data}</p>`;
                        }
                    })
                    .catch(() => {
                        container.innerHTML = '<p>Lỗi khi tải bài viết.</p>';
                    });
            });
        });
    });

}
function setupCategoryMenu() {
    document.addEventListener('DOMContentLoaded', () => {
        const list = document.getElementById('category-list');
        if (!list) return;

        list.addEventListener('click', (e) => {
            const link = e.target.closest('.Menu_category_link');
            if (!link) return;
            e.preventDefault();

            const catId = link.dataset.id;
            const typepost = link.dataset.typepost;
            const archiveLink = link.dataset.link;
            const li = link.closest('.Menu_List_Item');
            if (!li) return;

            const childrenContainer = li.querySelector('#Menu_children-' + catId) || (() => {
                const d = document.createElement('div');
                d.id = 'Menu_children-' + catId;
                d.className = 'Menu_children';
                li.appendChild(d);
                return d;
            })();

            const postContainer = li.querySelector('#Menu_category_posts-' + catId) || (() => {
                const d = document.createElement('div');
                d.id = 'Menu_category_posts-' + catId;
                d.className = 'Menu_category_posts';
                li.appendChild(d);
                return d;
            })();

            // Nếu đang mở -> đóng lại (toggle)
            if (childrenContainer.innerHTML || postContainer.innerHTML) {
                childrenContainer.innerHTML = '';
                postContainer.innerHTML = '';
                return;
            }

            // Đóng tất cả mục NGANG CẤP trước khi mở cái mới
            const parentLi = link.closest('.Menu_List_Item');
            const siblingLis = parentLi.parentElement.querySelectorAll(':scope > .Menu_List_Item');

            siblingLis.forEach(sib => {
                if (sib !== parentLi) {
                    const sibChildren = sib.querySelector('.Menu_children');
                    const sibPosts = sib.querySelector('.Menu_category_posts');
                    if (sibChildren) sibChildren.innerHTML = '';
                    if (sibPosts) sibPosts.innerHTML = '';
                }
            });

            // 1) Thử lấy danh mục con
            fetch(`${PostAjaxVars.ajaxurl}?action=get_child_terms&cat_id=${catId}&typepost=${typepost}&nonce=${PostAjaxVars.nonce}`)
                .then(res => res.json())
                .then(resp => {
                    if (resp.success && resp.data.length) {
                        // Có con -> render list con
                        const items = resp.data.map(t => `
              <li class="Menu_List_Item" data-cat-id="${t.id}">
                <a href="#" class="Menu_category_link"
                   data-id="${t.id}"
                   data-link="${t.link}"
                   data-typepost="${typepost}">
                  ${t.name}
                </a>
                <div id="Menu_children-${t.id}" class="Menu_children"></div>
                <div id="Menu_category_posts-${t.id}" class="Menu_category_posts"></div>
              </li>
            `).join('');

                        childrenContainer.innerHTML = `
              <ul class="Menu_List Menu_List--child">
                ${items}
              </ul>
            `;
                    } else {
                        // Không có con -> lấy bài viết
                        fetch(`${PostAjaxVars.ajaxurl}?action=get_posts_by_category&cat_id=${catId}&typepost=${typepost}&nonce=${PostAjaxVars.nonce}`)
                            .then(r => r.json())
                            .then(data => {
                                if (data.success) {
                                    const posts = data.data.map(p => `<li><a href="${p.url}">${p.title}</a></li>`).join('');
                                    postContainer.innerHTML = `
                    <a href="${archiveLink}" class="view-all-posts">Tất cả</a>
                    <ul class="Menu_Posts">${posts}</ul>
                  `;
                                } else {
                                    postContainer.innerHTML = `<p>${data.data}</p>`;
                                }
                            })
                            .catch(() => {
                                postContainer.innerHTML = '<p>Lỗi khi tải bài viết.</p>';
                            });
                    }
                })
                .catch(() => {
                    childrenContainer.innerHTML = '<p>Lỗi khi tải danh mục con.</p>';
                });
        });
    });
}
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

setupCategoryMenu();
handlePostExpand();