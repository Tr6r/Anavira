function handleSettingDropdown() {
  const btn_setting = document.getElementById('Toolbar_Setting');
  const menu_dropdown = document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown = document.getElementById('Toolbar_Setting_Dropdown');


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
  const btn_menu = document.getElementById('Toolbar_Menu');
 const menu_dropdown = document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown = document.getElementById('Toolbar_Setting_Dropdown');


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
  const btn_back = document.getElementById('Toolbar_Back');
  const menu_dropdown = document.getElementById('Toolbar_Menu_Dropdown');
  if (!btn_back || !menu_dropdown) return;
  btn_back.addEventListener('click', () => {
    menu_dropdown.classList.remove('active');
    setTimeout(() => {
      window.history.back();
    }, 100);
  });
}

function handleClickOutside() {
 const menu_dropdown = document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown = document.getElementById('Toolbar_Setting_Dropdown');
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
 const menu_dropdown = document.getElementById('Toolbar_Menu_Dropdown');
  const setting_dropdown = document.getElementById('Toolbar_Setting_Dropdown');
  menu_dropdown.addEventListener('click', (e) => {
    e.stopPropagation();
  });

  setting_dropdown.addEventListener('click', (e) => {
    e.stopPropagation();
  });
}