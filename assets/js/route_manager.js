// function changeRoute()
// {
//     document.querySelectorAll('.HomePage_Container_Buttons_Item').forEach(item => {
//         item.addEventListener('click', () => {
//             const url = item.getAttribute('data-url');
//             if (url) {
//                 window.location.href = url;
//             }
//         });
//     });
// }
function RouteNavigation() {
    var width = window.innerWidth;
    if (width < 450) {
        document.querySelectorAll('.Mobile_Toolbar_Midle_Icon').forEach(item => {
            item.addEventListener('click', () => {
                const url = item.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
        return
    }
    document.querySelectorAll('.Desktop_Toolbar_Midle_Icon').forEach(item => {
        item.addEventListener('click', () => {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
}


changeToHomePage();
function changeToHomePage() {
    const btn_header = window.innerWidth < 450 ? document.getElementById('mobileHeader') : document.getElementById('desktopHeader');
    if (!btn_header) return
    btn_header.addEventListener('click', () => {
        window.location.href = '/';
    });

}