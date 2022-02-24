<?php

/* GENERAL SETTINGS SECTION */
$wp_customize->add_section('hash_themes_general_section', array(
    'title' => esc_html__('General Settings', 'hash-themes'),
    'priority' => -1
));

/* ========== Heading Control ========== */
$wp_customize->add_setting('hash_themes_heading', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
));

$wp_customize->add_control(new Hash_Themes_Heading_Control($wp_customize, 'hash_themes_heading', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Heading', 'hash-themes'),
)));

/* ========== Separator ========== */
$wp_customize->add_setting('hash_themes_seperator', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
));

$wp_customize->add_control(new Hash_Themes_Separator_Control($wp_customize, 'hash_themes_seperator', array(
    'section' => 'hash_themes_general_section',
)));

/* ========== Range Slider Control ========== */
$wp_customize->add_setting('hash_themes_slider', array(
    'sanitize_callback' => 'absint',
    'default' => 80,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Range_Slider_Control($wp_customize, 'hash_themes_slider', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('UI Slider', 'hash-themes'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    ),
    'unit' => '%'
)));

/* ========== Responsive Range Slider Control ========== */
$wp_customize->add_setting("hash_themes_responsive_slider", array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 60,
    'transport' => 'postMessage'
));

$wp_customize->add_setting("hash_themes_responsive_slider_tablet", array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 80,
    'transport' => 'postMessage'
));

$wp_customize->add_setting("hash_themes_responsive_slider_mobile", array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 100,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Responsive_Range_Slider_Control($wp_customize, 'hash_themes_responsive_slider', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Responsive UI Slider', 'hash-themes'),
    'settings' => array(
        'desktop' => "hash_themes_responsive_slider",
        'tablet' => "hash_themes_responsive_slider_tablet",
        'mobile' => "hash_themes_responsive_slider_mobile",
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 200,
        'step' => 1,
    ),
    'unit' => '%'
)));

/* ========== Toggle Control ========== */
$wp_customize->add_setting('hash_themes_toggle', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Toggle_Control($wp_customize, 'hash_themes_toggle', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Toggle', 'hash-themes')
)));

/* ========== Switch Control ========== */
$wp_customize->add_setting('hash_themes_switch', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => 'off',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Switch_Control($wp_customize, 'hash_themes_switch', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Switch', 'hash-themes'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'hash-themes'),
        'off' => esc_html__('No', 'hash-themes')
    ),
        //'class' => 'hash-themes-switch-section',
)));

/* ========== Selector Control ========== */
$wp_customize->add_setting('hash_themes_image_selector', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => 'style1',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Selector_Control($wp_customize, 'hash_themes_image_selector', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Image Selector', 'hash-themes'),
    'class' => 'ht--class-name', //class name to control the width of the image selector
    'options' => array(
        'style1' => HASH_THEMES_CUSTOMIZER_URL . 'image.jpg',
        'style2' => HASH_THEMES_CUSTOMIZER_URL . 'image.jpg',
        'style3' => HASH_THEMES_CUSTOMIZER_URL . 'image.jpg',
        'style4' => HASH_THEMES_CUSTOMIZER_URL . 'image.jpg'
    )
)));

/* ========== Multi Checkbox Control ========== */
$wp_customize->add_setting('hash_themes_multicheck_box', array(
    'sanitize_callback' => 'hash_themes_sanitize_multi_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Multiple_Checkbox_Control($wp_customize, 'hash_themes_multicheck_box', array(
    'label' => esc_html__('Multi Checkbox', 'hash-themes'),
    'section' => 'hash_themes_general_section',
    'choices' => array(
        'facebook' => esc_html__('Facebook', 'hash-themes'),
        'twitter' => esc_html__('Twitter', 'hash-themes'),
        'linkedin' => esc_html__('LinkedIn', 'hash-themes'),
        'pinterest' => esc_html__('Pinterest', 'hash-themes')
    )
)));

