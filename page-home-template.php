<?php
/*
Template Name: Home
*/

get_header();
?>
<main class="wm-home">
    <style>
        :root {
            --wm-primary: #1f4aff;
            --wm-primary-dark: #142fcc;
            --wm-secondary: #0f172a;
            --wm-accent: #22d3ee;
            --wm-muted: #94a3b8;
            --wm-bg: #f8fafc;
            --wm-card: #ffffff;
        }

        .wm-home {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
            color: var(--wm-secondary);
            background: var(--wm-bg);
            line-height: 1.6;
        }

        .wm-section {
            padding: 4.5rem 1.5rem;
        }

        .wm-container {
            width: min(1200px, 100%);
            margin: 0 auto;
        }

        .wm-eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--wm-primary);
        }

        .wm-hero {
            padding-top: 6rem;
            padding-bottom: 4rem;
            background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.25), transparent 45%), var(--wm-card);
        }

        .wm-hero-grid {
            display: grid;
            gap: 2rem;
        }

        .wm-hero h1 {
            font-size: clamp(2.4rem, 6vw, 3.8rem);
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .wm-hero p {
            font-size: 1.1rem;
            color: #475569;
            margin-bottom: 1.5rem;
        }

        .wm-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .wm-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.95rem 1.5rem;
            border-radius: 999px;
            font-weight: 600;
            font-size: 1rem;
            border: 1px solid transparent;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
        }

        .wm-btn.primary {
            background: linear-gradient(135deg, var(--wm-primary), var(--wm-primary-dark));
            color: #fff;
            box-shadow: 0 20px 40px rgba(31, 74, 255, 0.25);
        }

        .wm-btn.secondary {
            background: transparent;
            color: var(--wm-secondary);
            border-color: rgba(15, 23, 42, 0.2);
        }

        .wm-btn:hover {
            transform: translateY(-2px);
        }

        .wm-card-grid {
            display: grid;
            gap: 1.5rem;
        }

        .wm-card {
            background: var(--wm-card);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 25px 70px rgba(15, 23, 42, 0.08);
        }

        .wm-card h3 {
            margin-top: 1rem;
            font-size: 1.3rem;
        }

        .wm-card p {
            color: #475569;
            margin-top: 0.75rem;
        }

        .wm-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.15rem 0.75rem;
            border-radius: 999px;
            background: rgba(31, 74, 255, 0.08);
            color: var(--wm-primary);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .wm-feature {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            margin-top: 2rem;
        }

        .wm-feature .wm-card {
            min-height: 220px;
        }

        .wm-feature-list li {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }

        .wm-feature-list svg {
            flex-shrink: 0;
            margin-top: 0.3rem;
        }

        .wm-case-study {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .wm-case {
            background: #0f172a;
            color: #e2e8f0;
            border-radius: 1.5rem;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .wm-case::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.35), transparent 50%);
            opacity: 0.8;
            pointer-events: none;
        }

        .wm-case h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }

        .wm-case p {
            color: rgba(226, 232, 240, 0.85);
        }

        .wm-case ul {
            margin-top: 1rem;
            padding-left: 1rem;
            color: rgba(226, 232, 240, 0.85);
        }

        .wm-testimonials {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .wm-quote {
            background: var(--wm-card);
            border-radius: 1.25rem;
            padding: 2rem;
            border: 1px solid rgba(15, 23, 42, 0.05);
        }

        .wm-quote p {
            font-size: 1rem;
            color: #0f172a;
        }

        .wm-quote-footer {
            margin-top: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .wm-quote-footer strong {
            display: block;
            font-size: 0.95rem;
        }

        .wm-quote-footer span {
            color: var(--wm-muted);
            font-size: 0.85rem;
        }

        .wm-pricing {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            margin-top: 2rem;
        }

        .wm-plan {
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            background: var(--wm-card);
            border: 1px solid rgba(15, 23, 42, 0.05);
        }

        .wm-plan.highlight {
            border: 2px solid var(--wm-primary);
            box-shadow: 0 25px 70px rgba(31, 74, 255, 0.15);
        }

        .wm-price {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 1rem 0;
        }

        .wm-plan ul {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        .wm-plan li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            color: #475569;
        }

        .wm-cta-final {
            background: linear-gradient(135deg, #1f4aff, #0f172a);
            color: #fff;
            border-radius: 2rem;
            padding: 3rem 2rem;
            text-align: center;
        }

        .wm-cta-final h2 {
            font-size: clamp(2rem, 5vw, 3rem);
            margin-bottom: 1rem;
        }

        .wm-cta-final p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .wm-grid-2 {
            display: grid;
            gap: 2rem;
        }

        .wm-stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .wm-stat {
            padding: 1rem;
            background: rgba(15, 23, 42, 0.04);
            border-radius: 1rem;
            text-align: center;
        }

        .wm-stat strong {
            display: block;
            font-size: 1.5rem;
        }

        @media (min-width: 768px) {
            .wm-section {
                padding: 6rem 2rem;
            }

            .wm-hero-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: center;
            }

            .wm-grid-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: center;
            }
        }

        @media (min-width: 1024px) {
            .wm-hero {
                padding-top: 8rem;
                padding-bottom: 6rem;
            }
        }
    </style>

    <section class="wm-section wm-hero">
        <div class="wm-container">
            <div class="wm-hero-grid">
                <div>
                    <p class="wm-eyebrow">Custom business solutions & plugins</p>
                    <h1>Enterprise-grade WordPress & product engineering for growth teams.</h1>
                    <p>Webmakerr crafts bespoke business systems, API integrations, and high-performing WordPress plugins so you can launch faster, scale smarter, and convert more customers.</p>
                    <div class="wm-btn-group">
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="wm-btn primary">Book a discovery call</a>
                        <a href="<?php echo esc_url( home_url( '/customers' ) ); ?>" class="wm-btn secondary">See our work</a>
                    </div>
                    <div class="wm-stat-grid">
                        <div class="wm-stat">
                            <strong>180+</strong>
                            <span>Deployments</span>
                        </div>
                        <div class="wm-stat">
                            <strong>12 yrs</strong>
                            <span>WP expertise</span>
                        </div>
                        <div class="wm-stat">
                            <strong>43%</strong>
                            <span>Avg. conversion lift</span>
                        </div>
                    </div>
                </div>
                <div class="wm-card">
                    <span class="wm-tag">Blueprint</span>
                    <h3>One integrated delivery pod</h3>
                    <p>Strategists, engineers, and product designers collaborate inside a dedicated pod to iterate quickly on your roadmap. Every sprint ships performance improvements you can measure.</p>
                    <ul class="wm-feature-list">
                        <li>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11" stroke="var(--wm-primary)" stroke-width="2"/>
                                <path d="M7 12l3 3 7-7" stroke="var(--wm-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>Discovery accelerator</strong>
                                <p>Workshops and technical spike within the first week to de-risk integrations and infrastructure decisions.</p>
                            </div>
                        </li>
                        <li>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11" stroke="var(--wm-primary)" stroke-width="2"/>
                                <path d="M7 12l3 3 7-7" stroke="var(--wm-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>Conversion-first builds</strong>
                                <p>Research-backed UX, CRO-ready sections, and structured data baked into every module.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="wm-section">
        <div class="wm-container">
            <p class="wm-eyebrow">What we deliver</p>
            <h2>Modular services tuned for speed, security, and scale.</h2>
            <div class="wm-card-grid" style="margin-top:2.5rem;">
                <?php
                $services = [
                    [
                        'title' => 'Custom business platforms',
                        'desc' => 'Internal portals, partner dashboards, and workflow automation powered by WordPress or Laravel backends.',
                        'icon' => '🔗'
                    ],
                    [
                        'title' => 'WordPress plugin engineering',
                        'desc' => 'From licensing systems to enterprise-grade Gutenberg blocks, we build future-proof plugins with automated QA.',
                        'icon' => '🧩'
                    ],
                    [
                        'title' => 'API & data integrations',
                        'desc' => 'Connect CRMs, ERPs, and analytics suites. Our middleware stabilizes legacy stacks while unlocking new revenue.',
                        'icon' => '🛰️'
                    ],
                    [
                        'title' => 'Lifecycle optimization',
                        'desc' => 'Experiment frameworks, conversion tracking, and UX audits that drive retention across every touchpoint.',
                        'icon' => '📈'
                    ]
                ];
                foreach ( $services as $service ) : ?>
                    <article class="wm-card">
                        <div class="wm-tag"><?php echo esc_html( $service['icon'] ); ?> Service</div>
                        <h3><?php echo esc_html( $service['title'] ); ?></h3>
                        <p><?php echo esc_html( $service['desc'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="wm-section" style="background: #fff;">
        <div class="wm-container">
            <div class="wm-grid-2">
                <div>
                    <p class="wm-eyebrow">Platform advantages</p>
                    <h2>Engineered like a product, delivered like an agency.</h2>
                    <p>Every engagement ships with a living design system, reusable blocks, and documentation so your team can iterate without starting from zero.</p>
                    <ul class="wm-feature-list" style="margin-top:1.5rem;">
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11" stroke="var(--wm-primary)" stroke-width="2"/>
                                <path d="M7 12l3 3 7-7" stroke="var(--wm-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>Performance budgets</strong>
                                <p>Server-side rendering, headless options, and Lighthouse monitoring keep experiences lightning fast.</p>
                            </div>
                        </li>
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11" stroke="var(--wm-primary)" stroke-width="2"/>
                                <path d="M7 12l3 3 7-7" stroke="var(--wm-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>Future-ready architecture</strong>
                                <p>CI/CD pipelines, automated testing, and observability dashboards built into your stack.</p>
                            </div>
                        </li>
                        <li>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11" stroke="var(--wm-primary)" stroke-width="2"/>
                                <path d="M7 12l3 3 7-7" stroke="var(--wm-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <strong>Analytics & visibility</strong>
                                <p>Hook into Mixpanel, GA4, HubSpot, and CRMs with data governance baked in.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="wm-card" style="align-self:center;">
                    <span class="wm-tag">Engagement model</span>
                    <h3>Predictable partnership</h3>
                    <p>Choose the collaboration mode that meets your roadmap. Mix-and-match sprints, retainers, or dedicated pods.</p>
                    <div class="wm-feature" style="margin-top:1.5rem;">
                        <div>
                            <h4>Product pods</h4>
                            <p>Cross-functional team embedded with your stakeholders, perfect for continuous innovation.</p>
                        </div>
                        <div>
                            <h4>Project sprints</h4>
                            <p>Fixed-scope deliverables with tight feedback cycles and milestone tracking.</p>
                        </div>
                        <div>
                            <h4>Advisory lane</h4>
                            <p>CTO-level guidance, code reviews, and architectural oversight on demand.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wm-section" style="background:#0f172a;color:#fff;">
        <div class="wm-container">
            <p class="wm-eyebrow" style="color:var(--wm-accent);">Case studies</p>
            <h2 style="color:#fff;">Proof from teams shipping custom stacks with Webmakerr.</h2>
            <div class="wm-case-study" style="margin-top:2.5rem;">
                <?php
                $cases = [
                    [
                        'title' => 'Global SaaS billing portal',
                        'result' => 'Reduced onboarding time by 62%',
                        'details' => [ 'Custom plugin powering seat licensing', 'Multi-region tax & invoicing workflows', '2-week design/deploy cycles' ]
                    ],
                    [
                        'title' => 'Healthcare membership platform',
                        'result' => 'HIPAA-ready portal built on WordPress headless stack',
                        'details' => [ 'Auth0 integration + secure APIs', 'Content modeling for 30+ clinics', 'Net promoter score climbed to 71' ]
                    ],
                    [
                        'title' => 'Media network ad hub',
                        'result' => 'Automated campaign launches in 4 clicks',
                        'details' => [ 'Reusable Gutenberg blocks', 'Salesforce + HubSpot sync', 'Custom analytics dashboard' ]
                    ]
                ];
                foreach ( $cases as $case ) : ?>
                    <article class="wm-case">
                        <div style="position:relative;z-index:1;">
                            <h3><?php echo esc_html( $case['title'] ); ?></h3>
                            <p><?php echo esc_html( $case['result'] ); ?></p>
                            <ul>
                                <?php foreach ( $case['details'] as $detail ) : ?>
                                    <li><?php echo esc_html( $detail ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="wm-section">
        <div class="wm-container">
            <div class="wm-grid-2">
                <div>
                    <p class="wm-eyebrow">Testimonials</p>
                    <h2>Leaders who ship with confidence.</h2>
                    <p>From Fortune 500 innovation labs to ambitious startups, teams trust Webmakerr to convert complex requirements into scalable digital products.</p>
                </div>
                <div class="wm-card" style="background:rgba(31,74,255,0.08);">
                    <h3>Delivery process snapshot</h3>
                    <ol style="margin-top:1rem;padding-left:1.25rem;color:#1e293b;">
                        <li><strong>Kickoff & roadmap</strong> — map use cases, success metrics, and dependencies.</li>
                        <li><strong>Experience design</strong> — craft mobile-first flows, prototyping key interactions.</li>
                        <li><strong>Engineering & QA</strong> — build components, integrate APIs, automate testing.</li>
                        <li><strong>Launch & optimization</strong> — observability, CRO experiments, knowledge transfer.</li>
                    </ol>
                </div>
            </div>
            <div class="wm-testimonials" style="margin-top:2.5rem;">
                <?php
                $testimonials = [
                    [
                        'quote' => 'Webmakerr treated our plugin like a SaaS product. Weekly releases, automated QA, and a roadmap tied to revenue goals.',
                        'name'  => 'Priya Raman',
                        'role'  => 'VP Product, FinServ Cloud'
                    ],
                    [
                        'quote' => 'They rebuilt our partner portal in 9 weeks and unified Salesforce + HubSpot data. Support tickets dropped 47%.',
                        'name'  => 'Jordan Hayes',
                        'role'  => 'Head of Operations, Alloy Media'
                    ],
                    [
                        'quote' => 'A true strategic partner. Webmakerr architects solutions that marketing, product, and engineering can all trust.',
                        'name'  => 'Marta Villalobos',
                        'role'  => 'GM Platforms, HealthCore'
                    ]
                ];
                foreach ( $testimonials as $testimonial ) : ?>
                    <figure class="wm-quote">
                        <p>“<?php echo esc_html( $testimonial['quote'] ); ?>”</p>
                        <figcaption class="wm-quote-footer">
                            <div>
                                <strong><?php echo esc_html( $testimonial['name'] ); ?></strong>
                                <span><?php echo esc_html( $testimonial['role'] ); ?></span>
                            </div>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="wm-section" style="background:#fff;">
        <div class="wm-container">
            <p class="wm-eyebrow">Pricing & offers</p>
            <h2>Choose the partnership that fits your roadmap.</h2>
            <div class="wm-pricing">
                <div class="wm-plan">
                    <span class="wm-tag">Project</span>
                    <h3>Launch Sprint</h3>
                    <p class="wm-price">$12k+</p>
                    <p>Ideal for new product initiatives, redesigns, or custom plugin builds.</p>
                    <ul>
                        <li>✅ 6-week delivery window</li>
                        <li>✅ Dedicated PM & tech lead</li>
                        <li>✅ QA automation & docs</li>
                        <li>✅ 30-day optimization support</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="wm-btn secondary" style="width:100%;text-align:center;">Plan a sprint</a>
                </div>
                <div class="wm-plan highlight">
                    <span class="wm-tag" style="background:rgba(34,211,238,0.2);color:#0f172a;">Most Popular</span>
                    <h3>Product Pod</h3>
                    <p class="wm-price">$18k/mo</p>
                    <p>Embedded cross-functional team shipping continuous product improvements.</p>
                    <ul>
                        <li>✅ Strategist + designer + engineers</li>
                        <li>✅ Unlimited roadmap requests</li>
                        <li>✅ Release management & observability</li>
                        <li>✅ Quarterly architecture reviews</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="wm-btn primary" style="width:100%;text-align:center;">Reserve a pod</a>
                </div>
                <div class="wm-plan">
                    <span class="wm-tag">Advisory</span>
                    <h3>Scale Partner</h3>
                    <p class="wm-price">Custom</p>
                    <p>Fractional CTO guidance, audits, and enablement for internal teams.</p>
                    <ul>
                        <li>✅ Technical due diligence</li>
                        <li>✅ Architecture & security reviews</li>
                        <li>✅ Hiring & onboarding support</li>
                        <li>✅ Ongoing executive reporting</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="wm-btn secondary" style="width:100%;text-align:center;">Start advisory</a>
                </div>
            </div>
        </div>
    </section>

    <section class="wm-section">
        <div class="wm-container">
            <div class="wm-cta-final">
                <p class="wm-eyebrow" style="color:var(--wm-accent);">Ready to build?</p>
                <h2>Let’s architect your next revenue channel.</h2>
                <p>Tell us about your workflow, integration, or plugin challenge. We’ll respond within one business day with next steps and a tailored plan.</p>
                <div class="wm-btn-group" style="justify-content:center;">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="wm-btn primary" style="background:#fff;color:#0f172a;">Schedule a call</a>
                    <a href="mailto:hello@webmakerr.com" class="wm-btn secondary" style="color:#fff;border-color:rgba(255,255,255,0.4);">Email our team</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
