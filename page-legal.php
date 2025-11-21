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
        --legal-green: #00b22d;
        --legal-dark: #222325;
        --legal-muted: #6f767d;
        --legal-border: #e3e7eb;
        --bs-border-radius: 8px;
        --bs-border-radius-sm: 8px;
        --bs-border-radius-lg: 10px;
        --bs-border-radius-xl: 12px;
        --bs-border-radius-xxl: 16px;
        --bs-border-radius-pill: 999px;
    }

    .legal-wrap {
        background: linear-gradient(180deg, #f7f9fb 0%, #ffffff 100%);
    }

    .legal-hero {
        background: linear-gradient(90deg, #00a62a 0%, #00c656 60%, #00e07b 100%);
        color: #fff;
        padding: 48px;
        border-radius: 16px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 178, 45, 0.25);
    }

    .legal-hero:after {
        content: '';
        position: absolute;
        width: 360px;
        height: 360px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        bottom: -120px;
        right: -120px;
    }

    .legal-hero h1 {
        font-size: 2.75rem;
        font-weight: 800;
    }

    .legal-hero p {
        max-width: 760px;
        font-size: 1.1rem;
    }

    .legal-chip {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        padding: 10px 14px;
        border-radius: 999px;
        font-weight: 700;
        letter-spacing: 0.02em;
    }

    .legal-cta-btn {
        padding: 12px 18px;
        font-weight: 700;
        border-radius: 999px;
    }

    .legal-card {
        border: 1px solid var(--legal-border);
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 16px 30px rgba(18, 38, 63, 0.07);
    }

    .legal-subhead {
        color: var(--legal-muted);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 800;
        font-size: 0.85rem;
        margin-bottom: 6px;
    }

    .legal-link {
        color: var(--legal-dark);
        text-decoration: none;
        font-weight: 700;
    }

    .legal-link:hover {
        color: var(--legal-green);
    }

    .legal-pill {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 999px;
        background: #f1f5f9;
        color: var(--legal-dark);
        border: 1px solid var(--legal-border);
        font-weight: 700;
    }

    .legal-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 14px;
    }

    .legal-list li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid var(--legal-border);
        transition: border 0.16s ease, transform 0.16s ease;
    }

    .legal-list li:hover {
        border-color: #b6bec7;
        transform: translateY(-2px);
    }

    .legal-bullet {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--legal-green);
        box-shadow: 0 0 0 6px rgba(0, 178, 45, 0.12);
    }

    .legal-featured {
        background: #0e0f10;
        color: #fff;
        border-radius: 14px;
        padding: 24px;
        position: relative;
        overflow: hidden;
    }

    .legal-featured:after {
        content: '';
        position: absolute;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0, 178, 45, 0.2), transparent 60%);
        top: -80px;
        right: -60px;
    }

    .legal-meta {
        font-size: 0.9rem;
        color: var(--legal-muted);
    }

    .legal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 16px;
    }

    .legal-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: #eef3f6;
        display: grid;
        place-items: center;
        color: var(--legal-green);
    }

    @media (max-width: 767px) {
        .legal-hero {
            padding: 28px;
        }

        .legal-hero h1 {
            font-size: 2.1rem;
        }
    }
</style>

