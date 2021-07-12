<?php

/** Icon Chooser */
class Hash_Themes_Icon_Selector_Control extends WP_Customize_Control {

    public $type = 'hash-themes-icon-selector';
    public $icon_array = array();

    public function __construct($manager, $id, $args = array()) {
        if (isset($args['icon_array'])) {
            $this->icon_array = $args['icon_array'];
        }
        parent::__construct($manager, $id, $args);
    }

    public function render_content() {
        ?>
        <label>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>

            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <div class="hash-themes-icon-box-wrap">
                <div class="hash-themes-selected-icon">
                    <i class="<?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="icofont-simple-down"></i></span>
                </div>

                <div class="hash-themes-icon-box">
                    <div class="hash-themes-icon-search">
                        <input type="text" class="hash-themes-icon-search-input" placeholder="<?php echo esc_attr__('Type to filter', 'text-domain'); ?>" />
                    </div>

                    <ul class="hash-themes-icon-list hash-themes-clearfix active">
                        <?php
                        if (isset($this->icon_array) && !empty($this->icon_array)) {
                            $icon_array = $this->icon_array;
                        } else {
                            $icon_array = hash_themes_materialdesignicons_array();
                        }

                        foreach ($icon_array as $icon) {
                            $icon_class = $this->value() == $icon ? 'icon-active' : '';
                            echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($icon) . '"></i></li>';
                        }
                        ?>
                    </ul>
                </div>
                <input type="hidden" value="<?php esc_attr($this->value()); ?>" <?php $this->link(); ?> />
            </div>
        </label>
        <?php
    }

}
