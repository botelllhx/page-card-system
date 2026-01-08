<?php
/*
Plugin Name: Page Card System
Description: Sistema avançado de exibição de páginas ou posts em formato de cards reutilizáveis.
Version: 1.1.0
Author: Teknisa
*/

if (!defined('ABSPATH')) {
    exit;
}

/* =====================================================
   CONSTANTES
===================================================== */

define('PCS_VERSION', '1.1.0');
define('PCS_PATH', plugin_dir_path(__FILE__));
define('PCS_URL', plugin_dir_url(__FILE__));

/* =====================================================
   MENU ADMIN
===================================================== */

add_action('admin_menu', function () {
    add_menu_page(
        'Page Card System',
        'Page Cards',
        'manage_options',
        'page-card-system',
        'pcs_admin_page',
        'dashicons-screenoptions',
        25
    );
});

function pcs_admin_page() {
    include PCS_PATH . 'admin/admin-page.php';
}

/* =====================================================
   ADMIN ASSETS
===================================================== */

add_action('admin_enqueue_scripts', function ($hook) {

    // Apenas na página do plugin
    if ($hook !== 'toplevel_page_page-card-system') {
        return;
    }

    wp_enqueue_style(
        'pcs-admin-style',
        PCS_URL . 'admin/admin-style.css',
        [],
        PCS_VERSION
    );
});

/* =====================================================
   FRONTEND ASSETS
===================================================== */

add_action('wp_enqueue_scripts', function () {

    // Base (fontes + variáveis)
    wp_enqueue_style(
        'pcs-base',
        PCS_URL . 'assets/css/base.css',
        [],
        PCS_VERSION
    );

    // Layouts
    wp_enqueue_style(
        'pcs-featured',
        PCS_URL . 'assets/css/featured.css',
        ['pcs-base'],
        PCS_VERSION
    );

    wp_enqueue_style(
        'pcs-list',
        PCS_URL . 'assets/css/list.css',
        ['pcs-base'],
        PCS_VERSION
    );

    wp_enqueue_style(
        'pcs-horizontal',
        PCS_URL . 'assets/css/horizontal.css',
        ['pcs-base'],
        PCS_VERSION
    );

    wp_enqueue_style(
        'pcs-slider',
        PCS_URL . 'assets/css/slider.css',
        ['pcs-base'],
        PCS_VERSION
    );

    // JS do slider (Swiper ou custom)
    wp_enqueue_script(
        'pcs-slider',
        PCS_URL . 'assets/js/slider.js',
        ['jquery'],
        PCS_VERSION,
        true
    );
});

/* =====================================================
   SHORTCODE PRINCIPAL
===================================================== */

function pcs_cards_shortcode($atts) {

    $atts = shortcode_atts([
        'type'   => 'post',       // post | page
        'parent' => '',           // parent ID (páginas)
        'layout' => 'featured',   // featured | list | horizontal | slider
        'limit'  => 5,
        'offset' => 0,
        'order'  => 'DESC'
    ], $atts, 'pcs_cards');

    $args = [
        'post_type'      => sanitize_key($atts['type']),
        'posts_per_page' => intval($atts['limit']),
        'offset'         => intval($atts['offset']),
        'order'          => sanitize_text_field($atts['order']),
        'post_status'    => 'publish'
    ];

    // Parent (apenas para páginas)
    if ($atts['type'] === 'page' && !empty($atts['parent'])) {
        $args['post_parent'] = intval($atts['parent']);
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return '';
    }

    ob_start();

    $layout = sanitize_file_name($atts['layout']);
    $template = PCS_PATH . "templates/{$layout}.php";

    // Fallback seguro
    if (!file_exists($template)) {
        $template = PCS_PATH . 'templates/featured.php';
    }

    include $template;

    wp_reset_postdata();

    return ob_get_clean();
}

add_shortcode('pcs_cards', 'pcs_cards_shortcode');
