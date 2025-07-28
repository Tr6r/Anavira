function handleSettingDropdown() {
  var width = window.innerWidth;
  const btn_setting = width < 450 ? document.getElementById('Mobile_Toolbar_Setting') : document.getElementById('Toolbar_Setting');
  // const menu_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Menu_Dropdown') : document.getElementById('Toolbar_Menu_Dropdown');
  // const setting_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Setting_Dropdown') : document.getElementById('Toolbar_Setting_Dropdown');

const menu_dropdown =document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown =document.getElementById('Toolbar_Setting_Dropdown');

  if (!btn_setting || !setting_dropdown) return;

  btn_setting.addEventListener('click', (e) => {
    e.stopPropagation();
    if (menu_dropdown && menu_dropdown.classList.contains('active')) {
      menu_dropdown.classList.remove('active');
    }
    setting_dropdown.classList.toggle('active');
  });
}
function handleMenuDropdown() {
  var width = window.innerWidth;
  // const btn_menu = width < 450 ? document.getElementById('Mobile_Toolbar_Menu') : document.getElementById('Toolbar_Menu');
  // const menu_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Menu_Dropdown') : document.getElementById('Toolbar_Menu_Dropdown');
  // const setting_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Setting_Dropdown') : document.getElementById('Toolbar_Setting_Dropdown');
  const btn_menu = width < 450 ? document.getElementById('Mobile_Toolbar_Menu') : document.getElementById('Toolbar_Menu');
const menu_dropdown =document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown =document.getElementById('Toolbar_Setting_Dropdown');

  if (!btn_menu || !menu_dropdown) return;

  btn_menu.addEventListener('click', (e) => {
    e.stopPropagation(); // Ngăn không cho lan ra ngoài
    if (setting_dropdown && setting_dropdown.classList.contains('active')) {
      setting_dropdown.classList.remove('active');
    }
    menu_dropdown.classList.toggle('active');
  });

}
function handleBack() {
  const btn_back = document.getElementById('Mobile_Toolbar_Back');
  // const menu_dropdown = document.getElementById('Mobile_Toolbar_Menu_Dropdown');
  const menu_dropdown =document.getElementById('Toolbar_Menu_Dropdown');
  // const setting_dropdown =document.getElementById('Toolbar_Setting_Dropdown');

  if (!btn_back || !menu_dropdown) return;
  btn_back.addEventListener('click', () => {
    menu_dropdown.classList.remove('active');
    setTimeout(() => {
      window.history.back();
    }, 100);
  });
}

function handleClickOutside() {
  var width = window.innerWidth;
  // const menu_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Menu_Dropdown') : document.getElementById('Toolbar_Menu_Dropdown');
  // const setting_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Setting_Dropdown') : document.getElementById('Toolbar_Setting_Dropdown');
const menu_dropdown =document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown =document.getElementById('Toolbar_Setting_Dropdown');

  document.addEventListener('click', (e) => {
    if (menu_dropdown && menu_dropdown.classList.contains('active')) {
      menu_dropdown.classList.remove('active');
    }
    else if (setting_dropdown && setting_dropdown.classList.contains('active')) {
      setting_dropdown.classList.remove('active');
    }
  });
}

function preventDropDownCloseOnClickInside() {
  var width = window.innerWidth;

  // const menu_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Menu_Dropdown') : document.getElementById('Toolbar_Menu_Dropdown');
  // const setting_dropdown = width < 450 ? document.getElementById('Mobile_Toolbar_Setting_Dropdown') : document.getElementById('Toolbar_Setting_Dropdown');
const menu_dropdown =document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown =document.getElementById('Toolbar_Setting_Dropdown');

  menu_dropdown.addEventListener('click', (e) => {
    e.stopPropagation();
  });

  setting_dropdown.addEventListener('click', (e) => {
    e.stopPropagation();
  });
}