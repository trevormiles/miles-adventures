<?php
/*
  Template Name: About
 */
?>

<?php
    $heroImageId = carbon_get_the_post_meta( 'crb_hero_image' );
    $galleryImages = carbon_get_the_post_meta( 'crb_about_gallery' );
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
        <?= 
            wp_get_attachment_image(
                $heroImageId,
                'full',
                false,
                array('class' => 'section-featured-image__image')
            );
        ?>
    </div>
    <section class="section-column-content">
        <div class="section-column-content__column section-column-content__column--first" data-aos="fade-up">
            <h2><?= $sectionTitle; ?></h2>
        </div>
        <div
            class="section-column-content__column section-column-content__column--last"
            data-aos="fade-up"
            data-aos-delay="200"
        >
            <?= apply_filters( 'the_content', $sectionContent); ?>
        </div>
    </section>
    <?php if (count($galleryImages) > 0) : ?>
        <div class="section-grid-gallery" data-comp-gallery-lightbox>
            <?php foreach ($galleryImages as $index => $galleryImage) : ?>
                <?php
                    $fullSizeImage = wp_get_attachment_image_src($galleryImage, "full"); 
                    $imageSrc = $fullSizeImage[0];
                    $imageWidth = $fullSizeImage[1];
                    $imageHeight = $fullSizeImage[2];
                    $imageSrcSet = wp_get_attachment_image_srcset($galleryImage);
                    $caption = wp_get_attachment_caption($galleryImage);
                ?>
                <div
                    data-aos="fade-up"
                    data-aos-delay="<?= ($index % 3) * 100 ?>"
                    data-gallery-lightbox-item
                    class="grid-gallery-item grid-gallery-item--tall"
                >
                    <a
                        href="<?= $imageSrc; ?>"
                        data-pswp-width="<?= $imageWidth; ?>"
                        data-pswp-height="<?= $imageHeight; ?>"
                        data-pswp-srcset="<?= $imageSrcSet; ?>"
                        target="_blank"
                        class="grid-gallery-item__image-container"
                    >
                        <?= 
                            wp_get_attachment_image(
                                $galleryImage,
                                'large',
                                false,
                                array('class' => 'grid-gallery-item__image')
                            );
                        ?>
                    </a>
                    <div class="pswp-caption-content" data-pswp-caption><?= $caption; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>