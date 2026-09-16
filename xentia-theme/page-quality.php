<?php
/**
 * Template Name: Quality Specs Page
 * 
 * @package XentiaTheme
 */

get_header();
?>

<!-- ==========================================================================
   1. HERO BANNER
   ========================================================================== -->
<section class="py-16 bg-titanium border-b border-xgold/20 relative overflow-hidden">
    <div class="widescreen-container text-center max-w-3xl mx-auto space-y-3">
        <span class="badge-pill-gold">METALLURGICAL EXCELLENCE</span>
        <h1 class="font-cinzel text-4xl sm:text-5xl font-black text-white uppercase tracking-tight">
            SURGICAL QUALITY & <span class="gold-gradient-text">TECHNICAL SPECS</span>
        </h1>
        <p class="text-xs sm:text-sm text-xsilver leading-relaxed font-light">
            Explore the raw material grades, hardness testing benchmarks, passivation protocols, and autoclave sterilization standards of Xentia surgical tools.
        </p>
    </div>
</section>

<!-- ==========================================================================
   2. METALLURGY TABLE & SPECS
   ========================================================================== -->
<section class="py-20 bg-obsidian border-b border-white/5">
    <div class="widescreen-container space-y-12">
        
        <div class="glass-card p-8 rounded-2xl border-xgold/30">
            <h3 class="font-cinzel text-2xl font-bold text-white uppercase mb-6">RAW MATERIAL SPECIFICATIONS</h3>

            <div class="overflow-x-auto">
                <table class="tech-specs-table">
                    <thead>
                        <tr class="text-xgold font-montserrat uppercase text-xs border-b border-xgold/30">
                            <th class="py-3 px-4 text-left">Steel Grade</th>
                            <th class="py-3 px-4 text-left">Standard Origin</th>
                            <th class="py-3 px-4 text-left">Rockwell Hardness (HRC)</th>
                            <th class="py-3 px-4 text-left">Primary Application</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10 text-xs">
                        <tr>
                            <td class="py-4 px-4 font-bold text-white">AISI 420 Stainless Steel</td>
                            <td class="py-4 px-4 text-xsilver">Germany (DIN 1.4021)</td>
                            <td class="py-4 px-4 text-xgold font-bold">52 - 56 HRC</td>
                            <td class="py-4 px-4 text-xsilver">Rhinoplasty retractors, dissecting forceps, osteotomes</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-bold text-white">Japanese 440C Cobalt Alloy</td>
                            <td class="py-4 px-4 text-xsilver">Japan (SUS440C)</td>
                            <td class="py-4 px-4 text-xgold font-bold">58 - 61 HRC</td>
                            <td class="py-4 px-4 text-xsilver">Convex edge hairdressing shears & texturizing scissors</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-bold text-white">Tungsten Carbide (TC) Inlays</td>
                            <td class="py-4 px-4 text-xsilver">Germany / Sweden</td>
                            <td class="py-4 px-4 text-xgold font-bold">66 - 68 HRC</td>
                            <td class="py-4 px-4 text-xsilver">Gold handle needle holders & micro iris scissors</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-bold text-white">AISI 304 Seamless Tubing</td>
                            <td class="py-4 px-4 text-xsilver">Germany (DIN 1.4301)</td>
                            <td class="py-4 px-4 text-xgold font-bold">Passivated 45 HRC</td>
                            <td class="py-4 px-4 text-xsilver">Liposuction fat harvesting & infiltration cannulas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Autoclave & Sterilization Protocol Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="glass-card p-6 rounded-xl space-y-4">
                <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg">
                    <i class="fa-solid fa-temperature-arrow-up"></i>
                </div>
                <h4 class="font-cinzel text-lg font-bold text-white uppercase">AUTOCLAVE STERILIZATION PROTOCOL</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    All Xentia instruments are 100% autoclave safe up to 134°C (273°F) under 2.1 bar pressure for 18 minutes. Passivated chromium oxide layer prevents pitting corrosion and rust stain formation.
                </p>
            </div>

            <div class="glass-card p-6 rounded-xl space-y-4">
                <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg">
                    <i class="fa-solid fa-award"></i>
                </div>
                <h4 class="font-cinzel text-lg font-bold text-white uppercase">3-YEAR FACTORY WARRANTY</h4>
                <p class="text-xs text-xsilver leading-relaxed">
                    We back every instrument with a comprehensive 3-year replacement warranty against manufacturing defects, material stress fractures, or joint misalignment.
                </p>
            </div>
        </div>

    </div>
</section>

<?php
get_footer();
