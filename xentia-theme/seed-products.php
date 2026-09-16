<?php
/**
 * Xentia Industries - WooCommerce Database Seeder
 * 
 * Run this script by placing it in WordPress root or visiting /wp-content/themes/xentia-theme/seed-products.php
 * when logged in as Administrator.
 */

// Load WordPress environment if running standalone
if (!defined('ABSPATH')) {
    $wp_load = dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php';
    if (file_exists($wp_load)) {
        require_once($wp_load);
    } else {
        die('Could not load wp-load.php. Please ensure script is inside theme folder.');
    }
}

if (!current_user_can('manage_options')) {
    wp_die('Unauthorized: You must be an Administrator to run the Xentia Product Seeder.');
}

if (!class_exists('WooCommerce')) {
    wp_die('WooCommerce plugin must be installed and active to run this seeder.');
}

echo '<h2 style="font-family:sans-serif; color:#D4AF37; background:#0A0A0C; padding:20px;">⚡ Xentia Industries - WooCommerce Product Seeder</h2>';
echo '<div style="font-family:sans-serif; color:#E5E7EB; background:#111115; padding:20px; border:1px solid #D4AF37;">';

/**
 * 1. Seed Product Categories
 */
$categories = array(
    'Plastic Surgery'      => 'Rhinoplasty, Aufricht Retractors, Tebbetts Calipers, & Facial Tools',
    'Hairdressing Scissors'=> 'Japanese 440C Convex Edge Shears, Thinning Scissors, & Swivel Razors',
    'Dental Tools'         => 'Extraction Forceps, Root Elevators, & Implant Surgery Kits',
    'Tungsten Carbide'     => 'Gold Ring Handle Mayo-Hegar Needle Holders & TC Iris Scissors',
    'Micro Surgery'        => 'Micro Forceps, Titanium Capsulorhexis, & Fine Needle Holders',
    'Liposuction'          => 'Infiltration Cannulas, Fat Transfer Syringe Luer Locks'
);

$cat_ids = array();
foreach ($categories as $cat_name => $cat_desc) {
    $term = get_term_by('name', $cat_name, 'product_cat');
    if (!$term) {
        $new_term = wp_insert_term($cat_name, 'product_cat', array('description' => $cat_desc));
        if (!is_wp_error($new_term)) {
            $cat_ids[$cat_name] = $new_term['term_id'];
            echo "✅ Created Category: <strong>{$cat_name}</strong><br>";
        }
    } else {
        $cat_ids[$cat_name] = $term->term_id;
        echo "ℹ️ Category already exists: <strong>{$cat_name}</strong><br>";
    }
}

/**
 * 2. Seed Sample Products
 */
