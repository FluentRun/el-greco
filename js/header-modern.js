(function () {
    'use strict';

    var header = document.querySelector('.codex-header');
    if (!header) {
        return;
    }

    var toggleShadow = function () {
        if (window.scrollY > 10) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    };

    document.addEventListener('scroll', toggleShadow, { passive: true });
    window.addEventListener('load', toggleShadow);
})();
