<?php
    $featured_image_id = carbon_get_the_post_meta( 'crb_featured_image' );
    $isFallbackImage = false;
    if ($featured_image_id) {
        $featured_image = wp_get_attachment_image_src($featured_image_id, 'full');
        $featured_image_src = $featured_image[0];
        $featured_image_width = $featured_image[1];
        $featured_image_height = $featured_image[2];
        $featured_image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
    } else {
        $featured_image_src = "/wp-content/themes/miles-out-there/public/img/hero-bg-placeholder.png";
        $featured_image_width = "952";
        $featured_image_height = "540";
        $featured_image_alt = "A pattern of pine trees laid out in a grid";
        $isFallbackImage = true;
    }
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading"><?= get_the_title(); ?></h1>
        <p class="section-page-header__description">
            <?= carbon_get_the_post_meta( 'crb_description' ); ?>
        </p>
    </div>
    <div class="section-featured-image">
        <img
            src="<?= $featured_image_src; ?>"
            alt="<?= $featured_image_alt; ?>"
            width="<?= $featured_image_width; ?>"
            height="<?= $featured_image_height; ?>"
            class="section-featured-image__image"
        >
    </div>
    <section class="section-column-content">
        <div class="section-column-content__column">
            <div class="section-column-content__overline">
                <?= 
                    formatAdventureDate(
                        carbon_get_the_post_meta( 'crb_start_date' ),
                        carbon_get_the_post_meta( 'crb_end_date' )
                    );
                ?>
            </div>
            <h2><?= carbon_get_the_post_meta( 'crb_section_title' ); ?></h2>
        </div>
        <div class="section-column-content__column">
            <?= apply_filters( 'the_content', carbon_get_the_post_meta('crb_section_content')); ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>