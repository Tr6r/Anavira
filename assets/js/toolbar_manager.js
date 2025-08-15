

document.addEventListener('DOMContentLoaded', () => {
    const toolbar = document.getElementById('Toolbar');
    var initialTop = 120; // top ban đầu
    const minTop = -20;     // top nhỏ nhất

    if (!toolbar) return;
    if (window.location.pathname.includes('/product/') || window.location.pathname.includes('/recipe/')) {
        initialTop = 150;
        toolbar.style.top = initialTop + 'px';
    }
    window.addEventListener('scroll', () => {
        const scrollAmount = window.scrollY;

        // top mới = initialTop - scrollAmount, clamp từ minTop tới initialTop
        const newTop = Math.max(initialTop - scrollAmount, minTop);
        toolbar.style.top = newTop + 'px';

    });
});

