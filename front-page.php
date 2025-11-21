<?php
wp_enqueue_style(
    'bootstrap-5-landing',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    [],
    '5.3.3'
);
wp_enqueue_script(
    'bootstrap-5-landing',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    [],
    '5.3.3',
    true
);

$theme_dir = get_template_directory_uri();

get_header();
?>

<script>
    (function() {
        var ua = (navigator.userAgent || navigator.vendor || window.opera || '').toLowerCase();
        var isFacebookInApp = /fbav|fban|fb_iab|fbiab|fbbv|fbios|fb4a/i.test(ua);
        var isInstagramInApp = /instagram/i.test(ua);
        var isInAppBrowser = isFacebookInApp || isInstagramInApp;

        if (isInAppBrowser) {
            document.documentElement.classList.add('is-inapp-browser');
            if (isFacebookInApp) {
                document.documentElement.classList.add('is-facebook-inapp');
            }

            if (document.body) {
                document.body.classList.add('is-inapp-browser');
                if (isFacebookInApp) {
                    document.body.classList.add('is-facebook-inapp');
                }
            }

            var headEl = document.head || document.getElementsByTagName('head')[0];
            var existingStylesheet = document.querySelector('link[href*="/assets/css/header-modern.css"]');
            var stylesheetHref = '<?php echo esc_url( $theme_dir . '/assets/css/header-modern.css' ); ?>';

            var ensureStylesheet = function(stylesheet) {
                if (!stylesheet) {
                    return false;
                }

                stylesheet.rel = 'stylesheet';
                stylesheet.media = 'all';
                return true;
            };

            if (!ensureStylesheet(existingStylesheet) && headEl) {
                var inAppStylesheet = document.createElement('link');
                inAppStylesheet.rel = 'stylesheet';
                inAppStylesheet.media = 'all';
                inAppStylesheet.href = stylesheetHref + (isFacebookInApp ? '?fb-inapp=1' : '?inapp=1');
                inAppStylesheet.id = 'codex-offcanvas-inapp-style';
                headEl.appendChild(inAppStylesheet);
            } else if (isFacebookInApp && headEl && existingStylesheet) {
                // Facebook's in-app browser intermittently strips stylesheet attributes; reinforce them and bypass caching.
                ensureStylesheet(existingStylesheet);
                if (!existingStylesheet.dataset.fbInapp) {
                    existingStylesheet.dataset.fbInapp = '1';
                    existingStylesheet.href = stylesheetHref + '?fb-inapp=1';
                }
            }
        }
    })();
</script>

