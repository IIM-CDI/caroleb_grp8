<?php
get_header();
?>

<main id="main-content" class="site-main">
    <section class="galerie-intro">
        <h1 class="galerie-title"> <?php the_title(); ?></h1>
        <?php the_content() ?>
    </section>

    <nav class="galerie-nav">
        <?php
        $subpages = get_pages([
            'child_of' => get_the_ID(),
            'sort_column' => 'menu_order'
        ]);

        if ($subpages) {
            echo '<ul class="galerie-nav-list">';
            foreach ($subpages as $page) {
                echo '<button class="galerie-button">
                    <a class="galerie-a" href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>
                </button>
                </li>';
            }
            echo '</ul>';
        }
        ?>
    </nav>

    <section>
        <?php
        $oeuvre_query = new WP_Query(array(
            'post_type' => 'oeuvre',
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'paged' => $paged
        ));
        ?>

        <?php if ($oeuvre_query->have_posts()): ?>
            <ul class="galerie-wrapper">
                <?php while ($oeuvre_query->have_posts()):
                    $oeuvre_query->the_post(); ?>

                    <li class="galerie-items">
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
                        <p class="galerie-item-title">
                            <?php the_title(); ?>
                        </p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <div class="galerie-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $oeuvre_query->max_num_pages
                ));
                ?>
            </div>

            <?php wp_reset_postdata();
        elseif (!$oeuvre_query->have_posts()): ?>
            <p>
                <?php
                echo 'Pas doeuvre presente';
                ?>
            </p>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();
