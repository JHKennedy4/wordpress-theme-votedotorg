<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {

  $state = $wp_query->query_vars['state_name'];
  $state_loop = new WP_Query( array( 
    'post_type' => 'state',
    'name'      => $state,
    'posts_per_page' => 1
  ) ); 
  if ( $state_loop->have_posts() )  {
    while ( $state_loop->have_posts() ) {
      $state_loop->the_post();
      $state_name = $post->post_title;
    }    
  } 
  else { 
    $state_name = "";
  }
 }
  else {
    $state_name = "";

  } 

?>
<section class="hero">
  <div class="container container-donate">
    <a class="usa-button usa-button-secondary floaty tablet desktop" href="https://secure.actblue.com/contribute/page/votedotorg?refcode=website-top-nav">Donate</a>
  </div>
  <div class="container">
    <?php if ($state_name !== "") { ?>
    <h2 class="usa-display">VOTE.org</h2>
    <h1 class="state-election-center"><?php echo $state_name;?> Election Center</h1>
    <div class="tagline">Everything you need to vote</div>
    <?php }  else { ?> 
    <h1 class="usa-display">VOTE.org</h1>
    <div class="tagline">Everything you need to vote</div>

    <?php } ?>
    
    <div class="boxes">
      <div class="box">
        <div class="register-line"></div>
        <h2>It takes less than 2 minutes to register.</h2>

        <a class="usa-button usa-button-secondary" href="/register-to-vote/<?php if ($state !== "") { echo $state; }?>">Register to vote</a>
      </div><!--.box-->

      <div class="box">
        <div class="check-registration-line"></div>
        <h2>Find out if you are registered to vote.</h2>
        <a class="usa-button usa-button-secondary" href="/am-i-registered-to-vote/">Check registration status</a>
      </div><!--.box-->
      <div class="box">
        <div class="mail-line"></div>
        <h2>Can't vote in person on Election Day?</h2>
        <a class="usa-button usa-button-secondary" href="/absentee-ballot/<?php if ($state !== "") { echo $state; }?>">Get your absentee ballot</a>
      </div><!--.box-->

    </div><!--.boxes-->
    <div class="clear-fix"></div>
  </div><!--.container-->
</section>
