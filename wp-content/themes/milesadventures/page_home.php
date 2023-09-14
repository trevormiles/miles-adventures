<?php
/*
  Template Name: Home
 */


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
    <section class="section-latest">
        <div class="content-container content-container--2">
            <h2>Latest adventures</h2>
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
    </section>
    <section class="section-upcoming">
        <div class="content-container content-container--2">
            <h2>Upcoming adventures</h2>
            <div class="items-basic-grid">
                <?php foreach ($adventures as $item) : ?>
                    <div class="item-preview-basic">
                        <p class="item-preview-basic__date"><?= $item['start_date'] . " - " . $item['start_date']; ?></p>
                        <h3 class="item-preview-basic__title"><?= $item['title']; ?></h3>
                        <p class="item-preview-basic__description"><?= $item['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>