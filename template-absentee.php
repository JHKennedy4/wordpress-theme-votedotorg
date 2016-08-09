<?php
/**
 * Template Name: Absentee Ballot Template
 */


global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

} else {
  $state = "";
}

//looping through States to find one with the matching state slug

  $state_loop = new WP_Query( array( 
    'post_type' => 'state',
    'name'      => $state,
    'posts_per_page' => 1

  ) ); ?>

<?php if ( $state_loop->have_posts() ) : while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/content', 'absentee'); ?>
  <?php get_template_part('templates/quicklinks', 'absentee'); ?>
    <?php get_template_part('templates/content', 'share'); ?>
<?php endwhile; else: ?>
  <?php get_template_part('templates/content', 'absentee'); ?>
  <?php get_template_part('templates/quicklinks', 'absentee'); ?>

<?php endif; ?>
