<?php
/**
 * Template Name: Absentee Voting Rules Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'absentee-voting-rules'); ?>
  <?php get_template_part('templates/content', 'share'); ?>

<?php endwhile; ?>
