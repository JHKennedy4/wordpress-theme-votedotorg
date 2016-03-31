<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

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
        'posts_per_page' => 1
      ) ); 
          if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
            if ($state_name !== "") {
              $state_name = $post->post_title; ?>
              <h1><?php echo $state_name; ?> Election Center</h1>
            <?php } else {  ?> 
              <h1>Election Center</h1>
          <?php }
           ?>
      </div><!--.container-->
    </section><!--.breadcrumbs-->

    <?php get_template_part('templates/content-hero'); ?>

    
    <section class="faqs <?php if ($state == "") {echo 'hidden';} ?>">
      <div class="container">
        <h2>Election information</h2>

        <div class="usa-accordion">
          <ul class="usa-unstyled-list">

          <!--TODO: if statement-->
          <?php $registration_instructions = types_render_field("election-day-registration-instructions", array('raw' => true));
            if ( $registration_instructions !== null && $registration_instructions !== "undefined" && $registration_instructions !=="?????") { ?>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-5'><?php echo $state_name; ?> Election day registration instructions</button>
              <div id='collapsible-5' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('election-day-registration-instructions');?></div>
            </li>
            <?php }  ?>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-6'>How to register to vote in <?php echo $state_name; ?></button>
              <div id='collapsible-6' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('how-to-register-to-vote');?></div>
            </li>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-7'>How to get an absentee ballot in <?php echo $state_name; ?></button>
              <div id='collapsible-7' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('how-to-get-your-absentee-ballot');?></div>
            </li>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-8'>How to to register for early voting in <?php echo $state_name; ?></button>
              <div id='collapsible-8' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('early-voting-begins');?>
                <?php echo types_render_field('early-voting-ends');?></div>
            </li>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-9'>What are the voter ID requirements in <?php echo $state_name; ?></button>
              <div id='collapsible-9' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('voter-id-requirements-in-person');?></div>
            </li>
            <li>
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-10'><?php echo $state_name; ?> election official contact info</button>
              <div id='collapsible-10' aria-hidden='true' class='answer usa-accordion-content'><?php echo types_render_field('local-election-official');?></div>
            </li>
            
            <?php $form_posts = types_child_posts("forms", array('raw' => true));
            echo $form_posts;
            if ( $form_posts !== null && $form_posts !== "undefined") { ?>
            <li>
              
              <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><?php echo $state_name; ?> Election Forms</button>
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