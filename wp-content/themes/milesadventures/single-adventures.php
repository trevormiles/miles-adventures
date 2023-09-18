<?php
    $featuredImageId = carbon_get_the_post_meta( 'crb_featured_image' );
    $featuredImage = wp_get_attachment_image_src($featuredImageId, 'full');
    $featuredImageAlt = get_post_meta($featuredImageId, '_wp_attachment_image_alt', true);
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
            src="<?= $featuredImage[0]; ?>"
            alt="<?= $featuredImageAlt; ?>"
            width="<?= $featuredImage[1]; ?>"
            height="<?= $featuredImage[2]; ?>"
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