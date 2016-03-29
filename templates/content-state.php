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
    <section class="breadcrumbs">
      <div class="container">
    <?php //looping through States to find one with the matching state slug
      $state_loop = new WP_Query( array( 
        'post_type' => 'state',
        'name'      => $state,
        'posts_per_page' => 50
      ) ); 
          if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
          $state_name = $post->post_title; ?>
        <h1><?php echo $state_name; ?> Election Center</h1>
      </div><!--.container-->
    </section><!--.breadcrumbs-->

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
        
        
      </div><!--.container-->

    </section><!--.voter-registration-guide -->

    <section class="faqs">
      <div class="container">
        <h2>Frequently Asked Questions</h2>

        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-5'><?php echo $state_name; ?> Election Day Registration Instructions</button>
              <div id='collapsible-5' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('election-day-registration-instructions');?></div>
            </li>
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-6'><?php echo $state_name; ?> Voter Registration - How To</button>
              <div id='collapsible-6' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('how-to-register-to-vote');?></div>
            </li>
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-7'><?php echo $state_name; ?> Absentee Ballots - How To</button>
              <div id='collapsible-7' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('how-to-get-your-absentee-ballot');?></div>
            </li>
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-8'><?php echo $state_name; ?> Absentee Ballots - How To</button>
              <div id='collapsible-8' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('early-voting-begins');?>
                <?php echo types_render_field('early-voting-ends');?></div>
            </li>
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-9'><?php echo $state_name; ?> Voter ID Requirements</button>
              <div id='collapsible-9' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('voter-id-requirements-in-person');?></div>
            </li>
            <li>
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-10'><?php echo $state_name; ?> Election Official Contact Info</button>
              <div id='collapsible-10' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('local-election-official');?></div>
            </li>
            
            <?php $form_posts = types_child_posts("form");
            if ( $form_posts !== null && $form_posts !== "undefined") { ?>
            <li>
              
              <button class='usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><?php echo $state_name; ?> Election Forms</button>
              <div id='collapsible-11' aria-hidden='true' class='answer usa-accordion-content'>
                <ul>
                  <?php 
                  foreach ($form_posts as $form_post) {
                    $form_title = $form_post->post_title;
                    $form_url = $form_post->fields['form-file'];
                    
                    echo '<li><a href="'.$form_url.'">'.$form_title.'</a></li>';
                  } ?>
                </ul>
              </div>
            </li>
            <?php }; ?>
          </ul>
        </div><!--.usa-accordion-->

      </div><!--.container-->

    </section><!--.faqs-->
    <?php endwhile; 
    wp_reset_postdata();
  endif; ?>