/* ========== Sortable Control ========== */
$wp_customize->add_setting('hash_themes_sortable', array(
    'default' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
    'sanitize_callback' => 'hash_themes_sanitize_multi_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Sortable_Control($wp_customize, 'hash_themes_sortable', array(
    'label' => esc_html__('Sortable', 'hash-themes'),
    'description' => esc_html__('Drag to reorder and click on the eye icon to enable/disable', 'hash-themes'),
    'section' => 'hash_themes_general_section',
    'choices' => array(
        'facebook' => esc_html__('Facebook', 'hash-themes'),
        'twitter' => esc_html__('Twitter', 'hash-themes'),
        'linkedin' => esc_html__('LinkedIn', 'hash-themes'),
        'pinterest' => esc_html__('Pinterest', 'hash-themes')
    )
)));

/* ========== Column Control ========== */
$wp_customize->add_setting('hash_themes_column', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => '',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Column_Control($wp_customize, 'hash_themes_column', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Columns', 'hash-themes'),
    'description' => esc_html__('Add/Remove footer columns. Drag to resize the column width.', 'hash-themes')
)));

/* ========== Gradient Control ========== */
$wp_customize->add_setting('hash_themes_graident', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Gradient_Control($wp_customize, 'hash_themes_graident', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Gradient', 'hash-themes'),
)));

/* ========== Alpha Color Control ========== */
$wp_customize->add_setting('hash_themes_alpha_color', array(
    'default' => 'rgba(0,0,0,0.1)',
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Alpha_Color_Control($wp_customize, 'hash_themes_alpha_color', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Alpha Color', 'hash-themes'),
)));

/* ========== Typography Control ========== */
$wp_customize->add_setting('hash_themes_heading_family', array(
    'default' => 'Default',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_size', array(
    'default' => '22',
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_heading_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Typography_Control($wp_customize, 'hash_themes_heading', array(
    'label' => esc_html__('Typography', 'hash-themes'),
    'section' => 'hash_themes_general_section',
    'settings' => array(
        'family' => 'hash_themes_heading_family',
        'style' => 'hash_themes_heading_style',
        'text_decoration' => 'hash_themes_heading_text_decoration',
        'text_transform' => 'hash_themes_heading_text_transform',
        'size' => 'hash_themes_heading_size',
        'line_height' => 'hash_themes_heading_line_height',
        'letter_spacing' => 'hash_themes_heading_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 100,
        'step' => 1
    )
)));

/* ========== Dimension Control ========== */
$wp_customize->add_setting('hash_themes_dimension_right_desktop', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 100,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_top_desktop', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 100,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_bottom_desktop', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 100,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_left_desktop', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'default' => 100,
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_right_tablet', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_top_tablet', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_bottom_tablet', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_left_tablet', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_right_mobile', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_top_mobile', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_bottom_mobile', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_dimension_left_mobile', array(
    'sanitize_callback' => 'hash_themes_sanitize_number_blank',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Dimensions_Control($wp_customize, 'hash_themes_dimension', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Dimension(px)', 'hash-themes'),
    'settings' => array(
        'desktop_left' => 'hash_themes_dimension_left_desktop',
        'desktop_top' => 'hash_themes_dimension_top_desktop',
        'desktop_bottom' => 'hash_themes_dimension_bottom_desktop',
        'desktop_right' => 'hash_themes_dimension_right_desktop',
        'tablet_left' => 'hash_themes_dimension_left_tablet',
        'tablet_top' => 'hash_themes_dimension_top_tablet',
        'tablet_bottom' => 'hash_themes_dimension_bottom_tablet',
        'tablet_right' => 'hash_themes_dimension_right_tablet',
        'mobile_left' => 'hash_themes_dimension_left_mobile',
        'mobile_top' => 'hash_themes_dimension_top_mobile',
        'mobile_bottom' => 'hash_themes_dimension_bottom_mobile',
        'mobile_right' => 'hash_themes_dimension_right_mobile'
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 400,
        'step' => 1,
    ),
)));

/* ========== Text Editor Control ========== */
$wp_customize->add_setting('hash_themes_editor', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu ex blandit enim imperdiet luctus id in eros.', 'hash-themes'),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Editor_Control($wp_customize, 'hash_themes_editor', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Editor', 'hash-themes'),
    'include_admin_print_footer' => true //Use this only once to add footer script required for editor
)));

