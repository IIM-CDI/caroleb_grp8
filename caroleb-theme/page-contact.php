<?php
get_header();
?>

<main id="main-content" class="site-main">
    <section class="contact-intro">
        <h1>
            <?php the_title(); ?>
        </h1>
        <!-- <p class="contact-text">
            text
        </p> -->
    </section>

    <section class="contact-content">
        <?php
        the_content();
        ?>
    </section>
</main>

<?php
get_footer();