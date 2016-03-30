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

    <section class="action-blocks">
      <div class="box">
        Make your voice heard in this election.
        <a class="button" href="/register-to-vote/<?php echo $state;?>">Register to Vote for <?php echo $state_name; ?></a>
      </div><!--.box-->
      
      <div class="box">
        Find out if you are registered to vote.
        <a class="button" href="http://verify.vote.org" target="_blank">Check your registration status</a>
      </div><!--.box-->
      <div class="box">
        Get your Absentee Ballot.
        <a href="/absentee-ballot/<?php echo $state;?>">Get your Absentee Ballot for <?php echo $state_name; ?></a>
      </div><!--.box-->

    </section>

    <section class="voter-registration-guide">
      <div class="container">
        <?php the_content(); ?>
        
        
      </div><!--.container-->

    </section><!--.voter-registration-guide -->
