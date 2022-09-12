<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/*-----------------------------------------*\
	Add custom fields via Carbon Fields
\*-----------------------------------------*/

add_action( 'carbon_fields_register_fields', 'crb_attach_custom_fields' );
function crb_attach_custom_fields() {
    Container::make( 'post_meta', 'About' )
        ->where( 'post_template', '=', 'page_about.php' )
        ->add_fields( array(
            Field::make( 'text', 'crb_hero_title', __( 'Hero Title' ) )->set_required( true ),
            Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) ),
            Field::make( 'text', 'crb_section_title', __( 'Section Title' ) )->set_required( true ),
            Field::make( 'rich_text', 'crb_column_1_content', __( 'Section Column 1 Content' ) )->set_width( 50 )->set_required( true ),
            Field::make( 'rich_text', 'crb_column_2_content', __( 'Section Column 2 Content' ) )->set_width( 50 )->set_help_text( 'Leave empty if only one column is desired' ),
            Field::make( 'complex', 'crb_gallery', __( 'Gallery' ) )
                ->add_fields( array(
                    Field::make( 'image', 'crb_gallery_image', __( 'Image' ) ),
                ) )->setup_labels( array( 'plural_name' => 'Gallery Images', 'singular_name' => 'Gallery Image' ) )
        ));

    Container::make( 'post_meta', 'Page Settings' )
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'select', 'crb_page_background_color', __( 'Page Background Color' ) )
                ->set_options( array(
                    'bg-neutral-000' => 'Neutral 000',
                    'bg-neutral-200' => 'Neutral 200',
                    'bg-neutral-400' => 'Neutral 400',
                    'bg-neutral-800' => 'Neutral 800',
                    'bg-neutral-blue' => 'Neutral Blue',
                ) )->set_default_value( 'bg-neutral-400' )
        ));
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}


/*-------------------------------------------------*\
	Hide page editor everywhere except for posts
\*-------------------------------------------------*/

add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
    $post_type = get_post_type();
    if ( !isset( $post_type ) ) return;
    if ($post_type !== 'post'){
        remove_post_type_support('page', 'editor');
    }
}


/*-------------------------------------------------*\
	Enqueue frontend assets
\*-------------------------------------------------*/

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
