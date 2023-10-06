<?php

function formatAdventureDate(string $startDate, string $endDate) {
    $startDateFormatted = date_format(date_create($startDate), "F jS");
    $endDateFormatted = date_format(date_create($endDate), "F jS");
    $startYear = date_format(date_create($startDate), "Y");
    $endYear = date_format(date_create($endDate), "Y");
    $formattedYear = $startYear === $endYear ? $startYear : $startYear . "-" . $endYear;
    return $startDateFormatted . " - " . $endDateFormatted . ", " . $formattedYear;
}

function getPastAdventuresQuery(int $quantity = 3) {
    return new WP_Query(array(
        'post_type' => 'adventures',
        'orderby' => 'text_field',
        'order' => 'desc',
        'meta_query' => array(
            'text_field' => array(
                'key' => 'crb_start_date',
                'compare' => 'EXISTS',
            ),
            array(
                'key' => 'crb_end_date',
                'compare' => '<',
                'value' => date("Y-m-d"),
            ),
        ),
        'post_status' => 'publish',
        'posts_per_page' => $quantity,
    ));
}

function getUpcomingAdventuresQuery(int $quantity = 6) {
    return new WP_Query(array(
        'post_type' => 'adventures',
        'orderby' => 'text_field',
        'order' => 'asc',
        'meta_query' => array(
            'text_field' => array(
                'key' => 'crb_start_date',
                'compare' => 'EXISTS',
            ),
            array(
                'key' => 'crb_start_date',
                'compare' => '>',
                'value' => date("Y-m-d"),
            ),
        ),
        'post_status' => 'publish',
        'posts_per_page' => $quantity,
    ));
}

function getCurrentAdventureQuery() {
    return new WP_Query(array(
        'post_type' => 'adventures',
        'meta_query' => array(
            array(
                'key' => 'crb_start_date',
                'compare' => '<',
                'value' => date("Y-m-d"),
            ),
            array(
                'key' => 'crb_end_date',
                'compare' => '>',
                'value' => date("Y-m-d"),
            ),
        ),
        'post_status' => 'publish',
        'posts_per_page' => 1,
    ));
}

function getLatestAdventureQuery() {
    return new WP_Query(array(
        'post_type' => 'adventures',
        'orderby' => 'text_field',
        'order' => 'desc',
        'meta_query' => array(
            'text_field' => array(
                'key' => 'crb_end_date',
                'compare' => 'EXISTS',
            ),
            array(
                'key' => 'crb_end_date',
                'compare' => '<',
                'value' => date("Y-m-d"),
            ),
        ),
        'post_status' => 'publish',
        'posts_per_page' => 1,
    ));
}

function getFeaturedAdventure() {
    $currentAdventure = getCurrentAdventureQuery();
    $latestAdventure = getLatestAdventureQuery();
    $featuredAdventure = $latestAdventure;
    $featuredAdventureType = "latest";
    if ($currentAdventure->have_posts()) {
        $featuredAdventure = $currentAdventure;
        $featuredAdventureType = "current";
    }
    return [$featuredAdventure, $featuredAdventureType];
}

function fallbackImageOnNull($image_id)
{
    if (!$image_id) {
        return carbon_get_theme_option('crb_global_fallback_image');
    }

    return $image_id;
}

?>
