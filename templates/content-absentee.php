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
              <h1><?php echo $state_name; ?> Absentee Ballot</h1>
            <?php } else {  ?> 
              <h1>Absentee Ballot</h1>
          <?php }
           ?>
      </div><!--.container-->
    </section><!--.breadcrumbs-->

    <section class="register-tool">

      <div class="container">
        <iframe class="register" src="https://ldv-apollo-staging.herokuapp.com/" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->
   

    <section class="voter-registration-guide <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">
        <h2><?php the_title(); ?> Absentee Ballot Guide</h2>
        
        <div class="updated">Last updated <?php the_modified_date('F j, Y');?></div>
        
        <?php $vbm_warnings = types_render_field("absentee-ballot-warnings");
          if ($vbm_warnings !== "") { ?>

        <h3 class="warning">Warnings</h3>
        <div class="warning"><?php echo $vbm_warnings; ?>
        </div>
          <?php } ?>

        <h3><?php the_title(); ?> Absentee Ballot Deadlines</h3>

        <div class="table">
          <div class="header">VBM Application Deadline</div>
          <div class="cell"><?php echo types_render_field("absentee-ballot-application-deadline");?></div>
          <div class="clear-fix tablet"></div>
        </div>
        <div class="table">
          <div class="header">Voted Absentee Ballot Deadline</div>
          <div class="cell"><?php echo types_render_field("voted-absentee-ballot-deadline");?></div>
          <div class="clear-fix tablet"></div>
        </div>

        <h3><?php the_title(); ?> Absentee Ballot Rules</h3>

        <?php echo types_render_field("vbm-eligibilty");?>


        <h3><?php the_title(); ?> Absentee Ballot Directions</h3>

        <?php echo types_render_field("how-to-get-your-absentee-ballot");?>


        <?php 
        $instructions = types_render_field("voted-absentee-ballot-instructions");
        if ($instructions !== "") { ?>
        <h3>Once you receive your ballot...</h3>
          <?php echo $instructions;?>
        <?php } ?>
        
        <?php $permanent_vbm_instructions = types_render_field("permanent-absentee-ballot-instructions"); ?>
        
        <?php if ($permanent_vbm_instructions !== "") { ?>
        <h3>Permanent Absentee Ballots</h3>

        <?php echo $permanent_vbm_instructions;?>
        <?php } ?>

        <?php $emergency_vbm_instructions = types_render_field("emergency-vbm-eligibilty");
        if ($emergency_vbm_instructions !=="") { ?>
        <h3>Emergency Absentee Ballots</h3>

        <?php echo $emergency_vbm_instructions;?>
        <?php } ?>
        
        <h3>How to Register to Vote</h3>
        <?php echo types_render_field("how-to-register-to-vote");?>
        
        <?php get_template_part('templates/content-links'); ?>


      </div><!--.container-->

    </section><!--.voter-registration-guide -->
<?php endwhile; 
    wp_reset_postdata();
  endif; ?>

    <section class="faqs <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">
        <h2>Frequently Asked Questions</h2>


        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>
            
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->

      </div><!--.container-->

    </section><!--.faqs-->
