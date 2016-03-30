<?php
/**
 * Template Name: Homepage Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'homepage'); ?>
  <?php get_template_part('templates/content', 'sharing'); ?>

<?php endwhile; ?>
