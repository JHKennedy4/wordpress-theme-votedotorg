<?php
global $wp_query;

if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

} else {
  $state = "";
}
//if state parameter is set loop through States post types to find one with the matching state slug
   
$state_loop = new WP_Query( array( 
  'post_type' => 'state',
  'name'      => $state,
  'posts_per_page' => 1
) );
  //if that state exists then set the variables for $state_name and $state_slug to populate fields in /state page
  if ( $state_loop->have_posts() ) : 
    while ( $state_loop->have_posts() ) : 
      $state_loop->the_post(); 
      if ($state !== "") {
        $state_name = $post->post_title;
        $state_slug = $post->post_name;
         } 
    endwhile;
    else: 
      $state_name = ucfirst($state);
      $state_slug = "";
  endif;


?>

    <?php 
    if ( $state_loop->have_posts() ) : 
      while ( $state_loop->have_posts() ) : 
        $state_loop->the_post();
        if($state !== "") { ?>
    <!--hide voter registration guide when there isn't a state selected-->

    <section class="voter-registration-guide">
      <div class="container">

        <div class="state-info">
          <h2><?php echo $state_name; ?> voter registration</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-1'>
                <h4>Voter registration deadlines</h4></button>
                <div id='collapsible-1' aria-hidden='true' class='answer usa-accordion-content'>
                    <ul>
      				      <li><strong>In Person:</strong> <?php echo types_render_field("voter-registration-deadline-in-person");?></li>
      				      <li><strong>By Mail:</strong> <?php echo types_render_field("voter-registration-deadline-by-mail");?></li>
      				      <li><strong>Online:</strong> <?php echo types_render_field("voter-registration-deadline-online");?></li>
    				        </ul>
                </div>
              </li>

            <?php $registration_instructions = types_render_field("election-day-registration-instructions", array('raw' => true));
              if ( $registration_instructions !== null && $registration_instructions !== "undefined" && $registration_instructions !=="?????" && $registration_instructions !=="NA" && $registration_instructions !=="N/A") { ?>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-2'><h4>Election day registration instructions</h4></button>
                <div id='collapsible-2' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('election-day-registration-instructions');?>
                </div>
              </li>
              <?php }  ?>
              
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-3'><h4>Voter registration rules</h4></button>
                <div id='collapsible-3' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('voter-registration-rules');?>
                </div>
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-4'><h4>How to register to vote in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-4' aria-hidden='true' class='answer usa-accordion-content'>
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
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-5'>
              <h4>Absentee ballot deadlines</h4>
              </button><!--.question-->
                <div id='collapsible-5' aria-hidden='true' class='answer usa-accordion-content'>
					      <p><strong>Absentee ballot application deadline:</strong> <?php echo types_render_field('absentee-ballot-application-deadline');?></p>
                <p><strong>Voted ballots are due:</strong> <?php echo types_render_field('voted-absentee-ballot-deadline');?></p>
                </div><!--.answer-->
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-6'>
                <h4>Absentee ballot rules</h4>
                </button><!--.question-->
                <div id='collapsible-6' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('vbm-eligibilty');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-7'>
                <h4>How to get an absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-7' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('how-to-get-your-absentee-ballot');?>
                </div><!--.answer-->
              </li>
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-8'>
                <h4>Once you get your absentee ballot in <?php echo $state_name; ?></h4>
                </button><!--.question-->
                <div id='collapsible-8' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('voted-absentee-ballot-instructions');?>
                </div> <!--.answer-->
              </li>
            </ul>
          </div><!--.usa-accordion-->
        </div><!--.state-info-->

        <div class="state-info">
          <h2><?php echo $state_name; ?> early voting</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-9'>
				        <h4>Early voting starts in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-9' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('early-voting-begins');?>
              </li>
			        <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-10'>
				        <h4>Early voting ends in <?php echo $state_name; ?></h4></button>
                <div id='collapsible-10' aria-hidden='true' class='answer usa-accordion-content'>
                <?php echo types_render_field('early-voting-ends');?></div>
              </li>
            </ul>
          </div><!--.usa-accordion-->

        </div><!--.state-info-->
        <div class="state-info">

          <h2><?php echo $state_name; ?> voter ID</h2>

          <div class="usa-accordion">
            <ul class="usa-unstyled-list">
              <li>
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><h4>In-person voter ID requirements</h4></button>
                <div id='collapsible-11' aria-hidden='true' class='answer usa-accordion-content'>
                  <?php echo types_render_field('voter-id-requirements-in-person');?>
                </div>
              </li>
              <li> 
                <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-12'><h4>Absentee voter ID requirements</h4></button>
                <div id='collapsible-12' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('voter-id-requirements-absentee');?></div>
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

        <div class="updated-date">Last updated on <?php the_date('F j, Y'); ?></div><!--updated-date-->
      </div><!--.container-->
    </section> <!--.voter-registration-guide-->
    <?php } endwhile; wp_reset_postdata(); else :  ?> 

    <section class="not-found">

      <div class="container">
      <h2>Sorry, there's no state named <?php echo ucfirst($state_name);?>.</h2>
        <div class="alert alert-warning">
          <?php _e('Check out the links to each state\'s election center site.', 'sage'); ?>
        </div>
      </div><!--.container-->
    </section><!--.not-found-->

    <?php endif;?>

    <?php 
    if ( $state_loop->have_posts() ) : 
      while ( $state_loop->have_posts() ) : 
        $state_loop->the_post();
        if($state !== "") { ?>
    <!--hide faqs when there isn't a state selected-->

    
    <section class="faqs">
      <div class="container">
        <h2>Frequently asked questions</h2>


        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>
            
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->


      </div><!--.container-->

    </section><!--.faqs-->
    <?php 
      } 
      endwhile; 
      wp_reset_postdata();
    endif; ?>
