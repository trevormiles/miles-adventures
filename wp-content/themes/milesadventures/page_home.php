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
            $featured_image_id = carbon_get_the_post_meta('crb_featured_image');
            $featured_image_src = wp_get_attachment_image_src($featured_image_id, 'full')[0];
        ?>

        <section class="home-hero">
            <div class="home-hero__image-container">
                <img src="<?= $featured_image_src; ?>" alt="Nat & Trev" class="home-hero__image">
            </div>
            <div class="home-hero__content">
                <div class="content-container content-container--2">
                    <div class="home-hero__overline"><?= ucfirst($featuredAdventureType); ?> Adventure</div>
                    <h1><?php the_title(); ?></h1>
                    <p class="home-hero__description"><?= $description; ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn--solid-hover">Read More</a>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php if ($pastAdventures->have_posts()) : ?>
    <section class="section-latest">
        <div class="content-container content-container--2">
            <h2>Latest adventures</h2>
            <div class="items-primary-grid">
                <?php while ($pastAdventures->have_posts()) : ?>
                    <?php
                        $pastAdventures->the_post();
                        $description = carbon_get_the_post_meta('crb_description');
                        $featured_image_id = carbon_get_the_post_meta('crb_featured_image');
                        $featured_image_src = wp_get_attachment_image_src($featured_image_id, 'full')[0];
                    ?>
                    <div class="item-preview-primary">
                        <a href="<?php the_permalink(); ?>" class="item-preview-primary__image-container">
                            <img src="<?= $featured_image_src; ?>" class="item-preview-primary__image">
                        </a>
                        <h3><?php the_title(); ?></h3>
                        <p><?= $description; ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($upcomingAdventures->have_posts()) : ?>
    <section class="section-upcoming">
        <div class="content-container content-container--2">
            <h2>Upcoming adventures</h2>
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