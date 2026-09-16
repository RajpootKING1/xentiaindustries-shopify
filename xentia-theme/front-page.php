<?php
/**
 * Template Name: Front Page Template
 * 
 * @package XentiaTheme
 */

get_header();
?>

<!-- ==========================================================================
   1. DESKTOP HERO SECTION (CINEMATIC FULL-WIDTH CENTERED SHOWCASE)
   ========================================================================== -->
<section class="hero-wrapper relative min-h-[90vh] flex items-center justify-center py-20 overflow-hidden bg-obsidian">
    <!-- YouTube Video Background Container -->
    <div class="hero-video-container">
        <iframe id="hero-yt-player" 
                src="https://www.youtube.com/embed/Lu-k3_RsUY4?autoplay=1&mute=1&loop=1&playlist=Lu-k3_RsUY4&controls=0&playsinline=1&showinfo=0&rel=0&enablejsapi=1" 
                title="Xentia Industries Video" 
                allow="autoplay; encrypted-media" 
                allowfullscreen>
        </iframe>
    </div>

    <!-- Dark Mesh Overlay -->
    <div class="hero-mesh-overlay"></div>

    <!-- Centered Hero Content -->
    <div class="hero-content-inner widescreen-container relative z-10 text-center max-w-4xl mx-auto space-y-8">
        
        <!-- Tagline Badge -->
        <div class="inline-flex">
            <div class="badge-pill-gold">
                <i class="fa-solid fa-shield-halved text-xgold text-xs"></i>
                <span>GERMAN STAINLESS STEEL • TRUSTED WORLDWIDE</span>
            </div>
        </div>

        <!-- Main Headline -->
        <div class="space-y-2">
            <h1 class="font-cinzel text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-none uppercase">
                <span class="gold-gradient-text block mb-2">PREMIUM</span>
                <span class="text-white block mb-2">PLASTIC SURGERY</span>
                <span class="text-xs sm:text-base font-montserrat font-bold text-xgold tracking-[0.4em] block flex items-center justify-center gap-4 pt-2">
                    <span class="h-[1px] w-16 bg-xgold/50 inline-block"></span>
                    INSTRUMENTS
                    <span class="h-[1px] w-16 bg-xgold/50 inline-block"></span>
                </span>
            </h1>
        </div>

        <!-- Typewriter Subtitle -->
        <div class="text-sm sm:text-xl text-xsilver font-inter font-light h-8 flex items-center justify-center">
            <span class="typewriter-text font-montserrat text-xgold-light" id="typewriter-element">Precision Crafted. Perfectly Balanced. Designed for Surgeons.</span>
        </div>

        <!-- Dual CTAs -->
        <div class="flex flex-wrap items-center justify-center gap-5 pt-2">
            <a href="<?php echo esc_url(home_url('/shop')); ?>" class="btn-gold-glow px-8 py-3.5 text-xs">
                <i class="fa-solid fa-book-open"></i> VIEW CATALOG <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn-chrome-ghost px-8 py-3.5 text-xs">
                CONTACT US <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </div>

        <!-- 4 Circular Feature Badges (Horizontal Row) -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 pt-8 text-xs border-t border-white/10 max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-3">
                <div class="w-10 h-10 rounded-full border border-xgold/40 bg-xgold/10 flex items-center justify-center text-xgold shrink-0 shadow-lg">
                    <i class="fa-solid fa-shield-halved text-base"></i>
                </div>
                <div class="text-left">
                    <strong class="block text-white font-montserrat text-[11px] uppercase">GERMAN STEEL</strong>
                    <span class="text-[10px] text-xsilver-dark">Premium Grade</span>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3">
                <div class="w-10 h-10 rounded-full border border-xgold/40 bg-xgold/10 flex items-center justify-center text-xgold shrink-0 shadow-lg">
                    <i class="fa-solid fa-crosshair text-base"></i>
                </div>
                <div class="text-left">
                    <strong class="block text-white font-montserrat text-[11px] uppercase">PRECISION CRAFT</strong>
                    <span class="text-[10px] text-xsilver-dark">Superior Results</span>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3">
                <div class="w-10 h-10 rounded-full border border-xgold/40 bg-xgold/10 flex items-center justify-center text-xgold shrink-0 shadow-lg">
                    <i class="fa-solid fa-temperature-arrow-up text-base"></i>
                </div>
                <div class="text-left">
                    <strong class="block text-white font-montserrat text-[11px] uppercase">AUTOCLAVABLE</strong>
                    <span class="text-[10px] text-xsilver-dark">Rust Proof</span>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3">
                <div class="w-10 h-10 rounded-full border border-xgold/40 bg-xgold/10 flex items-center justify-center text-xgold shrink-0 shadow-lg">
                    <i class="fa-solid fa-globe text-base"></i>
                </div>
                <div class="text-left">
                    <strong class="block text-white font-montserrat text-[11px] uppercase">TRUSTED PROS</strong>
                    <span class="text-[10px] text-xsilver-dark">70+ Countries</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
   2. SPECIALTY SURGICAL QUICK CATEGORY BAR
   ========================================================================== -->
