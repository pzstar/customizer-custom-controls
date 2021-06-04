<?php

/** Image Select Control */
class Hash_Themes_Preloader_Selector_Control extends WP_Customize_Control {

    public $type = 'select';

    public function __construct($manager, $id, $args = array(), $choices = array()) {
        $this->choices = $args['choices'];
        parent::__construct($manager, $id, $args);
    }

    public function render_content() {
        if (!empty($this->choices)) {
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

                <select class="ht-preloader-selector" <?php $this->link(); ?>>
                    <?php
                    foreach ($this->choices as $key => $choice) {
                        printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($key), selected($this->value(), $key, false), esc_html($choice));
                    }
                    ?>
                </select>

                <div class="ht-preloader-container">
                    <?php
                    for ($i = 1; $i <= 15; $i++) {
                        $style = ($this->value() != 'preloader' . $i) ? 'style="display:none"' : '';
                        echo '<div class="ht-preloader ht-preloader' . $i . '"' . $style . '>';
                        require_once get_template_directory() . '/inc/preloader/preloader' . $i . '.php';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            </label>
            <?php
        }
    }

}
