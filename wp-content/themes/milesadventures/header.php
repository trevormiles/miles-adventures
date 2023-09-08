<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&family=Space+Mono&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<?php
    $pageBackgroundColor = carbon_get_the_post_meta( 'crb_page_background_color' );
?>

<body<?= isset($pageBackgroundColor) ? ' class="' . $pageBackgroundColor . '"' : ''; ?>>
    <header class="header-nav<?= is_page_template('page_home.php') ? ' header-nav--light' : '' ?>" data-comp-header-nav>
        <div class="header-nav__container">
            <a href="/" class="header-nav__logo">
                <div class="header-nav__logo-title">Miles Out There</div>
                <div class="header-nav__logo-tagline">Natalie &amp; Trevor</div>
            </a>
            <nav class="header-nav__nav">
                <a href="/about" class="header-nav__link">About</a>
                <a href="/current" class="header-nav__link">Current</a>
                <a href="/past" class="header-nav__link">Past</a>
                <a href="/upcoming" class="header-nav__link">Upcoming</a>
            </nav>
            <button class="header-nav__trigger" data-trigger>
                <span></span>
            </button>
        </div>
    </header>
    <main>