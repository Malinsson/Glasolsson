import './bootstrap';
import './file-upload-validation';

const CheckScreenSize = () => {
    if (window.innerWidth < 768) {
        document.body.classList.add('mobile');
    } else {
        document.body.classList.remove('mobile');
    }
};

window.addEventListener('resize', CheckScreenSize);
CheckScreenSize();

const loginForm = document.getElementById('login-form');
const loginToggle = document.getElementById('login-toggle');
const closeLogin = document.getElementById('close-login');

if (loginForm && loginToggle && closeLogin) {
    function toggleForm(e) {
        e.preventDefault();
        loginForm.classList.toggle('hidden');
    }

    loginToggle.addEventListener('click', toggleForm);
    closeLogin.addEventListener('click', toggleForm);

    closeLogin.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            toggleForm(e);
        }
    });
};


const menuToggle = document.getElementById('close-sidemenu');
const openMenu = document.getElementById('open-sidemenu');
const menu = document.getElementById('menu');

if (menuToggle && menu && openMenu) {
    menuToggle.addEventListener('click', function() {
        menu.classList.add('-translate-x-full');
        menu.classList.add('opacity-0');
        menu.classList.add('pointer-events-none');
        menu.classList.remove('translate-x-0');
        menu.classList.remove('opacity-100');
        menu.classList.remove('pointer-events-auto');
        openMenu.classList.remove('hidden');
    });

    menuToggle.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            menu.classList.add('-translate-x-full');
            menu.classList.add('opacity-0');
            menu.classList.add('pointer-events-none');
            menu.classList.remove('translate-x-0');
            menu.classList.remove('opacity-100');
            menu.classList.remove('pointer-events-auto');
            openMenu.classList.remove('hidden');
        }
    });

    openMenu.addEventListener('click', function() {
        menu.classList.remove('-translate-x-full');
        menu.classList.remove('opacity-0');
        menu.classList.remove('pointer-events-none');
        menu.classList.add('translate-x-0');
        menu.classList.add('opacity-100');
        menu.classList.add('pointer-events-auto');
        openMenu.classList.add('hidden');
    });

    openMenu.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            menu.classList.remove('-translate-x-full');
            menu.classList.remove('opacity-0');
            menu.classList.remove('pointer-events-none');
            menu.classList.add('translate-x-0');
            menu.classList.add('opacity-100');
            menu.classList.add('pointer-events-auto');
            openMenu.classList.add('hidden');
        }
    });
}