/* ========== Background Control ========== */
$wp_customize->add_setting('hash_themes_background_url', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_id', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_attachment', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_background_color', array(
    'default' => 'rgba(255,255,255,1)',
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Background_Image_Control($wp_customize, 'hash_themes_background', array(
    'label' => esc_html__('Background Image', 'hash-themes'),
    'section' => 'hash_themes_general_section',
    'settings' => array(
        'image_url' => 'hash_themes_background_url',
        'image_id' => 'hash_themes_background_id',
        'repeat' => 'hash_themes_background_repeat',
        'size' => 'hash_themes_background_size',
        'position' => 'hash_themes_background_position',
        'attachment' => 'hash_themes_background_attachment',
        'color' => 'hash_themes_background_color'
    )
)));

/* ========== Chosen Select Control ========== */
$wp_customize->add_setting('hash_themes_chosen', array(
    'sanitize_callback' => 'hash_themes_sanitize_choices',
    'default' => rand(60, 100),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Chosen_Select_Control($wp_customize, 'hash_themes_chosen', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Chosen', 'hash-themes'),
    'choices' => array(
        'facebook' => esc_html__('Facebook', 'hash-themes'),
        'twitter' => esc_html__('Twitter', 'hash-themes'),
        'linkedin' => esc_html__('LinkedIn', 'hash-themes'),
        'pinterest' => esc_html__('Pinterest', 'hash-themes')
    )
)));


/* ========== Text Selector ========== */
$wp_customize->add_setting('hash_themes_button_selector', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => 'image',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Text_Selector_Control($wp_customize, 'hash_themes_button_selector', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Select Button', 'hash-themes'),
    'choices' => array(
        'image' => array(
            'label' => esc_html__('Image', 'hash-themes'),
            'icon' => 'dashicons dashicons-format-image'
        ),
        'video' => array(
            'label' => esc_html__('Video', 'hash-themes'),
            'icon' => 'dashicons dashicons-video-alt2'
        ),
        'color' => array(
            'label' => esc_html__('Graident', 'hash-themes'),
            'icon' => 'dashicons dashicons-color-picker'
        )
    ),
)));

/* ========== Color Tab Control ========== */
$wp_customize->add_setting('hash_themes_bg_color', array(
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_text_color', array(
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_bg_color_hover', array(
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('hash_themes_text_color_hover', array(
    'sanitize_callback' => 'hash_themes_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Color_Tab_Control($wp_customize, 'hash_themes_color_group', array(
    'label' => esc_html__('Color Tab', 'hash-themes'),
    'section' => 'hash_themes_general_section',
    'show_opacity' => false,
    'settings' => array(
        'normal_hash_themes_bg_color' => 'hash_themes_bg_color',
        'normal_hash_themes_text_color' => 'hash_themes_text_color',
        'hover_hash_themes_bg_color_hover' => 'hash_themes_bg_color_hover',
        'hover_hash_themes_text_color_hover' => 'hash_themes_text_color_hover',
    ),
    'group' => array(
        'normal_hash_themes_bg_color' => esc_html__('Background Color', 'hash-themes'),
        'normal_hash_themes_text_color' => esc_html__('Text Color', 'hash-themes'),
        'hover_hash_themes_bg_color_hover' => esc_html__('Background Color', 'hash-themes'),
        'hover_hash_themes_text_color_hover' => esc_html__('Text Color', 'hash-themes')
    )
)));

/* ========== Date Control ========== */
$wp_customize->add_setting('hash_themes_date', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Date_Control($wp_customize, 'hash_themes_date', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Date', 'hash-themes')
)));

/* ========== Icon Selector Control ========== */
$wp_customize->add_setting('hash_themes_icon', array(
    'default' => 'far fa-bell',
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'transport' => 'postMessage'
));

$icon_obj = new Hash_Themes_Icon_Manager();