<style>
    /* Ensure the mobile side menu logo renders consistently across browsers */
    .codex-offcanvas-logo img {
        display: block;
        max-height: 44px;
        max-width: 180px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .is-inapp-browser .codex-offcanvas-logo img {
        max-height: 44px;
    }

    .is-inapp-browser .codex-offcanvas .codex-offcanvas-links svg,
    .is-inapp-browser .codex-offcanvas .codex-offcanvas-meta svg,
    .is-inapp-browser .codex-offcanvas .cart__icon svg,
    .is-inapp-browser .codex-offcanvas .search-post__icon svg {
        width: 20px;
        height: 20px;
        min-width: 20px;
        min-height: 20px;
        flex-shrink: 0;
    }

    .is-inapp-browser .codex-offcanvas .search-post__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.2rem 0.35rem;
        line-height: 1;
        gap: 0;
    }

    :root {
        --bs-border-radius: 4px;
        --bs-border-radius-sm: 4px;
        --bs-border-radius-lg: 4px;
        --bs-border-radius-xl: 4px;
        --bs-border-radius-xxl: 4px;
        --bs-border-radius-pill: 4px;
    }

    .rounded-circle {
        border-radius: 4px !important;
    }

    .booking-ambient {
        background:
            radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.08), transparent 45%),
            radial-gradient(circle at 80% 0%, rgba(167, 139, 250, 0.08), transparent 35%),
            radial-gradient(circle at 50% 80%, rgba(16, 185, 129, 0.08), transparent 40%);
    }
    .hero-animation-shell {
        min-height: 260px;
        aspect-ratio: 16 / 9;
        background: linear-gradient(135deg, #1877F2 50%, #000000 50%);
        border-radius: 4px;
        overflow: hidden;
        padding: 0;
        position: relative;
        display: flex;
        align-items: stretch;
    }
    .hero-feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1.25rem;
        width: 100%;
    }
    .hero-feature-card {
        background: #fff;
        border-radius: 4px;
        border: 1px solid #e5e7eb;
        text-align: center;
        padding: 16px;
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
    }
    .hero-feature-card svg {
        width: 64px;
        height: 64px;
        stroke: #000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        fill: none;
    }
    .hero-feature-card span {
        display: block;
        margin-top: 12px;
        font-weight: 600;
        color: #0f172a;
    }
    .hero-title {
        font-size: clamp(2rem, 1.5rem + 2vw, 3.4rem);
    }
    .hero-info-row {
        gap: 1rem;
    }
    .hero-pill {
        white-space: nowrap;
    }
    .hero-actions {
        gap: 1rem;
    }
    .hero-media-card {
        padding: 0;
    }
    .hero-video-shell {
        background: linear-gradient(135deg, #1877f2 50%, #000 50%);
        position: relative;
    }
    .hero-video-placeholder-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .hero-video-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }
    .hero-video-overlay .hero-play-badge {
        background: rgba(255, 255, 255, 0.9);
        color: #0f172a;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.2);
        font-weight: 700;
    }
    .hero-video-shell video {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 200ms ease;
        border: 0;
    }
    .hero-video-shell.hero-video-loaded video {
        opacity: 1;
    }
    .hero-video-shell .hero-video-placeholder-img {
        transition: opacity 200ms ease;
    }
    .hero-video-shell.hero-video-loaded .hero-video-placeholder-img,
    .hero-video-shell.hero-video-loaded .hero-video-overlay {
        opacity: 0;
    }
    .feature-card {
        width: 180px;
        height: 180px;
        border-radius: 4px;
    }
    .feature-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 4px;
        background: linear-gradient(135deg, #f9fafb, #eef2f7);
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
    }
    .more-feature-card {
        transition: transform 180ms ease, box-shadow 180ms ease, background-color 180ms ease;
    }
    .more-feature-card:hover {
        transform: scale(1.03);
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.1);
        background-color: #f8fafc;
    }
    .more-feature-card .feature-icon-box svg {
        width: 48px;
        height: 48px;
        stroke: #000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        fill: none;
    }

    @media (max-width: 991.98px) {
        .hero-animation-shell {
            padding: 0;
            min-height: 220px;
            aspect-ratio: 16 / 9;
        }
        .hero-feature-card svg {
            width: 52px;
            height: 52px;
        }
        .hero-actions {
            gap: 0.75rem;
        }
        .hero-actions .btn {
            max-width: none;
            min-height: 52px;
        }
        .hero-media-card {
            padding: 0;
        }
        .hero-video-shell {
            border-radius: 4px;
        }
    }

    @media (max-width: 767.98px) {
        .hero-info-row {
            flex-direction: column;
            align-items: flex-start;
        }
        .hero-animation-shell {
            min-height: 200px;
        }
        .hero-feature-card {
            padding: 14px;
        }
        .hero-feature-card span {
            margin-top: 8px;
        }
        .hero-actions {
            flex-direction: column;
            align-items: stretch;
        }
        .hero-actions .btn {
            width: 100%;
        }
        .hero-media-card {
            padding: 0;
        }
        .hero-video-overlay .hero-play-badge {
            width: 48px;
            height: 48px;
        }
    }
</style>

