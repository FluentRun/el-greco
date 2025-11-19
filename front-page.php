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

wp_enqueue_script(
    'lottie-web',
    'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js',
    [],
    '5.12.2',
    true
);

wp_enqueue_script(
    'hero-lottie-animation',
    get_template_directory_uri() . '/js/hero-animation.js',
    [ 'lottie-web' ],
    null,
    true
);

$theme_dir = get_template_directory_uri();

get_header();
?>

<style>
    .booking-ambient {
        background:
            radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.08), transparent 45%),
            radial-gradient(circle at 80% 0%, rgba(167, 139, 250, 0.08), transparent 35%),
            radial-gradient(circle at 50% 80%, rgba(16, 185, 129, 0.08), transparent 40%);
    }
    .hero-animation-shell {
        min-height: 260px;
        background: #0f172a;
        border-radius: 24px;
        overflow: hidden;
    }
    .hero-animation-shell .hero-lottie-target {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        background: #0f172a;
    }
    .hero-animation-shell .hero-lottie-target svg,
    .hero-animation-shell .hero-lottie-target canvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }
    .feature-card {
        width: 180px;
        height: 180px;
        border-radius: 28px;
    }
    .feature-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: #f5f5f5;
        border: 1px solid #e5e7eb;
    }
</style>

<section class="pt-5 pb-5 bg-light">
    <div class="container-lg">
        <div class="p-4 p-md-5 bg-white border rounded-4 shadow-sm row g-4 align-items-center">
            <div class="col-lg-6">
                <span class="d-inline-flex align-items-center small bg-light text-secondary px-3 py-1 rounded-pill mb-3">
                    Cal.com launches v5.9
                    <svg width="12" height="12" class="ms-2" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 2l4 4-4 4" />
                    </svg>
                </span>

                <h1 class="fw-semibold display-5 lh-sm text-dark">
                    Your Website Must Sell. Not Just Look Nice.<br>
                </h1>

                <p class="mt-3 text-secondary">
                    We build fast, clear, conversion-ready websites with custom functionality tailored to your exact workflow — so visitors understand your offer instantly and turn into buyers.
                </p>

                <button class="mt-4 btn btn-dark btn-lg d-flex align-items-center gap-2 w-100" style="max-width:260px;">
                    <img src="<?php echo esc_url( $theme_dir . '/images/home/user3.png' ); ?>" width="18" alt="Google icon">
                    Sign up with Google
                </button>

                <button class="mt-2 btn btn-light border btn-lg d-flex align-items-center justify-content-between w-100" style="max-width:260px;">
                    <span class="text-dark">Sign up with email</span>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.4">
                        <path d="M4 2l6 5-6 5" />
                    </svg>
                </button>

                <p class="small text-muted mt-2">No credit card required</p>

                <div class="d-flex gap-4 mt-4">
                    <img src="<?php echo esc_url( $theme_dir . '/images/trustf/sslupf.svg' ); ?>" height="20" alt="Trustpilot">
                    <img src="<?php echo esc_url( $theme_dir . '/images/trustf/nortonf.svg' ); ?>" height="20" alt="Google Reviews">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative bg-white border rounded-4 shadow-sm overflow-hidden booking-ambient">
                    <div class="p-4 position-relative" style="z-index:2; min-height:350px;">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex gap-3">
                                <img src="<?php echo esc_url( $theme_dir . '/images/home/user2.png' ); ?>" class="rounded-circle" width="48" height="48" alt="Profile">
                                <div>
                                    <p class="fw-medium mb-1 small text-dark">Isabella Valce</p>
                                    <p class="fw-semibold text-dark mb-1">Creative Photoshoot</p>
                                    <p class="small text-muted">A modern booking experience that moves smoothly from availability to confirmation.</p>
                                </div>
                            </div>
                            <span class="badge bg-dark small px-3 py-2">Live preview</span>
                        </div>

                        <div class="d-flex flex-wrap gap-2 small text-muted mb-3">
                            <span class="border rounded-pill px-3 py-1">30 min</span>
                            <span class="border rounded-pill px-3 py-1">Virtual / In-person</span>
                            <span class="border rounded-pill px-3 py-1">Timezone aware</span>
                        </div>

                        <div class="position-relative border rounded-3 p-3 shadow-sm hero-animation-shell">
                            <div
                                class="hero-lottie-target rounded-4"
                                data-hero-lottie
                                data-lottie-src="<?php echo esc_url( $theme_dir . '/assets/animations/hero-explainer.json' ); ?>"
                                role="img"
                                aria-label="Webmakerr hero automation explainer animation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

                    <div class="mt-auto pt-3">
                        <div class="border rounded-3 p-3 bg-white shadow-sm">
                            <div class="row g-3">
                                <div class="col text-center">
                                    <div class="rounded-circle bg-light" style="width:56px; height:56px;"></div>
                                </div>
                                <div class="col text-center">
                                    <div class="rounded-circle bg-light" style="width:56px; height:56px;"></div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-4 mt-3 fs-4 text-muted">
                                <span>🎤</span>
                                <span>🎥</span>
                                <span>💬</span>
                                <span>🔗</span>
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
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <?php
                $icons = ['💳', '🎥', '🔗', '✔️', '🌐', '📥', '⭐', '💬'];
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
                ?>
                <div class="col-6 col-md-3 d-flex justify-content-center">
                    <div class="feature-card bg-white border rounded-4 shadow-sm d-flex flex-column align-items-center justify-content-center p-3">
                        <div class="feature-icon-box d-flex align-items-center justify-content-center position-relative mb-3">
                            <span class="position-absolute top-0 start-0 translate-middle bg-secondary rounded-circle opacity-50" style="width:4px; height:4px;"></span>
                            <span class="position-absolute top-0 end-0 translate-middle bg-secondary rounded-circle opacity-50" style="width:4px; height:4px;"></span>
                            <span class="position-absolute bottom-0 start-0 translate-middle bg-secondary rounded-circle opacity-50" style="width:4px; height:4px;"></span>
                            <span class="position-absolute bottom-0 end-0 translate-middle bg-secondary rounded-circle opacity-50" style="width:4px; height:4px;"></span>
                            <span class="fs-4"><?php echo $icons[$i - 1]; ?></span>
                        </div>
                        <p class="fw-medium text-dark small mb-0"><?php echo $labels[$i - 1]; ?></p>
                    </div>
                </div>
            <?php endfor; ?>
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
                    <div class="rounded-circle bg-secondary" style="width:36px; height:36px;"></div>
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
                    <div class="rounded-circle bg-secondary" style="width:40px; height:40px;"></div>
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
                    <div class="rounded-circle bg-secondary" style="width:36px; height:36px;"></div>
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
                    <div class="rounded-circle bg-secondary" style="width:36px; height:36px;"></div>
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
                        <div class="col-4 d-flex justify-content-center align-items-center border-end border-bottom p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/discover.svg' ); ?>" class="opacity-75" width="60" alt="HubSpot">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-end border-bottom p-4" style="height:120px;"></div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-bottom p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/paypal.svg' ); ?>" class="opacity-75" width="55" alt="Outlook">
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center border-end p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/maestro.svg' ); ?>" class="opacity-75" width="80" alt="Salesforce">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center border-end p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/payment_methods/western.svg' ); ?>" class="opacity-75" width="45" alt="Google Meet">
                        </div>

                        <div class="col-4 d-flex justify-content-center align-items-center p-4" style="height:120px;">
                            <img src="<?php echo esc_url( $theme_dir . '/images/trustf/goDaddyf.svg' ); ?>" class="opacity-75" width="45" alt="Google Calendar">
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
