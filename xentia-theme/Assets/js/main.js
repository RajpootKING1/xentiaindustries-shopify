/**
 * Xentia Industries Main Interactive Engine (Version 2.0 - Fortune 500 Agency Edition)
 * 
 * @package XentiaTheme
 */

jQuery(document).ready(function ($) {
    'use strict';

    /* ==========================================================================
       1. INDUSTRIAL GEAR PRELOADER DISMISSAL
       ========================================================================== */
    let progress = 0;
    const progressPercent = $('#preloader-percent');
    const progressBar = $('#preloader-bar');
    const preloader = $('#xentia-preloader');

    const progressInterval = setInterval(function () {
        if (progress < 90) {
            progress += Math.floor(Math.random() * 15) + 5;
            if (progress > 90) progress = 90;
            progressPercent.text(progress);
            progressBar.css('width', progress + '%');
        }
    }, 80);

    $(window).on('load', function () {
        clearInterval(progressInterval);
        progressPercent.text(100);
        progressBar.css('width', '100%');

        setTimeout(function () {
            preloader.addClass('dismissed');
        }, 300);
    });

    setTimeout(function () {
        if (!preloader.hasClass('dismissed')) {
            preloader.addClass('dismissed');
        }
    }, 3000);

    /* ==========================================================================
       2. TYPEWRITER ANIMATION ENGINE
       ========================================================================== */
    const typewriterElem = $('#typewriter-element');
    if (typewriterElem.length) {
        const phrases = [
            "Precision Beyond Expectation.",
            "Innovation in Surgical & Styling Craftsmanship.",
            "Excellence Trusted by Surgeons in 70+ Countries."
        ];
        let phraseIdx = 0;
        let charIdx = 0;
        let isDeleting = false;

        function typeLoop() {
            const currentPhrase = phrases[phraseIdx];
            if (isDeleting) {
                typewriterElem.text(currentPhrase.substring(0, charIdx - 1));
                charIdx--;
            } else {
                typewriterElem.text(currentPhrase.substring(0, charIdx + 1));
                charIdx++;
            }

            let typeSpeed = isDeleting ? 40 : 80;

            if (!isDeleting && charIdx === currentPhrase.length) {
                typeSpeed = 2500;
                isDeleting = true;
            } else if (isDeleting && charIdx === 0) {
                isDeleting = false;
                phraseIdx = (phraseIdx + 1) % phrases.length;
                typeSpeed = 400;
            }

            setTimeout(typeLoop, typeSpeed);
        }

        typeLoop();
    }

    /* ==========================================================================
       3. INTERACTIVE METALLIC CURSOR & MAGNETIC HOVER EFFECT
       ========================================================================== */
    const cursorDot = document.getElementById('cursor-dot');
    const cursorRing = document.getElementById('cursor-ring');

    if (cursorDot && cursorRing && window.matchMedia('(pointer: fine)').matches) {
        let mouseX = 0, mouseY = 0;
        let ringX = 0, ringY = 0;

        $(window).on('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            cursorDot.style.left = mouseX + 'px';
            cursorDot.style.top = mouseY + 'px';
        });

        function renderCursor() {
            ringX += (mouseX - ringX) * 0.18;
            ringY += (mouseY - ringY) * 0.18;
            cursorRing.style.left = ringX + 'px';
            cursorRing.style.top = ringY + 'px';
            requestAnimationFrame(renderCursor);
        }
        renderCursor();

        $(document).on('mouseenter', 'a, button, .glass-card, input, select', function () {
            $('body').addClass('xentia-cursor-hover');
        }).on('mouseleave', 'a, button, .glass-card, input, select', function () {
            $('body').removeClass('xentia-cursor-hover');
        });
    }

    /* ==========================================================================
       4. MOBILE SLIDE-OUT DRAWER TOGGLE
       ========================================================================== */
    const mobileDrawer = $('#mobile-drawer');
    const drawerOverlay = $('#mobile-drawer-overlay');

    $('#mobile-menu-toggle').on('click', function () {
        mobileDrawer.addClass('drawer-open');
        drawerOverlay.removeClass('hidden');
    });

    $('#close-mobile-drawer, #mobile-drawer-overlay').on('click', function () {
        mobileDrawer.removeClass('drawer-open');
        drawerOverlay.addClass('hidden');
    });

    /* ==========================================================================
       5. VIP / WHOLESALER POPUP MODAL
       ========================================================================== */
    const vipModal = $('#wholesaler-vip-modal');
    if (vipModal.length && !localStorage.getItem('xentia_vip_modal_dismissed')) {
        setTimeout(function () {
            vipModal.removeClass('hidden').addClass('flex');
        }, 3500);
    }

    $('#close-vip-modal').on('click', function () {
        vipModal.removeClass('flex').addClass('hidden');
        localStorage.setItem('xentia_vip_modal_dismissed', '1');
    });

    $('#vip-modal-form').on('submit', function (e) {
        e.preventDefault();
        alert('Thank you for registering! Your Wholesale Catalog & 15% Discount Code has been sent to your email.');
        vipModal.removeClass('flex').addClass('hidden');
        localStorage.setItem('xentia_vip_modal_dismissed', '1');
    });

    /* ==========================================================================
       6. SEARCH MODAL TOGGLE
       ========================================================================== */
    $('#open-search-btn').on('click', function () {
        $('#search-modal').removeClass('hidden').addClass('flex');
    });

    $('#close-search-btn').on('click', function () {
        $('#search-modal').removeClass('flex').addClass('hidden');
    });

    /* ==========================================================================
       7. INTERACTIVE WHOLESALE CALCULATOR (page-wholesale.php)
       ========================================================================== */
    const qtyInput = $('#b2b-qty-input');
    if (qtyInput.length) {
        function updateWholesaleSummary() {
            let qty = parseInt(qtyInput.val()) || 50;
            if (qty < 1) qty = 1;

            const basePrice = 85.00;
            let discountRate = 0.0;
            let discountText = '0% (Retail)';

            $('.tier-box').removeClass('active-tier');

            if (qty >= 500) {
                discountRate = 0.50;
                discountText = '50% OFF';
                $('#tier-box-4').addClass('active-tier');
            } else if (qty >= 200) {
                discountRate = 0.35;
                discountText = '35% OFF';
                $('#tier-box-3').addClass('active-tier');
            } else if (qty >= 50) {
                discountRate = 0.20;
                discountText = '20% OFF';
                $('#tier-box-2').addClass('active-tier');
            } else {
                $('#tier-box-1').addClass('active-tier');
            }

            const steelMultiplier = parseFloat($('#steel-grade-select option:selected').data('multiplier')) || 1.0;
            const steelName = $('#steel-grade-select option:selected').text().split('[')[0];

            let addonCost = 0.0;
            const logoType = $('#logo-type-select').val();
            if (logoType === 'laser_text') addonCost += 0.50;
            if (logoType === 'custom_vector') addonCost += 1.00;

            const packaging = $('#packaging-select').val();
            if (packaging === 'leatherette') addonCost += 2.50;
            if (packaging === 'wooden_box') addonCost += 6.00;

            const effectiveUnitCost = (basePrice * (1 - discountRate) * steelMultiplier) + addonCost;
            const totalEstimate = effectiveUnitCost * qty;
            const deposit50Percent = totalEstimate * 0.50;

            $('#summary-discount-tag').text(discountText);
            $('#summary-unit-cost').text('$' + effectiveUnitCost.toFixed(2) + ' USD');
            $('#summary-steel-name').text(steelName);
            $('#summary-addon-cost').text('$' + addonCost.toFixed(2) + ' / pc');
            $('#summary-total-cost').text('$' + totalEstimate.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' USD');
            $('#summary-deposit-cost').text('$' + deposit50Percent.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' USD');
        }

        qtyInput.on('input change', updateWholesaleSummary);
        $('#steel-grade-select, #logo-type-select, #packaging-select').on('change', updateWholesaleSummary);
        updateWholesaleSummary();
    }

    /* ==========================================================================
       8. AJAX B2B QUOTE SUBMISSION
       ========================================================================== */
    $('#btn-submit-b2b-quote').on('click', function () {
        const name = $('#b2b-name').val();
        const email = $('#b2b-email').val();
        const responseMsg = $('#b2b-response-msg');

        if (!name || !email) {
            alert('Please fill in your Name & Email address.');
            return;
        }

        responseMsg.removeClass('hidden bg-red-900/50 bg-green-900/50 text-red-200 text-green-200')
                   .addClass('bg-xgold/20 text-xgold')
                   .text('Submitting your B2B inquiry to senior engineers...');

        $.ajax({
            url: xentia_vars.ajax_url,
            type: 'POST',
            data: {
                action: 'xentia_submit_b2b_quote',
                nonce: xentia_vars.nonce,
                name: name,
                email: email,
                company: $('#b2b-company').val(),
                phone: $('#b2b-phone').val(),
                quantity: $('#b2b-qty-input').val(),
                details: $('#b2b-notes').val()
            },
            success: function (res) {
                if (res.success) {
                    responseMsg.removeClass('bg-xgold/20 text-xgold')
                               .addClass('bg-green-900/50 text-green-200')
                               .text(res.data.message);
                } else {
                    responseMsg.removeClass('bg-xgold/20 text-xgold')
                               .addClass('bg-red-900/50 text-red-200')
                               .text(res.data.message);
                }
            },
            error: function () {
                responseMsg.removeClass('bg-xgold/20 text-xgold')
                           .addClass('bg-red-900/50 text-red-200')
                           .text('Error connecting to server. Please email info@xentiaindustries.com directly.');
            }
        });
    });

    $('#btn-checkout-deposit').on('click', function () {
        alert('Redirecting to 50% Advance Deposit Checkout...');
        window.location.href = xentia_vars.cart_url;
    });

    /* Contact Page Form Submit Handlers */
    $('#xentia-main-contact-form, #preview-contact-form').on('submit', function (e) {
        e.preventDefault();
        $('#contact-form-response').removeClass('hidden');
        alert('Thank you! Your inquiry has been sent directly to Xentia Sales Engineering. We will reply within 4 hours.');
        this.reset();
    });
});
