<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
    <?php get_template_part('templates/content', 'share'); ?>
<?php endwhile; ?>
