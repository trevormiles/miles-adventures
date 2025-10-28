<?php
/*
  Template Name: Home
 */
?>

<?php
    $pastAdventures = getPastAdventuresQuery();
    $upcomingAdventures = getUpcomingAdventuresQuery();
    $featuredAdventureArray = getFeaturedAdventure();
    $featuredAdventure = $featuredAdventureArray[0];
    $featuredAdventureType = $featuredAdventureArray[1];
?>

<?php get_header(); ?>

<?php if ($featuredAdventure->have_posts()) : ?>
    <?php while ($featuredAdventure->have_posts()) : ?>
        <?php
            $featuredAdventure->the_post();
            $description = carbon_get_the_post_meta('crb_description');
            $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
            $currentDate = date('Y-m-d');
            $endDate = carbon_get_the_post_meta('crb_end_date');
        ?>
        <section class="home-hero">
            <div class="home-hero__image-container">
                <?=
                    wp_get_attachment_image(
                        $featuredImageId,
                        'full',
                        false,
                        array('class' => 'home-hero__image')
                    );
                ?>
            </div>
            <div class="home-hero__content">
                <div class="content-container content-container--2">
                    <div class="home-hero__overline"><?= ucfirst($featuredAdventureType); ?> Adventure</div>
                    <h1><?php the_title(); ?></h1>
                    <p class="home-hero__description"><?= $description; ?></p>
                    <?php if ($currentDate > $endDate): ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn--solid-hover home-hero__cta-button">See More</a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php if ($pastAdventures->have_posts()) : ?>
    <section class="section-latest">
        <div class="content-container content-container--2">
            <div class="heading-button-flex">
                <h2 class="heading-button-flex__heading" data-aos="fade-up">Latest adventures</h2>
                <a href="/past" class="btn btn--reversed" data-aos="fade-up" data-aos-delay="200">See all</a>
            </div>
            <div class="items-primary-grid">
                <?php $index = 0; ?>
                <?php while ($pastAdventures->have_posts()) : ?>
                    <?php
                        $pastAdventures->the_post();
                        $description = carbon_get_the_post_meta('crb_description');
                        $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
                    ?>
                    <div class="item-preview-primary" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 100 ?>">
                        <a href="<?php the_permalink(); ?>" class="item-preview-primary__image-container">
                            <?=
                                wp_get_attachment_image(
                                    $featuredImageId,
                                    'large',
                                    false,
                                    array('class' => 'item-preview-primary__image')
                                );
                            ?>
                        </a>
                        <h3><?php the_title(); ?></h3>
                        <p><?= $description; ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn">See more</a>
                    </div>
                    <?php $index++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($upcomingAdventures->have_posts()) : ?>
    <section class="section-upcoming">
        <div class="content-container content-container--2">
            <div class="heading-button-flex">
                <h2 class="heading-button-flex__heading" data-aos="fade-up">Upcoming adventures</h2>
                <a href="/upcoming" class="btn btn--reversed" data-aos="fade-up" data-aos-delay="200">See all</a>
            </div>
            <div class="items-basic-grid">
                <?php $index = 0; ?>
                <?php while ($upcomingAdventures->have_posts()) : ?>
                    <?php
                        $upcomingAdventures->the_post();
                        $description = carbon_get_the_post_meta('crb_description');
                    ?>
                    <div class="item-preview-basic" data-aos="fade-up" data-aos-delay="<?= ($index % 3) * 100 ?>">
                        <p class="item-preview-basic__date">
                            <?= formatAdventureDate(
                                carbon_get_the_post_meta('crb_start_date'),
                                carbon_get_the_post_meta('crb_end_date')
                            ); ?>
                        </p>
                        <h3 class="item-preview-basic__title"><?= get_the_title(); ?></h3>
                        <p class="item-preview-basic__description"><?= $description; ?></p>
                    </div>
                    <?php $index++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (
    !$featuredAdventure->have_posts()
    && !$pastAdventures->have_posts()
    && !$upcomingAdventures->have_posts()
) : ?>
    <div class="content-container content-container--2">
        <section class="section-no-posts" style="margin: 5rem 0">
            <h2 class="section-no-posts__heading">There are currently no past or upcoming adventures</h2>
            <p class="section-no-posts__description">Check back in soon, we’ve always got something in the works!</p>
        </section>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