<div class="legal-wrap py-5">
    <div class="container">
        <div class="legal-hero mb-4">
            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                <span class="legal-chip">Legal Portal</span>
                <span class="legal-chip" style="background: rgba(255,255,255,0.18);">Updated for 2024</span>
            </div>
            <h1 class="mb-3">Legal resources and trust documentation</h1>
            <p class="mb-4">Access Fiverr-style clarity on policies, terms, and compliance materials you need to work with Webmakerr confidently.</p>
            <div class="d-flex flex-wrap gap-3">
                <a class="btn btn-light text-dark legal-cta-btn" href="mailto:legal@webmakerr.com">Contact Legal</a>
                <a class="btn btn-outline-light legal-cta-btn" href="https://webmakerr.com/privacy-policy" target="_blank" rel="noopener">Privacy Policy</a>
                <span class="badge bg-dark text-white d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill"><span class="badge bg-success rounded-pill">Live</span> Response in 1 business day</span>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="legal-card p-4 h-100">
                    <p class="legal-subhead">Main policies</p>
                    <h3 class="fw-bold mb-3">Start with the essentials</h3>
                    <div class="legal-grid">
                        <div class="p-3 border rounded-3 d-flex flex-column gap-2">
                            <div class="d-flex gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M8 4v16"/><path d="M16 10h4"/><path d="M16 14h4"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1">Terms of Service</p>
                                    <p class="legal-meta mb-2">How we operate, marketplace rules, and user commitments.</p>
                                    <a class="legal-link" href="https://webmakerr.com/terms-of-service" target="_blank" rel="noopener">View terms</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border rounded-3 d-flex flex-column gap-2">
                            <div class="d-flex gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l7 4v5c0 5-3.5 9-7 11-3.5-2-7-6-7-11V6z"/><path d="M9 10l2 2 4-4"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1">Privacy &amp; Data</p>
                                    <p class="legal-meta mb-2">Privacy Policy, Cookie Policy, and data handling transparency.</p>
                                    <a class="legal-link" href="https://webmakerr.com/privacy-policy" target="_blank" rel="noopener">Privacy overview</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border rounded-3 d-flex flex-column gap-2">
                            <div class="d-flex gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16"/><path d="M4 12h16"/><path d="M4 17h16"/><path d="M8 3v4"/><path d="M16 3v4"/><path d="M8 17v4"/><path d="M16 17v4"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1">Payments &amp; billing</p>
                                    <p class="legal-meta mb-2">Billing terms, refunds, and payout expectations.</p>
                                    <a class="legal-link" href="https://webmakerr.com/terms-of-service#payments" target="_blank" rel="noopener">See billing terms</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border rounded-3 d-flex flex-column gap-2">
                            <div class="d-flex gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l7 4v12l-7 4-7-4V6z"/><path d="M9 12l2 2 4-4"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-1">Data Processing Agreement</p>
                                    <p class="legal-meta mb-2">Subprocessor list, SCCs, and GDPR commitments.</p>
                                    <a class="legal-link" href="https://webmakerr.com/dpa" target="_blank" rel="noopener">Download DPA</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="legal-featured h-100">
                    <p class="legal-subhead text-white mb-2">Need something signed?</p>
                    <h4 class="fw-bold mb-2">Custom agreements &amp; support</h4>
                    <p class="mb-3">Request MSAs, NDAs, or tailored compliance language. We answer within one business day.</p>
                    <div class="d-grid gap-2">
                        <a class="btn btn-success" href="mailto:legal@webmakerr.com">Contact legal team</a>
                        <a class="btn btn-outline-light" href="https://cal.com/webmakerr/legal" target="_blank" rel="noopener">Book a call</a>
                        <small class="legal-meta text-white">Regional coverage: EU, UK, US</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="legal-card p-4 h-100">
                    <p class="legal-subhead">Compliance library</p>
                    <h4 class="fw-bold mb-3">Transparency in one place</h4>
                    <ul class="legal-list">
                        <li>
                            <div class="d-flex align-items-center gap-3">
                                <span class="legal-bullet"></span>
                                <div>
                                    <p class="fw-bold mb-0">Security overview</p>
                                    <small class="legal-meta">Infrastructure, encryption, and SOC alignment</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/security" target="_blank" rel="noopener">View</a>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-3">
                                <span class="legal-bullet"></span>
                                <div>
                                    <p class="fw-bold mb-0">Subprocessors</p>
                                    <small class="legal-meta">Live vendor list and notification process</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/subprocessors" target="_blank" rel="noopener">See list</a>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-3">
                                <span class="legal-bullet"></span>
                                <div>
                                    <p class="fw-bold mb-0">Responsible disclosure</p>
                                    <small class="legal-meta">How to report vulnerabilities and get rapid triage</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/security#vdp" target="_blank" rel="noopener">Report</a>
                        </li>
                        <li>
                            <div class="d-flex align-items-center gap-3">
                                <span class="legal-bullet"></span>
                                <div>
                                    <p class="fw-bold mb-0">Data subject rights</p>
                                    <small class="legal-meta">DSAR forms and deletion request workflow</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/privacy-policy#rights" target="_blank" rel="noopener">Submit</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="legal-card p-4 h-100">
                    <p class="legal-subhead">Guides &amp; templates</p>
                    <h4 class="fw-bold mb-3">Practical resources</h4>
                    <div class="d-grid gap-3">
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4h12v16H6z"/><path d="M10 8h4"/><path d="M10 12h4"/><path d="M10 16h4"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Compliance FAQ</p>
                                    <small class="legal-meta">Most asked questions from procurement teams</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/legal#faq" target="_blank" rel="noopener">View</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v6H4z"/><path d="M10 10v10"/><path d="M14 10v10"/><path d="M4 16h16"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Trademark &amp; IP</p>
                                    <small class="legal-meta">Brand usage, DMCA, and IP protection requests</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/legal#ip" target="_blank" rel="noopener">Learn more</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="legal-icon-box">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M5 3h14v18H5z"/><path d="M9 7h6"/><path d="M9 11h6"/><path d="M9 15h3"/></svg>
                                </div>
                                <div>
                                    <p class="fw-bold mb-0">Platform integrity</p>
                                    <small class="legal-meta">Content moderation and enforcement policies</small>
                                </div>
                            </div>
                            <a class="legal-link" href="https://webmakerr.com/legal#integrity" target="_blank" rel="noopener">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="legal-card p-4">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <p class="legal-subhead">Trust center</p>
                    <h4 class="fw-bold mb-2">Stay informed</h4>
                    <p class="mb-3">Subscribe for updates when we refresh policies or add new subprocessors. We keep the same responsive cadence you see on the Fiverr Pro legal portal.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="legal-pill">Change logs</span>
                        <span class="legal-pill">Incident response</span>
                        <span class="legal-pill">Status page</span>
                        <span class="legal-pill">Data residency</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="border p-3 rounded-3 bg-light h-100">
                        <form action="https://webmakerr.com/newsletter" method="get" class="d-flex flex-column gap-2">
                            <label class="fw-bold">Get email updates</label>
                            <div class="d-flex gap-2 flex-wrap">
                                <input class="form-control" type="email" name="email" placeholder="you@company.com" required>
                                <button class="btn btn-success" type="submit">Notify me</button>
                            </div>
                            <small class="legal-meta">We only email for material legal changes.</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
