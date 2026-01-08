<?php
/*
Plugin Name: Page Card System
Description: Sistema avançado de exibição de páginas ou posts em formato de cards.
Version: 1.1
Author: Teknisa
*/

if (!defined('ABSPATH')) exit;

/* ===============================
   MENU ADMIN
================================ */
add_action('admin_menu', function () {
    add_menu_page(
        'Page Card System',
        'Page Cards',
        'manage_options',
        'page-card-system',
        function () {
            include plugin_dir_path(__FILE__) . 'admin/admin-page.php';
        },
        'dashicons-screenoptions',
        25
    );
});

/* ===============================
   ASSETS FRONT
================================ */
add_action('wp_enqueue_scripts', function () {
    $base = plugin_dir_url(__FILE__);

    wp_enqueue_style('pcs-base', $base . 'assets/css/base.css', [], '1.1');
    wp_enqueue_style('pcs-featured', $base . 'assets/css/featured.css', [], '1.1');
    wp_enqueue_style('pcs-list', $base . 'assets/css/list.css', [], '1.1');
    wp_enqueue_style('pcs-horizontal', $base . 'assets/css/horizontal.css', [], '1.1');
    wp_enqueue_style('pcs-slider', $base . 'assets/css/slider.css', [], '1.1');

    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');

    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('pcs-slider', $base . 'assets/js/slider.js', [], '1.1', true);
});

/* ===============================
   ASSETS ADMIN
================================ */
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style(
        'pcs-admin',
        plugin_dir_url(__FILE__) . 'assets/css/admin-style.css',
        [],
        '1.1'
    );
});

/* ===============================
   HELPERS
================================ */
function pcs_truncate_title($title, $atts) {
    $limit = isset($atts['title_length']) ? intval($atts['title_length']) : 0;

    if ($limit > 0 && mb_strlen($title) > $limit) {
        return mb_substr($title, 0, $limit) . '…';
    }

    return $title;
}

/* ===============================
   SHORTCODE
================================ */
function pcs_cards_shortcode($atts) {

    $atts = shortcode_atts([
        'type'          => 'post',
        'parent'        => '',
        'layout'        => 'featured',
        'limit'         => 5,
        'offset'        => 0,
        'order'         => 'DESC',
        'title_length'  => 0,
        'show_excerpt'  => false,
        'show_meta'     => false,
    ], $atts);

    $args = [
        'post_type'      => $atts['type'],
        'posts_per_page' => intval($atts['limit']),
        'offset'         => intval($atts['offset']),
        'order'          => $atts['order'],
        'post_status'    => 'publish'
    ];

    if ($atts['type'] === 'page' && $atts['parent']) {
        $args['post_parent'] = intval($atts['parent']);
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) return '';

    ob_start();

    $template = plugin_dir_path(__FILE__) . 'templates/' . $atts['layout'] . '.php';
    if (!file_exists($template)) {
        $template = plugin_dir_path(__FILE__) . 'templates/featured.php';
    }

    include $template;

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('pcs_cards', 'pcs_cards_shortcode');
