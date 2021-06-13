<?php

if (!class_exists('Hash_Themes_Register_Customizer_Controls')) {

    class Hash_Themes_Register_Customizer_Controls {

        protected $version;

        function __construct() {
            if (defined('HASH_THEMES_VERSION')) {
                $this->version = TOTAL_VERSION;
            } else {
                $this->version = '1.0.0';
            }

            add_action('customize_register', array($this, 'register_customizer_settings'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
            add_action('customize_preview_init', array($this, 'enqueue_customize_preview_js'));
        }

        public function register_customizer_settings($wp_customize) {
            $wp_customize->get_section('static_front_page')->priority = 1;

            /** Theme Options */
            //require HASH_THEMES_CUSTOMIZER_PATH . 'customizer-panel/general-settings.php';

            /** For Additional Hooks */
            do_action('total_new_options', $wp_customize);
        }

        public function enqueue_customizer_script() {
            wp_enqueue_style('total-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.css', array(), $this->get_version());
        }

        public function enqueue_customize_preview_js() {
            wp_enqueue_script('total-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/customizer-preview.js', array('customize-preview'), $this->get_version(), true);
        }

        public function get_version() {
            return $this->version;
        }

    }

    new Hash_Themes_Register_Customizer_Controls();
}
