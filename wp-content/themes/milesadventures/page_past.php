<?php
/*
  Template Name: Past
 */
?>

<?php
    $adventures = [
        [
            'title' => 'Portland',
            'description' => 'Silver Falls State Park, Columbia River Gorge & Mount Hood Wilderness Area',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-01-01',
            'end_date' => '2022-02-01',
        ],
        [
            'title' => 'Vancouver',
            'description' => 'Golden Ears Provincial Park, Squamish, Pacific Rim National Park',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-02-01',
            'end_date' => '2022-03-01',
        ],
        [
            'title' => 'Redwood National Park',
            'description' => 'Redwood NP, Jedidiah Smith Redwoods, Del Norte Coast Redwoods, Prairie Creek Redwoods',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-03-01',
            'end_date' => '2022-04-01',
        ],
        [
            'title' => 'Portland',
            'description' => 'Silver Falls State Park, Columbia River Gorge & Mount Hood Wilderness Area',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-01-01',
            'end_date' => '2022-02-01',
        ],
        [
            'title' => 'Vancouver',
            'description' => 'Golden Ears Provincial Park, Squamish, Pacific Rim National Park',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-02-01',
            'end_date' => '2022-03-01',
        ],
        [
            'title' => 'Redwood National Park',
            'description' => 'Redwood NP, Jedidiah Smith Redwoods, Del Norte Coast Redwoods, Prairie Creek Redwoods',
            'href' => '/',
            'image_url' => '/wp-content/uploads/2022/09/nat-trev-hurricane.jpg',
            'start_date' => '2022-03-01',
            'end_date' => '2022-04-01',
        ],
    ];
?>

<?php get_header(); ?>

<div class="content-container content-container--2 content-container--page-padding">
    <div class="section-page-header">
        <h1 class="section-page-header__heading">Past adventures</h1>
        <p class="section-page-header__description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
    <div class="items-primary-grid">
        <?php foreach ($adventures as $item) : ?>
            <div class="item-preview-primary">
                <a href="<?= $item['href']; ?>" class="item-preview-primary__image-container">
                    <img src="<?= $item['image_url'] ?>" class="item-preview-primary__image">
                </a>
                <h3><?= $item['title']; ?></h3>
                <p><?= $item['description']; ?></p>
                <a href="<?= $item['href']; ?>" class="btn">Read more</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>