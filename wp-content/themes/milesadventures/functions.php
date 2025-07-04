<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/*-----------------------------------------*\
	Add custom fields via Carbon Fields
\*-----------------------------------------*/

add_action( 'carbon_fields_register_fields', 'crb_attach_custom_fields' );
function crb_attach_custom_fields() {
    $aboutFields = array(
        Field::make( 'text', 'crb_hero_heading', __( 'Hero Heading' ) ),
        Field::make( 'image', 'crb_hero_image', __( 'Hero Image' ) ),
        Field::make( 'text', 'crb_section_heading', __( 'Section Heading' ) )->set_width( 50 ),
        Field::make( 'rich_text', 'crb_section_description', __( 'Section Description' ) )->set_width( 50 ),
        Field::make( 'media_gallery', 'crb_about_gallery', __( 'Gallery' ) )
    );

    // Conditionally set required fields for the About page template
    if (is_page_template( 'page-about.php')) {
        $aboutFields[0]->set_required( true ); // Set Hero Heading as required
        $aboutFields[1]->set_required( true ); // Set Hero Image as required
        $aboutFields[2]->set_required( true ); // Set Section Heading as required
        $aboutFields[3]->set_required( true ); // Set Section Description as required
    }

    Container::make( 'post_meta', 'Page Content' )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page_about.php' )
        ->add_fields( $aboutFields );

    Container::make( 'post_meta', 'Page Content' )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page_past.php' )
        ->add_fields( array(
            Field::make( 'textarea', 'crb_past_description', __( 'Description' ) ),
        ));

    Container::make( 'post_meta', 'Page Content' )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'page_upcoming.php' )
        ->add_fields( array(
            Field::make( 'textarea', 'crb_upcoming_description', __( 'Description' ) ),
        ));

    Container::make( 'post_meta', 'Adventure Info' )
        ->where( 'post_type', '=', 'adventures' )
        ->add_fields( array(
            Field::make( 'date', 'crb_start_date', __( 'Start Date' ) )->set_required( true ),
            Field::make( 'date', 'crb_end_date', __( 'End Date' ) )->set_required( true ),
            Field::make( 'textarea', 'crb_description', __( 'Description' ) )->set_required( true ),
            Field::make( 'image', 'crb_featured_image', __( 'Featured Image' ) ),
            Field::make( 'text', 'crb_section_title', __( 'Section Title' ) )->set_width( 50 ),
            Field::make( 'rich_text', 'crb_section_content', __( 'Section Content' ) )->set_width( 50 ),
            Field::make( 'complex', 'crb_gallery_sections', __( 'Gallery Sections' ) )
                ->add_fields( array(
                    Field::make( 'text', 'crb_gallery_section_title', __( 'Section Title' ) ),
                    Field::make( 'textarea', 'crb_gallery_section_description', __( 'Section Description' ) ),
                    Field::make( 'media_gallery', 'crb_gallery_section', __( 'Gallery' ) )
                ) )->setup_labels( array( 'plural_name' => 'Gallery Sections', 'singular_name' => 'Gallery Section' ) )
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

    Container::make( 'theme_options', 'Theme Options' )
        ->add_fields( array(
            Field::make( 'image', 'crb_global_fallback_image')
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

function enqueue_main_stylesheet() {
    wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'enqueue_main_stylesheet' );

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
            wp_register_script($filename, $file, null, null, true);
            wp_enqueue_script($filename);
            break;
        default:
            break;
    }
}

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

require_once('custom-post-types/post-types.php');

/*------------------------------------*\
	Include utility functions
\*------------------------------------*/

include(get_template_directory() . '/utility_functions.php');
