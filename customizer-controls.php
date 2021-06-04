<?php

function hash_themes_customize_register_controls($wp_customize) {
    $wp_customize->get_section('static_front_page')->priority = 1;

    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/alpha-color-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/background-image-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/category-dropdown-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/color-tab-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/date-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/dimensions-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/graident-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/heading-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/icon-selector-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/image-selector-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-checkbox-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-select-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/multiple-selectize-control.php';
    require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/page-editor-control.php';
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

add_action('customize_register', 'hash_themes_customize_register_controls');

function hash_themes_customizer_script() {
    wp_enqueue_script('selectize', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/selectize.js', array('jquery'), HASH_THEMES_VER, true);
    wp_enqueue_script('chosen-jquery', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/chosen.jquery.js', array('jquery'), HASH_THEMES_VER, true);
    wp_enqueue_script('wp-color-picker-alpha', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), HASH_THEMES_VER, true);
    wp_enqueue_script('hash-themes-customizer-control', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), HASH_THEMES_VER, true);
    wp_enqueue_script('hash-themes-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/js/customizer.js', array('jquery'), HASH_THEMES_VER, true);

    wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/vendors/materialdesignicons/materialdesignicons.css', array(), HASH_THEMES_VER);
    wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.css', array(), HASH_THEMES_VER);
    wp_enqueue_style('eleganticons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), HASH_THEMES_VER);

    wp_enqueue_style('selectize', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/selectize.css', array(), HASH_THEMES_VER);
    wp_enqueue_style('chosen', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/chosen.css', array(), HASH_THEMES_VER);
    wp_enqueue_style('hash-themes-customizer-control', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.css', array('wp-color-picker'), HASH_THEMES_VER);
    wp_enqueue_style('hash-themes-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/css/customizer.css', array(), HASH_THEMES_VER);
}

add_action('customize_controls_enqueue_scripts', 'hash_themes_customizer_script');

function hash_themes_customize_preview_js() {
    wp_enqueue_script('webfont', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/typography/js/webfont.js', array('jquery'), HASH_THEMES_VER, false);
    wp_enqueue_script('hash-themes-customizer', HASH_THEMES_CUSTOMIZER_URL . 'customizer-panel/assets/js/customizer-preview.js', array('customize-preview'), HASH_THEMES_VER, true);
}

add_action('customize_preview_init', 'hash_themes_customize_preview_js');
