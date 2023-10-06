<?php
    $featuredImageId = fallbackImageOnNull(carbon_get_the_post_meta('crb_featured_image'));
    $theTitle = get_the_title();
    $description = carbon_get_the_post_meta( 'crb_description' );
    $startDate = carbon_get_the_post_meta( 'crb_start_date' );
    $endDate = carbon_get_the_post_meta( 'crb_end_date' );
    $sectionTitle = carbon_get_the_post_meta( 'crb_section_title' );
    $sectionContent = carbon_get_the_post_meta('crb_section_content');
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
        <div class="section-column-content__column section-column-content__column--first">
            <div class="section-column-content__overline">
                <?= formatAdventureDate($startDate, $endDate); ?>
            </div>
            <?php if ($sectionTitle) : ?>
                <h2><?= $sectionTitle; ?></h2>
            <?php endif; ?>
        </div>
        <?php if ($sectionContent) : ?>
            <div class="section-column-content__column section-column-content__column--last">
                <?= apply_filters( 'the_content', $sectionContent); ?>
            </div>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>