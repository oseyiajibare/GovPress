<?php
/**
 * Main Index Template
 *
 * This is the most generic template file in WordPress. It is used when
 * WordPress cannot find a more specific template file to use to display queried content.
 *
 * @package GovPress
 * @since 2.0.0
 */

// Prevent direct file access.
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>
<main id="content" class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('No content found.', 'govpress'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
