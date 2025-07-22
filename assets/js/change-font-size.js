const fontVars = ['--font-size-title', '--font-size-base', '--font-size-slogan'];


const getCurrentRem = (variable) => {
    const value = getComputedStyle(document.documentElement).getPropertyValue(variable);
    return parseFloat(value.trim().replace('rem', ''));
};

const setRem = (variable, value) => {
    document.documentElement.style.setProperty(variable, value.toFixed(3) + 'rem');        localStorage.setItem(variable, value);
    localStorage.setItem(variable, value);
    

};

function increaseFontSize() {
    const base = getCurrentRem('--font-size-base');
    if (base >= 1.4) return;

    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value + 0.1);
    });
}
function decreaseFontSize() {
    const base = getCurrentRem('--font-size-base');
    if (base <= 1) return;

    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value - 0.1);

    });
}
function MobileIncreaseFontSize() {
    const base = getCurrentRem('--font-size-base');
    if (base >= 1.0) return;

    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value + 0.1);
    });
}
function mobileDecreaseFontSize() {
    const base = getCurrentRem('--font-size-base');
    if (base <= 0.7) return;

    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value - 0.1);

    });
}
function adjustFontSize()
{

     document.getElementById('increaseBtn').addEventListener('click', () => {
      increaseFontSize();
    });

    document.getElementById('decreaseBtn').addEventListener('click', () => {
      decreaseFontSize();
    });
}
function mobileAdjustFontSize()
{
    
     document.getElementById('increaseBtn').addEventListener('click', () => {
      MobileIncreaseFontSize();
    });

    document.getElementById('decreaseBtn').addEventListener('click', () => {
      mobileDecreaseFontSize();
    });
}

function mobileApplyFontSizes() {
      const defaultfontVars = {
    '--font-size-title': '0.9rem',
    '--font-size-base': '0.7rem',
    '--font-size-slogan': '0.9rem'
  };
    Object.entries(defaultfontVars).forEach(([key, defaultValue]) => {
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