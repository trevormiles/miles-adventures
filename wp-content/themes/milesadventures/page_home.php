<?php
/*
  Template Name: Home
 */
?>

<?php
    $pastAdventures = getPastAdventuresQuery();
    $upcomingAdventures = getUpcomingAdventuresQuery();
?>

<?php get_header(); ?>

<section class="home-hero">
    <div class="home-hero__image-container">
        <img src="/wp-content/uploads/2022/09/nat-trev-hurricane.jpg" alt="Nat & Trev" class="home-hero__image">
    </div>
    <div class="home-hero__content">
        <div class="content-container content-container--2">
            <div class="home-hero__overline">Current Adventure</div>
            <h1>Olympic National Park</h1>
            <p class="home-hero__description">
                Including the Hoh Rain Forest, Quinault Rain Forest, Sol Duc Falls, Lake Crescent & Hurricane Ridge.  
            </p>
            <a href="/" class="btn btn--solid-hover">Read More</a>
        </div>
    </div>
</section>
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

<?php get_footer(); ?>