function changeRoute()
{
    document.querySelectorAll('.HomePage_Container_Buttons_Item').forEach(item => {
        item.addEventListener('click', () => {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
}
function changeRouteMobile()
{
    document.querySelectorAll('.MobileContainer_Buttons_Item').forEach(item => {
        item.addEventListener('click', () => {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
}