<section class="pt-5 pb-5 bg-light">
    <div class="container-lg">
        <div class="p-4 p-md-5 bg-white border rounded-4 shadow-sm row g-4 align-items-center">
            <div class="col-lg-6">
                <span class="d-inline-flex align-items-center small bg-light text-secondary px-3 py-1 rounded-pill mb-3">
                    webmakerr.com launches v5.9
                    <svg width="12" height="12" class="ms-2" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 2l4 4-4 4" />
                    </svg>
                </span>

                <h1 class="fw-semibold lh-sm text-dark hero-title">
                    Your Website Must Sell. Not Just Look Nice.<br>
                </h1>

                <p class="mt-3 text-secondary">
                    We build fast, clear, conversion-ready websites with custom functionality tailored to your exact workflow — so visitors understand your offer instantly and turn into buyers.
                </p>

                <div class="d-flex flex-wrap hero-actions mt-4">
                    <button class="btn btn-dark btn-lg d-flex align-items-center gap-2 w-100" style="max-width:260px;">
                        <img src="<?php echo esc_url( $theme_dir . '/images/home/user3.png' ); ?>" width="18" alt="Google icon">
                        Sign up with Google
                    </button>

                    <button class="btn btn-light border btn-lg d-flex align-items-center justify-content-between w-100" style="max-width:260px;">
                        <span class="text-dark">Sign up with email</span>
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 2l6 5-6 5" />
                        </svg>
                    </button>
                </div>

                <p class="small text-muted mt-2">No credit card required</p>

                <div class="d-flex gap-4 mt-4">
                    <img src="<?php echo esc_url( $theme_dir . '/images/trustf/sslupf.svg' ); ?>" height="20" alt="Trustpilot">
                    <img src="<?php echo esc_url( $theme_dir . '/images/trustf/nortonf.svg' ); ?>" height="20" alt="Google Reviews">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative bg-white border rounded-4 shadow-sm overflow-hidden booking-ambient">
                    <div class="p-4 position-relative" style="z-index:2; min-height:350px;">
                        <div class="d-flex justify-content-between align-items-start mb-3 hero-info-row">
                            <div>
                                <p class="fw-semibold text-dark mb-1">Conversion-ready workspace</p>
                                <p class="small text-muted mb-0">Booking, checkout, tracking, and customization—previewed together for a real sales flow.</p>
                            </div>
                            <span class="badge bg-dark small px-3 py-2 hero-pill">Live preview</span>
                        </div>

                        <div class="d-flex flex-wrap gap-2 small text-muted mb-3">
                            <span class="border rounded-pill px-3 py-1">30 min</span>
                            <span class="border rounded-pill px-3 py-1">Virtual / In-person</span>
                            <span class="border rounded-pill px-3 py-1">Timezone aware</span>
                        </div>

                        <div
                            class="position-relative border rounded-3 shadow-sm hero-animation-shell hero-media-card hero-video-shell"
                            data-video-src="https://cdn.webmakerr.com/website/webdesign.mp4"
                        >
                            <img
                                class="hero-video-placeholder-img"
                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20viewBox%3D%270%200%201280%20720%27%20preserveAspectRatio%3D%27xMidYMid%20slice%27%3E%3Cdefs%3E%3ClinearGradient%20id%3D%27g%27%20x1%3D%270%25%27%20y1%3D%27100%25%27%20x2%3D%27100%25%27%20y2%3D%270%25%27%3E%3Cstop%20offset%3D%270%25%27%20stop-color%3D%27%231877f2%27%20stop-opacity%3D%270.95%27/%3E%3Cstop%20offset%3D%27100%25%27%20stop-color%3D%27%23000000%27%20stop-opacity%3D%270.95%27/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect%20fill%3D%27url(%23g)%27%20width%3D%271280%27%20height%3D%27720%27/%3E%3Cpath%20d%3D%27M840%20310c0-11-9-20-20-20H511c-11%200-20%209-20%2020v140c0%2011%209%2020%2020%2020h309c11%200%2020-9%2020%2020V310z%27%20fill%3D%27%23ffffff%27%20fill-opacity%3D%270.08%27%20/%3E%3Crect%20x%3D%27320%27%20y%3D%27240%27%20width%3D%27640%27%20height%3D%27240%27%20rx%3D%2716%27%20ry%3D%2716%27%20fill%3D%27%23ffffff%27%20fill-opacity%3D%270.08%27/%3E%3Cpath%20d%3D%27M640%20240c-88.36%200-160%2071.64-160%20160s71.64%20160%20160%20160%20160-71.64%20160-160S728.36%20240%20640%20240Zm0%20130l80%2030-80%2030Z%27%20fill%3D%27%23ffffff%27%20fill-opacity%3D%270.2%27/%3E%3C/svg%3E"
                                alt="Website demo placeholder"
                                loading="lazy"
                                decoding="async"
                            >
                            <div class="hero-video-overlay">
                                <span class="hero-play-badge">▶</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.addEventListener('load', function() {
        var heroVideoShell = document.querySelector('.hero-video-shell');

        if (!heroVideoShell || heroVideoShell.dataset.loaded === '1') {
            return;
        }

        var videoSrc = heroVideoShell.getAttribute('data-video-src');
        if (!videoSrc) {
            return;
        }

        var videoEl = document.createElement('video');
        videoEl.setAttribute('playsinline', '');
        videoEl.setAttribute('muted', '');
        videoEl.setAttribute('loop', '');
        videoEl.setAttribute('autoplay', '');
        videoEl.setAttribute('controls', '');
        videoEl.className = 'w-100 h-100';
        videoEl.src = videoSrc;

        videoEl.addEventListener('loadeddata', function() {
            heroVideoShell.classList.add('hero-video-loaded');
        });

        heroVideoShell.appendChild(videoEl);
        heroVideoShell.dataset.loaded = '1';
    });
