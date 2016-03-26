<?php
/**
 * Template Name: Voter Registration Deadlines Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'voter-registration-deadlines'); ?>
  <?php get_template_part('templates/content', 'sharing'); ?>

<?php endwhile; ?>
