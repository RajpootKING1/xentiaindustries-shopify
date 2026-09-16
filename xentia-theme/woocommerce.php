<?php
/**
 * WooCommerce Wrapper Template
 * 
 * @package XentiaTheme
 */

get_header();
?>

<section class="py-12 bg-titanium border-b border-xgold/20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <span class="badge-pill-gold mb-2">GERMAN STAINLESS STEEL STORE</span>
        <h1 class="font-cinzel text-3xl font-bold text-white uppercase mt-1">XENTIA STOREFRONT</h1>
    </div>
</section>

<section class="py-16 bg-obsidian text-xsilver min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-6">
        <?php woocommerce_content(); ?>
    </div>
</section>

<?php
get_footer();
