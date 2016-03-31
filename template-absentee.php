<?php
/**
 * Template Name: Absentee Ballot Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'absentee'); ?>
  <?php get_template_part('templates/content', 'quicklinks-share'); ?>
  <?php get_template_part('templates/content', 'quicklinks-absentee'); ?>
<?php endwhile; ?>
