<?php
/*
  Template Name: About
 */
?>

<?php
    $heroImageId = carbon_get_the_post_meta( 'crb_hero_image' );
    $heroImage = wp_get_attachment_image_src($heroImageId, 'full');
    $heroImageAlt = get_post_meta($heroImageId, '_wp_attachment_image_alt', true);
    $column2Content = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_column_2_content' ) );
    $galleryImages = carbon_get_the_post_meta( 'crb_gallery' );
?>

<?php get_header(); ?>
    <div class="content-container">
        <h1><?= carbon_get_the_post_meta( 'crb_hero_title' ); ?></h1>
        <img
            src="<?= $heroImage[0]; ?>"
            alt="<?= $heroImageAlt; ?>"
            width="<?= $heroImage[1]; ?>"
            height="<?= $heroImage[2]; ?>"
        >
        <h2><?= carbon_get_the_post_meta( 'crb_section_title' ); ?></h2>
        <div><?= apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_column_1_content' ) ); ?></div>
        <?php if ($column2Content) : ?>
            <div><?= $column2Content; ?></div>
        <?php endif; ?>
        <?php if (count($galleryImages) > 0) : ?>
            <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); column-gap: 1.5rem;">
                <?php foreach ($galleryImages as $galleryImage) : ?>
                    <?= wp_get_attachment_image($galleryImage['crb_gallery_image'], 'large', false, array('class' => 'gallery-image')); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>