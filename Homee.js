document.addEventListener('DOMContentLoaded', function() {
    const adminLoginBtn = document.getElementById('admin-login-btn');
    const adminLoginPopup = document.getElementById('admin-login-popup');
    const closePopupBtn = document.getElementById('close-popup-btn');

    if (adminLoginBtn && adminLoginPopup && closePopupBtn) {
        adminLoginBtn.addEventListener('click', function() {
            adminLoginPopup.style.display = 'block';
        });

        closePopupBtn.addEventListener('click', function() {
            adminLoginPopup.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === adminLoginPopup) {
                adminLoginPopup.style.display = 'none';
            }
        });
    }
});