<section class="bg-titanium border-y border-xgold/20 py-4 overflow-x-auto whitespace-nowrap">
    <div class="widescreen-container flex items-center justify-between gap-4 text-[11px] font-montserrat font-semibold text-xsilver tracking-wider">
        <a href="<?php echo esc_url(home_url('/category/plastic-surgery')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-notes-medical text-xgold"></i> RHINOPLASTY
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/facelift')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-user-doctor text-xgold"></i> FACELIFT
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/breast-surgery')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-scissors text-xgold"></i> BREAST SURGERY
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/liposuction')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-syringe text-xgold"></i> LIPOSUCTION
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/reconstructive')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-hand-holding-medical text-xgold"></i> RECONSTRUCTIVE
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/hairdressing-scissors')); ?>" class="hover:text-xgold transition flex items-center gap-2">
            <i class="fa-solid fa-scissors text-xgold"></i> STYLING SHEARS
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/category/tungsten-carbide')); ?>" class="hover:text-xgold transition flex items-center gap-2 text-xgold">
            <i class="fa-solid fa-gem text-xgold"></i> TC SCISSORS
        </a>
        <span class="text-white/15">|</span>
        <a href="<?php echo esc_url(home_url('/shop')); ?>" class="hover:text-xgold transition flex items-center gap-1 text-white">
            <i class="fa-solid fa-circle-plus text-xgold"></i> & MORE
        </a>
    </div>
</section>

<!-- ==========================================================================
   3. TRUST METRICS BAR
   ========================================================================== -->
<section class="py-12 bg-obsidian border-b border-white/5">
    <div class="widescreen-container grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
        <div class="p-6 glass-card border-xgold/20 rounded-xl">
            <h2 class="font-cinzel text-4xl font-extrabold gold-gradient-text mb-1">18+</h2>
            <p class="font-montserrat text-xs text-xsilver uppercase font-semibold">Years of Excellence</p>
        </div>
        <div class="p-6 glass-card border-xgold/20 rounded-xl">
            <h2 class="font-cinzel text-4xl font-extrabold gold-gradient-text mb-1">1000+</h2>
            <p class="font-montserrat text-xs text-xsilver uppercase font-semibold">Happy Clients Worldwide</p>
        </div>
        <div class="p-6 glass-card border-xgold/20 rounded-xl">
            <h2 class="font-cinzel text-4xl font-extrabold gold-gradient-text mb-1">70+</h2>
            <p class="font-montserrat text-xs text-xsilver uppercase font-semibold">Countries We Export</p>
        </div>
        <div class="p-6 glass-card border-xgold/20 rounded-xl flex items-center justify-center gap-3">
            <div class="text-left text-xs space-y-1">
                <span class="block text-xgold font-bold"><i class="fa-solid fa-certificate"></i> ISO 13485 CERTIFIED</span>
                <span class="block text-white font-bold"><i class="fa-solid fa-award"></i> CE MARK REGISTERED</span>
                <span class="block text-xsilver font-bold"><i class="fa-solid fa-shield-cat"></i> GMP CERTIFIED</span>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
   4. FEATURED PRODUCTS SHOWCASE (.WEBP IMAGES)
   ========================================================================== -->
