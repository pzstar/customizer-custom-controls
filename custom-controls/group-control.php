<?php

/** Control Tab */
class Hash_Themes_Group_Control extends WP_Customize_Control {

    public $type = 'hash-themes-group';
    public $params = '';

    public function __construct($manager, $id, $args = array()) {
        parent::__construct($manager, $id, $args);
        if (isset($args['params'])) {
            $this->params = $args['params'];
        }
    }

    public function to_json() {
        parent::to_json();
        $params = $this->params;

        $this->json['heading'] = $params['heading'];
        $this->json['icon'] = $params['icon'];
        $this->json['fields'] = $params['fields'];
        $this->json['open'] = $params['open'];
    }

    public function content_template() {
        ?>
        <div class="hash-themes-group-wrap">
            <div class="hash-themes-group-heading">
                <# if ( data.heading ) { #>
                <label>{{{ data.heading }}}</label>
                <# } #>
            </div>

            <div class="hash-themes-group-content"></div>
        </div>
        <?php
    }

}
