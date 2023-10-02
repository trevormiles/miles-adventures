<?php

add_action('init', 'create_adventures');

function create_adventures()
{
    register_post_type('adventures',
        array(
            'labels' => array(
                'name' => __('Adventures', 'adventures'),
                'singular_name' => __('Adventure'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add New Adventure'),
                'edit' => __('Edit'),
                'edit_item' => __('Edit Adventure'),
                'new_item' => __('New Adventure'),
                'view' => __('View Adventure'),
                'view_item' => __('View Adventure'),
                'search_items' => __('Search Adventures'),
                'not_found' => __('No Adventures found'),
                'not_found_in_trash' => __('No Adventures found in Trash')
            ),
            'menu_icon' => 'dashicons-location-alt',
            'public' => true,
            'supports' => array('title', 'thumbnail'),
            'has_archive' => false,
            'rewrite' => [
                'with_front' => FALSE
            ]
        ));
}
