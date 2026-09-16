<?php
/**
 * Template Name: B2B Wholesale & Custom OEM Portal
 * 
 * @package XentiaTheme
 */

get_header();
?>

<!-- WHOLESALE PORTAL HERO -->
<section class="py-16 bg-titanium border-b border-xgold/20 relative overflow-hidden">
    <div class="widescreen-container text-center">
        <span class="badge-pill-gold mb-3">FACTORY DIRECT MANUFACTURING</span>
        <h1 class="font-cinzel text-3xl sm:text-5xl lg:text-6xl font-black text-white uppercase mt-2">
            B2B WHOLESALE & <span class="gold-gradient-text">OEM CUSTOM BUILDER</span>
        </h1>
        <p class="text-xs sm:text-sm text-xsilver max-w-3xl mx-auto mt-3">
            Configure custom surgical instruments, calculate tiered bulk discounts, upload company logos, & lock in orders with a 50% advance production deposit.
        </p>
    </div>
</section>

<!-- INTERACTIVE WHOLESALE BUILDER & DEPOSIT CALCULATOR -->
<section class="py-16 bg-obsidian">
    <div class="widescreen-container grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Configuration Form (7 Columns) -->
        <div class="lg:col-span-7 space-y-8">
            <form id="wholesale-builder-form" enctype="multipart/form-data">
                
                <!-- 1. Select Product Division -->
                <div class="glass-card p-6 rounded-xl space-y-4">
                    <h3 class="font-cinzel text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-xgold text-black text-xs font-bold flex items-center justify-center">1</span>
                        SELECT INSTRUMENT DIVISION
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="product_division" value="plastic_surgery" checked class="peer hidden">
                            <div class="p-3 border border-white/10 rounded-lg text-center peer-checked:border-xgold peer-checked:bg-xgold/10 transition">
                                <i class="fa-solid fa-stethoscope text-xgold text-lg mb-1 block"></i>
                                <span class="text-xs font-bold text-white block">Plastic Surgery</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="product_division" value="styling_scissors" class="peer hidden">
                            <div class="p-3 border border-white/10 rounded-lg text-center peer-checked:border-xgold peer-checked:bg-xgold/10 transition">
                                <i class="fa-solid fa-scissors text-xgold text-lg mb-1 block"></i>
                                <span class="text-xs font-bold text-white block">Styling Shears</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="product_division" value="dental_tools" class="peer hidden">
                            <div class="p-3 border border-white/10 rounded-lg text-center peer-checked:border-xgold peer-checked:bg-xgold/10 transition">
                                <i class="fa-solid fa-tooth text-xgold text-lg mb-1 block"></i>
                                <span class="text-xs font-bold text-white block">Dental Tools</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- 2. Select Steel Grade & Hardness -->
                <div class="glass-card p-6 rounded-xl space-y-4">
                    <h3 class="font-cinzel text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-xgold text-black text-xs font-bold flex items-center justify-center">2</span>
                        STAINLESS STEEL GRADE
                    </h3>
                    <select id="steel-grade-select" class="w-full bg-titanium border border-xgold/30 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-xgold">
                        <option value="420_german" data-multiplier="1.0">AISI 420 German Stainless Steel (HRC 50-54) [Standard]</option>
                        <option value="410_surgical" data-multiplier="0.9">AISI 410 Surgical Grade Stainless Steel</option>
                        <option value="titanium" data-multiplier="1.45">Pure Titanium Grade 5 (Non-Magnetic & Ultra Light)</option>
                        <option value="tungsten_carbide" data-multiplier="1.35">Tungsten Carbide (TC) Insert Welded</option>
                    </select>
                </div>

                <!-- 3. Quantity & Tier Selector -->
                <div class="glass-card p-6 rounded-xl space-y-4">
                    <h3 class="font-cinzel text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-xgold text-black text-xs font-bold flex items-center justify-center">3</span>
                        ORDER QUANTITY & DISCOUNT TIERS
                    </h3>
                    
                    <div class="bulk-tiers-grid mb-4">
                        <div class="tier-box" id="tier-box-1">
                            <span class="tier-qty">1 - 49 Pcs</span>
                            <div class="tier-discount">Retail</div>
                        </div>
                        <div class="tier-box" id="tier-box-2">
                            <span class="tier-qty">50 - 199 Pcs</span>
                            <div class="tier-discount">20% OFF</div>
                        </div>
                        <div class="tier-box" id="tier-box-3">
                            <span class="tier-qty">200 - 499 Pcs</span>
                            <div class="tier-discount">35% OFF</div>
                        </div>
                        <div class="tier-box active-tier" id="tier-box-4">
                            <span class="tier-qty">500+ Pcs</span>
                            <div class="tier-discount">50% OFF</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <label class="text-xs text-xsilver font-bold uppercase">Enter Units:</label>
                        <input type="number" id="b2b-qty-input" value="200" min="10" step="10" class="w-32 bg-titanium border border-xgold/40 rounded-lg px-4 py-2 text-center text-white font-bold font-cinzel focus:outline-none">
                    </div>
                </div>

                <!-- 4. Custom Branding & File Upload -->
                <div class="glass-card p-6 rounded-xl space-y-4">
                    <h3 class="font-cinzel text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-xgold text-black text-xs font-bold flex items-center justify-center">4</span>
                        LASER LOGO & PACKAGING
                    </h3>

                    <div class="space-y-3">
                        <label class="block text-xs text-xsilver font-bold uppercase">Logo Marking Type:</label>
                        <select id="logo-type-select" class="w-full bg-titanium border border-white/10 rounded-lg px-4 py-2.5 text-xs text-white">
                            <option value="none">Standard Xentia Brand Logo</option>
                            <option value="laser_text">Custom Text Laser Engraving (+$0.50/pc)</option>
                            <option value="custom_vector">Custom Company Logo Vector (+$1.00/pc)</option>
                        </select>

                        <div class="border-2 border-dashed border-xgold/30 rounded-lg p-4 text-center bg-white/5">
                            <i class="fa-solid fa-cloud-arrow-up text-xgold text-2xl mb-2"></i>
                            <span class="block text-xs font-bold text-white">Upload Company Logo / Vector (.AI, .EPS, .PDF, .PNG)</span>
                            <input type="file" name="logo_file" accept=".ai,.eps,.pdf,.png,.svg" class="mt-2 text-xs text-xsilver">
                        </div>

                        <label class="block text-xs text-xsilver font-bold uppercase mt-4">Packaging Option:</label>
                        <select id="packaging-select" class="w-full bg-titanium border border-white/10 rounded-lg px-4 py-2.5 text-xs text-white">
                            <option value="polybag">Standard Autoclave Polybag (Included)</option>
                            <option value="leatherette">Leatherette Pouch (+$2.50/pc)</option>
                            <option value="wooden_box">Executive Velvet Wooden Box (+$6.00/pc)</option>
                        </select>
                    </div>
                </div>

                <!-- 5. Buyer Contact Details -->
                <div class="glass-card p-6 rounded-xl space-y-4">
                    <h3 class="font-cinzel text-lg font-bold text-white">REPRESENTATIVE CONTACT DETAILS</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" id="b2b-name" placeholder="Full Name *" required class="bg-titanium border border-white/10 rounded-lg px-4 py-3 text-xs text-white focus:border-xgold focus:outline-none">
                        <input type="email" id="b2b-email" placeholder="Business Email *" required class="bg-titanium border border-white/10 rounded-lg px-4 py-3 text-xs text-white focus:border-xgold focus:outline-none">
                        <input type="text" id="b2b-company" placeholder="Company / Medical Clinic *" class="bg-titanium border border-white/10 rounded-lg px-4 py-3 text-xs text-white focus:border-xgold focus:outline-none">
                        <input type="tel" id="b2b-phone" placeholder="Phone / WhatsApp (With Country Code) *" class="bg-titanium border border-white/10 rounded-lg px-4 py-3 text-xs text-white focus:border-xgold focus:outline-none">
                    </div>
                    <textarea id="b2b-notes" rows="3" placeholder="Additional specifications, custom dimensions, or target delivery date..." class="w-full bg-titanium border border-white/10 rounded-lg p-4 text-xs text-white focus:border-xgold focus:outline-none"></textarea>
                </div>
            </form>
        </div>

        <!-- Right: Live Cost Calculator & Payment Milestone Summary (5 Columns) -->
        <div class="lg:col-span-5">
            <div class="sticky top-24 glass-card border-xgold p-8 rounded-2xl space-y-6 shadow-2xl">
                <div class="border-b border-xgold/20 pb-4">
                    <span class="badge-pill-gold mb-2">LIVE ESTIMATOR</span>
                    <h3 class="font-cinzel text-xl font-bold text-white uppercase mt-1">ESTIMATED WHOLESALE SUMMARY</h3>
                </div>

                <div class="space-y-3 text-xs text-xsilver">
                    <div class="flex justify-between">
                        <span>Base Retail Price Per Unit:</span>
                        <strong class="text-white">$85.00 USD</strong>
                    </div>
                    <div class="flex justify-between">
                        <span>Applied Tier Discount:</span>
                        <strong class="text-xgold font-bold" id="summary-discount-tag">35% OFF</strong>
                    </div>
                    <div class="flex justify-between">
                        <span>Effective Per Unit Cost:</span>
                        <strong class="text-white" id="summary-unit-cost">$55.25 USD</strong>
                    </div>
                    <div class="flex justify-between">
                        <span>Selected Steel Grade:</span>
                        <strong class="text-white" id="summary-steel-name">AISI 420 German Steel</strong>
                    </div>
                    <div class="flex justify-between">
                        <span>Custom Logo & Packaging Addon:</span>
                        <strong class="text-white" id="summary-addon-cost">$0.00 / pc</strong>
                    </div>
                </div>

                <!-- Total Cost Box -->
                <div class="bg-black/60 border border-xgold/30 p-4 rounded-xl text-center">
                    <span class="text-[10px] text-xsilver uppercase font-bold tracking-wider block">TOTAL PRODUCTION ESTIMATE</span>
                    <div class="font-cinzel text-3xl font-extrabold gold-gradient-text mt-1" id="summary-total-cost">
                        $11,050.00 USD
                    </div>
                </div>

                <!-- 50% Payment Milestone Box -->
                <div class="p-4 bg-xgold/10 border border-xgold/40 rounded-xl space-y-2">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-xgold uppercase">50% ADVANCE PRODUCTION DEPOSIT:</span>
                        <strong class="text-white text-base font-cinzel" id="summary-deposit-cost">$5,525.00 USD</strong>
                    </div>
                    <p class="text-[10px] text-xsilver leading-tight">
                        Remaining 50% balance payable prior to shipment after receiving high-res video QC inspection approval.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3 pt-2">
                    <button type="button" id="btn-submit-b2b-quote" class="w-full btn-gold-glow py-3 text-xs">
                        <i class="fa-solid fa-paper-plane"></i> SUBMIT OFFICIAL B2B QUOTE INQUIRY
                    </button>
                    <button type="button" id="btn-checkout-deposit" class="w-full btn-chrome-ghost py-3 text-[11px]">
                        <i class="fa-solid fa-lock text-xgold"></i> PAY 50% DEPOSIT NOW VIA CHECKOUT
                    </button>
                </div>

                <div id="b2b-response-msg" class="hidden text-xs p-3 rounded text-center"></div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
