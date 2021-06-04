<?php

class Hash_Themes_Column_Control extends WP_Customize_Control {

    public $type = 'hash-themes-column';

    public function __construct($manager, $id, $args = array()) {
        parent::__construct($manager, $id, $args);
    }

    public function enqueue() {
        wp_enqueue_script('nouislider', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/column-control/assets/nouislider.js', array('jquery'), HASH_THEMES_VER, true);
        wp_enqueue_script('wNumb', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/column-control/assets/wNumb.js', array('jquery'), HASH_THEMES_VER, true);
        wp_enqueue_script('hash-themes-column-control', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/column-control/assets/column-control.js', array('jquery'), HASH_THEMES_VER, true);

        wp_enqueue_style('nouislider', HASH_THEMES_CUSTOMIZER_URL . 'custom-controls/column-control/assets/nouislider.css', array(), HASH_THEMES_VER);
    }

    public function render_content() {

        if (!empty($this->label)) :
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php
        endif;

        if (!empty($this->description)) :
            ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php
        endif;

        echo '<div class="hash-themes-column-selector"></div>';

        echo '<div class="hash-themes-column-selector-buttons">';
        echo '<button class="hash-themes-remove-col"><i class="mdi mdi-minus"></i><span>' . esc_html('Remove Column', 'text-domain') . '</span></button>';
        echo '<button class="hash-themes-add-col"><i class="mdi mdi-plus"></i><span>' . esc_html('Add Column', 'text-domain') . '</span></button>';
        echo '<button class="hash-themes-reset-col"><i class="mdi mdi-cached"></i><span>' . esc_html('Reset Column', 'text-domain') . '</span></button>';
        echo '</div>';
        ?>
        <input type="hidden" value="<?php echo esc_attr($this->value()) ?>" <?php $this->link(); ?> />
        </div>
        <?php
    }

}
