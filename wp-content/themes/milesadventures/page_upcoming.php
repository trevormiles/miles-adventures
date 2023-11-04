<?php
/*
  Template Name: Upcoming
 */
?>

<?php
    $upcomingAdventures = getUpcomingAdventuresQuery(-1);
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
            <?php $index = 0; ?>
            <?php while ($upcomingAdventures->have_posts()) : ?>
                <?php
                    $upcomingAdventures->the_post();
                    $description = carbon_get_the_post_meta('crb_description');
                ?>
                <div class="item-preview-basic" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 300 ?>">
                    <p class="item-preview-basic__date">
                        <?= formatAdventureDate(
                            carbon_get_the_post_meta('crb_start_date'),
                            carbon_get_the_post_meta('crb_end_date')
                        ); ?>
                    </p>
                    <h3 class="item-preview-basic__title"><? the_title(); ?></h3>
                    <p class="item-preview-basic__description"><?= $description; ?></p>
                </div>
                <?php $index++; ?>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <section class="section-no-posts">
            <h2 class="section-no-posts__heading">There are currently no upcoming adventures</h2>
            <p class="section-no-posts__description">Check back in soon, we’ve always got something in the works!</p>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>