<?php
/**
 * Template Name: State Template
 */

?>

<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part('templates/content-hero'); ?>
	<?php get_template_part('templates/content-state'); ?>
	<?php get_template_part('templates/quicklinks-state'); ?>


<?php endwhile; ?>
