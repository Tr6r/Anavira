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
function RouteNavigation()
{
    document.querySelectorAll('.Frontpage_Container_Buttons_Item').forEach(item => {
        item.addEventListener('click', () => {
            const url = item.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
}