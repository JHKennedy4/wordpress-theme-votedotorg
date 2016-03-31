<?php
/**
 * Template Name: Register to Vote Template
 */

?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'register'); ?>
  <?php get_template_part('templates/content', 'share'); ?>
  <?php get_template_part('templates/quicklinks','register'); ?>
<?php endwhile; ?>
