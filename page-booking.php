<?php
/**
 * Template Name: Custom Booking Plugin
 * Template Post Type: page
 */

$webhook_url = 'PASTE_WEBHOOK_URL_HERE';

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
$checkout_url = 'https://beta.webmakerr.com/?fluent-cart=instant_checkout&item_id=1&quantity=1';
$webhook_url = trim( $webhook_url );

if ( $webhook_url === 'PASTE_WEBHOOK_URL_HERE' || $webhook_url === '' ) {
    $webhook_url = get_post_meta( get_the_ID(), 'booking_lead_webhook_url', true );
}

if ( ! empty( $webhook_url ) ) {
    $webhook_url = esc_url_raw( $webhook_url );
}

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
        background: linear-gradient(135deg, #1877F2 50%, #000000 50%);
        border-radius: 4px;
        overflow: hidden;
        padding: 24px;
        display: flex;
        align-items: center;
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

    .testimonial-rotate-card {
        transition: opacity 450ms ease, transform 450ms ease;
    }

    .testimonial-rotate-card.is-fading {
        opacity: 0;
        transform: translateY(8px);
    }

    .more-feature-grid {
        --bs-gutter-x: 1.25rem;
        --bs-gutter-y: 1.25rem;
    }

    @media (min-width: 992px) {
        .hero-actions {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .hero-actions .btn {
            width: 100%;
            max-width: 260px;
        }

        .hero-actions .btn + .btn {
            margin-top: 0 !important;
        }
    }

    .mobile-sticky-bar {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1030;
        background: #fff;
        border-top: 1px solid #e5e7eb;
        box-shadow: 0 -4px 16px rgba(15, 23, 42, 0.08);
        padding: 12px 16px;
    }

    @media (max-width: 767.98px) {
        .mobile-sticky-bar {
            display: block;
        }
        .hero-row {
            text-align: center;
        }
        .hero-copy {
            margin: 0 auto;
            max-width: 520px;
        }
        .hero-info-row {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .hero-animation-shell {
            padding: 0;
            min-height: 200px;
        }
        .hero-feature-card {
            padding: 14px;
        }
        .hero-feature-card span {
            margin-top: 8px;
        }
        .hero-feature-card svg {
            width: 52px;
            height: 52px;
        }
        .hero-actions {
            flex-direction: column;
            align-items: center;
            width: 100%;
            gap: 0.75rem;
        }
        .hero-actions .btn {
            width: 100%;
            max-width: 320px;
        }
        .hero-actions .btn + .btn {
            margin-top: 0 !important;
        }
        .hero-copy .badge,
        .hero-copy .text-muted,
        .hero-copy .d-flex {
            justify-content: center;
        }
        .hero-copy .text-muted,
        .hero-copy .hero-title,
        .hero-copy p {
            text-align: center;
        }
    }

    .booking-lead-modal {
        position: fixed;
        inset: 0;
        z-index: 1055;
        display: none;
    }

    .booking-lead-modal.is-open {
        display: block;
    }

    .booking-lead-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        opacity: 0;
        transition: opacity 200ms ease;
    }

    .booking-lead-modal.is-open .booking-lead-backdrop {
        opacity: 1;
    }

    .booking-lead-dialog {
        position: relative;
        margin: 0 auto;
        max-width: 520px;
        background: linear-gradient(150deg, #ffffff 65%, #f8fafc 100%);
        border-radius: 12px;
        box-shadow: 0 25px 55px rgba(15, 23, 42, 0.18);
        padding: 24px;
        top: 50%;
        transform: translateY(-42%);
        opacity: 0;
        transition: opacity 200ms ease, transform 200ms ease;
    }

    .booking-lead-modal.is-open .booking-lead-dialog {
        opacity: 1;
        transform: translateY(-50%);
    }

    .booking-lead-close {
        position: absolute;
        right: 12px;
        top: 12px;
        border: none;
        background: #f1f5f9;
        color: #0f172a;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 18px rgba(15, 23, 42, 0.08);
        transition: background-color 120ms ease, transform 120ms ease;
    }

    .booking-lead-close:hover {
        background: #e2e8f0;
        transform: scale(1.03);
    }

    .booking-lead-highlight {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: #0f172a;
        color: #fff;
        padding: 0.35rem 0.85rem;
        border-radius: 999px;
        font-size: 0.85rem;
        letter-spacing: 0.01em;
    }

    .booking-lead-form label {
        font-weight: 600;
        color: #0f172a;
    }

    .booking-lead-form .form-control,
    .booking-lead-form .form-control:focus {
        border-color: #e2e8f0;
        box-shadow: none;
    }

    .booking-lead-alert {
        display: none;
    }

    .booking-lead-alert.is-visible {
        display: block;
    }

    body.booking-lead-locked {
        overflow: hidden;
    }

    @media (max-width: 575.98px) {
        .booking-lead-dialog {
            margin: 0 14px;
            padding: 20px;
            top: 0;
            transform: translateY(0);
            position: absolute;
            left: 0;
            right: 0;
        }

        .booking-lead-modal.is-open .booking-lead-dialog {
            transform: translateY(0);
        }

        .booking-lead-close {
            width: 32px;
            height: 32px;
        }
    }
</style>

<section class="pt-5 pb-5 bg-light">
    <div class="container-lg">
        <div class="p-4 p-md-5 bg-white border rounded-4 shadow-sm row g-4 align-items-center hero-row">
            <div class="col-lg-6 hero-copy">
                <span class="d-inline-flex align-items-center small bg-light text-secondary px-3 py-1 rounded-pill mb-3">
                    WordPress booking & scheduling automation
                    <svg width="12" height="12" class="ms-2" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 2l4 4-4 4" />
                    </svg>
                </span>

                <h1 class="fw-semibold lh-sm text-dark hero-title">
                    Turn every inquiry into a confirmed booking—automatically.<br>
                </h1>

                <p class="mt-3 text-secondary">
                    FluentBooking keeps calendars synchronized, collects payments, sends reminders, and routes appointments without manual back-and-forth—so teams look polished and close more revenue.
                </p>

                <div class="d-flex flex-wrap hero-actions mt-4">
                    <a href="<?php echo esc_url( $checkout_url ); ?>" class="btn btn-dark btn-lg d-flex align-items-center gap-2 w-100" style="max-width:260px;">
                        <img src="<?php echo esc_url( $theme_dir . '/images/home/user3.png' ); ?>" width="18" alt="Google icon">
                        Order Plugin Now
                    </a>

                    <a href="#lead-capture" class="btn btn-light border btn-lg d-flex align-items-center justify-content-between w-100" style="max-width:260px;" data-open-lead-popup>
                        <span class="text-dark">Get Free Trail</span>
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.4">
                            <path d="M4 2l6 5-6 5" />
                        </svg>
                    </a>
                </div>

                <p class="small text-muted mt-2">Be live in minutes—claim your onboarding slot today</p>

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
                                <p class="fw-semibold text-dark mb-1">Booking System Launch Call</p>
                                <p class="small text-muted mb-0">Plan the calendars, payment steps, and automations that stop no-shows, cut admin time, and increase closed deals.</p>
                            </div>
                            <span class="small text-muted fw-normal hero-pill">Done-for-you delivery</span>
                        </div>

                        <div class="d-flex flex-wrap gap-2 small text-muted mb-3">
                            <span class="border rounded-pill px-3 py-1">90-min rollout plan</span>
                            <span class="border rounded-pill px-3 py-1">Calendar + funnel mapping</span>
                            <span class="border rounded-pill px-3 py-1">Revenue impact forecast</span>
                        </div>

                        <div class="position-relative border rounded-3 p-3 shadow-sm hero-animation-shell">
                            <div class="ratio ratio-16x9 w-100">
                                <video
                                    class="w-100 h-100 rounded-3"
                                    data-src="https://cdn.webmakerr.com/website/booking.mp4"
                                    autoplay
                                    muted
                                    playsinline
                                    loop
                                    controls
                                    preload="none"
                                ></video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var testimonials = [
            {
                quote: '“FluentBooking runs every consult slot for us—no email tag, no conflicts. Demo bookings jumped 38% in month one.”',
                name: 'Noah Patel',
                title: 'Marketing Ops Lead, Horizon Creative',
                initial: 'N'
            },
            {
                quote: '“The booking-to-payment flow replaced three tools and two contractors. It paid for itself in two weeks.”',
                name: 'Melissa Grant',
                title: 'VP Growth, Northwind Legal',
                initial: 'M'
            },
            {
                quote: '“Clients self-schedule coaching, get automatic reminders, and pay on the spot. Our team stopped chasing invoices.”',
                name: 'Sofia Alvarez',
                title: 'Head of Growth, Latitude Labs',
                initial: 'S'
            }
        ];

        var desktopCards = Array.prototype.slice.call(document.querySelectorAll('[data-testimonial-card="desktop"]'));
        var mobileCard = document.querySelector('[data-testimonial-card="mobile"]');
        var activeIndex = 1;
        var rotationDelay = 5000;

        function setCardContent(card, testimonial) {
            if (!card || !testimonial) {
                return;
            }

            var quoteEl = card.querySelector('[data-testimonial-quote]');
            var nameEl = card.querySelector('[data-testimonial-name]');
            var titleEl = card.querySelector('[data-testimonial-title]');
            var initialEl = card.querySelector('[data-testimonial-initial]');

            if (quoteEl) {
                quoteEl.textContent = testimonial.quote;
            }
            if (nameEl) {
                nameEl.textContent = testimonial.name;
            }
            if (titleEl) {
                titleEl.textContent = testimonial.title;
            }
            if (initialEl) {
                initialEl.textContent = testimonial.initial;
            }
        }

        function renderDesktop() {
            if (!desktopCards.length) {
                return;
            }

            var total = testimonials.length;
            var order = [
                (activeIndex + total - 1) % total,
                activeIndex % total,
                (activeIndex + 1) % total
            ];

            desktopCards.forEach(function (card, index) {
                setCardContent(card, testimonials[order[index]]);
            });
        }

        function renderMobile() {
            if (!mobileCard) {
                return;
            }

            setCardContent(mobileCard, testimonials[activeIndex % testimonials.length]);
        }

        function fadeCards(cards, callback) {
            cards.forEach(function (card) {
                card.classList.add('is-fading');
            });

            setTimeout(function () {
                callback();
                requestAnimationFrame(function () {
                    cards.forEach(function (card) {
                        card.classList.remove('is-fading');
                    });
                });
            }, 200);
        }

        function rotateTestimonials() {
            activeIndex = (activeIndex + 1) % testimonials.length;

            fadeCards(desktopCards, renderDesktop);
            fadeCards(mobileCard ? [mobileCard] : [], renderMobile);
        }

        renderDesktop();
        renderMobile();

        setInterval(rotateTestimonials, rotationDelay);
    });
</script>

<section class="py-5 bg-light border-top">
    <div class="container-lg">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <span class="d-inline-flex align-items-center bg-white border px-3 py-1 rounded-pill text-secondary small shadow-sm mb-3">
                Why teams choose FluentBooking
            </span>

            <h2 class="fw-semibold display-6 text-dark lh-sm">
                Everything you need to run bookings on autopilot
            </h2>

            <p class="mt-3 text-secondary">
                Install once and let FluentBooking capture leads, qualify them, and schedule the right meeting with the right person—while your team focuses on closing deals and serving customers.
            </p>

            <a href="<?php echo esc_url( $checkout_url ); ?>" class="btn btn-dark btn-lg mt-4 shadow-sm">
                Order Plugin Now
            </a>
        </div>

        <div class="row g-4 mt-5">
            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">01</span>
                    </span>

                    <h5 class="fw-semibold text-dark">Scheduling that books itself</h5>

                    <p class="text-muted small mt-2">
                        Replace back-and-forth emails with branded booking pages that qualify visitors and lock in the best time with no double-bookings.
                    </p>

                    <img src="https://cdn.webmakerr.com/website/booking1.png" alt="Scheduling that books itself graphic" class="mt-auto pt-3 w-100" style="height: 250px; object-fit: cover;" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">02</span>
                    </span>

                    <h5 class="fw-semibold text-dark">Automated follow-up that converts</h5>

                    <p class="text-muted small mt-2">
                        Trigger confirmations, reminders, and post-meeting nurture sequences that keep prospects engaged and reduce no-shows.
                    </p>

                    <img src="https://alidrives.b-cdn.net/website/booking2.png" alt="Automated follow-up graphic" class="mt-auto pt-3 w-100" style="height: 250px; object-fit: cover;" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded-4 shadow-sm p-4 h-100 d-flex flex-column">
                    <span class="d-flex justify-content-center align-items-center bg-light rounded-3 shadow-sm mb-3" style="width: 48px; height: 48px;">
                        <span class="fw-bold text-secondary small">03</span>
                    </span>

                    <h5 class="fw-semibold text-dark">Integrations built for revenue teams</h5>

                    <p class="text-muted small mt-2">
                        Sync calendars, CRMs, payment gateways, and automation tools so every booking, payment, and pipeline update stays in one flow.
                    </p>

                    <img src="https://alidrives.b-cdn.net/website/booking3.png" alt="Integrations built for revenue teams graphic" class="mt-auto pt-3 w-100" style="height: 250px; object-fit: cover;" />

                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg">
        <h2 class="text-center fw-semibold lh-sm text-dark mb-5" style="font-size: 2.5rem;">
            ...plus everything needed for a professional booking engine
        </h2>

        <div class="row g-4 justify-content-center more-feature-grid">
            <?php
            $icons = [
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="14" width="44" height="30" rx="6"></rect><path d="M10 26h44"></path><path d="M22 8v12"></path><path d="M42 8v12"></path><path d="M20 38h16"></path><path d="M36 38l4 6 8-10"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="12" width="28" height="32" rx="6"></rect><path d="M18 20h12"></path><path d="M18 28h12"></path><path d="M18 36h12"></path><rect x="38" y="18" width="16" height="28" rx="4"></rect><path d="M38 30h16"></path><path d="M38 26l4-4"></path><path d="M54 38l-4 4"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16h24l6 10-18 22-18-22z"></path><path d="M20 16l12 16 12-16"></path><path d="M24 46h16"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M32 12c9.941 0 18 6.716 18 15 0 4.542-2.13 8.766-5.7 11.7L44 46H20l-0.3-7.3C16.13 35.766 14 31.542 14 27c0-8.284 8.059-15 18-15z"></path><path d="M26 46v4a6 6 0 0 0 12 0v-4"></path><path d="M27 30h10"></path><path d="M32 24v12"></path><path d="M40 34l4 4 6-8"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="16" width="40" height="26" rx="5"></rect><path d="M12 26h40"></path><path d="M22 18v6"></path><path d="M42 18v6"></path><path d="M24 38h8"></path><path d="M36 32h6"></path><path d="M20 32h8"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14a6 6 0 1 1-6 6 6 6 0 0 1 6-6z"></path><path d="M46 12a6 6 0 1 1-6 6 6 6 0 0 1 6-6z"></path><path d="M48 38a6 6 0 1 1-6 6 6 6 0 0 1 6-6z"></path><path d="M22 38a6 6 0 1 1-6 6 6 6 0 0 1 6-6z"></path><path d="M24 22 38 18"></path><path d="M46 18 50 32"></path><path d="M22 38l18 6"></path></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 44c0-8.836 7.164-16 16-16h12"></path><path d="M44 16h-8c-8.836 0-16 7.164-16 16v16"></path><path d="M46 28 54 20"></path><path d="M46 28l8 8"></path><circle cx="22" cy="48" r="4"></circle></svg>',
                '<svg viewBox="0 0 64 64" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 42l8-18 8 10 10-18 10 26"></path><path d="M14 52h36"></path><path d="M22 22h-6"></path><path d="M46 18h-8"></path><circle cx="24" cy="50" r="2"></circle><circle cx="40" cy="50" r="2"></circle><path d="M18 12h12l-2 6h-8z"></path><path d="M34 34l6 6"></path></svg>',
            ];

            $labels = [
                'Branded booking pages',
                'Round-robin & pooled calendars',
                'Conversion-optimized intake',
                'Instant confirmations & reminders',
                'Payments, invoices & receipts',
                'CRM & marketing automation sync',
                'Availability rules & routing',
                'Analytics, QA & launch checklists'
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
            Client results
        </span>

        <h2 class="fw-semibold lh-sm text-dark" style="font-size: 2.5rem;">
            Teams booking more revenue on autopilot
        </h2>

        <p class="mt-3 text-secondary small mx-auto" style="max-width: 620px;">
            See how FluentBooking eliminates manual scheduling, speeds up follow-up, and gives every team a polished, conversion-focused booking flow.
        </p>

        <div class="d-none d-md-flex justify-content-center align-items-center gap-4 mt-5" data-testimonial-container="desktop">
            <div class="bg-white border rounded-4 shadow-sm p-4 testimonial-rotate-card" data-testimonial-card="desktop" data-position="left" style="width: 350px; height: 210px; opacity: 0.35; transform: scale(0.94);">
                <p class="text-dark small fst-italic mb-4" data-testimonial-quote="desktop"></p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black" data-testimonial-initial="desktop"></text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1" data-testimonial-name="desktop"></p>
                        <p class="text-muted small m-0" data-testimonial-title="desktop"></p>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-4 shadow-sm p-4 testimonial-rotate-card" data-testimonial-card="desktop" data-position="center" style="width: 420px; height: 230px;">
                <p class="text-dark fw-semibold mb-4" data-testimonial-quote="desktop"></p>

                <div class="d-flex align-items-center">
                    <svg width="40" height="40" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="22" cy="22" r="20" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="22" y="24" text-anchor="middle" font-family="Arial, sans-serif" font-size="18" font-weight="600" fill="black" data-testimonial-initial="desktop"></text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1" data-testimonial-name="desktop"></p>
                        <p class="text-muted small m-0" data-testimonial-title="desktop"></p>
                    </div>
                </div>
            </div>

            <div class="bg-white border rounded-4 shadow-sm p-4 testimonial-rotate-card" data-testimonial-card="desktop" data-position="right" style="width: 350px; height: 210px; opacity: 0.35; transform: scale(0.94);">
                <p class="text-dark small fst-italic mb-4" data-testimonial-quote="desktop"></p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black" data-testimonial-initial="desktop"></text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1" data-testimonial-name="desktop"></p>
                        <p class="text-muted small m-0" data-testimonial-title="desktop"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-none mx-auto mt-4" style="max-width: 380px;" data-testimonial-container="mobile">
            <div class="bg-white border rounded-4 shadow-sm p-4 testimonial-rotate-card" data-testimonial-card="mobile">
                <p class="text-dark fw-semibold mb-4" data-testimonial-quote="mobile"></p>

                <div class="d-flex align-items-center">
                    <svg width="36" height="36" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="20" cy="20" r="18" fill="white" stroke="black" stroke-width="2"></circle>
                        <text x="20" y="22" text-anchor="middle" font-family="Arial, sans-serif" font-size="16" font-weight="600" fill="black" data-testimonial-initial="mobile"></text>
                    </svg>
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-dark small mb-1" data-testimonial-name="mobile"></p>
                        <p class="text-muted small m-0" data-testimonial-title="mobile"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="bg-white border rounded-4 shadow-sm p-4 p-md-5 row g-4 align-items-center">
            <div class="col-md-5 d-flex flex-column align-items-center align-items-md-start text-center text-md-start">
                    <span class="d-inline-flex align-items-center bg-white border px-3 py-1 rounded-pill text-secondary small shadow-sm mb-3">
                    Process
                    </span>

                <h2 class="fw-semibold lh-sm text-dark mb-3" style="font-size: 2.25rem;">
                    Launch bookings without guesswork.
                </h2>

                <p class="text-muted small mb-4" style="max-width: 420px;">
                    We set up availability, routing, payments, and automations with weekly updates—so leadership knows exactly what’s live, what’s next, and when revenue hits.
                </p>

                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start w-100" style="max-width: 420px;">
                    <a href="<?php echo esc_url( $checkout_url ); ?>" class="btn btn-dark btn-lg shadow-sm">Order Plugin Now</a>
                    <a href="#lead-capture" class="btn btn-light border btn-lg" data-open-lead-popup>Get Free Trail</a>
                </div>
            </div>

            <div class="col-md-7">
                <div class="bg-white border rounded-4 shadow-sm overflow-hidden">
                    <div class="p-4 p-md-5">
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden border" style="--bs-border-opacity: 0.35;">
                            <video
                                class="w-100 h-100"
                                data-src="https://cdn.webmakerr.com/website/booking-footer.mp4"
                                style="object-fit: cover;"
                                controls
                                playsinline
                                autoplay
                                muted
                                preload="none"
                            ></video>
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
                    Give customers a fast, professional way to book you—every time.
                    <br class="d-none d-sm-block">Secure your onboarding slot before the calendar fills up.
                </h2>

                <div class="mt-4">
                    <a href="<?php echo esc_url( $checkout_url ); ?>" class="btn btn-dark btn-lg shadow-sm">
                        Order Plugin Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="mobile-sticky-bar d-md-none">
    <div class="container-lg">
        <div class="d-flex gap-2">
            <a href="<?php echo esc_url( $checkout_url ); ?>" class="btn btn-dark btn-lg w-100">
                Order Plugin Now
            </a>
            <a href="#lead-capture" class="btn btn-light border btn-lg w-100 text-dark" data-open-lead-popup>
                Get Free Trail
            </a>
        </div>
    </div>
</div>

<div class="booking-lead-modal" id="bookingLeadModal" data-webhook="<?php echo esc_attr( $webhook_url ); ?>">
    <div class="booking-lead-backdrop" data-close-lead-popup></div>
    <div class="booking-lead-dialog">
        <button type="button" class="booking-lead-close" aria-label="Close" data-close-lead-popup>
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M4 4l10 10M14 4L4 14" />
            </svg>
        </button>

        <div class="booking-lead-highlight mb-3">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path d="M8 1l1.8 3.6L13.8 5 10.9 7.9 11.6 12 8 10.2 4.4 12l.7-4.1L2.2 5l4-.4L8 1z" />
            </svg>
            <span>High-intent booking request</span>
        </div>

        <h3 class="fw-semibold text-dark lh-sm" style="font-size: 1.6rem;">Reserve your FluentBooking build</h3>
        <p class="text-muted mb-4">Tell us where to ship your plugin and we’ll route you to the right onboarding slot.</p>

        <form class="booking-lead-form" id="bookingLeadForm" novalidate>
            <div class="booking-lead-alert alert alert-success" role="status" data-lead-success>
                Got it! Your request is in. Watch your inbox for next steps.
            </div>
            <div class="booking-lead-alert alert alert-danger" role="alert" data-lead-error>
                Something went wrong. Please try again.
            </div>

            <div class="mb-3">
                <label for="bookingLeadName" class="form-label">Name</label>
                <input type="text" class="form-control" id="bookingLeadName" name="name" placeholder="Your full name" required>
            </div>

            <div class="mb-3">
                <label for="bookingLeadEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="bookingLeadEmail" name="email" placeholder="you@example.com" required>
            </div>

            <div class="mb-4">
                <label for="bookingLeadRequest" class="form-label">Where do you want to get the plugin?</label>
                <input type="text" class="form-control" id="bookingLeadRequest" name="plugin_destination" placeholder="Tell us the site or platform" required>
            </div>

            <button type="submit" class="btn btn-dark btn-lg w-100 d-flex align-items-center justify-content-center gap-2" data-lead-submit>
                <span>Get Free Trail</span>
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M4 8h8M9 4l3 4-3 4" />
                </svg>
            </button>
            <p class="small text-muted text-center mt-3 mb-0">We’ll only use your details to confirm delivery and onboarding.</p>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('bookingLeadModal');
        if (!modal) {
            return;
        }

        var body = document.body;
        var form = modal.querySelector('#bookingLeadForm');
        var successAlert = modal.querySelector('[data-lead-success]');
        var errorAlert = modal.querySelector('[data-lead-error]');
        var submitBtn = modal.querySelector('[data-lead-submit]');
        var submitText = submitBtn ? submitBtn.textContent : '';
        var placeholderWebhook = 'PASTE_WEBHOOK_URL_HERE';

        function normalizeWebhook(url) {
            var parsed = (url || '').trim();
            if (!parsed || parsed === placeholderWebhook) {
                return '';
            }
            return parsed;
        }

        var defaultWebhook = normalizeWebhook(modal.getAttribute('data-webhook'));

        function setActiveWebhook(url) {
            modal.dataset.activeWebhook = normalizeWebhook(url);
        }

        function openModal(webhook) {
            setActiveWebhook(webhook || defaultWebhook);
            modal.classList.add('is-open');
            body.classList.add('booking-lead-locked');

            if (errorAlert) {
                errorAlert.classList.remove('is-visible');
                errorAlert.textContent = 'Something went wrong. Please try again.';
            }
            if (successAlert) {
                successAlert.classList.remove('is-visible');
            }
        }

        function closeModal() {
            modal.classList.remove('is-open');
            body.classList.remove('booking-lead-locked');
        }

        var triggers = Array.prototype.slice.call(document.querySelectorAll('[data-open-lead-popup]'));
        Array.prototype.slice.call(document.querySelectorAll('a, button')).forEach(function (node) {
            var text = (node.textContent || '').trim().toLowerCase();
            if (text === 'get free trail' || text === 'get free trial') {
                if (triggers.indexOf(node) === -1) {
                    triggers.push(node);
                }
            }
        });

        triggers.forEach(function (trigger) {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                openModal(normalizeWebhook(trigger.dataset.webhook || trigger.getAttribute('data-webhook')) || defaultWebhook);
            });
        });

        modal.querySelectorAll('[data-close-lead-popup]').forEach(function (closer) {
            closer.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                closeModal();
            }
        });

        if (!form) {
            return;
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (errorAlert) {
                errorAlert.textContent = 'Something went wrong. Please try again.';
                errorAlert.classList.remove('is-visible');
            }
            if (successAlert) {
                successAlert.classList.remove('is-visible');
            }

            var webhookEndpoint = normalizeWebhook(modal.dataset.activeWebhook || defaultWebhook || form.dataset.webhook);
            var formData = new FormData(form);
            var nameValue = (formData.get('name') || '').trim();
            var emailValue = (formData.get('email') || '').trim();
            var pluginRequestValue = (formData.get('plugin_destination') || '').trim();
            var emailIsValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);

            if (!nameValue || !emailIsValid || !pluginRequestValue) {
                if (errorAlert) {
                    errorAlert.textContent = 'Please add your name, a valid email, and where to send the plugin.';
                    errorAlert.classList.add('is-visible');
                }
                return;
            }

            if (!webhookEndpoint) {
                if (errorAlert) {
                    errorAlert.textContent = 'Webhook URL is missing for this page. Set $webhook_url at the top of the template.';
                    errorAlert.classList.add('is-visible');
                }
                return;
            }

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Submitting...';
            }

            var payload = {
                email: emailValue,
                first_name: nameValue,
                fields: {
                    plugin_request: pluginRequestValue
                }
            };

            fetch(webhookEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Request failed (' + response.status + ')');
                    }
                    return response.text();
                })
                .then(function () {
                    if (successAlert) {
                        successAlert.classList.add('is-visible');
                    }
                    if (errorAlert) {
                        errorAlert.classList.remove('is-visible');
                    }
                    form.reset();
                })
                .catch(function (error) {
                    if (errorAlert) {
                        errorAlert.textContent = error.message || 'Could not submit your request right now.';
                        errorAlert.classList.add('is-visible');
                    }
                    if (successAlert) {
                        successAlert.classList.remove('is-visible');
                    }
                })
                .finally(function () {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.textContent = submitText || 'Get Free Trail';
                    }
                });
        });
    });
</script>

<script>
    window.addEventListener('load', function () {
        var lazyVideos = document.querySelectorAll('video[data-src]');

        lazyVideos.forEach(function (video) {
            var source = video.getAttribute('data-src');

            if (!source) {
                return;
            }

            var startPlayback = function () {
                var playPromise = video.play();

                if (playPromise && typeof playPromise.catch === 'function') {
                    playPromise.catch(function () {
                        // Suppress autoplay promise rejections in browsers that block playback.
                    });
                }
            };

            video.muted = true;
            video.setAttribute('muted', '');
            video.setAttribute('autoplay', '');
            video.setAttribute('playsinline', '');
            video.src = source;
            video.removeAttribute('data-src');

            if (video.readyState >= 2) {
                startPlayback();
            } else {
                video.addEventListener(
                    'loadeddata',
                    function handleLoadedData() {
                        video.removeEventListener('loadeddata', handleLoadedData);
                        startPlayback();
                    }
                );
            }
        });
    });
</script>

<?php get_footer(); ?>
