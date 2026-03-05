import './bootstrap';
import './file-upload-validation';

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
    // Initially hide the open button if menu is visible
    if (!menu.classList.contains('hidden')) {
        openMenu.classList.add('hidden');
    }

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        openMenu.classList.toggle('hidden');
    });

    menuToggle.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            menu.classList.toggle('hidden');
            openMenu.classList.toggle('hidden');
        }
    });

    openMenu.addEventListener('click', function() {
        menu.classList.remove('hidden');
        openMenu.classList.add('hidden');
    });

    openMenu.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            menu.classList.remove('hidden');
            openMenu.classList.add('hidden');
        }
    });
}

