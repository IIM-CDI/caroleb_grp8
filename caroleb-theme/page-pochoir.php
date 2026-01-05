<?php
get_header();
?>

<main id="main-content" class="site-main">
    <h1 class="h1"><?php the_title(); ?> </h1>

    <nav class="pochoirs-nav">
        <?php
        $childArgs = array(
            'child_of' => 86,
            'post_type' => 'page',
            'post_status' => 'publish'
        );
        $childList = get_pages($childArgs);

        echo '<ul class="pochoirs-nav-list">';
        foreach ($childList as $child) {
            echo '<li class="pochoirs-list-individual">
                <a class="pochoirs-a" href="' . get_permalink($child->ID) . '">' . $child->post_title . '</a>
                </li>';
        }
        echo '</ul>';
        ?>
    </nav>

    <section>
        <?php
        $oeuvre_query = new WP_Query(array(
            'post_type' => 'oeuvre',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'cat' => '12'
        ));
        ?>

        <?php if ($oeuvre_query->have_posts()): ?>
            <ul class="pochoirs-wrapper">
                <?php while ($oeuvre_query->have_posts()):
                    $oeuvre_query->the_post(); ?>

                    <li class="pochoir-items">
                        <?php
                        $image = get_field('image');
                        $size = 'medium';
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if ($image) {
                                echo wp_get_attachment_image($image, $size);
                            }
                            ?>
                        </a>
                        <p class="pochoirs-item-title">
                            <?php the_title(); ?>
                        </p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="pochoirs-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $oeuvre_query->max_num_pages
                ));
                ?>
            </div>

            <?php wp_reset_postdata();
        elseif (!$oeuvre_query->have_posts()): ?>
            <p class="pochoirs-p">
                <?php
                echo 'Pas doeuvre presente';
                ?>
            </p>
        <?php endif; ?>
    </section>

</main>

<?php
get_footer();
