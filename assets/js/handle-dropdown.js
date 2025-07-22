function mobileHandleSettingDropdown() {
  const btn_setting = document.getElementById('BlogSetting_Icon');
  const menu_container = document.getElementById('MobileToolbar_Menu');
  const setting_container = document.getElementById('MobileToolbar_Setting');


  if (!btn_setting && !setting_container) return;

  btn_setting.addEventListener('click', (e) => {
    e.stopPropagation();
    if (menu_container && menu_container.classList.contains('active')) {
      menu_container.classList.remove('active');
    }
    setting_container.classList.toggle('active');
  });
}
function mobileHandleMenuDropdown() {
  const btn_menu = document.getElementById('MobileToolbar_BtnMenu');
  const menu_container = document.getElementById('MobileToolbar_Menu');
  const setting_container = document.getElementById('MobileToolbar_Setting');


  if (!btn_menu && !menu_container) return;

  btn_menu.addEventListener('click', (e) => {
    e.stopPropagation(); // Ngăn không cho lan ra ngoài
    if (setting_container && setting_container.classList.contains('active')) {
      setting_container.classList.remove('active');
    }
    menu_container.classList.toggle('active');
  });

}
function mobileHandleBack() {
  const btn_back = document.getElementById('MobileToolbar_Back');
  const menu_container = document.getElementById('MobileToolbar_Menu');
  btn_back.addEventListener('click', () => {
    menu_container.classList.remove('active');
    setTimeout(() => {
      window.history.back();
    }, 100);
  });
}

function handleClickOutside() {
  const menu_container = document.getElementById('MobileToolbar_Menu');
  const setting_container = document.getElementById('MobileToolbar_Setting');

  document.addEventListener('click', (e) => {
    if (menu_container.classList.contains('active')) {
      menu_container.classList.remove('active');
    }
    else if (setting_container.classList.contains('active')) {
      setting_container.classList.remove('active');
    }
  });
}

function preventDropDownCloseOnClickInside() {
  const menu_container = document.getElementById('MobileToolbar_Menu');
  const setting_container = document.getElementById('MobileToolbar_Setting');
  menu_container.addEventListener('click', (e) => {
    e.stopPropagation();
  });

  setting_container.addEventListener('click', (e) => {
    e.stopPropagation();
  });
}