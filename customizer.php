<?php

define('HASH_THEMES_CUSTOMIZER_URL', get_template_directory_uri() . '/inc/customizer/');
define('HASH_THEMES_CUSTOMIZER_PATH', get_template_directory() . '/inc/customizer/');

require HASH_THEMES_CUSTOMIZER_PATH . 'customizer-controls.php';
require HASH_THEMES_CUSTOMIZER_PATH . 'custom-controls/typography/typography.php';
require HASH_THEMES_CUSTOMIZER_PATH . 'customizer-control-sanitization.php';
require HASH_THEMES_CUSTOMIZER_PATH . 'customizer-functions.php';
require HASH_THEMES_CUSTOMIZER_PATH . 'customizer-fonts-icons.php';
