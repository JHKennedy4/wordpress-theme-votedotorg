<?php
/**
 * Template Name: Absentee Ballot Deadlines Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'absentee-ballot-deadlines'); ?>

<?php endwhile; ?>
