<?php
/**
 * Template Name: Where Do I Vote Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'where-do-i-vote'); ?>
  <?php get_template_part('templates/content', 'share'); ?>

<?php endwhile; ?>
