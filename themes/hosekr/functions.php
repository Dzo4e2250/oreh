<?php
/**
 * Hosekr tema funkcije
 *
 * @package Hosekr
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HOSEKR_VERSION', '1.0.0');
define('HOSEKR_DIR', get_template_directory());
define('HOSEKR_URI', get_template_directory_uri());

/**
 * Nastavitev teme
 */
function hosekr_setup() {
    // Podpora za naslov strani
    add_theme_support('title-tag');

    // Podpora za sličice
    add_theme_support('post-thumbnails');

    // Podpora za HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Podpora za logotip
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Registracija menijev
    register_nav_menus(array(
        'primary' => __('Glavni meni', 'hosekr'),
        'footer'  => __('Meni v nogi', 'hosekr'),
    ));
}
add_action('after_setup_theme', 'hosekr_setup');

/**
 * Vključitev stilov in skript
 */
function hosekr_scripts() {
    // Google Fonts - Inter
    wp_enqueue_style(
        'hosekr-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Glavni stil
    wp_enqueue_style(
        'hosekr-style',
        get_stylesheet_uri(),
        array('hosekr-google-fonts'),
        HOSEKR_VERSION
    );

    // Dodatni stili
    wp_enqueue_style(
        'hosekr-main',
        HOSEKR_URI . '/assets/css/main.css',
        array('hosekr-style'),
        HOSEKR_VERSION
    );

    // Glavna skripta
    wp_enqueue_script(
        'hosekr-main',
        HOSEKR_URI . '/assets/js/main.js',
        array(),
        HOSEKR_VERSION,
        true
    );

    // Lokalizacija za AJAX
    wp_localize_script('hosekr-main', 'hosekrAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('hosekr_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'hosekr_scripts');

/**
 * Prilagoditev strani (Customizer)
 */
function hosekr_customize_register($wp_customize) {
    // Sekcija: Kontaktni podatki
    $wp_customize->add_section('hosekr_contact', array(
        'title'    => __('Kontaktni podatki', 'hosekr'),
        'priority' => 30,
    ));

    // Telefon
    $wp_customize->add_setting('hosekr_phone', array(
        'default'           => '+386 40 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hosekr_phone', array(
        'label'   => __('Telefonska številka', 'hosekr'),
        'section' => 'hosekr_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('hosekr_email', array(
        'default'           => 'info@hosekr.si',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('hosekr_email', array(
        'label'   => __('E-poštni naslov', 'hosekr'),
        'section' => 'hosekr_contact',
        'type'    => 'email',
    ));

    // Naslov
    $wp_customize->add_setting('hosekr_address', array(
        'default'           => 'Slovenska cesta 1, 1000 Ljubljana',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hosekr_address', array(
        'label'   => __('Naslov', 'hosekr'),
        'section' => 'hosekr_contact',
        'type'    => 'text',
    ));

    // Sekcija: Družabna omrežja
    $wp_customize->add_section('hosekr_social', array(
        'title'    => __('Družabna omrežja', 'hosekr'),
        'priority' => 35,
    ));

    // Facebook
    $wp_customize->add_setting('hosekr_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hosekr_facebook', array(
        'label'   => __('Facebook URL', 'hosekr'),
        'section' => 'hosekr_social',
        'type'    => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('hosekr_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hosekr_instagram', array(
        'label'   => __('Instagram URL', 'hosekr'),
        'section' => 'hosekr_social',
        'type'    => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('hosekr_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hosekr_linkedin', array(
        'label'   => __('LinkedIn URL', 'hosekr'),
        'section' => 'hosekr_social',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'hosekr_customize_register');

/**
 * Obdelava kontaktnega obrazca
 */
function hosekr_process_contact_form() {
    // Preveri nonce
    if (!isset($_POST['hosekr_nonce']) || !wp_verify_nonce($_POST['hosekr_nonce'], 'hosekr_contact_form')) {
        wp_send_json_error(array('message' => __('Varnostna napaka. Prosimo, osvežite stran.', 'hosekr')));
    }

    // Pridobi in očisti podatke
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $service = sanitize_text_field($_POST['service'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Preveri obvezna polja
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => __('Prosimo, izpolnite vsa obvezna polja.', 'hosekr')));
    }

    // Preveri email
    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Prosimo, vnesite veljaven e-poštni naslov.', 'hosekr')));
    }

    // Priprava emaila
    $to = get_theme_mod('hosekr_email', get_option('admin_email'));
    $subject = sprintf(__('Nova poizvedba s spletne strani - %s', 'hosekr'), $service ?: 'Splošno');

    $body = sprintf(
        "Ime: %s\nE-pošta: %s\nTelefon: %s\nStoritev: %s\n\nSporočilo:\n%s",
        $name,
        $email,
        $phone ?: '/',
        $service ?: '/',
        $message
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
    );

    // Pošlji email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => __('Hvala za vaše sporočilo! Odgovorili vam bomo v najkrajšem možnem času.', 'hosekr')));
    } else {
        wp_send_json_error(array('message' => __('Pri pošiljanju sporočila je prišlo do napake. Prosimo, poskusite znova.', 'hosekr')));
    }
}
add_action('wp_ajax_hosekr_contact', 'hosekr_process_contact_form');
add_action('wp_ajax_nopriv_hosekr_contact', 'hosekr_process_contact_form');

/**
 * Pomožna funkcija za prikaz ikone
 */
function hosekr_icon($name) {
    $icons = array(
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>',
        'email' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>',
        'location' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>',
        'arrow-down' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>',
        'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153.509.5.902 1.105 1.153 1.772.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 01-1.153 1.772c-.5.508-1.105.902-1.772 1.153-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 01-1.772-1.153 4.904 4.904 0 01-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 011.153-1.772A4.897 4.897 0 015.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 100 10 5 5 0 000-10zm6.5-.25a1.25 1.25 0 10-2.5 0 1.25 1.25 0 002.5 0zM12 9a3 3 0 110 6 3 3 0 010-6z"/></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14m-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>',
        'facade' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>',
        'roof' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>',
        'house' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 9.3V4h-3v2.6L12 3 2 12h3v8h5v-6h4v6h5v-8h3l-3-2.7zm-9 .7c0-1.1.9-2 2-2s2 .9 2 2h-4z"/></svg>',
    );

    return isset($icons[$name]) ? $icons[$name] : '';
}
