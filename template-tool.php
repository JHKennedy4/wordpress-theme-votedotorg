<?php
/**
 * Template Name: Tool Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'tool'); ?>
<?php endwhile; ?>
