<?php

function miles_adventures_scripts() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/public/css/main.css' );
    wp_enqueue_script( 'global', get_template_directory_uri() . '/public/js/global.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'miles_adventures_scripts' );