<?php
/*
  Template Name: Past
 */
?>

<?php
    $pastAdventures = getPastAdventuresQuery(-1);
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading">Past adventures</h1>
        <p class="section-page-header__description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
    <?php if ($pastAdventures->have_posts()) : ?>
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
    <?php else : ?>
        <section class="section-no-posts">
            <h2 class="section-no-posts__heading">There are currently no past adventures</h2>
            <p class="section-no-posts__description">Check back in soon, we’ve always got something in the works!</p>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>