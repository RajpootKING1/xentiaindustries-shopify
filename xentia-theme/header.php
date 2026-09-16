<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Favicon Assets (.webp & .ico) -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/Assets/favicon/apple-touch-icon.webp">
    <link rel="icon" type="image/webp" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/Assets/favicon/favicon-96x96.webp">
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/Assets/favicon/favicon.svg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/Assets/favicon/favicon.ico">

    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-obsidian text-xsilver-light overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>

<!-- ==========================================================================
   1. FORTUNE 500 LUXURY PRELOADER (GOLDEN CREST & LASER SHIMMER)
   ========================================================================== -->
<div id="xentia-preloader">
    <div class="luxury-preloader-content">
        <div class="gold-crest-emblem relative mx-auto mb-6">
            <div class="crest-ring-pulse"></div>
            <div class="crest-center-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/logo-for-website.webp" alt="Xentia Industries Crest" class="h-12 w-auto mx-auto object-contain">
            </div>
        </div>

        <div class="font-cinzel text-xs tracking-[0.4em] gold-gradient-text uppercase font-bold mb-2">
            XENTIA INDUSTRIES • SIALKOT, PAKISTAN
        </div>
        <p class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-[0.2em] mb-4">
            German Stainless Steel Surgical Precision
        </p>

        <div class="preloader-progress-text">
            <span id="preloader-percent">0</span>% INITIALIZING
        </div>

        <div class="preloader-bar-bg">
            <div class="preloader-bar-fill" id="preloader-bar"></div>
        </div>
    </div>
</div>

<!-- ==========================================================================
   2. VIP / WHOLESALER POPUP MODAL
   ========================================================================== -->
<div id="wholesaler-vip-modal" class="fixed inset-0 z-[99990] hidden items-center justify-center bg-black/85 backdrop-blur-md p-4">
    <div class="relative w-full max-w-lg glass-card border-xgold/40 p-8 rounded-xl shadow-2xl text-center">
        <button id="close-vip-modal" class="absolute top-4 right-4 text-xsilver hover:text-xgold transition">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-2xl">
            <i class="fa-solid fa-crown"></i>
        </div>

        <span class="badge-pill-gold mb-2">B2B EXCLUSIVE PORTAL</span>
        <h3 class="font-cinzel text-2xl font-bold text-xgold-light mt-2 mb-2">JOIN XENTIA GLOBAL WHOLESALE</h3>
        <p class="text-xs text-xsilver mb-6">
            Get instant access to full factory-direct bulk pricing catalogs, custom laser logo branding samples, & OEM engineering support.
        </p>

        <form id="vip-modal-form" class="space-y-4">
            <input type="text" placeholder="Clinic / Company Name" required class="w-full bg-black/50 border border-xgold/20 rounded-md px-4 py-3 text-sm text-white focus:outline-none focus:border-xgold">
            <input type="email" placeholder="Professional Email Address" required class="w-full bg-black/50 border border-xgold/20 rounded-md px-4 py-3 text-sm text-white focus:outline-none focus:border-xgold">
            <button type="submit" class="w-full btn-gold-glow py-3 text-xs tracking-wider">
                UNLOCK WHOLESALE CATALOG & 15% OFF <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </form>
    </div>
</div>

<!-- ==========================================================================
   3. MOBILE SLIDE-OUT DRAWER
   ========================================================================== -->
<div id="mobile-drawer-overlay" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[99994] hidden"></div>
<aside id="mobile-drawer" class="p-6 flex flex-col justify-between overflow-y-auto">
    <div>
        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/logo-for-website.webp" alt="Xentia Logo" class="h-8 w-auto">
            <button id="close-mobile-drawer" class="text-xsilver text-xl hover:text-xgold">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <nav class="space-y-4 text-sm font-montserrat font-bold uppercase tracking-wider text-xsilver">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="block py-2 text-xgold border-b border-white/5">HOME</a>
            <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="block py-2 hover:text-xgold border-b border-white/5">ABOUT US</a>
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="block py-2 hover:text-xgold border-b border-white/5">PRODUCTS</a>
            <a href="<?php echo esc_url(home_url('/quality-specs')); ?>" class="block py-2 hover:text-xgold border-b border-white/5">QUALITY SPECS</a>
            <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="block py-2 text-xgold border-b border-white/5">OEM / B2B PORTAL</a>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="block py-2 hover:text-xgold">CONTACT US</a>
        </nav>
    </div>

    <div class="pt-6 border-t border-white/10 space-y-3">
        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-gold-glow py-3 text-xs">
            <i class="fa-solid fa-file-signature"></i> B2B QUOTE INQUIRY
        </a>
        <div class="text-[11px] text-xsilver-dark text-center">
            <i class="fa-solid fa-phone text-xgold mr-1"></i> +92 349 7400818
        </div>
    </div>
