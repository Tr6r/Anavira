function RouteNavigation() {
  var lang = getCurrentLanguage();

  const width = window.innerWidth;
  const selector = width < 450 ? '.Mobile_Toolbar_Midle_Icon' : '.Desktop_Toolbar_Midle_Icon';

  document.querySelectorAll(selector).forEach(item => {
    item.addEventListener('click', () => {
      console.log("heh")
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


