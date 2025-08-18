

document.addEventListener('DOMContentLoaded', () => {
    const toolbar = document.getElementById('Toolbar');
    var initialTop = 120; // top ban đầu
    var width = window.innerWidth;
    const minTop = width > 450 ? 0 : -20;     // top nhỏ nhất
    
    if (!toolbar) return;
    if (/^\/(vi|en)\/(recipe|product)\/$/.test(window.location.pathname)) {
    initialTop = 150;
    toolbar.style.top = initialTop + 'px';
}
        window.addEventListener('scroll', () => {
            const scrollAmount = window.scrollY;

            const newTop = Math.max(initialTop - scrollAmount, minTop);
            toolbar.style.top = newTop + 'px';

        });
    
});

