<?php

function formatAdventureDate(string $startDate, string $endDate) {
    $startDateFormatted = date_format(date_create($startDate), "F jS");
    $endDateFormatted = date_format(date_create($endDate), "F jS");
    $startYear = date_format(date_create($startDate), "Y");
    $endYear = date_format(date_create($endDate), "Y");
    $formattedYear = $startYear === $endYear ? $startYear : $startYear . "-" . $endYear;
    return $startDateFormatted . " - " . $endDateFormatted . ", " . $formattedYear;
}

function getPastAdventuresQuery() {
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
        'posts_per_page' => 6,
    ));
}

function getUpcomingAdventuresQuery() {
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
        'posts_per_page' => 6,
    ));
}

?>
