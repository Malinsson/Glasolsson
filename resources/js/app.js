import './bootstrap';
import './file-upload-validation';

// Login Form Toggle
const loginForm = document.getElementById('login-form');
const loginToggle = document.getElementById('login-toggle');
const closeLogin = document.getElementById('close-login');

if (loginForm && loginToggle && closeLogin) {
    function toggleForm(e) {
        e.preventDefault();
        loginForm.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    loginToggle.addEventListener('click', toggleForm);
    closeLogin.addEventListener('click', toggleForm);

    closeLogin.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            toggleForm(e);
        }
    });
};

// Side Menu Toggle
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
        document.body.classList.remove('overflow-hidden');
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
            document.body.classList.remove('overflow-hidden');
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
        document.body.classList.add('overflow-hidden');
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
            document.body.classList.add('overflow-hidden');
        }
    });
}

// Delete Confirmation Modal
const openDeleteModal = document.getElementById('open-delete-modal');
const deleteDialog = document.getElementById('delete-confirmation');
const confirmDelete = document.getElementById('confirm-delete');
const cancelDelete = document.getElementById('cancel-delete');
const deleteForm = document.getElementById('delete-form');

if (openDeleteModal && deleteDialog && confirmDelete && cancelDelete && deleteForm) {
    openDeleteModal.addEventListener('click', function () {
        deleteDialog.showModal();
        document.body.classList.add('overflow-hidden');
    });

    cancelDelete.addEventListener('click', function () {
        deleteDialog.close();
        document.body.classList.remove('overflow-hidden');
    });

    confirmDelete.addEventListener('click', function () {
        document.body.classList.remove('overflow-hidden');
        deleteForm.submit();
    });
}

