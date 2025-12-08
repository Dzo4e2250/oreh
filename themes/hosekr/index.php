<?php
/**
 * Osnovna predloga
 *
 * @package Hosekr
 */

get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
