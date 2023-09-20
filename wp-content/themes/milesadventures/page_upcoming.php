<?php
/*
  Template Name: Upcoming
 */
?>

<?php
    $upcomingAdventures = getUpcomingAdventuresQuery();
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading">Upcoming adventures</h1>
        <p class="section-page-header__description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
    <?php if ($upcomingAdventures->have_posts()) : ?>
        <div class="items-basic-grid">
            <?php while ($upcomingAdventures->have_posts()) : ?>
                <?php
                    $upcomingAdventures->the_post();
                    $description = carbon_get_the_post_meta('crb_description');
                ?>
                <div class="item-preview-basic">
                    <p class="item-preview-basic__date">
                        <?= formatAdventureDate(
                            carbon_get_the_post_meta('crb_start_date'),
                            carbon_get_the_post_meta('crb_end_date')
                        ); ?>
                    </p>
                    <h3 class="item-preview-basic__title"><? the_title(); ?></h3>
                    <p class="item-preview-basic__description"><?= $description; ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <h2>No upcoming adventures</h2>
    <?php endif; ?>
</div>

<?php get_footer(); ?>