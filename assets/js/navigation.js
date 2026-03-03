/**
 * Hill Street Realty - Navigation JavaScript
 * Handles mobile navigation and accessibility
 * Performance optimized version
 */

(function() {
    'use strict';

    // Cache DOM queries and state
    let cachedFocusableElements = null;
    let lastWindowWidth = window.innerWidth;
    const MOBILE_BREAKPOINT = 1060;

    /**
     * Mobile Navigation Toggle Enhancement
     * Works alongside WordPress native navigation block
     */
    function initMobileNav() {
        const nav = document.querySelector('.wp-block-navigation');

        if (!nav) return;

        // Add ARIA attributes for accessibility
        const toggleButton = nav.querySelector('.wp-block-navigation__responsive-container-open');
        const closeButton = nav.querySelector('.wp-block-navigation__responsive-container-close');
        const menuContainer = nav.querySelector('.wp-block-navigation__responsive-container');

        if (toggleButton) {
            toggleButton.setAttribute('aria-label', 'Open menu');
        }

        if (closeButton) {
            closeButton.setAttribute('aria-label', 'Close menu');
        }

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuContainer && menuContainer.classList.contains('is-menu-open')) {
                if (closeButton) {
                    closeButton.click();
                }
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (menuContainer && menuContainer.classList.contains('is-menu-open')) {
                if (!nav.contains(e.target)) {
                    if (closeButton) {
                        closeButton.click();
                    }
                }
            }
        });

        // Trap focus within open menu - cache focusable elements
        if (menuContainer) {
            // Cache focusable elements when menu opens
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.target.classList.contains('is-menu-open')) {
                        // Cache on menu open
                        cachedFocusableElements = menuContainer.querySelectorAll(
                            'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled])'
                        );
                    } else {
                        // Clear cache on menu close
                        cachedFocusableElements = null;
                    }
                });
            });
            observer.observe(menuContainer, { attributes: true, attributeFilter: ['class'] });

            menuContainer.addEventListener('keydown', function(e) {
                if (e.key !== 'Tab' || !menuContainer.classList.contains('is-menu-open')) return;
                if (!cachedFocusableElements || cachedFocusableElements.length === 0) return;

                const firstFocusable = cachedFocusableElements[0];
                const lastFocusable = cachedFocusableElements[cachedFocusableElements.length - 1];

                if (e.shiftKey && document.activeElement === firstFocusable) {
                    e.preventDefault();
                    lastFocusable.focus();
                } else if (!e.shiftKey && document.activeElement === lastFocusable) {
                    e.preventDefault();
                    firstFocusable.focus();
                }
            });
        }
    }

    /**
     * Dropdown menu enhancements
     * Add keyboard navigation for submenus
     */
    function initDropdowns() {
        const dropdownToggles = document.querySelectorAll('.wp-block-navigation-submenu__toggle');

        dropdownToggles.forEach(toggle => {
            // Handle Enter/Space to toggle dropdown
            toggle.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }

                // Arrow key navigation
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    const submenu = this.nextElementSibling;
                    if (submenu) {
                        const firstLink = submenu.querySelector('a');
                        if (firstLink) firstLink.focus();
                    }
                }
            });

            // Close dropdown on Escape
            const submenu = toggle.nextElementSibling;
            if (submenu) {
                submenu.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        toggle.click();
                        toggle.focus();
                    }
                });
            }
        });
    }

    /**
     * Mobile dropdown - FORCE hide submenus and toggle with chevron
     * This overrides WordPress's default behavior
     * Performance optimized: uses event delegation instead of cloning
     */
    function initMobileDropdowns() {
        function isMobile() {
            return window.innerWidth <= MOBILE_BREAKPOINT;
        }

        // Track which submenus have been set up
        const processedSubmenus = new WeakSet();

        function setupMobileSubmenus() {
            if (!isMobile()) return;

            const menuContainer = document.querySelector('.wp-block-navigation__responsive-container');
            if (!menuContainer || !menuContainer.classList.contains('is-menu-open')) return;

            const submenus = menuContainer.querySelectorAll('.wp-block-navigation-submenu');

            submenus.forEach(submenu => {
                // Skip if already processed
                if (processedSubmenus.has(submenu)) return;

                const submenuContainer = submenu.querySelector(':scope > .wp-block-navigation__submenu-container');
                if (!submenuContainer) return;

                // Mark as processed
                processedSubmenus.add(submenu);

                // Force hide submenu initially
                submenuContainer.style.setProperty('display', 'none', 'important');
                submenuContainer.style.setProperty('visibility', 'hidden', 'important');
                submenuContainer.style.setProperty('opacity', '0', 'important');
                submenuContainer.style.setProperty('height', '0', 'important');
                submenuContainer.style.setProperty('overflow', 'hidden', 'important');

                // Find toggle button
                const toggleBtn = submenu.querySelector(':scope > .wp-block-navigation-submenu__toggle');

                if (toggleBtn) {
                    // Style the toggle button
                    toggleBtn.style.setProperty('display', 'inline-flex', 'important');
                    toggleBtn.style.setProperty('align-items', 'center', 'important');
                    toggleBtn.style.setProperty('background', 'none', 'important');
                    toggleBtn.style.setProperty('background-color', 'transparent', 'important');
                    toggleBtn.style.setProperty('border', 'none', 'important');
                    toggleBtn.style.setProperty('cursor', 'pointer');
                    toggleBtn.style.setProperty('margin-left', '8px');
                    toggleBtn.style.setProperty('padding', '4px');
                    toggleBtn.style.setProperty('width', 'auto');
                    toggleBtn.style.setProperty('height', 'auto');
                    toggleBtn.style.setProperty('min-width', 'unset');
                    toggleBtn.style.setProperty('vertical-align', 'middle');

                    // Style the SVG
                    const svg = toggleBtn.querySelector('svg');
                    if (svg) {
                        svg.style.setProperty('width', '24px');
                        svg.style.setProperty('height', '24px');
                        svg.style.setProperty('vertical-align', 'middle');
                        svg.style.setProperty('transition', 'transform 0.3s ease, stroke 0.3s ease');
                        svg.style.setProperty('stroke', 'white');
                    }

                    // Click handler - use a named function to avoid duplicates
                    function handleToggleClick(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const isHidden = submenuContainer.style.display === 'none' ||
                                        getComputedStyle(submenuContainer).display === 'none';

                        const svg = toggleBtn.querySelector('svg');

                        if (isHidden) {
                            // Show submenu
                            submenuContainer.style.setProperty('display', 'block', 'important');
                            submenuContainer.style.setProperty('visibility', 'visible', 'important');
                            submenuContainer.style.setProperty('opacity', '1', 'important');
                            submenuContainer.style.setProperty('height', 'auto', 'important');
                            submenuContainer.style.setProperty('overflow', 'visible', 'important');
                            submenuContainer.style.setProperty('padding', '8px 0');
                            submenuContainer.style.setProperty('margin-top', '8px');
                            if (svg) {
                                svg.style.setProperty('transform', 'rotate(180deg)');
                                svg.style.setProperty('stroke', getComputedStyle(document.documentElement).getPropertyValue('--wp--preset--color--accent').trim() || '#c9f56f');
                            }
                        } else {
                            // Hide submenu
                            submenuContainer.style.setProperty('display', 'none', 'important');
                            submenuContainer.style.setProperty('visibility', 'hidden', 'important');
                            submenuContainer.style.setProperty('opacity', '0', 'important');
                            submenuContainer.style.setProperty('height', '0', 'important');
                            submenuContainer.style.setProperty('overflow', 'hidden', 'important');
                            submenuContainer.style.removeProperty('padding');
                            submenuContainer.style.removeProperty('margin-top');
                            if (svg) {
                                svg.style.setProperty('transform', 'rotate(0deg)');
                                svg.style.setProperty('stroke', 'white');
                            }
                        }
                    }

                    // Remove existing listener if any, then add new one
                    toggleBtn.removeEventListener('click', handleToggleClick, true);
                    toggleBtn.addEventListener('click', handleToggleClick, true);
                }
            });
        }

        function setupObserver() {
            if (!isMobile()) return;

            const menuContainer = document.querySelector('.wp-block-navigation__responsive-container');
            if (!menuContainer) return;

            // Watch for menu to open
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.target.classList.contains('is-menu-open')) {
                        // Single delayed call to ensure WordPress has rendered
                        requestAnimationFrame(() => {
                            setupMobileSubmenus();
                        });
                    }
                });
            });

            observer.observe(menuContainer, { attributes: true, attributeFilter: ['class'] });

            // Also run immediately if menu is already open
            if (menuContainer.classList.contains('is-menu-open')) {
                setupMobileSubmenus();
            }
        }

        // Initialize
        setupObserver();

        // Re-initialize only when crossing the breakpoint
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const currentWidth = window.innerWidth;
                const crossedBreakpoint = (lastWindowWidth <= MOBILE_BREAKPOINT && currentWidth > MOBILE_BREAKPOINT) ||
                                          (lastWindowWidth > MOBILE_BREAKPOINT && currentWidth <= MOBILE_BREAKPOINT);

                if (crossedBreakpoint) {
                    setupObserver();
                }
                lastWindowWidth = currentWidth;
            }, 250);
        });
    }

    /**
     * Active state for current page
     */
    function setActiveNavItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.wp-block-navigation-item a');

        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;

            if (linkPath === currentPath) {
                link.classList.add('is-active');
                link.setAttribute('aria-current', 'page');

                // Also mark parent if in submenu
                const parentItem = link.closest('.wp-block-navigation-submenu');
                if (parentItem) {
                    const parentLink = parentItem.querySelector(':scope > a');
                    if (parentLink) {
                        parentLink.classList.add('has-active-child');
                    }
                }
            }
        });
    }

    /**
     * Sticky header behavior
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');

        if (!header) return;

        let lastScrollTop = 0;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Add background/shadow when scrolled
            if (scrollTop > 10) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, { passive: true });
    }

    /**
     * Initialize all navigation modules
     */
    function init() {
        initMobileNav();
        initDropdowns();
        initMobileDropdowns();
        setActiveNavItem();
        initStickyHeader();
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
