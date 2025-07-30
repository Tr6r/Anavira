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
  var lang = getCurrentLanguage();

  const width = window.innerWidth;
  const selector = width < 450 ? '.Mobile_Toolbar_Midle_Icon' : '.Desktop_Toolbar_Midle_Icon';

  document.querySelectorAll(selector).forEach(item => {
    item.addEventListener('click', () => {
      let url = item.getAttribute('data-url');
      if (url) {
        // Đảm bảo không có dấu / thừa
        if (url.startsWith('/')) url = url.slice(1);
        const finalUrl = (lang === 'vi' ? '/' : `/${lang}/`) + url;
        window.location.href = finalUrl;
      }
    });
  });
}



changeToHomePage();
function changeToHomePage() {
    const btn_header = window.innerWidth < 450 ? document.getElementById('mobileHeader') : document.getElementById('desktopHeader');
    // if (!btn_header) return
    // btn_header.addEventListener('click', () => {
    //     window.location.href = '/';
    // });

}