<?php
/**
 * Template Name: Contact Us Page
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
        <span class="badge-pill-gold">GLOBAL SURGICAL ADVISORY & SALES</span>
        <h1 class="font-cinzel text-4xl sm:text-5xl font-black text-white uppercase tracking-tight">
            CONTACT <span class="gold-gradient-text">XENTIA INDUSTRIES</span>
        </h1>
        <p class="text-xs sm:text-sm text-xsilver leading-relaxed font-light">
            Have questions about custom OEM orders, sample requests, or international distribution? Our sales engineering team responds within 4 business hours.
        </p>
    </div>
</section>

<!-- ==========================================================================
   2. MAIN CONTACT FORM & DIRECT DETAILS GRID
   ========================================================================== -->
<section class="py-20 bg-obsidian border-b border-white/5">
    <div class="widescreen-container grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Left Column: Contact Form (7 Cols) -->
        <div class="lg:col-span-7 glass-card p-8 rounded-2xl border-xgold/30 relative">
            <h3 class="font-cinzel text-2xl font-bold text-white uppercase mb-2">SEND AN INQUIRY</h3>
            <p class="text-xs text-xsilver mb-6">Fill out the form below for instant factory-direct sample quotes and technical specifications.</p>

            <form id="xentia-main-contact-form" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Full Name *</label>
                        <input type="text" name="contact_name" placeholder="Dr. Alexander Wright" required class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                    </div>
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Professional Email *</label>
                        <input type="email" name="contact_email" placeholder="alexander@clinic.com" required class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Company / Clinic Name</label>
                        <input type="text" name="company_name" placeholder="Beverly Hills Surgical Institute" class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                    </div>
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Phone / WhatsApp *</label>
                        <input type="text" name="contact_phone" placeholder="+1 (555) 019-2834" required class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Category Interest</label>
                        <select name="category_interest" class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                            <option value="Plastic Surgery">Plastic Surgery & Rhinoplasty</option>
                            <option value="Hairdressing Scissors">Japanese Styling Shears</option>
                            <option value="Tungsten Carbide">Tungsten Carbide Instruments</option>
                            <option value="Dental Tools">Dental & Implant Surgery</option>
                            <option value="OEM Manufacturing">Custom OEM / Private Label</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Estimated Quantity</label>
                        <select name="order_quantity" class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition">
                            <option value="Single Sample">Single Sample (1-5 pcs)</option>
                            <option value="Small Bulk">Small Bulk (50-200 pcs)</option>
                            <option value="Wholesale Batch">Wholesale Batch (500+ pcs)</option>
                            <option value="Annual Contract">Annual Supply Contract</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-montserrat uppercase font-semibold text-xgold mb-1">Message & Technical Specs</label>
                    <textarea name="contact_message" rows="4" placeholder="Specify instrument SKU codes, custom laser logo branding requirements, or delivery deadline..." required class="w-full bg-black/60 border border-xgold/20 rounded-md px-4 py-3 text-xs text-white focus:outline-none focus:border-xgold transition"></textarea>
                </div>

                <button type="submit" class="w-full btn-gold-glow py-3.5 text-xs font-montserrat uppercase tracking-wider font-bold">
                    SUBMIT INQUIRY TO FACTORY <i class="fa-solid fa-paper-plane ml-2"></i>
                </button>
            </form>

            <div id="contact-form-response" class="hidden mt-4 p-4 rounded-md bg-xgold/10 border border-xgold/40 text-center text-xs text-xgold-light">
                🎉 Thank you! Your inquiry has been sent directly to Xentia Sales Engineering. We will reply shortly.
            </div>
        </div>

        <!-- Right Column: Direct Contact Info (5 Cols) -->
        <div class="lg:col-span-5 space-y-6">
            <div class="glass-card p-6 rounded-xl border-xgold/20 space-y-4">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg shrink-0">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <strong class="block text-white font-montserrat text-xs uppercase">Factory & Head Office</strong>
                        <p class="text-xs text-xsilver mt-1 leading-relaxed">
                            Xentia Industries<br>
                            Small Industrial Estate, Ugoki Road<br>
                            Sialkot 51310, Punjab, Pakistan
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 pt-4 border-t border-white/5">
                    <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg shrink-0">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <strong class="block text-white font-montserrat text-xs uppercase">Phone & WhatsApp</strong>
                        <p class="text-xs text-xsilver mt-1">
                            <a href="tel:+923497400818" class="hover:text-xgold transition">+92 349 7400818</a><br>
                            <span class="text-[10px] text-xsilver-dark">24/7 International Desk</span>
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-4 pt-4 border-t border-white/5">
                    <div class="w-10 h-10 rounded-full bg-xgold/10 border border-xgold/30 flex items-center justify-center text-xgold text-lg shrink-0">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <strong class="block text-white font-montserrat text-xs uppercase">Email Inquiry</strong>
                        <p class="text-xs text-xsilver mt-1">
                            <a href="mailto:info@xentiaindustries.com" class="hover:text-xgold transition">info@xentiaindustries.com</a><br>
                            <a href="mailto:sales@xentiaindustries.com" class="hover:text-xgold transition">sales@xentiaindustries.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- WhatsApp Quick Chat Banner -->
            <div class="glass-card p-6 rounded-xl border-emerald-500/30 bg-emerald-950/20 text-center space-y-3">
                <i class="fa-brands fa-whatsapp text-4xl text-emerald-400"></i>
                <h4 class="font-cinzel text-base font-bold text-white uppercase">INSTANT WHATSAPP QUOTE</h4>
                <p class="text-xs text-xsilver">Connect directly with our senior sales manager for quick sample dispatch.</p>
                <a href="https://wa.me/923497400818" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-md bg-emerald-500 text-black font-bold text-xs uppercase font-montserrat hover:bg-emerald-400 transition">
                    CHAT ON WHATSAPP <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
