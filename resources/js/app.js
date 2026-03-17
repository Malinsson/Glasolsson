import "./bootstrap";
import "./file-upload-validation";
import "./product-filter";
import "./charts";

// Login Form Toggle
const loginForm = document.getElementById("login-form");
const loginToggle = document.getElementById("login-toggle");
const closeLogin = document.getElementById("close-login");

if (loginForm && loginToggle && closeLogin) {
    function toggleForm(e) {
        e.preventDefault();
        loginForm.classList.toggle("hidden");
        loginForm.classList.add("flex");
        document.body.classList.toggle("overflow-hidden");
    }

    loginToggle.addEventListener("click", toggleForm);
    closeLogin.addEventListener("click", toggleForm);

    closeLogin.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            toggleForm(e);
        }
    });
}

// Side Menu Toggle
const menuToggle = document.getElementById("close-sidemenu");
const openMenu = document.getElementById("open-sidemenu");
const menu = document.getElementById("menu");

if (menuToggle && menu && openMenu) {
    const closeMenu = () => {
        menu.classList.add(
            "-translate-x-full",
            "opacity-0",
            "pointer-events-none",
        );
        menu.classList.remove(
            "translate-x-0",
            "opacity-100",
            "pointer-events-auto",
        );
        openMenu.classList.remove("hidden");
        document.body.classList.remove("overflow-hidden");
    };

    const openSideMenu = () => {
        menu.classList.remove(
            "-translate-x-full",
            "opacity-0",
            "pointer-events-none",
        );
        menu.classList.add(
            "translate-x-0",
            "opacity-100",
            "pointer-events-auto",
        );
        openMenu.classList.add("hidden");
        document.body.classList.add("overflow-hidden");
    };

    menuToggle.addEventListener("click", closeMenu);
    menuToggle.addEventListener(
        "keydown",
        (e) => e.key === "Enter" && closeMenu(),
    );

    openMenu.addEventListener("click", openSideMenu);
    openMenu.addEventListener(
        "keydown",
        (e) => e.key === "Enter" && openSideMenu(),
    );
}

// Delete Confirmation Modal (supports per-row deletes)
const deleteDialog = document.getElementById("delete-confirmation");
const confirmDelete = document.getElementById("confirm-delete");
const cancelDelete = document.getElementById("cancel-delete");
const modalDeleteForm = document.getElementById("modal-delete-form");

if (deleteDialog && confirmDelete && cancelDelete) {
    let activeForm = null;

    const deleteButtons = document.querySelectorAll(
        ".open-delete-modal, #open-delete-modal",
    );

    deleteButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            const url = btn.dataset.deleteUrl;
            if (url && modalDeleteForm) {
                modalDeleteForm.setAttribute("action", url);
                activeForm = null;
            } else {
                const nearestForm = btn.closest("form");
                if (nearestForm) {
                    activeForm = nearestForm;
                } else {
                    activeForm = null;
                }
            }

            deleteDialog.showModal();
            document.body.classList.add("overflow-hidden");
        });
    });

    cancelDelete.addEventListener("click", function () {
        deleteDialog.close();
        document.body.classList.remove("overflow-hidden");
        if (modalDeleteForm) modalDeleteForm.removeAttribute("action");
        activeForm = null;
    });

    confirmDelete.addEventListener("click", function () {
        document.body.classList.remove("overflow-hidden");

        if (modalDeleteForm && modalDeleteForm.getAttribute("action")) {
            modalDeleteForm.submit();
        } else if (activeForm) {
            activeForm.submit();
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const closeButton = document.querySelector("[data-close-success]");
    const successDialog = document.getElementById("success-dialog");

    if (closeButton && successDialog) {
        closeButton.addEventListener("click", function () {
            successDialog.closest(".fixed").remove();
        });
    }

    const closeErrorButton = document.querySelector('[command="close"]');
    const errorDialog = document.getElementById("dialog");

    if (closeErrorButton && errorDialog) {
        closeErrorButton.addEventListener("click", function () {
            errorDialog.closest(".fixed").remove();
        });
    }
});
