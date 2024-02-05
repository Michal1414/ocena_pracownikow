const wrapper = document.querySelector('.wrapper');
const to_register_button = document.querySelector('.login-register');
const to_login_button = document.querySelector('.register-login');
const to_register_button_nav = document.querySelector('.login-register_nav');
const to_login_button_nav = document.querySelector('.register-login_nav');

to_register_button.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});
to_register_button_nav.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});
to_login_button.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});
to_login_button_nav.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});