<?php
/**
 * The Template for displaying single products
 *
 * @package XentiaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();
    global $product;
    $current_id = $product->get_id();
    ?>
    
    <section class="py-16 bg-obsidian text-xsilver">
        <div class="widescreen-container grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Product Gallery (6 Columns) -->
            <div class="lg:col-span-6 space-y-4">
                <div class="glass-card p-6 sm:p-8 rounded-2xl border-xgold/30 overflow-hidden relative group">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'w-full h-auto object-contain max-h-[520px] mx-auto transition-transform duration-500 group-hover:scale-105')); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/hero-section-sample-by-client.jpeg" alt="<?php the_title(); ?>" class="w-full h-auto object-contain max-h-[520px] mx-auto">
                    <?php endif; ?>
                    <span class="absolute top-4 left-4 badge-stock-in">GERMAN STAINLESS STEEL</span>
                    <span class="absolute top-4 right-4 badge-hrc-spec">HRC 54 PASSED</span>
                </div>
            </div>

            <!-- Right: Product Summary & Dual Flow (6 Columns) -->
            <div class="lg:col-span-6 space-y-6">
                <div>
                    <span class="text-xs text-xsilver-dark font-montserrat uppercase tracking-wider">SKU: <?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'XNT-PS-8802'; ?></span>
                    <h1 class="font-cinzel text-2xl sm:text-3xl lg:text-4xl font-bold text-white uppercase mt-1 mb-3"><?php the_title(); ?></h1>
                    
                    <div class="flex items-baseline gap-4 mb-4">
                        <span class="font-cinzel text-2xl lg:text-3xl font-bold text-xgold"><?php echo $product->get_price_html(); ?></span>
                        <span class="text-xs text-xsilver font-normal">(Single Sample B2C Unit Price)</span>
                    </div>

                    <div class="text-xs sm:text-sm text-xsilver leading-relaxed border-t border-white/10 pt-4 mb-6">
                        <?php the_excerpt(); ?>
                    </div>
                </div>

                <!-- BULK TIERED DISCOUNT WIDGET -->
                <div class="glass-card p-6 rounded-xl space-y-3">
                    <h4 class="font-cinzel text-xs font-bold text-white uppercase flex items-center justify-between">
                        <span>B2B WHOLESALE TIERED PRICING</span>
                        <span class="text-xgold font-normal">Factory Direct Rates</span>
                    </h4>
                    
                    <div class="bulk-tiers-grid">
                        <div class="tier-box">
                            <span class="tier-qty">1-49 Pcs</span>
                            <div class="tier-discount">100% Retail</div>
                        </div>
                        <div class="tier-box">
                            <span class="tier-qty">50-199 Pcs</span>
                            <div class="tier-discount">20% OFF</div>
                        </div>
                        <div class="tier-box">
                            <span class="tier-qty">200-499 Pcs</span>
                            <div class="tier-discount">35% OFF</div>
                        </div>
                        <div class="tier-box active-tier">
                            <span class="tier-qty">500+ Pcs</span>
                            <div class="tier-discount">50% OFF</div>
                        </div>
                    </div>
                </div>

                <!-- TECHNICAL SPECIFICATIONS TABLE -->
                <div class="glass-card p-6 rounded-xl space-y-2">
                    <h4 class="font-cinzel text-xs font-bold text-white uppercase border-b border-white/10 pb-2">GERMAN ENGINEERING TECHNICAL SPECS</h4>
                    <table class="tech-specs-table">
                        <tr>
                            <th>Raw Material Alloy:</th>
                            <td>AISI 420 German Stainless Steel</td>
                        </tr>
                        <tr>
                            <th>Rockwell Hardness (HRC):</th>
                            <td>52 - 56 HRC Vacuum Heat Treated</td>
                        </tr>
                        <tr>
                            <th>Autoclave Compliance:</th>
                            <td>134°C (273°F) Steam Sterilization Safe</td>
                        </tr>
                        <tr>
                            <th>Passivation & Rust Proof:</th>
                            <td>ASTM F899 Corrosion Tested Passed</td>
                        </tr>
                        <tr>
                            <th>Surface Finish:</th>
                            <td>Satin Anti-Glare / Gold Ring Accent</td>
                        </tr>
                    </table>
                </div>

                <!-- DUAL COMMERCE ACTION BUTTONS -->
                <div class="space-y-3 pt-2">
                    <!-- Flow A: B2C Single Sample Order -->
                    <form class="cart flex items-center gap-3" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                        <?php woocommerce_quantity_input(array('min_value' => 1, 'max_value' => 49), $product, true); ?>
                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="btn-gold-glow flex-1 py-3.5 text-xs uppercase font-bold">
                            <i class="fa-solid fa-cart-shopping"></i> BUY 1 SAMPLE UNIT NOW
                        </button>
                    </form>

                    <!-- Flow B: B2B Wholesale Custom Order (50% Deposit Flow) -->
                    <a href="<?php echo esc_url(home_url('/wholesale-custom-orders?product_id=' . $product->get_id())); ?>" class="w-full btn-chrome-ghost py-3.5 text-xs flex items-center justify-center gap-2">
                        <i class="fa-solid fa-industry text-xgold"></i> CUSTOM BULK ORDER (50% ADVANCE DEPOSIT)
                    </a>
                </div>
            </div>
        </div>

        <!-- ==========================================================================
           RELATED & SIMILAR SURGICAL PRODUCTS (RESPONSIVE CAROUSEL & GRID FIX)
           ========================================================================== -->
        <div class="widescreen-container mt-16 pt-12 border-t border-white/10">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="badge-pill-gold mb-2">COMPLETE YOUR SURGICAL SET</span>
                    <h3 class="font-cinzel text-2xl sm:text-3xl font-bold text-white uppercase">
                        RELATED <span class="gold-gradient-text">INSTRUMENTS</span>
                    </h3>
                </div>
            </div>

            <!-- Responsive Mobile Touch Scroll / Widescreen Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 2xl:grid-cols-6 gap-6">
                <?php
                // Fetch Related Products or Fallback to Other Products
                $cats = wp_get_post_terms($current_id, 'product_cat', array('fields' => 'ids'));
                $related_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 6,
                    'post__not_in'   => array($current_id),
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $cats,
                        ),
                    ),
                );
                $related_query = new WP_Query($related_args);

                // Fallback query if category query has less than 4 items
                if ($related_query->post_count < 2) {
                    $related_args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 6,
                        'post__not_in'   => array($current_id),
                        'orderby'        => 'rand'
                    );
                    $related_query = new WP_Query($related_args);
                }

                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post();
                        global $product;
                        ?>
                        <div class="product-grid-card group flex flex-col justify-between">
                            <div>
                                <div class="product-thumb-wrapper mb-4">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'object-contain')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/aufricht_rhinoplasty_retractor.jpg" alt="<?php the_title(); ?>" class="object-cover w-full h-full">
                                    <?php endif; ?>
                                    <span class="absolute top-3 left-3 badge-stock-in">GERMAN STEEL</span>
                                    <span class="absolute top-3 right-3 badge-hrc-spec">HRC 54</span>
                                </div>

                                <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: <?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'XNT-8802'; ?></span>
                                <h4 class="font-cinzel text-sm font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="text-xs font-bold text-xgold mb-3">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="w-full btn-gold-glow py-2 text-xs">
                                VIEW SPECS
                            </a>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Demo Fallback items
                    for ($j = 1; $j <= 4; $j++) :
                        ?>
                        <div class="product-grid-card group flex flex-col justify-between">
                            <div>
                                <div class="product-thumb-wrapper mb-4">
                                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/product-images/aufricht_rhinoplasty_retractor.jpg" alt="Surgical Scissors" class="object-cover opacity-90">
                                    <span class="absolute top-3 left-3 badge-stock-in">GERMAN STEEL</span>
                                    <span class="absolute top-3 right-3 badge-hrc-spec">HRC 54</span>
                                </div>
                                <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: XNT-PS-00<?php echo $j; ?></span>
                                <h4 class="font-cinzel text-sm font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                                    Aufricht Rhinoplasty Fiber Optic Retractor
                                </h4>
                                <div class="text-xs font-bold text-xgold mb-3">
                                    $145.00 USD
                                </div>
                            </div>
                            <a href="#" class="w-full btn-gold-glow py-2 text-xs">
                                VIEW SPECS
                            </a>
                        </div>
                    <?php
                    endfor;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- MOBILE STICKY SINGLE PRODUCT ACTION BAR -->
    <div class="fixed bottom-16 left-0 right-0 z-40 bg-titanium/95 backdrop-blur-lg border-t border-xgold/30 p-3 lg:hidden flex items-center gap-3">
        <a href="<?php echo esc_url(home_url('/wholesale-custom-orders?product_id=' . $product->get_id())); ?>" class="btn-chrome-ghost flex-1 py-2.5 text-[10px]">
            50% DEPOSIT QUOTE
        </a>
        <a href="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" class="btn-gold-glow flex-1 py-2.5 text-[10px]">
            BUY SAMPLE NOW
        </a>
    </div>

<?php
endwhile;
get_footer();
