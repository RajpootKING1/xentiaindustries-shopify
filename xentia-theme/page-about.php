<?php
/**
 * Template Name: About Us Page
 * 
 * @package XentiaTheme
 */

get_header();
?>

<!-- ==========================================================================
   1. HERO BANNER
   ========================================================================== -->
<section class="py-20 bg-titanium border-b border-xgold/20 relative overflow-hidden">
    <div class="widescreen-container text-center max-w-4xl mx-auto space-y-4">
        <span class="badge-pill-gold">ESTABLISHED 2008 • SIALKOT, PAKISTAN</span>
        <h1 class="font-cinzel text-4xl sm:text-5xl font-black text-white uppercase tracking-tight">
            CRAFTING SURGICAL <span class="gold-gradient-text">PRECISION SINCE 2008</span>
        </h1>
        <p class="text-sm sm:text-base text-xsilver leading-relaxed font-light">
            Xentia Industries is a premier manufacturer and international exporter of high-precision German stainless steel surgical instruments, plastic surgery tools, and professional hairdressing shears.
        </p>
    </div>
</section>

<!-- ==========================================================================
   2. COMPANY STORY & SIALKOT HERITAGE
   ========================================================================== -->
<section class="py-20 bg-obsidian border-b border-white/5">
    <div class="widescreen-container grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="badge-pill-gold">OUR LEGACY</span>
            <h2 class="font-cinzel text-3xl font-bold text-white uppercase leading-tight">
                GERMAN ENGINEERING <br><span class="gold-gradient-text">METICULOUS HAND CRAFTSMANSHIP</span>
            </h2>
            <p class="text-xs sm:text-sm text-xsilver leading-relaxed">
                Headquartered in Sialkot, Pakistan — the global epicentre of medical instrument craftsmanship — Xentia Industries merges centuries-old artisanal metalworking heritage with modern German CNC machinery and metallurgical science.
            </p>
            <p class="text-xs sm:text-sm text-xsilver leading-relaxed">
                Over the past 18+ years, we have forged strategic partnerships with top surgical clinics, hospital networks, and styling shear distributors across North America, Western Europe, the Middle East, and Asia-Pacific.
            </p>

            <div class="grid grid-cols-2 gap-4 pt-4 text-xs">
                <div class="p-4 glass-card rounded-lg border-xgold/20">
                    <span class="text-2xl font-bold text-xgold block font-cinzel">70+</span>
                    <span class="text-xsilver font-montserrat uppercase text-[11px]">Countries Exported</span>
                </div>
                <div class="p-4 glass-card rounded-lg border-xgold/20">
                    <span class="text-2xl font-bold text-xgold block font-cinzel">50,000+</span>
                    <span class="text-xsilver font-montserrat uppercase text-[11px]">Monthly Capacity</span>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="glass-card border-xgold/30 p-4 rounded-2xl shadow-2xl">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/hero_surgical_showcase.webp" alt="Xentia Manufacturing Excellence" class="w-full h-80 object-cover rounded-xl border border-xgold/20">
                <div class="mt-4 text-center">
                    <span class="text-xs text-xsilver uppercase tracking-wider block font-montserrat font-bold">100% PASSIVATED & ULTRASONICALLY CLEANED</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
   3. 4 PILLARS OF MANUFACTURING EXCELLENCE
   ========================================================================== -->
<section class="py-20 bg-titanium border-b border-white/5">
    <div class="widescreen-container space-y-12">
        <div class="text-center max-w-2xl mx-auto">
            <span class="badge-pill-gold mb-3">MANUFACTURING STANDARDS</span>
            <h2 class="font-cinzel text-3xl font-bold text-white uppercase mt-2">
                FOUR PILLARS OF <span class="gold-gradient-text">PERFECTION</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 glass-card rounded-xl space-y-3">
                <div class="w-12 h-12 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-xl">
                    <i class="fa-solid fa-gem"></i>
                </div>
                <h4 class="font-cinzel text-base font-bold text-white uppercase">1. Raw Metallurgy</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    Imported AISI 420 German Stainless Steel, Japanese 440C Cobalt Alloy, and micro-grain Tungsten Carbide inserts.
                </p>
            </div>

            <div class="p-6 glass-card rounded-xl space-y-3">
                <div class="w-12 h-12 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-xl">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <h4 class="font-cinzel text-base font-bold text-white uppercase">2. CNC Micro Machining</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    Zero-tolerance 5-axis computer numerical control machining for perfect jaw alignment and smooth action.
                </p>
            </div>

            <div class="p-6 glass-card rounded-xl space-y-3">
                <div class="w-12 h-12 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-xl">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                </div>
                <h4 class="font-cinzel text-base font-bold text-white uppercase">3. Vacuum Heat Treatment</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    Computerized vacuum hardening process achieving 52 HRC to 68 HRC optimal Rockwell hardness scale.
                </p>
            </div>

            <div class="p-6 glass-card rounded-xl space-y-3">
                <div class="w-12 h-12 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-xl">
                    <i class="fa-solid fa-shield-check"></i>
                </div>
                <h4 class="font-cinzel text-base font-bold text-white uppercase">4. Passivation & Testing</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    Chemical acid passivation & 100% boil-test inspection guaranteeing rust-free autoclave durability.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
