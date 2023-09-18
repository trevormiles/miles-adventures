<?php

function formatAdventureDate(string $startDate, string $endDate) {
    $startDateFormatted = date_format(date_create($startDate), "F jS");
    $endDateFormatted = date_format(date_create($endDate), "F jS");
    $startYear = date_format(date_create($startDate), "Y");
    $endYear = date_format(date_create($endDate), "Y");
    $formattedYear = $startYear === $endYear ? $startYear : $startYear . "-" . $endYear;
    return $startDateFormatted . " - " . $endDateFormatted . ", " . $formattedYear;
}

?>
