// var lang = getCurrentLanguage();

function getCurrentLanguage() {
  var lang = localStorage.getItem('selectedLang');
    if (lang)
      return lang
    return 'vi'
    
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.trp-language-switcher a').forEach(function (el) {
    el.addEventListener('click', function (e) {
      const selectedTitle = el.getAttribute('title'); 
      let nextLang = null;

      if (selectedTitle === 'Tiếng Việt') nextLang = 'vi';
      if (selectedTitle === 'English') nextLang = 'en';

      if (nextLang) {
        localStorage.setItem('selectedLang', nextLang);

      }
    });
  });
});

// document.addEventListener('DOMContentLoaded', function () {
//   document.querySelectorAll('.trp-language-switcher a').forEach(function (el) {
//     el.addEventListener('click', function (e) {
//       let lang = 'unknown';

//       const parent = el.closest('.trp-language-switcher-container');
//       if (parent) {
//         parent.classList.forEach(cls => {
//           if (cls.startsWith('trp-language-') && cls !== 'trp-language-switcher-container') {
//             lang = cls.replace('trp-language-', '');
//           }
//         });
//       }

//       alert('User selected language: ' + lang);

//     });
//   });
// });