</aside>

<!-- ==========================================================================
   4. METALLIC LUXURY HEADER (WIDESCREEN FLUID NAV)
   ========================================================================== -->
<header class="relative z-40 w-full border-b border-xgold/15 bg-obsidian/95 backdrop-blur-md">
    <!-- Top Contact Bar -->
    <div class="hidden md:flex justify-between items-center widescreen-container py-2 border-b border-white/5 text-xs text-xsilver">
        <div class="flex items-center space-x-6">
            <a href="tel:+923497400818" class="hover:text-xgold transition flex items-center gap-2">
                <i class="fa-solid fa-phone text-xgold"></i> +92 349 7400818
            </a>
            <a href="mailto:info@xentiaindustries.com" class="hover:text-xgold transition flex items-center gap-2">
                <i class="fa-solid fa-envelope text-xgold"></i> info@xentiaindustries.com
            </a>
            <span class="text-white/20">|</span>
            <span class="flex items-center gap-2 text-xsilver-dark">
                <i class="fa-solid fa-location-dot text-xgold"></i> Sialkot, Pakistan (Global Export Hub)
            </span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-xgold-light font-semibold">Worldwide Delivery: DHL / FedEx</span>
            <div class="flex items-center gap-2 border border-xgold/20 px-2 py-0.5 rounded text-[11px] bg-titanium">
                <span class="text-xgold">USD ($)</span>
                <i class="fa-solid fa-chevron-down text-[9px] text-xsilver"></i>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="widescreen-container py-4 flex items-center justify-between">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/logo-for-website.webp" alt="Xentia Industries Logo" class="h-10 md:h-14 w-auto object-contain transition-transform group-hover:scale-105 duration-300">
        </a>

        <nav class="hidden lg:flex items-center space-x-8 text-xs font-montserrat font-semibold tracking-wider text-xsilver-light uppercase">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-xgold transition py-2 <?php echo is_front_page() ? 'text-xgold border-b-2 border-xgold' : ''; ?>">HOME</a>
            <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="hover:text-xgold transition py-2 <?php echo is_page('about-us') ? 'text-xgold border-b-2 border-xgold' : ''; ?>">ABOUT US</a>
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="hover:text-xgold transition py-2 <?php echo is_shop() ? 'text-xgold border-b-2 border-xgold' : ''; ?>">PRODUCTS</a>
            <a href="<?php echo esc_url(home_url('/quality-specs')); ?>" class="hover:text-xgold transition py-2 <?php echo is_page('quality-specs') ? 'text-xgold border-b-2 border-xgold' : ''; ?>">QUALITY SPECS</a>
            <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="hover:text-xgold transition py-2 text-xgold flex items-center gap-1">
                <i class="fa-solid fa-industry text-[11px]"></i> OEM / ODM
            </a>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="hover:text-xgold transition py-2 <?php echo is_page('contact-us') ? 'text-xgold border-b-2 border-xgold' : ''; ?>">CONTACT US</a>
        </nav>

        <div class="flex items-center space-x-4">
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="w-10 h-10 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
            </a>

            <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="hidden sm:inline-flex btn-gold-glow py-2.5 px-4 text-xs font-montserrat tracking-wider">
                <i class="fa-solid fa-file-signature"></i> B2B QUOTE
            </a>

            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="relative w-10 h-10 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                    <i class="fa-solid fa-bag-shopping text-sm"></i>
                    <span class="cart-badge-count"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : '0'; ?></span>
                </a>
            <?php endif; ?>

            <button id="mobile-menu-toggle" class="lg:hidden w-10 h-10 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xgold text-lg">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</header>
