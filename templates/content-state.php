<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

} else {
  $state = "";
  $state_name = "";
}

?>
<?php //looping through States to find one with the matching state slug
      $state_loop = new WP_Query( array( 
        'post_type' => 'state',
        'name'      => $state,
        'posts_per_page' => 1
      ) ); 
          if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
            if ($state_name !== "") {
              $state_name = $post->post_title;
              $state_slug = $post->post_name;
               } else {  
              $state_name = "";
              $state_slug = ""; }
?>

    <?php get_template_part('templates/content-hero'); ?>
    <section class="voter-registration-guide <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">

        <div class="state-info">
          <h2><?php echo $state_name; ?> voter registration</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-20'><h4>Voter registration deadlines</h4></button>
                <div id='collapsible-20' aria-hidden='true' class='answer usa-accordion-content'>
                  If you register by mail: <?php echo types_render_field('voter-registration-deadline-by-mail');?><br />
                  If you register in-person: <?php echo types_render_field('voter-registration-deadline-in-person');?>
                </div>
              </li>

            <?php $registration_instructions = types_render_field("election-day-registration-instructions", array('raw' => true));
              if ( $registration_instructions !== null && $registration_instructions !== "undefined" && $registration_instructions !=="?????" && $registration_instructions !=="NA" && $registration_instructions !=="N/A") { ?>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-21'><h4>Election day registration instructions</h4></button>
                <div id='collapsible-21' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('election-day-registration-instructions');?>
                </div>
              </li>
              <?php }  ?>
              
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-22'><h4>Voter registration rules</h4></button>
                <div id='collapsible-22' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('voter-registration-rules');?>
                </div>
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-23'><h4>How to register to vote in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-23' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('how-to-register-to-vote');?>
                </div>
              </li>
            </ul>
          </div><!--.usa-accordion-->

        </div><!--.state-info-->

        <div class="state-info">
      
          <h2><?php echo $state_name; ?> absentee ballots</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-16'><h4>Absentee ballot deadlines</h4></button>
                <div id='collapsible-16' aria-hidden='true' class='answer usa-accordion-content'>
                  Absentee ballot application deadline: <?php echo types_render_field('absentee-ballot-application-deadline');?>
                  Voted ballots are due: <?php echo types_render_field('voted-absentee-ballot-deadline');?>
                </div><!--.answer-->
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-17'>
                  <h4>Absentee ballot rules</h4>
                </button><!--.question-->
                <div id='collapsible-17' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('vbm-eligibilty');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-18'>
                  <h4>How to get an absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-18' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('how-to-get-your-absentee-ballot');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-19'>
                  <h4>Once you get your absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-19' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('voted-absentee-ballot-instructions');?>
                </div><!--.answer-->
              </li>
            </ul>
          </div><!--.usa-accordion-->
        </div><!--.state-info-->

        <div class="state-info">
          <h2><?php echo $state_name; ?> early voting</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">

              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><h4>Early voting calendar in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-11' aria-hidden='true' class='answer usa-accordion-content'>
                  Early voting starts: <?php echo types_render_field('early-voting-begins');?>
                  Early voting ends: <?php echo types_render_field('early-voting-ends');?></div>
              </li>
            </ul>
          </div><!--.usa-accordion-->

        </div><!--.state-info-->
        <div class="state-info">

          <h2><?php echo $state_name; ?> voter ID</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-12'><h4>In-person voter ID requirements</h4></button>
                <div id='collapsible-12' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('voter-id-requirements-in-person');?>
                </div>
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-13'><h4>Absentee voter ID requirements</h4></button>
                <div id='collapsible-13' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('voter-id-requirements-absentee');?></div>
              </li>
            </ul>
          </div><!--.usa-accordion-->
        </div><!--.state-info-->
        <?php get_template_part('templates/content-links'); ?>

        <h2>Additional VOTE.org links</h2>
        <ul>
          <li><a href="/register-to-vote/<?php if ($state_slug !== "") { echo $state_slug; }?>">Register to vote in <?php echo $state_name;?></a></li>
          <li><a href="/absentee-ballot/<?php if ($state_slug !== "") { echo $state_slug; }?>">Get your <?php echo $state_name;?> absentee ballot</a></li>
        </ul>
      </div><!--.container-->
    </section> <!--.voter-registration-guide-->
    

    
    <section class="faqs <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">
        <h2>Frequently asked questions</h2>


        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>
            
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->

      </div><!--.container-->

    </section><!--.faqs-->
    <?php endwhile; 
    wp_reset_postdata();
  endif; ?>