<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

$manifest = json_decode(file_get_contents(get_stylesheet_directory() . "/mix-manifest.json"), true);

add_action( 'wp_enqueue_scripts', function() use ( $manifest ) { enqueue_webpack_file( 'global.js', '/public/js/global.js', $manifest, 'js' ); } );
add_action( 'wp_enqueue_scripts',  function() use ( $manifest ) { enqueue_webpack_file( 'main.css', '/public/css/main.css', $manifest, 'css' ); } );

function enqueue_webpack_file(string $filename, string $path, array $manifest, string $extension) : void
{
    switch ($extension) {
        case 'css':
            $file = get_stylesheet_directory_uri() . ( "$manifest[$path]" );
            wp_register_style($filename, $file);
            wp_enqueue_style($filename);
        break;
        case 'js':
            $file = get_stylesheet_directory_uri() . ( "$manifest[$path]" );
            wp_register_script($filename, $file);
            wp_enqueue_script($filename);
            break;
        default:
            break;
    }
}