$wp_customize->add_control(new Hash_Themes_Icon_Selector_Control($wp_customize, 'hash_themes_icon', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Select Icon', 'hash-themes'),
    'icon_array' => array(
        'hash-themes-icofont-icon' => array(
            'name' => 'hash-themes-icofont-icon',
            'label' => esc_html__('Icofont', 'hash-themes'),
            'prefix' => 'icofont-',
            'displayPrefix' => '',
            'url' => '',
            'icons' => $icon_obj->icofont_icon_array(),
        ),
        'hash-themes-essential-icon' => array(
            'name' => 'hash-themes-essential-icon',
            'label' => esc_html__('Essential Icons', 'hash-themes'),
            'prefix' => 'essentialicon-',
            'displayPrefix' => '',
            'url' => '',
            'icons' => $icon_obj->essential_icon_array(),
        )
    )
)));

/* ========== Image Select Control ========== */
$wp_customize->add_setting('hash_themes_image_select', array(
    'sanitize_callback' => 'hash_themes_sanitize_text',
    'default' => 'image',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Image_Selector_Control($wp_customize, 'hash_themes_image_select', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Image Select', 'hash-themes'),
    'image_path' => HASH_THEMES_CUSTOMIZER_URL,
    'image_type' => 'jpg',
    'choices' => array(
        'image' => esc_html__('Layout 1', 'hash-themes'),
        'image1' => esc_html__('Layout 2', 'hash-themes'),
        'image2' => esc_html__('Layout 3', 'hash-themes'),
        'image3' => esc_html__('Layout 4', 'hash-themes')
    )
)));

/* ========== Selectize Control ========== */
$wp_customize->add_setting('hash_themes_selectize', array(
    'sanitize_callback' => 'hash_themes_sanitize_choices_array',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Multiple_Selectize_Control($wp_customize, 'hash_themes_selectize', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Selectize', 'hash-themes'),
    'description' => esc_html__('Drag & Drop to reorder', 'hash-themes'),
    'placeholder' => esc_html__('Select Some Options', 'hash-themes'),
    'choices' => array(
        'facebook' => esc_html__('Facebook', 'hash-themes'),
        'twitter' => esc_html__('Twitter', 'hash-themes'),
        'linkedin' => esc_html__('LinkedIn', 'hash-themes'),
        'pinterest' => esc_html__('Pinterest', 'hash-themes')
    ),
)));

/* ========== Multiple Select Control ========== */
$wp_customize->add_setting('hash_themes_multiple_select', array(
    'sanitize_callback' => 'hash_themes_sanitize_choices_array',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Multiple_Select_Control($wp_customize, 'hash_themes_multiple_select', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Multiple Select', 'hash-themes'),
    'placeholder' => esc_html__('Select Some Options', 'hash-themes'),
    'choices' => array(
        'facebook' => esc_html__('Facebook', 'hash-themes'),
        'twitter' => esc_html__('Twitter', 'hash-themes'),
        'linkedin' => esc_html__('LinkedIn', 'hash-themes'),
        'pinterest' => esc_html__('Pinterest', 'hash-themes')
    ),
)));

/* ========== Preloader Control ========== */
$wp_customize->add_setting('hash_themes_preloader', array(
    'default' => 'preloader1',
    'sanitize_callback' => 'hash_themes_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Preloader_Selector_Control($wp_customize, 'hash_themes_preloader', array(
    'section' => 'hash_themes_general_section',
    'file_path' => HASH_THEMES_CUSTOMIZER_PATH . 'preloader',
    'label' => esc_html__('Preloader', 'hash-themes'),
    'choices' => array(
        'preloader1' => esc_html__('Preloader 1', 'hash-themes'),
        'preloader2' => esc_html__('Preloader 2', 'hash-themes'),
        'preloader3' => esc_html__('Preloader 3', 'hash-themes')
    )
)));

