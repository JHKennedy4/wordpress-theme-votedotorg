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
               } else {  
              $state_name = ""; }
?>

    <?php get_template_part('templates/content-hero'); ?>
    <section class="voter-registration-guide <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">

        <div class="state-info">
          <h2><?php echo $state_name; ?> voter registration</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">

            <!--TODO: if statement-->
            <?php $registration_instructions = types_render_field("election-day-registration-instructions", array('raw' => true));
              if ( $registration_instructions !== null && $registration_instructions !== "undefined" && $registration_instructions !=="?????") { ?>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-5'><h4><?php echo $state_name; ?> Election day registration instructions</h4></button>
                <div id='collapsible-5' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('election-day-registration-instructions');?>
                </div>
              </li>
              <?php }  ?>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-1'><h4><?php echo $state_name; ?> voter registration deadlines</h4></button>
                <div id='collapsible-1' aria-hidden='true' class='answer usa-accordion-content'>
                  If you register by mail: <?php echo types_render_field('voter-registration-deadline-by-mail');?><br />
                  If you register in-person: <?php echo types_render_field('voter-registration-deadline-in-person');?>
                </div>
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-2'><h4><?php echo $state_name; ?> voter registration rules</h4></button>
                <div id='collapsible-2' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('voter-registration-rules');?>
                </div>
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-3'><h4>How to register to vote in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-3' aria-hidden='true' class='answer usa-accordion-content'>
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
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-16'><h4><?php echo $state_name; ?> absentee ballot deadlines</h4></button>
                <div id='collapsible-16' aria-hidden='true' class='answer usa-accordion-content'>
                  Absentee ballot application deadline: <?php echo types_render_field('absentee-ballot-application-deadline');?>
                  Voted ballots are due: <?php echo types_render_field('voted-absentee-ballot-deadline');?>
                </div><!--.answer-->
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-8'>
                  <h4><?php echo $state_name; ?> absentee ballot rules</h4>
                </button><!--.question-->
                <div id='collapsible-8' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('vbm-eligibilty');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-9'>
                  <h4>How to get an absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-9' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('how-to-get-your-absentee-ballot');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-10'>
                  <h4>Once you get your absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-10' aria-hidden='true' class='answer usa-accordion-content'>
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
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><h4>Early voting in <?php echo $state_name; ?></h4></button>
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
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-16'><h4><?php echo $state_name; ?> in-person voter ID requirements</h4></button>
                <div id='collapsible-16' aria-hidden='true' class='answer usa-accordion-content'>
                  Absentee ballot application deadline: <?php echo types_render_field('voter-id-requirements-in-person');?>
                  Voted ballots are due: <?php echo types_render_field('voted-absentee-ballot-deadline');?>
                </div>
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-8'><h4><?php echo $state_name; ?> absentee voter ID requirements</h4></button>
                <div id='collapsible-8' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('vbm-eligibilty');?></div>
              </li>
            </ul>
          </div><!--.usa-accordion-->
        </div><!--.state-info-->
        <?php get_template_part('templates/content-links'); ?>
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