<?php
/**
 * Xentia Industries Theme Footer
 * 
 * @package XentiaTheme
 */
?>

<!-- ==========================================================================
   1. INDUSTRIAL 4-COLUMN FOOTER & CERTIFICATION BADGES (WIDESCREEN FLUID)
   ========================================================================== -->
<footer class="relative z-30 bg-titanium border-t border-xgold/20 text-xsilver pt-16 pb-12">
    <div class="widescreen-container">
        
        <!-- Trust Certifications Bar -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pb-12 mb-12 border-b border-white/10 text-center">
            <div class="flex items-center justify-center gap-3 p-4 glass-card-chrome rounded-lg">
                <i class="fa-solid fa-shield-halved text-2xl text-xgold"></i>
                <div class="text-left">
                    <h5 class="text-xs font-montserrat font-bold text-white uppercase">ISO 13485</h5>
                    <p class="text-[10px] text-xsilver-dark">Medical Devices Quality</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3 p-4 glass-card-chrome rounded-lg">
                <i class="fa-solid fa-certificate text-2xl text-xgold"></i>
                <div class="text-left">
                    <h5 class="text-xs font-montserrat font-bold text-white uppercase">CE MARK</h5>
                    <p class="text-[10px] text-xsilver-dark">European Conformity</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3 p-4 glass-card-chrome rounded-lg">
                <i class="fa-solid fa-award text-2xl text-xgold"></i>
                <div class="text-left">
                    <h5 class="text-xs font-montserrat font-bold text-white uppercase">GMP CERTIFIED</h5>
                    <p class="text-[10px] text-xsilver-dark">Good Manufacturing Practice</p>
                </div>
            </div>
            <div class="flex items-center justify-center gap-3 p-4 glass-card-chrome rounded-lg">
                <i class="fa-solid fa-file-contract text-2xl text-xgold"></i>
                <div class="text-left">
                    <h5 class="text-xs font-montserrat font-bold text-white uppercase">FDA COMPLIANCE</h5>
                    <p class="text-[10px] text-xsilver-dark">USA Export Registered</p>
                </div>
            </div>
        </div>

        <!-- Main Widescreen Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-10">
            
            <!-- Column 1: Brand & Bio -->
            <div class="space-y-4 xl:col-span-2">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/logo-for-website.webp" alt="Xentia Industries" class="h-12 w-auto object-contain mb-3">
                </a>
                <p class="text-xs leading-relaxed text-xsilver-dark max-w-md">
                    Xentia Industries is a premier manufacturer and global exporter of high-precision Surgical Instruments, Plastic Surgery Tools, Dental Instruments, and Professional Styling Scissors forged from German Stainless Steel.
                </p>
                <div class="flex space-x-3 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                        <i class="fa-brands fa-facebook-f text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                        <i class="fa-brands fa-instagram text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                        <i class="fa-brands fa-linkedin-in text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/5 border border-xgold/20 flex items-center justify-center text-xsilver hover:text-xgold hover:border-xgold transition">
                        <i class="fa-brands fa-youtube text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h4 class="font-cinzel text-sm font-bold text-xgold uppercase mb-4 tracking-wider">Quick Links</h4>
                <ul class="space-y-2.5 text-xs">
                    <li><a href="<?php echo esc_url(home_url('/about-us')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> About Xentia</a></li>
                    <li><a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> B2B Wholesale Portal</a></li>
                    <li><a href="<?php echo esc_url(home_url('/quality')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> German Steel Specs</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Full Product Catalog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> OEM Inquiry</a></li>
                </ul>
            </div>

            <!-- Column 3: Surgical Specialties -->
            <div>
                <h4 class="font-cinzel text-sm font-bold text-xgold uppercase mb-4 tracking-wider">Specialty Tools</h4>
                <ul class="space-y-2.5 text-xs">
                    <li><a href="<?php echo esc_url(home_url('/category/plastic-surgery')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Rhinoplasty & Facial Tools</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/hairdressing-scissors')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Japanese Steel Styling Shears</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/dental-instruments')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Dental Extraction Forceps</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/tungsten-carbide')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Tungsten Carbide Scissors</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/micro-surgery')); ?>" class="hover:text-xgold transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[9px] text-xgold"></i> Micro Surgical Forceps</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact & Factory Hub -->
            <div class="space-y-3">
                <h4 class="font-cinzel text-sm font-bold text-xgold uppercase mb-4 tracking-wider">Global Headquarters</h4>
                <p class="text-xs text-xsilver flex items-start gap-2">
                    <i class="fa-solid fa-building text-xgold mt-1"></i>
                    <span>Export Industrial Zone, Sialkot 51310, Punjab, Pakistan</span>
                </p>
                <p class="text-xs text-xsilver flex items-center gap-2">
                    <i class="fa-solid fa-phone text-xgold"></i>
                    <a href="tel:+923497400818" class="hover:text-xgold">+92 349 7400818</a>
                </p>
                <p class="text-xs text-xsilver flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-xgold"></i>
                    <a href="mailto:info@xentiaindustries.com" class="hover:text-xgold">info@xentiaindustries.com</a>
                </p>
                <p class="text-xs text-xsilver flex items-center gap-2">
                    <i class="fa-solid fa-globe text-xgold"></i>
                    <a href="https://xentiaindustries.com" target="_blank" class="hover:text-xgold">www.xentiaindustries.com</a>
                </p>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="mt-12 pt-8 border-t border-white/5 flex flex-col md:flex-row items-center justify-between text-xs text-xsilver-dark gap-4">
            <p>© <?php echo date('Y'); ?> <strong class="text-white font-montserrat">Xentia Industries</strong>. All Rights Reserved. Precision Beyond Expectation.</p>
            <div class="flex items-center space-x-4 text-lg text-xsilver">
                <i class="fa-brands fa-cc-visa hover:text-xgold transition"></i>
                <i class="fa-brands fa-cc-mastercard hover:text-xgold transition"></i>
                <i class="fa-solid fa-building-columns hover:text-xgold transition" title="Bank Wire Transfer"></i>
                <i class="fa-solid fa-plane-departure hover:text-xgold transition" title="DHL / Express Air"></i>
            </div>
        </div>
    </div>
