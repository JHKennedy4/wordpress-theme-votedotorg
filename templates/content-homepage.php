<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];
  $state_name = ucwords($state);
} else {
  $state = "";
  $state_name = "";
}

?>


    <section class="quote">
      <div class="container">
        <blockquote>
        <h2>Nobody will ever deprive the American people of the right to vote except the American people themselves and the only way they could do this is by not voting.</h2></blockquote>
        <div class="clear-fix"></div>
        
        <div class='attribution'>
          <strong>Franklin Delano Roosevelt</strong>, 32nd President of the United States
        </div>
        
        
      </div><!--.container-->

    </section><!--.quote -->
    <section class="sharing">
      <div class="container">
        <h2>Americans want to vote.</h2>
        <p>Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.</p>
        <a href="/about">Learn more about Vote.org</a>
      </div>
    </section>

    <section>
    <?php get_template_part('templates/quicklinks', 'state'); ?>
    </section>

