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
        <h2>We've got to make it easier to vote, not harder. We need to modernize it for the way we live now.<?php the_content(); ?></h2></blockquote>
        
        <div class='attribution'>Barack Obama, 44th President of the United States</div>
        
        
      </div><!--.container-->

    </section><!--.quote -->

    <section class="sharing">
      <div class="container">
        <h2>Americans want to vote.</h2>
        <p>Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.</p>
        <a href="/about">Learn more about Vote.org</a>
        
        <h3>Every person who shares helps us reach three more voters.</h3>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_jumbo_share"></div>
      </div>
    </section>
