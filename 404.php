
<section class="not-found">
 <div class="container">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="alert alert-warning">
    <?php _e('Try searching for it below or check out the links to each state\'s election center site.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>

 </div><!--.container-->
</section>

<?php get_template_part('templates/quicklinks', 'state'); ?>

