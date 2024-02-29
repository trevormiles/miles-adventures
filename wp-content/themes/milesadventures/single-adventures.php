<?php
    $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
    $theTitle = get_the_title();
    $description = carbon_get_the_post_meta( 'crb_description' );
    $startDate = carbon_get_the_post_meta( 'crb_start_date' );
    $endDate = carbon_get_the_post_meta( 'crb_end_date' );
    $sectionTitle = carbon_get_the_post_meta( 'crb_section_title' );
    $sectionContent = carbon_get_the_post_meta('crb_section_content');
    $gallerySections = carbon_get_the_post_meta('crb_gallery_sections');
    $nextAdventure = getNextAdventure($endDate);
    $previousAdventure = getPreviousAdventure($startDate);
    $pageBackgroundColor = carbon_get_the_post_meta( 'crb_page_background_color' );
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading"><?= $theTitle; ?></h1>
        <p class="section-page-header__description"><?= $description; ?></p>
    </div>
    <div class="section-featured-image">
        <?= 
            wp_get_attachment_image(
                $featuredImageId,
                'full',
                false,
                array('class' => 'section-featured-image__image')
            );
        ?>
    </div>
    <section class="section-column-content">
        <div class="section-column-content__column section-column-content__column--first" data-aos="fade-up">
            <div class="section-column-content__overline">
                <?= formatAdventureDate($startDate, $endDate); ?>
            </div>
            <?php if ($sectionTitle) : ?>
                <h2><?= $sectionTitle; ?></h2>
            <?php endif; ?>
        </div>
        <?php if ($sectionContent) : ?>
            <div
                class="section-column-content__column section-column-content__column--last"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <?= apply_filters( 'the_content', $sectionContent); ?>
            </div>
        <?php endif; ?>
    </section>
    <?php if (count($gallerySections) > 0) : ?>
        <div class="section-adventure-galleries">
            <?php foreach ($gallerySections as $gallerySection) : ?>
                <div class="section-content-gallery">
                    <div class="section-content-gallery__content">
                        <?php if ($gallerySection['crb_gallery_section_title']) : ?>
                            <h3 class="section-content-gallery__title" data-aos="fade-up">
                                <?= $gallerySection['crb_gallery_section_title']; ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($gallerySection['crb_gallery_section_description']) : ?>
                            <p class="section-content-gallery__description" data-aos="fade-up">
                                <?= $gallerySection['crb_gallery_section_description']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if (count($gallerySection['crb_gallery_section']) > 0) : ?>
                        <div class="section-grid-gallery" data-comp-gallery-lightbox>
                            <?php foreach ($gallerySection['crb_gallery_section'] as $index => $galleryImage) : ?>
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
                                    class="grid-gallery-item"
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
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="previous-next-layout">
        <?php if ($nextAdventure->have_posts()) : ?>
            <?php
                $nextAdventure->the_post();
                $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
            ?>
            <a
                href="<?= get_the_permalink(); ?>"
                class="item-preview-sample item-preview-sample--next <?= $pageBackgroundColor; ?>"
                data-aos="fade-up"
            >
                <div class="item-preview-sample__content">
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/resources/icons/arrow-left.svg' ); ?>
                    <div>
                        <div class="item-preview-sample__overline">Next Adventure</div>
                        <h3 class="item-preview-sample__title"><?= get_the_title(); ?></h3>
                    </div>
                </div>
                <?= 
                    wp_get_attachment_image(
                        $featuredImageId,
                        'full',
                        false,
                        array('class' => 'item-preview-sample__image')
                    );
                ?>
            </a>
        <?php endif; ?>
        <?php if ($previousAdventure->have_posts()) : ?>
            <?php
                $previousAdventure->the_post();
                $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
            ?>
            <a
                href="<?= get_the_permalink(); ?>"
                class="item-preview-sample item-preview-sample--previous <?= $pageBackgroundColor; ?>"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <div class="item-preview-sample__content">
                    <div>
                        <div class="item-preview-sample__overline">Previous Adventure</div>
                        <h3 class="item-preview-sample__title"><?= get_the_title(); ?></h3>
                    </div>
                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/resources/icons/arrow-right.svg' ); ?>
                </div>
                <?= 
                    wp_get_attachment_image(
                        $featuredImageId,
                        'full',
                        false,
                        array('class' => 'item-preview-sample__image')
                    );
                ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>