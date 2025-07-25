var Device = detectDevice(); // true: mobile, false: desktop
var flagIsChangeDevice = Device;
const fontVarsDesktop = {
    '--font-size-title': '1.3rem',
    '--font-size-base': '1rem',
    '--font-size-slogan': '1.875rem'
};

const fontVarsMobile = {
    '--font-size-title': '1rem',
    '--font-size-base': '0.7rem',
    '--font-size-slogan': '1rem'
}


window.addEventListener('resize', function () {
    Device = detectDevice();

    if (flagIsChangeDevice != Device) {
        flagIsChangeDevice = Device;
        if (Device)
            applyFontSizesWhenChangeDevice(fontVarsMobile);
        else
            applyFontSizesWhenChangeDevice(fontVarsDesktop);
    }

});

applyFontSizes(Device ? fontVarsMobile : fontVarsDesktop);

function detectDevice()
{
    if (window.innerWidth <= 450)
        return true;
    else
        return false;
}

function applyFontSizesWhenChangeDevice(fontVars)
{
    Object.entries(fontVars).forEach(([key, defaultValue]) => {

        const value = defaultValue;

        const finalValue = typeof value === 'string' && value.endsWith('rem') ? value : `${value}rem`;
        // console.log(finalValue);
        document.documentElement.style.setProperty(key, finalValue);

            localStorage.setItem(key, defaultValue); // lưu số thôi
        
    });
}

function applyFontSizes(fontVars) {

    Object.entries(fontVars).forEach(([key, defaultValue]) => {

        const saved = localStorage.getItem(key);
        const value = saved || defaultValue;

        const finalValue = typeof value === 'string' && value.endsWith('rem') ? value : `${value}rem`;
        document.documentElement.style.setProperty(key, finalValue);

        if (!saved) {
            localStorage.setItem(key, defaultValue); // lưu số thôi
        }
    });
}

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
    if (base >= 1.4 && !Device) return;
    if (base >= 0.9 && Device) return;

    const fontVars = Object.keys(fontVarsDesktop);

    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value + 0.1);
    });
}

function decreaseFontSize() {
    const base = getCurrentRem('--font-size-base');
    if (base <= 1 && !Device) return;
    if (base <= 0.7 && Device) return;

    const fontVars = Object.keys(fontVarsDesktop);
    fontVars.forEach(variable => {
        const value = getCurrentRem(variable);
        setRem(variable, value - 0.1);

    });
}