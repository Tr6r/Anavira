let lastScroll = 0;
const toolbar = document.getElementById('Toolbar');
const maxScroll = 140; // scroll dừng trừ top
const initialTop = 120; // top ban đầu
const minTop = -20;     // top nhỏ nhất

window.addEventListener('scroll', () => {
    const scrollAmount = window.scrollY;

    // top mới = initialTop - scrollAmount, clamp từ minTop tới initialTop
    const newTop = Math.max(initialTop - scrollAmount, minTop);
    toolbar.style.top = newTop + 'px';

    console.log("Scroll:", scrollAmount, "Top hiện tại:", newTop);
});