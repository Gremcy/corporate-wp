<?php

namespace PS\Functions\Assets;

/**
 * Class Files
 * @package PS\Functions\Assets
 * @since   1.0.0
 */
class Files {

    /**
     * constructor.
     */
    public function __construct() {
        //
        add_action( 'wp_print_styles', array( $this, 'load_styles_on_site' ) ); // css
        add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_on_site' ) ); // js
        add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_in_admin' ) ); // admin css and js
    }

    /**
     * Подключаем стили в хедере
     */
    public function load_styles_on_site() {
        // css
        wp_enqueue_style('main_css', \PS::$assets_url.'styles/main.css', array(), '1.0.42');
    }

    /**
     * Подключаем скрипты
     */
    public function load_scripts_on_site() {
        // jquery
        wp_deregister_script('jquery'); wp_register_script('jquery', \PS::$assets_url.'js/min/jquery-3.6.1.min.js', false, '3.6.1', true); wp_enqueue_script('jquery');

        // js
        wp_enqueue_script('imagesloaded_js', \PS::$assets_url.'js/min/imagesloaded.pkgd.min.js', array('jquery'), '5.0.0', true);
        wp_enqueue_script('parsley_js', \PS::$assets_url.'js/min/parsley.min.js', array('jquery'), '2.9.2', true);
        wp_enqueue_script('main_js', \PS::$assets_url.'js/main.js', array('jquery'), '1.0.35', true);
    }

    /**
     * Подключаем стили и скрипты в админку
     */
    public function load_scripts_in_admin() {
        wp_enqueue_script('admin_js', \PS::$assets_url.'js/admin/admin.js', array('jquery'), '1.0.1', true);
        wp_enqueue_style('admin_css', \PS::$assets_url.'styles/admin/admin.css', array(), '1.0.1');
    }
}