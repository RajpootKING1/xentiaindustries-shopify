<?php
/**
 * Xentia Industries Theme Functions
 * 
 * @package XentiaTheme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * 1. Theme Setup & Support Features
 */
function xentia_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 90,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    register_nav_menus(array(
        'primary-menu' => __('Primary Header Menu', 'xentia-theme'),
        'category-menu'=> __('Categories Mega Menu', 'xentia-theme'),
        'footer-menu'  => __('Footer Quick Links', 'xentia-theme'),
    ));

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'xentia_theme_setup');

/**
 * 2. Enqueue Fonts, Styles, and Scripts
 */
function xentia_enqueue_scripts() {
    wp_enqueue_style(
        'xentia-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'font-awesome-6',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.tailwindcss.com',
        array(),
        '3.4.1',
        false
    );

    // Configure Tailwind Custom Widescreen Breakpoints & Colors
    $tailwind_config = "
    tailwind.config = {
      theme: {
        extend: {
          screens: {
            '3xl': '1920px',
            '4xl': '2560px'
          },
          colors: {
            obsidian: '#0A0A0C',
            titanium: '#111115',
            xgold: {
              DEFAULT: '#D4AF37',
              light: '#F3E5AB',
              dark: '#AA771C'
            },
            xsilver: {
              DEFAULT: '#9CA3AF',
              light: '#E5E7EB',
              dark: '#4B5563'
            }
          },
          fontFamily: {
            cinzel: ['Cinzel', 'serif'],
            montserrat: ['Montserrat', 'sans-serif'],
            inter: ['Inter', 'sans-serif']
          }
        }
      }
    };
    ";
    wp_add_inline_script('tailwind-cdn', $tailwind_config);

    wp_enqueue_style('xentia-style', get_stylesheet_uri(), array(), '2.0.0');

    wp_enqueue_script(
        'xentia-main-js',
        get_template_directory_uri() . '/Assets/js/main.js',
        array('jquery'),
        '2.0.0',
        true
    );

    wp_localize_script('xentia-main-js', 'xentia_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('xentia_nonce'),
        'cart_url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart'),
        'is_front_page' => is_front_page() ? '1' : '0'
    ));
}
add_action('wp_enqueue_scripts', 'xentia_enqueue_scripts');

/**
 * 3. WooCommerce Related Products Limit & Mobile Optimization
 */
function xentia_related_products_args($args) {
    $args['posts_per_page'] = 6;
    $args['columns']        = 3;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'xentia_related_products_args', 20);
add_filter('loop_shop_columns', function() { return 3; }, 999);

/**
 * 4. WooCommerce Cart AJAX Fragments Update
 */
if (class_exists('WooCommerce')) {
    add_filter('woocommerce_add_to_cart_fragments', 'xentia_cart_count_fragment');
    function xentia_cart_count_fragment($fragments) {
        ob_start();
        $count = WC()->cart->get_cart_contents_count();
        ?>
        <span class="cart-badge-count" id="header-cart-count"><?php echo esc_html($count); ?></span>
        <?php
        $fragments['#header-cart-count'] = ob_get_clean();
        return $fragments;
    }
}

/**
 * 5. Custom B2B Deposit Checkout Handling (50% Advance Production Deposit)
 */
function xentia_handle_b2b_deposit_cart_item_data($cart_item_data, $product_id, $variation_id) {
    if (isset($_POST['is_b2b_deposit']) && $_POST['is_b2b_deposit'] === '1') {
        $cart_item_data['is_b2b_deposit'] = true;
        $cart_item_data['deposit_percentage'] = 50;
        $cart_item_data['steel_grade'] = isset($_POST['steel_grade']) ? sanitize_text_field($_POST['steel_grade']) : 'AISI 420 German Stainless Steel';
        $cart_item_data['custom_logo_engraving'] = isset($_POST['custom_logo_engraving']) ? sanitize_text_field($_POST['custom_logo_engraving']) : 'Standard Xentia Logo';
        $cart_item_data['custom_packaging'] = isset($_POST['custom_packaging']) ? sanitize_text_field($_POST['custom_packaging']) : 'Standard Leatherette Pouch';
    }
    return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'xentia_handle_b2b_deposit_cart_item_data', 10, 3);

function xentia_adjust_b2b_deposit_price($cart) {
    if (is_admin() && !defined('DOING_AJAX')) return;
    
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        if (!empty($cart_item['is_b2b_deposit'])) {
            $original_price = $cart_item['data']->get_price();
            $deposit_price = $original_price * 0.50; // 50% advance deposit
            $cart_item['data']->set_price($deposit_price);
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'xentia_adjust_b2b_deposit_price', 10, 1);

function xentia_display_b2b_item_data_in_cart($item_data, $cart_item) {
    if (!empty($cart_item['is_b2b_deposit'])) {
        $item_data[] = array(
            'key'   => __('Order Type', 'xentia-theme'),
            'value' => __('B2B Wholesale (50% Production Deposit)', 'xentia-theme')
        );
        if (!empty($cart_item['steel_grade'])) {
            $item_data[] = array(
                'key'   => __('Steel Grade', 'xentia-theme'),
                'value' => esc_html($cart_item['steel_grade'])
            );
        }
    }
    return $item_data;
}
add_filter('woocommerce_get_item_data', 'xentia_display_b2b_item_data_in_cart', 10, 2);

/**
 * 6. B2B Custom Inquiry AJAX Submission
 */
function xentia_ajax_submit_b2b_quote() {
    check_ajax_referer('xentia_nonce', 'nonce');

    $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';

    if (empty($email) || empty($name)) {
        wp_send_json_error(array('message' => 'Please fill in required fields (Name & Email).'));
    }

    wp_send_json_success(array(
        'message' => 'Thank you! Your B2B Wholesale & Custom OEM Quote Request has been received. A senior medical sales engineer will contact you within 6 hours.'
    ));
}
add_action('wp_ajax_xentia_submit_b2b_quote', 'xentia_ajax_submit_b2b_quote');
add_action('wp_ajax_nopriv_xentia_submit_b2b_quote', 'xentia_ajax_submit_b2b_quote');