/* ========== Tab Control ========== */
$wp_customize->add_setting('hash_themes_tab', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Hash_Themes_Tab_Control($wp_customize, 'hash_themes_tab', array(
    'section' => 'hash_themes_general_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'hash-themes'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'hash_themes_gdpr_position', //Settings ID
                'hash_themes_gdpr_notice', //Settings ID
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'hash-themes'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'hash_themes_gdpr_bg', //Settings ID
                'hash_themes_gdpr_text_color', //Settings ID
            )
        )
    ),
)));

/* ========== Gallery Control ========== */
$wp_customize->add_setting('hash_themes_gallery', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Hash_Themes_Gallery_Control($wp_customize, 'hash_themes_gallery', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('Gallery', 'hash-themes')
)));

/* ========== Repeater Control ========== */
$wp_customize->add_setting('hash_themes_featured', array(
    'sanitize_callback' => 'hash_themes_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-dart',
            'title' => '',
            'content' => '',
            'link_text' => esc_html__('Read More', 'hash-themes'),
            'link' => '',
            'enable' => 'yes'
        )
    )),
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Hash_Themes_Repeater_Control($wp_customize, 'hash_themes_featured', array(
    'section' => 'hash_themes_general_section',
    'box_label' => esc_html__('Featured Block', 'hash-themes'),
    'add_label' => esc_html__('Add New', 'hash-themes'),
        ), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'hash-themes'),
        'description' => '<a target="_blank" href="' . admin_url('admin.php?page=totalplus-options') . '">' . esc_html__('Add/Remove Icon Sets', 'hash-themes') . '</a>',
        'default' => 'icofont-dart'
    ),
    'title' => array(
        'type' => 'text',
        'label' => esc_html__('Title', 'hash-themes'),
        'default' => ''
    ),
    'content' => array(
        'type' => 'textarea',
        'label' => esc_html__('Content', 'hash-themes'),
        'default' => ''
    ),
    'image' => array(
        'type' => 'upload',
        'label' => esc_html__('Image', 'hash-themes'),
    ),
    'enable' => array(
        'type' => 'toggle',
        'label' => esc_html__('Enable Section', 'hash-themes'),
        'default' => 'yes'
    )
)));

/* ========== Upgrade Info Control ========== */
$wp_customize->add_setting('hash_themes_upgrade_info', array(
    'sanitize_callback' => 'hash_themes_sanitize_text'
));

$wp_customize->add_control(new Hash_Themes_Upgrade_Info_Control($wp_customize, 'hash_themes_upgrade_info', array(
    'section' => 'hash_themes_general_section',
    'label' => esc_html__('For more settings,', 'hash-themes'),
    'choices' => array(
        esc_html__('Choose from multiple go to top icons', 'hash-themes'),
        esc_html__('Change the position & size of the button', 'hash-themes'),
        esc_html__('Configure multiple styled button', 'hash-themes'),
        esc_html__('Change Colors', 'hash-themes')
    ),
)));

/* ========== Upgrade Section ========== */
$wp_customize->add_section(new Hash_Themes_Upgrade_Section($wp_customize, 'hash-themes-upgrade-section', array(
    'title' => esc_html__('More Sections on Premium', 'hash-themes'),
    'options' => array(
        esc_html__('- Highlight Section', 'hash-themes'),
        esc_html__('- Pricing Section', 'hash-themes'),
        esc_html__('- News and Update Section', 'hash-themes'),
        esc_html__('- Tab Section', 'hash-themes'),
        esc_html__('- Contact Section with Google Map', 'hash-themes'),
        esc_html__('- Custom Elementor Section', 'hash-themes'),
        esc_html__('------------------------', 'hash-themes'),
        esc_html__('- Elementor Pagebuilder Compatible. All the above sections can be created with Elementor Page Builder or Customizer whichever you like.', 'hash-themes'),
    )
)));

$wp_customize->add_section(new Hash_Themes_Upgrade_Section($wp_customize, 'hash-themes-pro-section', array(
    'title' => esc_html__('Upgrade to Pro', 'hash-themes'),
    'pro_text' => esc_html__('Upgrade to Pro', 'total'),
    'pro_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hash-themes-customizer-button&utm_campaign=hash-themes-upgrade'
)));