<section class="py-20 bg-titanium">
    <div class="widescreen-container">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <span class="badge-pill-gold mb-3">FLAGSHIP CATALOG</span>
                <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-white uppercase mt-2">
                    FEATURED <span class="gold-gradient-text">INSTRUMENTS</span>
                </h2>
            </div>
            <div class="flex flex-wrap gap-2 text-xs font-montserrat font-semibold">
                <button class="px-4 py-2 rounded-md bg-xgold text-black uppercase font-bold shadow-lg">ALL PRODUCTS</button>
                <button class="px-4 py-2 rounded-md glass-card text-xsilver hover:text-white uppercase">PLASTIC SURGERY</button>
                <button class="px-4 py-2 rounded-md glass-card text-xsilver hover:text-white uppercase">STYLING SHEARS</button>
                <button class="px-4 py-2 rounded-md glass-card text-xsilver hover:text-white uppercase">TC TOOLS</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 8,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    global $product;
                    ?>
                    <div class="product-grid-card group flex flex-col justify-between">
                        <div>
                            <div class="product-thumb-wrapper mb-4">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'object-contain')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/aufricht_rhinoplasty_retractor.webp" alt="<?php the_title(); ?>" class="object-cover opacity-90">
                                <?php endif; ?>
                                <span class="absolute top-3 left-3 badge-stock-in">GERMAN STEEL</span>
                                <span class="absolute top-3 right-3 badge-hrc-spec">HRC 52-54</span>
                            </div>

                            <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: <?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'XNT-8802'; ?></span>
                            <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="text-sm font-bold text-xgold mb-4">
                                <?php echo $product->get_price_html(); ?>
                                <span class="text-[10px] text-xsilver font-normal block">Single Sample Retail Price</span>
                            </div>
                        </div>

                        <div class="space-y-2 pt-2 border-t border-white/5">
                            <a href="<?php the_permalink(); ?>" class="w-full btn-gold-glow py-2 text-xs">
                                BUY SAMPLE / SPECS
                            </a>
                            <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-chrome-ghost py-2 text-[11px]">
                                B2B BULK QUOTE (-50%)
                            </a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <!-- Product 1 -->
                <div class="product-grid-card group flex flex-col justify-between">
                    <div>
                        <div class="product-thumb-wrapper mb-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/aufricht_rhinoplasty_retractor.webp" alt="Aufricht Rhinoplasty Retractor" class="object-cover opacity-90">
                            <span class="absolute top-3 left-3 badge-stock-in">GERMAN STEEL</span>
                            <span class="absolute top-3 right-3 badge-hrc-spec">HRC 54</span>
                        </div>
                        <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: XNT-PS-8801</span>
                        <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                            Aufricht Rhinoplasty Fiber Optic Gold Retractor 19cm
                        </h4>
                        <div class="text-sm font-bold text-xgold mb-4">
                            $145.00 USD
                            <span class="text-[10px] text-xsilver font-normal block">Wholesale 50+ pcs $72.50</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-2 border-t border-white/5">
                        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-gold-glow py-2 text-xs">
                            B2B BULK QUOTE (-50%)
                        </a>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-grid-card group flex flex-col justify-between">
                    <div>
                        <div class="product-thumb-wrapper mb-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/japanese_hairdressing_shear.webp" alt="Japanese Styling Shear" class="object-cover opacity-90">
                            <span class="absolute top-3 left-3 badge-stock-in">440C JAPANESE</span>
                            <span class="absolute top-3 right-3 badge-hrc-spec">HRC 60</span>
                        </div>
                        <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: XNT-HS-3301</span>
                        <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                            Japanese 440C Convex Edge Hairdressing Shear 6.0"
                        </h4>
                        <div class="text-sm font-bold text-xgold mb-4">
                            $120.00 USD
                            <span class="text-[10px] text-xsilver font-normal block">Wholesale 50+ pcs $60.00</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-2 border-t border-white/5">
                        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-gold-glow py-2 text-xs">
                            B2B BULK QUOTE (-50%)
                        </a>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-grid-card group flex flex-col justify-between">
                    <div>
                        <div class="product-thumb-wrapper mb-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/mayo_hegar_tc_needle_holder.webp" alt="TC Needle Holder" class="object-cover opacity-90">
                            <span class="absolute top-3 left-3 badge-stock-in">TC GOLD RING</span>
                            <span class="absolute top-3 right-3 badge-hrc-spec">HRC 68</span>
                        </div>
                        <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: XNT-TC-5501</span>
                        <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                            Mayo-Hegar Tungsten Carbide Gold Handle Needle Holder 7"
                        </h4>
                        <div class="text-sm font-bold text-xgold mb-4">
                            $95.00 USD
                            <span class="text-[10px] text-xsilver font-normal block">Wholesale 50+ pcs $47.50</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-2 border-t border-white/5">
                        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-gold-glow py-2 text-xs">
                            B2B BULK QUOTE (-50%)
                        </a>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-grid-card group flex flex-col justify-between">
                    <div>
                        <div class="product-thumb-wrapper mb-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/tebbetts_caliper_gauge.webp" alt="Tebbetts Caliper" class="object-cover opacity-90">
                            <span class="absolute top-3 left-3 badge-stock-in">GERMAN STEEL</span>
                            <span class="absolute top-3 right-3 badge-hrc-spec">HRC 56</span>
                        </div>
                        <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: XNT-PS-8802</span>
                        <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                            Tebbetts Precision Caliper & Measuring Gauge 0-80mm
                        </h4>
                        <div class="text-sm font-bold text-xgold mb-4">
                            $185.00 USD
                            <span class="text-[10px] text-xsilver font-normal block">Wholesale 50+ pcs $92.50</span>
                        </div>
                    </div>
                    <div class="space-y-2 pt-2 border-t border-white/5">
                        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="w-full btn-gold-glow py-2 text-xs">
                            B2B BULK QUOTE (-50%)
                        </a>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- ==========================================================================
   5. OEM / ODM MANUFACTURING CAPABILITY SHOWCASE (.WEBP IMAGE)
   ========================================================================== -->
