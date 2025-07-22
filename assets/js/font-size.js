function applyFontSizes() {
  const fontVars = {
    '--font-size-title': '1.5rem',
    '--font-size-base': '1rem',
    '--font-size-slogan': '1.875rem'
  };

    Object.entries(fontVars).forEach(([key, defaultValue]) => {
  const saved = localStorage.getItem(key);
  const value = saved || defaultValue;

  // Đảm bảo giá trị có đơn vị rem
  const finalValue = typeof value === 'string' && value.endsWith('rem') ? value : `${value}rem`;

  document.documentElement.style.setProperty(key, finalValue);

  if (!saved) {
    localStorage.setItem(key, defaultValue); // lưu số thôi
  }
});
}