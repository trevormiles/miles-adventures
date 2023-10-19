<?php
    $featuredAdventureArray = getFeaturedAdventure();
    $featuredAdventure = $featuredAdventureArray[0];
    $featuredAdventureType = $featuredAdventureArray[1];
?>
</main>
<footer class="site-footer">
    <div class="site-footer__container">
        <a href="/">
            <div class="site-footer__logo-title">Miles Out There</div>
            <div class="site-footer__logo-tagline">Natalie &amp; Trevor</div>
        </a>
        <nav class="site-footer__nav">
            <a href="/about" class="site-footer__link">About</a>
            <?php if ($featuredAdventure->have_posts()) : ?>
                <?php while ($featuredAdventure->have_posts()) : $featuredAdventure->the_post() ?>
                    <a href="<?= the_permalink(); ?>" class="site-footer__link"><?= ucfirst($featuredAdventureType); ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
            <a href="/past" class="site-footer__link">Past</a>
            <a href="/upcoming" class="site-footer__link">Upcoming</a>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>
</body>
</html>