</script>

<section class="py-5 bg-light border-top">
    <div class="container-lg">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <span class="d-inline-flex align-items-center bg-white border px-3 py-1 rounded-pill text-secondary small shadow-sm mb-3">
                What You Get
            </span>

            <h2 class="fw-semibold display-6 text-dark lh-sm">
                Most websites look good but fail to sell
            </h2>

            <p class="mt-3 text-secondary">
                Your website becomes a streamlined sales engine: clear message, clean user flow, and functionality built around your business — not templates.
            </p>

            <button class="btn btn-dark btn-lg mt-4 shadow-sm">
                Get started →
            </button>
        </div>

        <div class="row g-4 mt-5">
            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">01</span>
                    </span>

                    <h5 class="fw-semibold text-dark">A Website Built to Convert</h5>

                    <p class="text-muted small mt-2">
                        Clean structure, clear messaging, modern UI, and a guided flow that leads users to take action.
                    </p>

                    <div class="mt-auto d-flex justify-content-center pt-3">
                        <div class="position-relative border rounded-circle d-flex justify-content-center align-items-center" style="width: 160px; height: 160px;">
                            <span class="position-absolute bg-white px-2 py-1 small border rounded-pill shadow">
                                App
                            </span>

                            <span class="position-absolute top-0 translate-middle-x bg-white p-2 border rounded-circle small shadow">
                                📅
                            </span>
                            <span class="position-absolute start-0 top-50 translate-middle-y bg-white p-2 border rounded-circle small shadow">
                                🔄
                            </span>
                            <span class="position-absolute bottom-0 translate-middle-x bg-white p-2 border rounded-circle small shadow">
                                📆
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">02</span>
                    </span>

                    <h5 class="fw-semibold text-dark">Custom Features That Fit Your Business</h5>

                    <p class="text-muted small mt-2">
                        We extend or modify any plugin so your website works exactly the way you need — no hacks, no limitations.
                    </p>

                    <div class="mt-auto pt-3">
                        <div class="border rounded-3 shadow-sm p-3 bg-white">
                            <div class="d-flex justify-content-between text-dark small mb-2">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="rounded-circle bg-dark d-inline-block" style="width: 8px; height: 8px;"></span> Mon
                                </span>
                                <span>8:30am – 5:00pm</span>
                            </div>

                            <div class="d-flex justify-content-between text-muted small mb-2">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="rounded-circle bg-secondary d-inline-block opacity-50" style="width: 8px; height: 8px;"></span> Tue
                                </span>
                                <span>–</span>
                            </div>

                            <div class="d-flex justify-content-between text-dark small">
                                <span class="d-flex align-items-center gap-2">
                                    <span class="rounded-circle bg-dark d-inline-block" style="width: 8px; height: 8px;"></span> Wed
                                </span>
                                <span>10:00am – 7:00pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">03</span>
                    </span>

                    <h5 class="fw-semibold text-dark">Technical Setup Done for You</h5>

                    <p class="text-muted small mt-2">
                        Speed, hosting, optimization, funnels, tracking, security, automations — everything handled end to end.
                    </p>

                    <div class="mt-auto d-flex justify-content-center pt-3">
                        <div class="position-relative border rounded-circle d-flex justify-content-center align-items-center" style="width: 160px; height: 160px;">
                            <span class="position-absolute bg-white px-2 py-1 small border rounded-pill shadow">
                                App
                            </span>

                            <span class="position-absolute top-0 translate-middle-x bg-white p-2 border rounded-circle small shadow">
                                📅
                            </span>
                            <span class="position-absolute start-0 top-50 translate-middle-y bg-white p-2 border rounded-circle small shadow">
                                🔄
                            </span>
                            <span class="position-absolute bottom-0 translate-middle-x bg-white p-2 border rounded-circle small shadow">
                                📆
                            </span>
                            <span class="position-absolute end-0 top-50 translate-middle-y bg-white p-2 border rounded-circle small shadow">
                                📈
                            </span>

                            <div class="text-center">
                                <svg width="88" height="88" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="10" y="16" width="68" height="52" rx="12" stroke="black" stroke-width="2.5" />
                                    <rect x="22" y="30" width="44" height="30" rx="6" stroke="black" stroke-width="2.5" />
                                    <path d="M22 30h44" stroke="black" stroke-width="2.5" />
                                    <path d="M32 40h20" stroke="black" stroke-width="2.5" />
                                    <path d="M32 48h20" stroke="black" stroke-width="2.5" />
                                </svg>

                                <p class="fw-semibold small text-dark mt-2 mb-0">Home page layout</p>
                                <p class="text-muted small mb-0">Hero CTA above the fold</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg">
        <h2 class="text-center fw-semibold lh-sm text-dark mb-5" style="font-size: 2.5rem;">
            ...and so much more!
        </h2>

        <div class="row g-4 justify-content-center">
            <?php
            $icons = [
                '<svg viewBox="0 0 64 64" aria-hidden="true"><rect x="10" y="18" width="44" height="28" rx="6"></rect><path d="M18 26h12"></path><path d="M18 34h8"></path><path d="M42 34h8"></path><path d="M38 22h14"></path><path d="M32 42l4 4 8-8"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><rect x="10" y="16" width="30" height="32" rx="6"></rect><path d="M26 28c0 3.866-3.134 7-7 7s-7-3.134-7-7 3.134-7 7-7 7 3.134 7 7z"></path><path d="M20 35v5"></path><path d="M40 26l12-7v26l-12-7"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><path d="M22 36l-6 6c-4.418 4.418-4.418 11.582 0 16s11.582 4.418 16 0l6-6"></path><path d="M42 28l6-6c4.418-4.418 4.418-11.582 0-16s-11.582-4.418-16 0l-6 6"></path><path d="M28 36l8-8"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><path d="M32 54c11 0 20-9 20-20V18l-20-8-20 8v16c0 11 9 20 20 20z"></path><path d="M26 32l4 4 8-8"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="32" r="22"></circle><path d="M10 32h44"></path><path d="M32 10c6 6 9 14 9 22s-3 16-9 22c-6-6-9-14-9-22s3-16 9-22z"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><rect x="12" y="14" width="40" height="30" rx="6"></rect><path d="M20 32h24"></path><path d="M28 24l-8 8 8 8"></path><path d="M36 40l8-8-8-8"></path><path d="M24 50h16"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="20" cy="20" r="6"></circle><circle cx="44" cy="16" r="6"></circle><circle cx="48" cy="40" r="6"></circle><circle cx="22" cy="46" r="6"></circle><path d="M25 24l12 8"></path><path d="M26 40l16 0"></path><path d="M40 18l6 14"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true"><path d="M16 20h24c4.418 0 8 3.582 8 8s-3.582 8-8 8H16z"></path><path d="M32 28v-8"></path><path d="M32 44v-8"></path><path d="M16 44h24c4.418 0 8 3.582 8 8s-3.582 8-8 8H16z"></path></svg>',
            ];

            $labels = [
                'Accept payments',
                'Built-in video conferencing',
                'Short booking links',
                'Privacy first',
                '65+ languages',
                'Easy embeds',
                'All your favorite apps',
                'Simple customization'
            ];

            foreach ($labels as $index => $label):
                ?>
                <div class="col-6 col-md-3 d-flex justify-content-center">
                    <div class="feature-card more-feature-card bg-white border rounded-4 shadow-sm d-flex flex-column align-items-center justify-content-center p-3">
                        <div class="feature-icon-box d-flex align-items-center justify-content-center position-relative mb-3">
                            <?php echo $icons[$index]; ?>
                        </div>
                        <p class="fw-medium text-dark small mb-0"><?php echo $label; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg text-center">
        <span class="d-inline-flex align-items-center bg-white border px-3 py-1 rounded-pill text-secondary small shadow-sm mb-3">
            Testimonials
        </span>

        <h2 class="fw-semibold lh-sm text-dark" style="font-size: 2.5rem;">
            Don’t just take our word for it
        </h2>

        <p class="mt-3 text-secondary small mx-auto" style="max-width: 620px;">
            Our users are our best ambassadors. Discover why we’re the top choice for scheduling meetings.
        </p>

        <div class="d-none d-md-flex justify-content-center align-items-center gap-4 mt-5">
            <div class="bg-white border rounded-4 shadow-sm p-4" style="width: 350px; height: 210px; opacity: 0.35; transform: scale(0.94);">
                <p class="text-dark small fst-italic mb-4">
                    “Webmakerr replaced three tools for our studio—our account managers book client sessions, track invoices, and log CRM updates without leaving the dashboard.”
                </p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black">N</text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1">Noah Patel</p>
                        <p class="text-muted small m-0">Operations Lead, Horizon Creative</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-4 shadow-sm p-4" style="width: 420px; height: 230px;">
                <p class="text-dark fw-semibold mb-4">
                    “With Webmakerr’s business OS we automate scheduling, nurture leads through the CRM, and launch campaigns from the same calendar view. It's the command center for our revenue team.”
                </p>

                <div class="d-flex align-items-center">
                    <svg width="40" height="40" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="22" cy="22" r="20" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="22" y="24" text-anchor="middle" font-family="Arial, sans-serif" font-size="18" font-weight="600" fill="black">M</text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1">Melissa Grant</p>
                        <p class="text-muted small m-0">VP Revenue Operations, Northwind Legal</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-4 shadow-sm p-4" style="width: 350px; height: 210px; opacity: 0.35; transform: scale(0.94);">
                <p class="text-dark small fst-italic mb-4">
                    “The marketing and booking modules talk to each other, so every webinar registration creates a CRM record and follow-up workflow automatically.”
                </p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black">S</text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1">Sofia Alvarez</p>
                        <p class="text-muted small m-0">Head of Growth, Latitude Labs</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-none mx-auto mt-4" style="max-width: 380px;">
            <div class="bg-white border rounded-4 shadow-sm p-4">
                <p class="text-dark fw-semibold mb-4">
                    “With Webmakerr’s business OS we automate scheduling, nurture leads through the CRM, and launch campaigns from the same calendar view. It's the command center for our revenue team.”
                </p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black">M</text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1">Melissa Grant</p>
                        <p class="text-muted small m-0">VP Revenue Operations, Northwind Legal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 row g-4 align-items-center">
            <div class="col-md-5 d-flex flex-column">
                <span class="d-inline-flex align-items-center bg-white border px-3 py-1 rounded-pill text-secondary small shadow-sm mb-3">
                    App store
                </span>

                <h2 class="fw-semibold lh-sm text-dark mb-3" style="font-size: 2.25rem;">
                    Integrate Anything<br>Automate Everything.
                </h2>

                <p class="text-muted small mb-4" style="max-width: 420px;">
                    Your entire business runs in one connected system—powered by our custom-built modules and seamless integrations with any plugin.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-dark btn-lg shadow-sm">Get started →</button>
                    <button class="btn btn-light border btn-lg">Explore apps →</button>
                </div>
            </div>

            <div class="col-md-7">
                <div class="border rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center border-end border-bottom p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/visa.svg' ); ?>" class="opacity-75" width="40" alt="Slack">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-end border-bottom p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/master_card.svg' ); ?>" class="opacity-75" width="80" alt="Zapier">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-bottom p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/american_express.svg' ); ?>" class="opacity-75" width="55" alt="Stripe">
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center border-end p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/discover.svg' ); ?>" class="opacity-75" width="60" alt="HubSpot">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-end p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/paypal.svg' ); ?>" class="opacity-75" width="55" alt="Outlook">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/visa.svg' ); ?>" class="opacity-75" width="40" alt="Slack">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="position-relative bg-white border rounded-4 shadow-sm p-4 p-md-5 text-center overflow-hidden">
            <div class="position-absolute top-0 bottom-0 start-0 end-0 opacity-25"
                 style="background-image: radial-gradient(circle at center, #000 1px, transparent 1px), radial-gradient(circle at center, #000 1px, transparent 1px); background-size: 34px 34px; background-position: 0 0, 17px 17px; pointer-events: none;">
            </div>

            <div class="position-relative" style="z-index:2;">
                <h2 class="fw-semibold lh-sm text-dark mx-auto" style="font-size: 2.25rem; max-width: 700px;">
                    Get Your Free Project Plan Today
                    <br class="d-none d-sm-block">Try now!
                </h2>

                <div class="mt-4">
                    <button class="btn btn-dark btn-lg shadow-sm">
                        Get started →
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
