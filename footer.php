</main><!-- #site-content -->
<?php $confidence = cz('tp_confidence_img_1') || cz('tp_confidence_img_2') || cz('tp_confidence_img_3');
$locations = get_nav_menu_locations();
$footer_icons_lazy_load = (bool) cz( 'tp_item_imgs_lazy_load' );
$footer_icon_markup = static function ( $url ) use ( $footer_icons_lazy_load ) {
    if ( empty( $url ) ) {
        return '';
    }

    $url = esc_url( $url );
    $attributes = 'src="' . $url . '"';
    $class_attribute = '';

    if ( $footer_icons_lazy_load ) {
        $attributes .= ' data-src="' . $url . '"';
        $class_attribute = ' class="lazyload"';
    }

    return '<img ' . $attributes . $class_attribute . ' alt="">';
};
?>
<footer class="footer">

    <div class="content-footer">
        <div class="container">
            <div class="row row-footer">
                <div class="col-12 col-md-3">
                    <div class="contact-footer">
                        <div class="footer-head">
                            <a href="javascript:;"><?php _cz('tp_footer_menu_title_1'); ?></a>
                        </div>
                        <div class="box-toggle">
                        <div class="item"><?php do_action('adstm_phone_shop', true) ?></div>
                        <div class="item"><?php do_action('adstm_email_shop') ?></div>
                        <?php do_action('adstm_address'); ?>
                        </div>
                    </div>
                </div>
                <?php if( isset( $locations[ 'footer-company' ] ) && $locations[ 'footer-company' ] ) { ?>
                    <div class="col-12 col-md-3">
                        <div class="menu-footer">
                            <div class="footer-head"><a href="javascript:;"><?php _cz('tp_footer_menu_title_2'); ?></a></div>
                            <div class="box-toggle">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-company',
                                    'container' => false,
                                    'container_class' => '',
                                    'container_id' => '',
                                    'menu_class' => 'info',
                                    'menu_id' => '',
                                    'echo' => true,
                                    'fallback_cb' => '__return_empty_string',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 1,
                                    'walker' => '',
                                ));

                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if( isset( $locations[ 'footer-help' ] ) && $locations[ 'footer-help' ] ) { ?>
                    <div class="col-12 col-md-3">
                        <div class="menu-footer">
                            <div class="footer-head"><a href="javascript:;"><?php _cz('tp_footer_menu_title_3'); ?></a></div>
                            <div class="box-toggle">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-help',
                                'container' => false,
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'info',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => '__return_empty_string',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 1,
                                'walker' => '',
                            ));

                            ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-12 col-md-3">

                    <?php if (adsTmpl::is_enableSocial()): ?>
                        <div class="social">
                            <div class="head-social"><?php _cz('tp_footer_menu_title_4'); ?></div>
                            <ul>
                                <?php if (cz('s_link_fb_page')): ?>
                                    <li><a href="<?php echo cz('s_link_fb_page'); ?>" target="_blank"
                                           rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_in_page')): ?>
                                    <li><a href="<?php echo cz('s_link_in_page'); ?>" target="_blank"
                                           rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_tw')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_tw'); ?>" target="_blank" rel="nofollow"><i
                                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if (cz('s_link_pt')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_pt'); ?>" target="_blank" rel="nofollow">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                <?php if (cz('s_link_yt')): ?>
                                    <li>
                                        <a href="<?php echo cz('s_link_yt'); ?>" target="_blank" rel="nofollow">
                                            <i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

	                <?php if(cz('s_link_fb')):?>

                        <div class="social-fb">

                            <div class="fb-page" data-href="<?php echo cz('s_link_fb'); ?>"
                                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                                 data-show-facepile="true" data-show-posts="false">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="<?php echo cz('s_link_fb'); ?>">
                                        <a target="_blank" href="<?php echo cz('s_link_fb'); ?>"
                                           target="_blank"><?php echo cz('s_fb_name_widget'); ?></a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
	                <?php endif;?>
                </div>

            </div>
            <?php if (cz('tp_footer_payment_methods') || $confidence): ?>
                <div class="content-partners">
                    <div class="wrap-partners">
                            <?php if (cz('tp_footer_payment_methods')): ?>

                                <div class="box-partners">
                                    <div class="name"><?php echo cz('tp_payment_methods'); ?></div>
                                    <ul class="box-payment">
                                        <?php
                                        $payment_icons = [
                                            'tp_footer_payment_methods_1',
                                            'tp_footer_payment_methods_2',
                                            'tp_footer_payment_methods_3',
                                            'tp_footer_payment_methods_4',
                                            'tp_footer_payment_methods_5',
                                            'tp_footer_payment_methods_6',
                                        ];

                                        foreach ( $payment_icons as $payment_icon_option ) {
                                            $icon = $footer_icon_markup( cz( $payment_icon_option ) );

                                            if ( ! $icon ) {
                                                continue;
                                            }

                                            echo '<li>' . $icon . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if ($confidence): ?>
                                <div class="box-partners">
                                    <div class="name"><?php echo cz('tp_confidence'); ?></div>
                                    <ul class="box-confidence">
                                        <?php
                                        $confidence_icons = [
                                            'tp_confidence_img_1',
                                            'tp_confidence_img_2',
                                            'tp_confidence_img_3',
                                        ];

                                        foreach ( $confidence_icons as $confidence_icon_option ) {
                                            $confidence_icon = cz( $confidence_icon_option );

                                            if ( ! $confidence_icon ) {
                                                continue;
                                            }

                                            $icon_markup = $footer_icon_markup( $confidence_icon . '?1000' );

                                            if ( ! $icon_markup ) {
                                                continue;
                                            }

                                            echo '<li>' . $icon_markup . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 footer-copyright"><?php echo str_replace( '{{YEAR}}', date( 'Y' ), cz( 'tp_copyright' ) ); ?></div>
            </div>

</div>
</div>
</footer><!-- .body-footer -->
</div><!-- .site-wrapper -->

<?php if ( cz('add_fix') && is_singular( 'product' ) ) : ?>
    <div class="fix-btn single-active-btn">
        <?php do_action('adstm_single_btn_add_to_cart') ?>
    </div>
<?php endif; ?>

<?php //do_action('adstm_modal'); ?>
<?php do_action('adstm_footer'); ?>
<div class="cookie-consent__backdrop" id="cookie-consent" role="dialog" aria-modal="true" aria-labelledby="cookie-consent-title" aria-describedby="cookie-consent-body" aria-hidden="false">
    <div class="cookie-consent__panel">
        <h2 class="cookie-consent__headline" id="cookie-consent-title">We value your privacy</h2>
        <p class="cookie-consent__body" id="cookie-consent-body">We use cookies to enhance your browsing experience, serve personalized offers, and analyze traffic. By clicking “Accept &amp; continue” you agree to our use of cookies as described in our Privacy Policy.</p>
        <div class="cookie-consent__actions">
            <button type="button" class="cookie-consent__button cookie-consent__button--primary" id="cookie-consent-accept">Accept &amp; continue</button>
            <button type="button" class="cookie-consent__button cookie-consent__button--secondary" id="cookie-consent-decline">Only essential cookies</button>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var allFooterHeads = Array.prototype.slice.call(document.querySelectorAll('.footer .footer-head'));
    if (!allFooterHeads.length) {
        return;
    }

    var accordionHeads = allFooterHeads.filter(function (head) {
        return head.nextElementSibling && head.nextElementSibling.classList.contains('box-toggle');
    });

    if (!accordionHeads.length) {
        return;
    }

    var isMobileViewport = function () {
        if (window.matchMedia) {
            return window.matchMedia('(max-width: 767px)').matches;
        }

        return window.innerWidth <= 767;
    };

    var closeAll = function () {
        accordionHeads.forEach(function (head) {
            head.classList.remove('open');
            head.setAttribute('aria-expanded', 'false');
        });
    };

    accordionHeads.forEach(function (head) {
        head.setAttribute('role', 'button');
        if (!head.hasAttribute('tabindex')) {
            head.setAttribute('tabindex', '0');
        }
        head.setAttribute('aria-expanded', head.classList.contains('open') ? 'true' : 'false');

        var toggleSection = function () {
            if (!isMobileViewport()) {
                return;
            }

            var shouldOpen = !head.classList.contains('open');
            closeAll();

            if (shouldOpen) {
                head.classList.add('open');
                head.setAttribute('aria-expanded', 'true');
            }
        };

        var getLinkFromEvent = function (target) {
            var current = target;
            while (current && current !== head) {
                if (current.tagName && current.tagName.toLowerCase() === 'a') {
                    return current;
                }
                current = current.parentNode;
            }

            if (current && current.tagName && current.tagName.toLowerCase() === 'a') {
                return current;
            }

            return null;
        };

        head.addEventListener('click', function (event) {
            if (!isMobileViewport()) {
                return;
            }

            var link = getLinkFromEvent(event.target);
            if (link) {
                event.preventDefault();
            }

            toggleSection();
        });

        head.addEventListener('keydown', function (event) {
            if ((event.key === 'Enter' || event.key === ' ') && isMobileViewport()) {
                event.preventDefault();
                toggleSection();
            }
        });
    });

    (function () {
        var consentBackdrop = document.getElementById('cookie-consent');
        var acceptButton = document.getElementById('cookie-consent-accept');
        var declineButton = document.getElementById('cookie-consent-decline');
        var storageKey = 'raphaelCookieConsent';

        if (!consentBackdrop || !acceptButton || !declineButton) {
            return;
        }

        var getStoredDecision = function () {
            var storedValue = null;

            try {
                storedValue = localStorage.getItem(storageKey);
            } catch (e) {
                // Ignore localStorage errors and use cookie fallback.
            }

            if (storedValue !== null) {
                return storedValue;
            }

            var pattern = storageKey + '=';
            var cookie = document.cookie.split(';').map(function (part) {
                return part.trim();
            }).find(function (candidate) {
                return candidate.indexOf(pattern) === 0;
            });

            if (cookie) {
                return decodeURIComponent(cookie.slice(pattern.length));
            }

            return null;
        };

        var isAccepted = function () {
            return getStoredDecision() === 'accepted';
        };

        var setDecision = function (value) {
            var cookieValue = storageKey + '=' + encodeURIComponent(value) + ';path=/;max-age=' + 60 * 60 * 24 * 180;

            try {
                localStorage.setItem(storageKey, value);
            } catch (e) {
                // Ignore localStorage errors and use cookie fallback.
            }

            document.cookie = cookieValue;
        };

        var closeConsent = function () {
            consentBackdrop.style.display = 'none';
            consentBackdrop.setAttribute('aria-hidden', 'true');
        };

        var openConsent = function () {
            consentBackdrop.style.display = 'flex';
            consentBackdrop.setAttribute('aria-hidden', 'false');
        };

        if (isAccepted()) {
            closeConsent();
        } else {
            openConsent();
        }

        acceptButton.addEventListener('click', function () {
            setDecision('accepted');
            closeConsent();
        });

        declineButton.addEventListener('click', function () {
            setDecision('essential_only');
            openConsent();
        });
    })();
});
</script>
<script type="text/javascript"> self != top ? document.body.className+=' is_frame' : '';</script>
<?php wp_footer(); ?>

<?php echo cz('tp_footer_script'); ?>

<?php include "adstm/customization/cz_styles.php"; ?>

</body>
</html>
