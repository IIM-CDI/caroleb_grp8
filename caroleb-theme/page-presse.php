<?php
get_header();
?>

<main id="main-content" class="site-main">
    <section class="media-intro">
        <h1>
            <?php the_title(); ?>
        </h1>
        <p class="media-text">
            Chaque logo raconte une histoire,
            <br>
            <a href="<?php echo get_permalink(12); ?>">cliquez pour en savoir plus.</a>
        </p>
    </section>

    <section class="media-wrapper">
        <?php the_content(); ?>
    </section>
</main>

<?php
get_footer();