</footer>

<!-- ==========================================================================
   2. MOBILE STICKY BOTTOM APP BAR (Native App Experience)
   ========================================================================== -->
<div class="mobile-bottom-app-bar">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-item <?php echo is_front_page() ? 'active' : ''; ?>">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
    </a>
    <a href="<?php echo esc_url(home_url('/categories')); ?>" class="mobile-nav-item">
        <i class="fa-solid fa-layer-group"></i>
        <span>Categories</span>
    </a>
    <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="mobile-nav-item text-xgold">
        <i class="fa-solid fa-file-signature"></i>
        <span>B2B Quote</span>
    </a>
    <a href="<?php echo function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#'; ?>" class="mobile-nav-item relative">
        <i class="fa-solid fa-bag-shopping"></i>
        <span>Cart</span>
        <span class="cart-badge-count" id="mobile-cart-count">
            <?php echo class_exists('WooCommerce') ? WC()->cart->get_cart_contents_count() : '0'; ?>
        </span>
    </a>
    <a href="<?php echo function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : '#'; ?>" class="mobile-nav-item">
        <i class="fa-solid fa-user"></i>
        <span>Account</span>
    </a>
</div>

<!-- ==========================================================================
   3. CUSTOM INTERACTIVE METALLIC CURSOR DOM ELEMENTS
   ========================================================================== -->
<div class="xentia-cursor-dot" id="cursor-dot"></div>
<div class="xentia-cursor-ring" id="cursor-ring"></div>

<?php wp_footer(); ?>
</body>
</html>
