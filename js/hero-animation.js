(function () {
    function initHeroLottie() {
        if (typeof lottie === 'undefined') {
            return;
        }

        var container = document.querySelector('[data-hero-lottie]');
        if (!container) {
            return;
        }

        var src = container.getAttribute('data-lottie-src');
        if (!src) {
            return;
        }

        lottie.loadAnimation({
            container: container,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: src,
            rendererSettings: {
                preserveAspectRatio: 'xMidYMid meet',
                hideOnTransparent: false,
                className: 'hero-lottie-renderer'
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroLottie);
    } else {
        initHeroLottie();
    }
})();
