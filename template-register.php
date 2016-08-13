<?php
/**
 * Template Name: Register to Vote Template
 */

global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

} else {
  $state = "";
}

?>
<?php //looping through States to find one with the matching state slug

  $state_loop = new WP_Query( array( 
    'post_type' => 'state',
    'name'      => $state,
    'posts_per_page' => 1

  ) ); ?>
<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('templates/content-register'); ?>
    <?php get_template_part('templates/quicklinks-register'); ?>

<?php endwhile?>