$products = array(
    array(
        'title' => 'Aufricht Rhinoplasty Fiber Optic Gold Retractor 19cm',
        'sku'   => 'XNT-PS-8801',
        'price' => '145.00',
        'cat'   => 'Plastic Surgery',
        'desc'  => 'Engineered from German AISI 420 Stainless Steel (HRC 54). Features fiber-optic light channel, satin anti-glare finish, & gold-plated ergonomic handle. Autoclave safe at 134°C.',
        'specs' => array('Steel' => 'AISI 420 German Steel', 'HRC' => '54 HRC', 'Autoclave' => '134°C Safe')
    ),
    array(
        'title' => 'Tebbetts Precision Caliper & Measuring Gauge 0-80mm',
        'sku'   => 'XNT-PS-8802',
        'price' => '185.00',
        'cat'   => 'Plastic Surgery',
        'desc'  => 'Zero-tolerance micro-caliper designed for precise facial plastic & rhinoplasty measurement. Laser-etched millimeter scale with passivated rust-proof guarantee.',
        'specs' => array('Steel' => 'AISI 420 German Steel', 'HRC' => '56 HRC', 'Autoclave' => '134°C Safe')
    ),
    array(
        'title' => 'Japanese 440C Convex Edge Hairdressing Shear 6.0 Inch',
        'sku'   => 'XNT-HS-3301',
        'price' => '120.00',
        'cat'   => 'Hairdressing Scissors',
        'desc'  => 'Hand-forged Japanese 440C alloy styling scissor with razor convex edge & ball-bearing tension tension system. Ergonomic offset handle prevents wrist fatigue.',
        'specs' => array('Steel' => 'Japanese 440C Stainless Steel', 'HRC' => '60-61 HRC', 'Edge' => 'Convex Razor Edge')
    ),
    array(
        'title' => 'Swivel Handle Ergonomic Thinning & Texturizing Shear 30-Tooth',
        'sku'   => 'XNT-HS-3302',
        'price' => '135.00',
        'cat'   => 'Hairdressing Scissors',
        'desc'  => '360-degree rotating swivel thumb ring styling scissor. Removes 30% hair volume cleanly without pulling or pinching.',
        'specs' => array('Steel' => 'Japanese 440C Stainless Steel', 'HRC' => '60 HRC', 'Teeth' => '30 Notch Teeth')
    ),
    array(
        'title' => 'Mayo-Hegar Tungsten Carbide Gold Handle Needle Holder 7 Inch',
        'sku'   => 'XNT-TC-5501',
        'price' => '95.00',
        'cat'   => 'Tungsten Carbide',
        'desc'  => 'Gold ring handle needle holder equipped with micro serrated Tungsten Carbide jaws for non-slip grip on 3-0 to 6-0 surgical sutures.',
        'specs' => array('Steel' => 'AISI 420 + TC Inserts', 'HRC' => '68 HRC Jaws', 'Ring' => '24K Gold Plated')
    ),
    array(
        'title' => 'TC Iris Curved Precision Micro Scissors 11.5cm',
        'sku'   => 'XNT-TC-5502',
        'price' => '75.00',
        'cat'   => 'Tungsten Carbide',
        'desc'  => 'Ultra-fine curved tip dissection scissors with seamless Tungsten Carbide blade inserts for razor precision cutting in plastic & ophthalmic surgery.',
        'specs' => array('Steel' => 'AISI 420 + TC Inserts', 'HRC' => '66 HRC Blade', 'Length' => '11.5 cm')
    ),
    array(
        'title' => 'Dental Root Elevator & Extraction Forceps 4-Piece Kit',
        'sku'   => 'XNT-DT-1101',
        'price' => '210.00',
        'cat'   => 'Dental Tools',
        'desc'  => 'Complete oral surgery kit including upper/lower root elevators & anatomical extraction forceps. Forged from German stainless steel with knurled non-slip handles.',
        'specs' => array('Steel' => 'AISI 420 German Steel', 'HRC' => '54 HRC', 'Set' => '4 Pieces')
    ),
    array(
        'title' => 'Liposuction Fat Harvesting Multi-Hole Cannula 3.0mm x 25cm',
        'sku'   => 'XNT-LP-4401',
        'price' => '160.00',
        'cat'   => 'Liposuction',
        'desc'  => 'Luer Lock aluminum hub cannula with 12 offset harvesting ports. Smooth mirror-polished interior reduces adipocyte trauma during fat grafting.',
        'specs' => array('Steel' => 'AISI 304 Seamless Tubing', 'Hub' => 'Gold Anodized Luer Lock', 'Ports' => '12 Holes')
    )
);

foreach ($products as $p) {
    $existing_id = wc_get_product_id_by_sku($p['sku']);
    if (!$existing_id) {
        $product = new WC_Product_Simple();
        $product->set_name($p['title']);
        $product->set_sku($p['sku']);
        $product->set_regular_price($p['price']);
        $product->set_short_description($p['desc']);
        $product->set_description($p['desc']);
        $product->set_status('publish');
        $product->set_catalog_visibility('visible');

        if (isset($cat_ids[$p['cat']])) {
            $product->set_category_ids(array($cat_ids[$p['cat']]));
        }

        $product_id = $product->save();
        echo "🎉 Created Product: <strong>{$p['title']}</strong> (SKU: {$p['sku']}, Price: \${$p['price']})<br>";
    } else {
        echo "ℹ️ Product already exists: <strong>{$p['title']}</strong> (SKU: {$p['sku']})<br>";
    }
}

echo '<br><h3 style="color:#10B981;">✨ Xentia Database Seeding Complete!</h3>';
echo '<a href="' . esc_url(home_url('/shop')) . '" style="color:#D4AF37;">View Product Catalog →</a>';
echo '</div>';
