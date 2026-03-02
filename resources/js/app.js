import './bootstrap';

const loginForm = document.getElementById('login-form');
const loginToggle = document.getElementById('login-toggle');
const closeLogin = document.getElementById('close-login');

function toggleForm(e) {
    e.preventDefault();
    loginForm.classList.toggle('hidden');
}

if (loginToggle) {
    loginToggle.addEventListener('click', toggleForm);
}

if (closeLogin) {
    closeLogin.addEventListener('click', toggleForm);
    closeLogin.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            toggleForm(e);
        }
    });
}