<section class="py-20 bg-obsidian border-t border-white/5">
    <div class="widescreen-container grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="badge-pill-gold mb-3">CUSTOM FORGING & BRANDING</span>
            <h2 class="font-cinzel text-3xl sm:text-4xl font-bold text-white uppercase mt-2 leading-tight">
                FACTORY DIRECT <span class="gold-gradient-text">OEM / ODM SERVICES</span>
            </h2>
            <p class="text-xs sm:text-sm text-xsilver leading-relaxed mt-4 mb-6">
                We empower international medical brands, hospital groups, and styling shear distributors by manufacturing custom private label instruments to exact surgical specs.
            </p>
            
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 glass-card rounded-lg">
                    <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg shrink-0">
                        <i class="fa-solid fa-stamp"></i>
                    </div>
                    <div>
                        <h4 class="font-cinzel text-sm font-bold text-white uppercase">Fiber Laser Logo Engraving</h4>
                        <p class="text-[11px] text-xsilver-dark">Ultra-precise fiber laser marking of your brand name, SKU numbers, & CE compliance symbols on steel handles.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4 p-4 glass-card rounded-lg">
                    <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg shrink-0">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div>
                        <h4 class="font-cinzel text-sm font-bold text-white uppercase">Custom Executive Packaging</h4>
                        <p class="text-[11px] text-xsilver-dark">Choose between velvet-lined luxury wooden boxes, hand-stitched leather pouches, or sterile autoclave blister packs.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="glass-card border-xgold/30 p-6 rounded-2xl">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/hero_surgical_showcase.webp" alt="OEM Custom Manufacturing" class="w-full h-80 object-cover rounded-xl border border-xgold/20">
                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <span class="text-[10px] text-xsilver uppercase block">MONTHLY CAPACITY</span>
                        <h4 class="font-cinzel text-xl font-bold text-xgold">50,000+ INSTRUMENTS</h4>
                    </div>
                    <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="btn-gold-glow py-2 px-4 text-xs">
                        CUSTOMIZE NOW
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
