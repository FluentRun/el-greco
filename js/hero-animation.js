(function () {
    function getAnimationSrc(container) {
        var src = container.getAttribute('data-lottie-src');

        if (!src && window.RaphaelHeroAnimation && window.RaphaelHeroAnimation.animationPath) {
            src = window.RaphaelHeroAnimation.animationPath;
            container.setAttribute('data-lottie-src', src);
        }

        return src;
    }

    function initHeroLottie() {
        if (typeof lottie === 'undefined') {
            return;
        }

        var containers = document.querySelectorAll('[data-hero-lottie]');

        if (!containers.length) {
            return;
        }

        containers.forEach(function (container) {
            if (container.dataset.heroLottieLoaded === 'true') {
                return;
            }

            var src = getAnimationSrc(container);

            if (!src) {
                return;
            }

            container.dataset.heroLottieLoaded = 'true';

            var animation = lottie.loadAnimation({
                container: container,
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: src,
                rendererSettings: {
                    preserveAspectRatio: 'xMidYMid slice',
                    hideOnTransparent: false,
                    className: 'hero-lottie-renderer',
                    progressiveLoad: true
                }
            });

            animation.addEventListener('DOMLoaded', function () {
                container.classList.add('hero-lottie-ready');
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroLottie);
    } else {
        initHeroLottie();
    }
})();
