<?php
get_header();
?>

<main id="main-content" class="site-main">
    <section class="media-intro">
        <h1 class="presse-title"> <?php the_title(); ?></h1>
        <?php the_content(); ?>
    </section>
</main>

<?php
get_footer();