<?php
/**
 * Template Name: Early Voting Calendar Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'early-voting-calendar'); ?>
  <?php get_template_part('templates/content', 'share'); ?>

<?php endwhile; ?>
