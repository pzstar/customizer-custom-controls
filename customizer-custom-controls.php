<?php

if (!class_exists('Hash_Themes_Customizer_Custom_Controls')) {

    class Hash_Themes_Customizer_Custom_Controls {

        protected $version;

        function __construct() {
            if (defined('HASH_THEMES_VERSION')) {
                $this->version = TOTAL_VERSION;
            } else {
                $this->version = '1.0.0';
            }

            add_action('customize_register', array($this, 'register_controls'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
        }

        public function register_controls($wp_customize) {
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/alpha-color-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/background-image-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/color-tab-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/date-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/dimensions-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/editor-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/gallery-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/graident-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/heading-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/icon-selector-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/image-selector-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-checkbox-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-select-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-selectize-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/range-slider-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/repeater-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/responsive-range-slider-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/chosen-select-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/selector-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/separator-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/sortable-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/switch-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/tab-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/text-info-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/text-selector-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/toggle-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/typography/typography-control-class.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/column-control/column-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/preloader-control.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/upgrade-section.php';
            require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/toggle-section.php';

            /** Register Control Type */
            $wp_customize->register_control_type('Hash_Themes_Color_Tab_Control');
            $wp_customize->register_control_type('Hash_Themes_Background_Image_Control');
            $wp_customize->register_control_type('Hash_Themes_Tab_Control');
            $wp_customize->register_control_type('Hash_Themes_Dimensions_Control');
            $wp_customize->register_control_type('Hash_Themes_Responsive_Range_Slider_Control');
            $wp_customize->register_control_type('Hash_Themes_Sortable_Control');
            $wp_customize->register_control_type('Hash_Themes_Typography_Control');

            // Register custom section types.
            $wp_customize->register_section_type('Hash_Themes_Upgrade_Section');
            $wp_customize->register_section_type('Hash_Themes_Toggle_Section');
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('selectize', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/selectize.js', array('jquery'), $this->get_version(), true);
            wp_enqueue_script('chosen-jquery', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/chosen.jquery.js', array('jquery'), $this->get_version(), true);
            wp_enqueue_script('wp-color-picker-alpha', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), $this->get_version(), true);
            wp_enqueue_script('hash-themes-customizer-control', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), $this->get_version(), true);
            wp_enqueue_script('hash-themes-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/js/customizer.js', array('jquery'), $this->get_version(), true);

            wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/vendors/materialdesignicons/materialdesignicons.css', array(), $this->get_version());
            wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.css', array(), $this->get_version());
            wp_enqueue_style('eleganticons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), $this->get_version());

            wp_enqueue_style('selectize', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/selectize.css', array(), $this->get_version());
            wp_enqueue_style('chosen', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/chosen.css', array(), $this->get_version());
            wp_enqueue_style('hash-themes-customizer-control', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.css', array('wp-color-picker'), $this->get_version());
        }

        public function get_version() {
            return $this->version;
        }

    }

    new Hash_Themes_Customizer_Custom_Controls();
}



