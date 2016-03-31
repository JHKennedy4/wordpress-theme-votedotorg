<?php
/**
 * Template Name: Absentee Ballot Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'absentee'); ?>
  <?php get_template_part('templates/content', 'share'); ?>
  <?php get_template_part('templates/quicklinks', 'absentee'); ?>
<?php endwhile; ?>
