<?php
/**
 * Template Name: Verify Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'verify'); ?>
  <?php get_template_part('templates/content', 'share'); ?>
  
<?php endwhile; ?>
