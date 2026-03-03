/**
 * Hill Street Realty - Main JavaScript
 */

(function() {
    'use strict';

    /**
     * Scroll Animation Observer
     * Adds 'is-visible' class when elements enter viewport
     * Auto-detects sections and cards for Homelio-style animations
     */
    function initScrollAnimations() {
        // Manual animation classes
        const manualAnimated = document.querySelectorAll('.hsr-animate-up, .hsr-animate-fade, .hsr-stagger');

        // Auto-detect sections (skip hero which has CSS animations)
        const sections = document.querySelectorAll('.wp-block-group.alignfull:not(.hero-homelio)');

        // Auto-detect cards and columns
        const cards = document.querySelectorAll('.transaction-card, .wp-block-column');

        // Headings in sections
        const headings = document.querySelectorAll('.wp-block-group.alignfull h2');

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -80px 0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe manual elements
        manualAnimated.forEach(el => observer.observe(el));

        // Add animation class and observe sections
        sections.forEach((section, index) => {
            section.classList.add('section-animate');
            observer.observe(section);
        });

        // Add staggered animation to cards
        cards.forEach((card, index) => {
            card.classList.add('card-animate');
            card.style.transitionDelay = (index % 3) * 0.15 + 's';
            observer.observe(card);
        });

        // Animate headings
        headings.forEach(heading => {
            heading.classList.add('heading-animate');
            observer.observe(heading);
        });
    }

    /**
     * Animated Counter
     * Counts up numbers when they enter viewport
     */
    function initCounters() {
        const counters = document.querySelectorAll('[data-counter]');

        if (!counters.length) return;

        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => observer.observe(counter));
    }

    /**
     * Animate a single counter element
     */
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-counter'), 10);
        const duration = parseInt(element.getAttribute('data-duration'), 10) || 2000;
        const suffix = element.getAttribute('data-suffix') || '';
        const prefix = element.getAttribute('data-prefix') || '';

        let start = 0;
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Easing function (ease-out)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(easeOut * target);

            element.textContent = prefix + current.toLocaleString() + suffix;

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = prefix + target.toLocaleString() + suffix;
            }
        }

        requestAnimationFrame(updateCounter);
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Header scroll behavior moved to navigation.js to avoid duplicate listeners

    /**
     * Smooth image loading with fade-in effect
     * SRP: Handles ONLY image load states
     * OCP: Extensible - add new image selectors without modifying logic
     */
    function initLazyImages() {
        // Handle ALL images, not just lazy ones
        const allImages = document.querySelectorAll('img');

        allImages.forEach(img => {
            // Skip hero images (should show immediately)
            if (img.closest('.hero-homelio') || img.closest('.site-header')) {
                img.classList.add('is-loaded');
                return;
            }

            // Add load listener
            img.addEventListener('load', function() {
                // Small delay for smoother visual transition
                requestAnimationFrame(() => {
                    this.classList.add('is-loaded');
                });
            });

            // Handle error state gracefully
            img.addEventListener('error', function() {
                this.classList.add('is-loaded'); // Show placeholder/broken state
            });

            // If already loaded (cached)
            if (img.complete && img.naturalHeight !== 0) {
                img.classList.add('is-loaded');
            }
        });
    }

    /**
     * Initialize content-visibility observer for smooth section loading
     * DIP: Depends on IntersectionObserver abstraction, not DOM specifics
     */
    function initSmoothSections() {
        // Sections with content-visibility: auto get a class when near viewport
        const sections = document.querySelectorAll('[class*="homepage-"]');

        if (!sections.length || !('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('content-ready');
                }
            });
        }, {
            rootMargin: '200px 0px', // Load slightly before visible
            threshold: 0
        });

        sections.forEach(section => observer.observe(section));
    }

    /**
     * Video popup/lightbox functionality
     */
    function initVideoPopup() {
        const videoTriggers = document.querySelectorAll('[data-video-popup]');

        if (!videoTriggers.length) return;

        videoTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const videoUrl = this.getAttribute('data-video-popup');
                openVideoPopup(videoUrl);
            });
        });
    }

    /**
     * Validate video URL - only allow YouTube and Vimeo
     */
    function isValidVideoUrl(url) {
        if (!url || typeof url !== 'string') return false;

        // Allowed video providers
        const allowedPatterns = [
            /^https?:\/\/(www\.)?youtube\.com\/embed\//i,
            /^https?:\/\/(www\.)?youtube\.com\/watch/i,
            /^https?:\/\/youtu\.be\//i,
            /^https?:\/\/(player\.)?vimeo\.com\//i
        ];

        return allowedPatterns.some(pattern => pattern.test(url));
    }

    function openVideoPopup(videoUrl) {
        // Validate URL before creating iframe
        if (!isValidVideoUrl(videoUrl)) {
            console.warn('Invalid video URL blocked:', videoUrl);
            return;
        }

        // Sanitize URL - encode any special characters
        const sanitizedUrl = encodeURI(videoUrl);

        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'hsr-video-overlay';
        overlay.innerHTML = `
            <div class="hsr-video-popup">
                <button class="hsr-video-close" aria-label="Close video">&times;</button>
                <div class="hsr-video-container">
                    <iframe src="${sanitizedUrl}?autoplay=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>
                </div>
            </div>
        `;

        document.body.appendChild(overlay);
        document.body.style.overflow = 'hidden';

        // Fade in
        requestAnimationFrame(() => {
            overlay.classList.add('is-active');
        });

        // Close handlers
        overlay.querySelector('.hsr-video-close').addEventListener('click', closeVideoPopup);
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                closeVideoPopup();
            }
        });

        // ESC key - store handler reference for cleanup
        function escHandler(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        }
        document.addEventListener('keydown', escHandler);

        // Store handler reference on overlay for cleanup
        overlay._escHandler = escHandler;
    }

    function closeVideoPopup() {
        const overlay = document.querySelector('.hsr-video-overlay');
        if (overlay) {
            // Remove ESC key listener
            if (overlay._escHandler) {
                document.removeEventListener('keydown', overlay._escHandler);
            }

            overlay.classList.remove('is-active');
            setTimeout(() => {
                overlay.remove();
                document.body.style.overflow = '';
            }, 300);
        }
    }

    /**
     * Initialize all modules
     * SRP: Orchestration only - each function handles its own concern
     */
    function init() {
        initScrollAnimations();
        initCounters();
        initSmoothScroll();
        initLazyImages();
        initSmoothSections();
        initVideoPopup();
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
