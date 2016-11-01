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
    <a class="usa-button usa-button-outline-inverse floaty tablet desktop" href="https://secure.actblue.com/contribute/page/votedotorg?refcode=website-top-nav">Donate</a>
  </div>
  <div class="container">
    <?php if ($state_name !== "") { ?>
    <h2 class="site-name tablet desktop">VOTE.org</h2>
    <h1 class="state-election-center"><?php echo $state_name;?> Election Center</h1>
    <div class="tagline">Everything you need to vote</div>
    <?php }  else { ?>
    <h1 class="site-name tablet desktop">VOTE.org</h1>
    <div class="tagline">Everything you need to vote</div>

    <?php } ?>
    <div class="boxes">
      <div class="box">
        <div class="register-line"></div>
        <h2>Vote before Election Day.</h2>
        <a class="usa-button usa-button-secondary" href="/early-voting-calendar">Vote early</a>
      </div><!--.box-->

      <div class="box">
        <div class="check-registration-line"></div>
        <h2>Find out where you vote.</h2>
        <a class="usa-button usa-button-secondary" href="/polling-place-locator">Polling place lookup</a>
      </div><!--.box-->
      <div class="box">
        <div class="mail-line"></div>
        <h2>See what is on your ballot.</h2>
        <a class="usa-button usa-button-secondary" href="https://www.voteplz.org/vote/ballot/?edit=true">See your ballot</a>
      </div><!--.box-->

    </div>

    <div class="boxes">
      <div class="box box--light">
        <!--div class="register-line"></div-->
        <h3>It takes less than 2 minutes to register.</h3>

        <a class="usa-button" href="/register-to-vote/<?php if ($state !== "") { echo $state; }?>">Register to vote</a>
      </div><!--.box-->

      <div class="box box--light">
        <!--div class="check-registration-line"></div-->
        <h3>Find out if you are registered to vote.</h3>
        <a class="usa-button" href="/am-i-registered-to-vote/">Check registration status</a>
      </div><!--.box-->
      <div class="box box--light">
        <!--div class="mail-line"></div-->
        <h3>Can't vote in person on Election Day?</h3>
        <a class="usa-button" href="/absentee-ballot/<?php if ($state !== "") { echo $state; }?>">Get your absentee ballot</a>
      </div><!--.box-->

    </div><!--.boxes-->
    <div class="clear-fix"></div>
  </div><!--.container-->
<style>
section.hero .container {
    width: 90% !important;
    max-width: 320px !important;
}

section.hero .box {
    margin-bottom: 30px !important;
}

section.hero .box h2 {
    text-align: center;
    margin-bottom: 0;
    height: auto;
    font-size: 30px;
    line-height: 39px;
    margin-bottom: 30px;
}

section.hero .box.box--light h3 {
  text-align: center;
}

.usa-button.usa-button-secondary {
    font-size: 20px !important;
}

@media only screen and (min-width: 768px) {
    section.hero .container {
      max-width: none !important;
    }

    section.hero .box h2 {
    }
}

@media only screen and (min-width: 1007px) {
    section.hero .box h2 {
    }
}

@media only screen and (min-width: 1080px) {
    section.hero .container {
       max-width: 1080px !important;
       width: auto !important;
    }
}

section.hero .boxes {
}

section.hero .box {
    padding: 30px !important;
}


section.hero .box.box--light {
}

section.hero .box.box--light h3 {
    font-family: Merriweather;
    font-weight: bold;
    font-size: 20px;
    line-height: 26px;
}

@media screen and (min-width:481px){
    section.hero .box.box--light .usa-button.usa-button-outline-inverse {
        font-size: 15px !important;
    }
}


section.hero .box .usa-button, .usa-button:visited {
    width: 100% !important;
}

.site-name {
  margin-bottom: 10px !important;
}
.tagline {
  margin-bottom: 65px !important;
  font-weight: bold !important;
}

</style>
</section>

