<?php
/**
 * Template Name: Technology Page Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'technology'); ?>
<?php endwhile; ?>
