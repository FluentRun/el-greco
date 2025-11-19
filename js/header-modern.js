(function () {
    'use strict';

    var initHeaderShadow = function () {
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
        toggleShadow();
    };

    var initOffcanvasMenu = function () {
        var nav = document.querySelector('.codex-offcanvas-nav');
        if (!nav) {
            return;
        }

        var toggleRecords = [];

        var queryDirectChild = function (element, selector) {
            return Array.prototype.find.call(element.children, function (child) {
                return child.matches(selector);
            }) || null;
        };

        var normalizeUrl = function (url) {
            if (!url) {
                return '';
            }
            var value = url.split('#')[0];
            value = value.split('?')[0];
            if (value.length > 1 && value.slice(-1) === '/') {
                value = value.slice(0, -1);
            }
            return value;
        };

        var buildSubmenuToggle = function (item) {
            var link = queryDirectChild(item, 'a');
            var submenu = queryDirectChild(item, '.sub-menu');
            if (!link || !submenu) {
                return;
            }

            if (queryDirectChild(item, '.codex-submenu-toggle')) {
                return;
            }

            var toggle = document.createElement('button');
            toggle.type = 'button';
            toggle.className = 'codex-submenu-toggle';
            toggle.setAttribute('aria-expanded', 'false');
            toggle.innerHTML = '<span class="visually-hidden">Toggle submenu</span>' +
                '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6.293 9.293a1 1 0 0 1 1.414 0L12 13.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 0-1.414z"/></svg>';

            link.insertAdjacentElement('afterend', toggle);

            var setState = function (open) {
                item.classList.toggle('is-open', open);
                submenu.style.maxHeight = open ? submenu.scrollHeight + 'px' : '0px';
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            };

            toggle.addEventListener('click', function (event) {
                event.preventDefault();
                setState(!item.classList.contains('is-open'));
            });

            toggleRecords.push({ item: item, submenu: submenu, setState: setState });

            if (item.classList.contains('current-menu-ancestor') || item.classList.contains('current-menu-parent')) {
                setState(true);
            }
        };

        nav.querySelectorAll('.menu-item-has-children').forEach(buildSubmenuToggle);

        var currentUrl = normalizeUrl(window.location.href);

        nav.querySelectorAll('a[href]').forEach(function (link) {
            var linkUrl = normalizeUrl(link.href);
            if (!linkUrl) {
                return;
            }

            if (linkUrl === currentUrl) {
                link.classList.add('is-active');
                var listItem = link.closest('li');
                if (listItem) {
                    listItem.classList.add('is-active');
                    var ancestorSubmenu = listItem.closest('.sub-menu');
                    while (ancestorSubmenu) {
                        var parentItem = ancestorSubmenu.parentElement;
                        if (parentItem && parentItem.classList.contains('menu-item-has-children')) {
                            var record = toggleRecords.find(function (data) {
                                return data.item === parentItem;
                            });
                            if (record) {
                                record.setState(true);
                            } else {
                                parentItem.classList.add('is-open');
                            }
                        }
                        ancestorSubmenu = parentItem ? parentItem.closest('.sub-menu') : null;
                    }
                }
            }
        });

        window.addEventListener('resize', function () {
            toggleRecords.forEach(function (record) {
                if (record.item.classList.contains('is-open')) {
                    record.submenu.style.maxHeight = record.submenu.scrollHeight + 'px';
                }
            });
        });
    };

    var init = function () {
        initHeaderShadow();
        initOffcanvasMenu();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
