<?php
    $featuredAdventureArray = getFeaturedAdventure();
    $featuredAdventure = $featuredAdventureArray[0];
    $featuredAdventureType = $featuredAdventureArray[1];

    $links = [
        ["title" => "About", "href" => "/about"],
        ["title" => "Past", "href" => "/past"],
        ["title" => "Upcoming", "href" => "/upcoming"],
    ];

    if ($featuredAdventure->have_posts()) {
        while ($featuredAdventure->have_posts()) {
            $featuredAdventure->the_post();
            array_splice($links, 1, 0, [["title" => ucfirst($featuredAdventureType), "href" => get_the_permalink()]]);
        }
        wp_reset_postdata();
    }
?>
</main>
<footer class="site-footer">
    <div class="site-footer__container">
        <a href="/" data-aos="fade-in">
            <div class="site-footer__logo-title">Miles Out There</div>
            <div class="site-footer__logo-tagline">Natalie &amp; Trevor</div>
        </a>
        <nav class="site-footer__nav">
            <?php foreach ($links as $index => $link): ?>
                <a
                    href="<?= $link["href"]; ?>"
                    class="site-footer__link"
                    data-aos="fade-in"
                    data-aos-delay="<?= $index * 200; ?>"
                >
                    <?= $link["title"]; ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
