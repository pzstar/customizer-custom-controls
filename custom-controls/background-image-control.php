<?php

/** Background Control */
class Hash_Themes_Background_Image_Control extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'background-image';

    /**
     * Labels for upload control buttons.
     *
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $button_labels = array();

    /**
     * Field labels
     *
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $field_labels = array();

    /**
     * Background choices for the select fields.
     *
     * @since  1.0.0
     * @access public
     * @var    array
     */
    public $background_choices = array();

    public function __construct($manager, $id, $args = array()) {

        // Calls the parent __construct
        parent::__construct($manager, $id, $args);

        // Set button labels for image uploader
        $button_labels = $this->get_button_labels();
        $this->button_labels = apply_filters('hash_themes_customizer_background_button_labels', $button_labels, $id);

        // Set field labels
        $field_labels = $this->get_field_labels();
        $this->field_labels = apply_filters('hash_themes_customizer_background_field_labels', $field_labels, $id);

        // Set background choices
        $background_choices = $this->get_background_choices();
        $this->background_choices = apply_filters('hash_themes_customizer_background_choices', $background_choices, $id);
    }

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function to_json() {

        parent::to_json();

        $background_choices = $this->background_choices;
        $field_labels = $this->field_labels;
        $this->json['button_label'] = $this->button_labels;

        // Loop through each of the settings and set up the data for it.
        foreach ($this->settings as $setting_key => $setting_id) {

            $this->json[$setting_key] = array(
                'link' => $this->get_link($setting_key),
                'value' => $this->value($setting_key),
                'label' => isset($field_labels[$setting_key]) ? $field_labels[$setting_key] : '',
            );

            if ('image_url' === $setting_key) {
                /*
                $this->json['attachment'] = wp_prepare_attachment_for_js($attachment_id);
                
                if ($this->value($setting_key)) {
                    // Get the attachment model for the existing file.
                    $attachment_id = attachment_url_to_postid($this->value($setting_key));
                    if ($attachment_id) {
                        $this->json['attachment'] = wp_prepare_attachment_for_js($attachment_id);
                    }
                }
                */
            } elseif ('repeat' === $setting_key) {
                $this->json[$setting_key]['choices'] = $background_choices['repeat'];
            } elseif ('size' === $setting_key) {
                $this->json[$setting_key]['choices'] = $background_choices['size'];
            } elseif ('position' === $setting_key) {
                $this->json[$setting_key]['choices'] = $background_choices['position'];
            } elseif ('attachment' === $setting_key) {
                $this->json[$setting_key]['choices'] = $background_choices['attachment'];
            }
        }
    }

    /**
     * Render a JS template for the content of the media control.
     *
     * @since 1.0.0
     */
    public function content_template() {
        ?>
        <# if ( data.label ) { #>
        <span class="customize-control-title">{{{ data.label }}}</span>
        <# } #>

        <div class="hash-themes-placeholder <# if ( data.image_url.value ) { #>hidden<# } #>">
            {{{ data.button_label.select }}}
        </div>

        <div class="hash-themes-thumbnail">
            <# if ( data.image_url.value ) { #>
            <img src='{{ data.image_url.value }}'>
            <# } #>
        </div>

        <div class="hash-themes-actions hash-themes-clearfix">
            <button type="button" class="button hash-themes-upload-button align-left">{{{ data.button_label.select }}}</button>
            <button type="button" class="button hash-themes-remove-button alignright">{{{ data.button_label.remove }}}</button>
        </div>

        <input class="hash-themes-background-image-url" type="hidden" value="{{ data.image_url.value }}" {{{ data.image_url.link }}}>

               <input class="hash-themes-background-image-id" type="hidden" value="{{ data.image_id.value }}" {{{ data.image_id.link }}}>

               <div class="hash-themes-background-image-fields" <# if ( !data.image_url.value ) { #> style="display:none "<# } #>>
               <# if ( data.repeat && data.repeat.choices ) { #>
               <li class="background-image-repeat">
                <# if ( data.repeat.label ) { #>
                <span class="customize-control-title">{{ data.repeat.label }}</span>
                <# } #>
                <select {{{ data.repeat.link }}}>
                    <# _.each( data.repeat.choices, function( label, choice ) { #>
                    <option value="{{ choice }}" <# if ( choice === data.repeat.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.size && data.size.choices ) { #>
            <li class="background-image-size">
                <# if ( data.size.label ) { #>
                <span class="customize-control-title">{{ data.size.label }}</span>
                <# } #>
                <select {{{ data.size.link }}}>
                    <# _.each( data.size.choices, function( label, choice ) { #>
                    <option value="{{ choice }}" <# if ( choice === data.size.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.position && data.position.choices ) { #>
            <li class="background-image-position">
                <# if ( data.position.label ) { #>
                <span class="customize-control-title">{{ data.position.label }}</span>
                <# } #>
                <select {{{ data.position.link }}}>
                    <# _.each( data.position.choices, function( label, choice ) { #>
                    <option value="{{ choice }}" <# if ( choice === data.position.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.attachment && data.attachment.choices ) { #>
            <li class="background-image-attachment">
                <# if ( data.attachment.label ) { #>
                <span class="customize-control-title">{{ data.attachment.label }}</span>
                <# } #>
                <select {{{ data.attachment.link }}}>
                    <# _.each( data.attachment.choices, function( label, choice ) { #>
                    <option value="{{ choice }}" <# if ( choice === data.attachment.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                    <# } ) #>
                </select>
            </li>
            <# } #>

            <# if ( data.overlay ) { #>
            <li class="background-image-overlay">
                <# if ( data.overlay.label ) { #>
                <span class="customize-control-title">{{ data.overlay.label }}</span>
                <# } #>
                <input data-alpha-enabled="true" type="text" value="{{ data.overlay.value }}" {{{ data.overlay.link }}} />
            </li>
            <# } #>
        </div>

        <# if ( data.color ) { #>
        <div class="background-image-color">
            <# if ( data.color.label ) { #>
            <span class="customize-control-title">{{ data.color.label }}</span>
            <# } #>
            <input data-alpha-enabled="true" type="text" value="{{ data.color.value }}" {{{ data.color.link }}} /> 
        </div>
        <# } #>
        <?php
    }

    /**
     * Returns button labels.
     *
     * @since 1.0.0
     */
    public static function get_button_labels() {

        $button_labels = array(
            'select' => esc_html__('Select Image', 'hash-themes'),
            'remove' => esc_html__('Remove', 'hash-themes'),
        );

        return $button_labels;
    }

    /**
     * Returns field labels.
     *
     * @since 1.0.0
     */
    public static function get_field_labels() {

        $field_labels = array(
            'repeat' => esc_html__('Repeat', 'hash-themes'),
            'size' => esc_html__('Size', 'hash-themes'),
            'position' => esc_html__('Position', 'hash-themes'),
            'attachment' => esc_html__('Attachment', 'hash-themes'),
            'color' => esc_html__('Background Color', 'hash-themes'),
            'overlay' => esc_html__('Overlay Color', 'hash-themes')
        );

        return $field_labels;
    }

    /**
     * Returns the background choices.
     *
     * @since 1.0.0
     * @return array
     */
    public static function get_background_choices() {

        $choices = array(
            'repeat' => array(
                'no-repeat' => esc_html__('No Repeat', 'hash-themes'),
                'repeat' => esc_html__('Tile', 'hash-themes'),
                'repeat-x' => esc_html__('Tile Horizontally', 'hash-themes'),
                'repeat-y' => esc_html__('Tile Vertically', 'hash-themes')
            ),
            'size' => array(
                'auto' => esc_html__('Default', 'hash-themes'),
                'cover' => esc_html__('Cover', 'hash-themes'),
                'contain' => esc_html__('Contain', 'hash-themes')
            ),
            'position' => array(
                'left-top' => esc_html__('Left Top', 'hash-themes'),
                'left-center' => esc_html__('Left Center', 'hash-themes'),
                'left-bottom' => esc_html__('Left Bottom', 'hash-themes'),
                'right-top' => esc_html__('Right Top', 'hash-themes'),
                'right-center' => esc_html__('Right Center', 'hash-themes'),
                'right-bottom' => esc_html__('Right Bottom', 'hash-themes'),
                'center-top' => esc_html__('Center Top', 'hash-themes'),
                'center-center' => esc_html__('Center Center', 'hash-themes'),
                'center-bottom' => esc_html__('Center Bottom', 'hash-themes')
            ),
            'attachment' => array(
                'fixed' => esc_html__('Fixed', 'hash-themes'),
                'scroll' => esc_html__('Scroll', 'hash-themes')
            )
        );

        return $choices;
    }

}
