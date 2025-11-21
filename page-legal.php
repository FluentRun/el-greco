<?php
/**
 * Template Name: Legal Portal
 * Template Post Type: page
 */

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

    .legal-ambient {
        background:
            radial-gradient(circle at 15% 20%, rgba(46, 158, 255, 0.08), transparent 45%),
            radial-gradient(circle at 80% 0%, rgba(67, 56, 202, 0.08), transparent 35%),
            radial-gradient(circle at 60% 85%, rgba(16, 185, 129, 0.1), transparent 40%);
    }

    .legal-hero {
        background: linear-gradient(135deg, #1877f2 52%, #0b0b0f 48%);
        border-radius: 4px;
        overflow: hidden;
        padding: 36px;
        color: #fff;
        position: relative;
        box-shadow: 0 30px 45px rgba(15, 23, 42, 0.22);
    }

    .legal-hero:before,
    .legal-hero:after {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        z-index: 0;
    }

    .legal-hero:before {
        top: -60px;
        right: -40px;
    }

    .legal-hero:after {
        bottom: -80px;
        left: -60px;
    }

    .legal-hero h1,
    .legal-hero p {
        position: relative;
        z-index: 1;
    }

    .legal-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
    }

    .legal-card:hover {
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.1);
        transform: translateY(-2px);
        transition: transform 180ms ease, box-shadow 180ms ease;
    }

    .legal-badge {
        background: #e0f2fe;
        color: #0b6bcf;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 0.85rem;
    }

    .legal-cta-btn {
        padding: 12px 18px;
        font-weight: 600;
        border-radius: 4px;
    }

    .legal-link {
        color: #1877f2;
        text-decoration: none;
        font-weight: 600;
    }

    .legal-link:hover {
        color: #0a5ac0;
    }

    .legal-pill {
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #0f172a;
        border-radius: 999px;
        padding: 10px 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .legal-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 4px;
        background: linear-gradient(135deg, #f9fafb, #eef2f7);
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .legal-icon-box svg {
        width: 28px;
        height: 28px;
    }

    .legal-placeholder {
        width: 100%;
        height: 120px;
        border-radius: 4px;
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 80" preserveAspectRatio="none"%3E%3Cdefs%3E%3ClinearGradient id="g" x1="0" y1="0" x2="1" y2="1"%3E%3Cstop offset="0%25" stop-color="%23e5e7eb"/%3E%3Cstop offset="100%25" stop-color="%23cbd5e1"/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width="120" height="80" fill="url(%23g)" rx="8"/%3E%3Cpath d="M18 55l16-18 12 12 20-26 16 20" fill="none" stroke="%238f9bad" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/%3E%3C/svg%3E');
        background-size: cover;
        background-position: center;
    }

    .legal-list-check {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: #0f172a;
    }

    .legal-list-check svg {
        width: 18px;
        height: 18px;
        color: #16a34a;
    }

    .legal-side-card {
        background: #0b0b0f;
        color: #e2e8f0;
        border-radius: 4px;
        padding: 20px;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .legal-side-card:after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        bottom: -40px;
        right: -40px;
    }

    @media (max-width: 767px) {
        .legal-hero {
            padding: 28px;
        }
    }
</style>

<div class="legal-ambient py-5">
    <div class="container">
        <div class="legal-hero mb-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <div class="d-inline-flex align-items-center gap-2 mb-3">
                        <span class="legal-badge">Legal Portal</span>
                        <span class="legal-pill"><span class="badge bg-success rounded-pill">New</span> Updated compliance center</span>
                    </div>
                    <h1 class="fw-bold display-5 mb-3">Webmakerr Legal &amp; Trust Center</h1>
                    <p class="fs-5 mb-4">Navigate our policies, compliance resources, and trust commitments—all in one streamlined hub tailored for Webmakerr clients and partners.</p>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <a class="btn btn-light text-dark legal-cta-btn" href="mailto:legal@webmakerr.com">Contact Legal</a>
                        <a class="btn btn-outline-light legal-cta-btn" href="https://webmakerr.com/privacy-policy" target="_blank" rel="noopener">Privacy Policy</a>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success rounded-pill">Available 24/7</span>
                            <span class="badge bg-warning text-dark rounded-pill">Compliance First</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="legal-card p-3 bg-white text-dark position-relative">
                        <div class="legal-placeholder mb-3"></div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-3">
                                <div class="legal-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M8 6h9" />
                                        <path d="M8 10h9" />
                                        <path d="M8 14h5" />
                                        <path d="M4 6l0 12" />
                                        <path d="M20 6l0 12" />
                                        <path d="M4 18h16" />
                                        <path d="M4 6h16" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-1 fw-bold">Resource Spotlight</p>
                                    <small class="text-muted">Updated weekly by Webmakerr legal team</small>
                                </div>
                            </div>
                            <span class="badge bg-light text-dark border">v3.2</span>
                        </div>
                        <p class="mb-3">Download our most recent Data Processing Agreement, security overview, and platform compliance summaries.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a class="legal-pill" href="#policies"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 2l6 3v4c0 3.14-2.69 5.88-6 7-3.31-1.12-6-3.86-6-7V5l6-3z"/></svg> Core Policies</a>
                            <a class="legal-pill" href="#trust"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M10 2l6 3-6 3-6-3 6-3zm0 6.5l6-3V11c0 3.08-2.69 5.82-6 7-3.31-1.18-6-3.92-6-7V5.5l6 3z"/></svg> Trust Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="legal-card p-3 h-100 d-flex align-items-center gap-3">
                    <div class="legal-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3l7 4v10l-7 4-7-4V7z" />
                            <path d="M12 3v18" />
                            <path d="M5 7l14 8" />
                            <path d="M19 7l-14 8" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 fw-bold">Security</p>
                        <small class="text-muted">Infrastructure, SOC &amp; encryption</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="legal-card p-3 h-100 d-flex align-items-center gap-3">
                    <div class="legal-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20" />
                            <path d="M5 7h14" />
                            <path d="M5 12h14" />
                            <path d="M5 17h14" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 fw-bold">Privacy</p>
                        <small class="text-muted">Data Processing Agreement, GDPR</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="legal-card p-3 h-100 d-flex align-items-center gap-3">
                    <div class="legal-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 21V5l7-3 7 3v16l-7 3z" />
                            <path d="M9 10l6 4" />
                            <path d="M9 14l6-4" />
                            <path d="M12 12l0 8" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 fw-bold">Terms</p>
                        <small class="text-muted">Platform use &amp; service commitments</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="legal-card p-3 h-100 d-flex align-items-center gap-3">
                    <div class="legal-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 5h18" />
                            <path d="M3 10h18" />
                            <path d="M5 15h14" />
                            <path d="M7 20h10" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-1 fw-bold">Resources</p>
                        <small class="text-muted">Guides, FAQs, and templates</small>
                    </div>
                </div>
            </div>
        </div>

        <div id="policies" class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="legal-card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-uppercase text-muted fw-bold mb-1">Policies</p>
                            <h3 class="fw-bold mb-0">Core documents</h3>
                        </div>
                        <a class="legal-link" href="https://webmakerr.com/legal">View all</a>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100 d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Terms of Service</span>
                                    <span class="badge bg-light text-dark border">Updated Jan 2024</span>
                                </div>
                                <p class="text-muted mb-2">Understand how Webmakerr protects users and ensures platform reliability.</p>
                                <div class="d-flex gap-2 align-items-center mt-auto">
                                    <span class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> Service guarantees</span>
                                    <a class="legal-link" href="https://webmakerr.com/terms-of-service" target="_blank" rel="noopener">Read</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100 d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Privacy Policy</span>
                                    <span class="badge bg-light text-dark border">Updated Feb 2024</span>
                                </div>
                                <p class="text-muted mb-2">Learn how we collect, process, and safeguard data with transparency.</p>
                                <div class="d-flex gap-2 align-items-center mt-auto">
                                    <span class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> GDPR-ready</span>
                                    <a class="legal-link" href="https://webmakerr.com/privacy-policy" target="_blank" rel="noopener">Read</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100 d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Data Processing Agreement</span>
                                    <span class="badge bg-light text-dark border">Updated Mar 2024</span>
                                </div>
                                <p class="text-muted mb-2">Review Webmakerr responsibilities as your data processor and partner.</p>
                                <div class="d-flex gap-2 align-items-center mt-auto">
                                    <span class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> SCC &amp; subprocessor clarity</span>
                                    <a class="legal-link" href="https://webmakerr.com/dpa" target="_blank" rel="noopener">Download</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 h-100 d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">Cookie Policy</span>
                                    <span class="badge bg-light text-dark border">Updated Jan 2024</span>
                                </div>
                                <p class="text-muted mb-2">See how Webmakerr uses cookies to improve experience and analytics.</p>
                                <div class="d-flex gap-2 align-items-center mt-auto">
                                    <span class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> Consent controls</span>
                                    <a class="legal-link" href="https://webmakerr.com/cookie-policy" target="_blank" rel="noopener">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="legal-card p-4 h-100">
                    <p class="text-uppercase text-muted fw-bold mb-2">Support</p>
                    <h4 class="fw-bold mb-3">Need a signed agreement?</h4>
                    <p class="text-muted">Reach out for MSAs, NDAs, or custom compliance requests. We respond within one business day.</p>
                    <div class="d-flex flex-column gap-2 mt-3">
                        <a class="btn btn-primary" href="mailto:legal@webmakerr.com">Contact legal team</a>
                        <a class="btn btn-outline-primary" href="https://cal.com/webmakerr/legal" target="_blank" rel="noopener">Book a compliance call</a>
                        <div class="d-flex align-items-center gap-2 text-muted">
                            <svg width="18" height="18" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2l6 3v4c0 3.14-2.69 5.88-6 7-3.31-1.12-6-3.86-6-7V5l6-3z"/></svg>
                            <small>Regional support for EU/UK/US clients</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="trust" class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="legal-card p-4 h-100 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Trust &amp; Security</h4>
                        <span class="badge bg-success">Operational</span>
                    </div>
                    <div class="legal-placeholder mb-3"></div>
                    <p class="text-muted">Review Webmakerr uptime commitments, incident response program, and security certifications.</p>
                    <div class="d-flex gap-3 flex-wrap mt-auto">
                        <span class="legal-pill">Status page</span>
                        <span class="legal-pill">Security overview</span>
                        <span class="legal-pill">Incident library</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="legal-card p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Compliance</h4>
                        <span class="badge bg-light text-dark border">Quarterly review</span>
                    </div>
                    <ul class="list-unstyled mb-0 d-grid gap-3">
                        <li class="d-flex align-items-start gap-3">
                            <div class="legal-icon-box flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3l9 4-9 4-9-4 9-4z" />
                                    <path d="M3 7v6l9 4 9-4V7" />
                                    <path d="M3 13v6l9 4 9-4v-6" />
                                </svg>
                            </div>
                            <div>
                                <p class="fw-bold mb-1">SOC 2 Type II aligned controls</p>
                                <p class="mb-0 text-muted">Continuous monitoring and third-party assessments scheduled annually.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="legal-icon-box flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 21c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                    <path d="M12 9v4l2 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="fw-bold mb-1">Data residency &amp; retention</p>
                                <p class="mb-0 text-muted">Configurable retention schedules and EU/US region hosting options.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-3">
                            <div class="legal-icon-box flex-shrink-0">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 6h12v12H6z" />
                                    <path d="M9 9h6v6H9z" />
                                    <path d="M3 3h3v3H3z" />
                                    <path d="M18 3h3v3h-3z" />
                                    <path d="M3 18h3v3H3z" />
                                    <path d="M18 18h3v3h-3z" />
                                </svg>
                            </div>
                            <div>
                                <p class="fw-bold mb-1">Access controls</p>
                                <p class="mb-0 text-muted">SAML SSO, SCIM provisioning, and granular roles available for enterprise.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="legal-side-card">
                    <p class="text-uppercase fw-bold small text-secondary mb-2">Featured</p>
                    <h4 class="fw-bold mb-3">Subprocessor list</h4>
                    <p class="mb-3">Current vendors and subprocessors supporting Webmakerr services. Notifications sent before changes.</p>
                    <a class="btn btn-light w-100" href="https://webmakerr.com/subprocessors" target="_blank" rel="noopener">View list</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="legal-card p-4 h-100 d-flex flex-column">
                    <p class="text-uppercase text-muted fw-bold mb-1">Guides</p>
                    <h5 class="fw-bold">How Webmakerr protects your data</h5>
                    <p class="text-muted mb-3">Best practices for keeping your account secure and complying with local regulations.</p>
                    <div class="legal-placeholder mb-3"></div>
                    <a class="legal-link mt-auto" href="https://webmakerr.com/security" target="_blank" rel="noopener">Explore the guide</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="legal-card p-4 h-100 d-flex flex-column">
                    <p class="text-uppercase text-muted fw-bold mb-1">Templates</p>
                    <h5 class="fw-bold">Request forms</h5>
                    <ul class="list-unstyled d-grid gap-2 mb-3">
                        <li class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> Data Subject Access Request</li>
                        <li class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> Security questionnaire intake</li>
                        <li class="legal-list-check"><svg viewBox="0 0 20 20" fill="currentColor"><path d="M8 13l-3-3 1.5-1.5L8 10l5.5-5.5L15 6z"/></svg> Vulnerability disclosure</li>
                    </ul>
                    <a class="btn btn-primary" href="https://webmakerr.com/contact" target="_blank" rel="noopener">Submit a request</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
