import './bootstrap';
import './file-upload-validation';
import './product-filter';
import './charts';

// Login Form Toggle
const loginForm = document.getElementById('login-form');
const loginToggle = document.getElementById('login-toggle');
const closeLogin = document.getElementById('close-login');

if (loginForm && loginToggle && closeLogin) {
    function toggleForm(e) {
        e.preventDefault();
        loginForm.classList.toggle('hidden');
        loginForm.classList.add('flex');
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
    const closeMenu = () => {
        menu.classList.add('-translate-x-full', 'opacity-0', 'pointer-events-none');
        menu.classList.remove('translate-x-0', 'opacity-100', 'pointer-events-auto');
        openMenu.classList.remove('hidden');
        document.body.classList.remove('overflow-hidden');
    };

    const openSideMenu = () => {
        menu.classList.remove('-translate-x-full', 'opacity-0', 'pointer-events-none');
        menu.classList.add('translate-x-0', 'opacity-100', 'pointer-events-auto');
        openMenu.classList.add('hidden');
        document.body.classList.add('overflow-hidden');
    };

    menuToggle.addEventListener('click', closeMenu);
    menuToggle.addEventListener('keydown', (e) => e.key === 'Enter' && closeMenu());

    openMenu.addEventListener('click', openSideMenu);
    openMenu.addEventListener('keydown', (e) => e.key === 'Enter' && openSideMenu());
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

