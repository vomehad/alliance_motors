export function menu() {
    const iconMenu = document.querySelector('.menu_icon');
    const menuBody = document.querySelector('.menu_body');
    const header_contact = document.querySelector('.header_contact');
    const phone_contact = document.querySelectorAll('.phone_text');
    const phone_number = document.querySelectorAll('.phone_number');
    
    if (iconMenu) {

        iconMenu.addEventListener('click', () => {

            document.body.classList.toggle('_lock');
            iconMenu.classList.toggle('_active');
            header_contact.classList.toggle('_active');
            menuBody.classList.toggle('_active');
            for (let i = 0; i < phone_contact.length; i++) {
                const element = phone_contact[i];
                element.classList.remove('_scroll');
            }
            for (let i = 0; i < phone_number.length; i++) {
                phone_number[0].classList.remove('_isActive');
                phone_number[1].classList.remove('_scroll');
            }
        })
    }
}