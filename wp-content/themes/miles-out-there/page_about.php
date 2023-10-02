<?php
/*
  Template Name: About
 */
?>

<?php
    $heroImageId = carbon_get_the_post_meta( 'crb_hero_image' );
    $heroImage = wp_get_attachment_image_src($heroImageId, 'full');
    $heroImageAlt = get_post_meta($heroImageId, '_wp_attachment_image_alt', true);
    $galleryImages = carbon_get_the_post_meta( 'crb_gallery' );
    $heroTitle = carbon_get_the_post_meta( 'crb_hero_heading' );
    $sectionTitle = carbon_get_the_post_meta( 'crb_section_heading' );
    $sectionContent = carbon_get_the_post_meta('crb_section_description');
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading">
            <?= $heroTitle; ?>
        </h1>
    </div>
    <div class="section-featured-image">
        <img
            src="<?= $heroImage[0]; ?>"
            alt="<?= $heroImageAlt; ?>"
            width="<?= $heroImage[1]; ?>"
            height="<?= $heroImage[2]; ?>"
            class="section-featured-image__image"
        >
    </div>
    <section class="section-column-content">
        <div class="section-column-content__column">
            <h2><?= $sectionTitle; ?></h2>
        </div>
        <div class="section-column-content__column">
            <?= apply_filters( 'the_content', $sectionContent); ?>
        </div>
    </section>
    <?php if (count($galleryImages) > 0) : ?>
        <div class="section-basic-gallery">
            <?php foreach ($galleryImages as $galleryImage) : ?>
                <?= 
                    wp_get_attachment_image(
                        $galleryImage['crb_gallery_image'],
                        'large',
                        false,
                        array('class' => 'gallery-image')
                    );
                ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>