<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * @package XentiaTheme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- ARCHIVE HERO BANNER -->
<section class="py-12 bg-titanium border-b border-xgold/20 relative overflow-hidden">
    <div class="widescreen-container text-center">
        <span class="badge-pill-gold mb-2">GERMAN STAINLESS STEEL CATALOG</span>
        <h1 class="font-cinzel text-3xl sm:text-4xl lg:text-5xl font-bold text-white uppercase mt-2">
            <?php woocommerce_page_title(); ?>
        </h1>
        <p class="text-xs sm:text-sm text-xsilver max-w-2xl mx-auto mt-2">
            Explore our world-class surgical tools, plastic surgery instruments, & hairdressing shears crafted for international clinics & B2B distributors.
        </p>
    </div>
</section>

<!-- MAIN CATALOG GRID & FILTERS (WIDESCREEN FLUID) -->
<section class="py-16 bg-obsidian">
    <div class="widescreen-container grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Sidebar Category Filter (3 Cols) -->
        <aside class="lg:col-span-3 space-y-6">
            <div class="glass-card p-6 rounded-xl space-y-4">
                <h3 class="font-cinzel text-base font-bold text-xgold uppercase border-b border-white/10 pb-3 flex items-center gap-2">
                    <i class="fa-solid fa-filter text-xs"></i> SURGICAL CATEGORIES
                </h3>
                <ul class="space-y-2 text-xs text-xsilver">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                    ));
                    if (!empty($categories) && !is_wp_error($categories)) :
                        foreach ($categories as $cat) :
                            ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="hover:text-xgold transition flex items-center justify-between py-1">
                                    <span><?php echo esc_html($cat->name); ?></span>
                                    <span class="text-[10px] bg-white/5 border border-white/10 px-2 py-0.5 rounded text-xsilver-dark"><?php echo $cat->count; ?></span>
                                </a>
                            </li>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <li><a href="<?php echo esc_url(home_url('/shop')); ?>" class="hover:text-xgold">All Products</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- B2B Wholesale Promo Card -->
            <div class="glass-card border-xgold p-6 rounded-xl text-center space-y-3">
                <i class="fa-solid fa-industry text-3xl text-xgold"></i>
                <h4 class="font-cinzel text-sm font-bold text-white uppercase">NEED CUSTOM OEM TOOLING?</h4>
                <p class="text-[11px] text-xsilver">Get 50% discount on bulk orders of 500+ pcs with custom logo laser engraving.</p>
                <a href="<?php echo esc_url(home_url('/wholesale-custom-orders')); ?>" class="btn-gold-glow w-full py-2 text-xs">
                    OPEN B2B BUILDER
                </a>
            </div>
        </aside>

        <!-- Product Grid Content (9 Cols scaling to 4-cols on 2k/4k) -->
        <main class="lg:col-span-9 space-y-6">
            <div class="flex items-center justify-between border-b border-white/10 pb-4 text-xs text-xsilver">
                <span><?php woocommerce_result_count(); ?></span>
                <div class="flex items-center gap-2">
                    <span>Sort by:</span>
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>

            <?php if (woocommerce_product_loop()) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6">
                    <?php
                    while (have_posts()) :
                        the_post();
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

                                <span class="text-[10px] text-xsilver-dark font-montserrat uppercase tracking-wider block mb-1">SKU: <?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'XNT-SAMP'; ?></span>
                                <h4 class="font-cinzel text-base font-bold text-white group-hover:text-xgold transition line-clamp-2 mb-2">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="text-sm font-bold text-xgold mb-4">
                                    <?php echo $product->get_price_html(); ?>
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
                    <?php endwhile; ?>
                </div>

                <div class="pt-8">
                    <?php woocommerce_pagination(); ?>
                </div>
            <?php else : ?>
                <p class="text-center text-xsilver py-12">No instruments found matching your selection.</p>
            <?php endif; ?>
        </main>
    </div>
</section>

<?php
get_footer();
