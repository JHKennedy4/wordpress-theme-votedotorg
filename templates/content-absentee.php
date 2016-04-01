<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];
  $meta_description = "It takes 2 minutes to get your".$state_name."absentee ballot. Get started now";
  $meta_title = $state_name." Absentee Ballots | Vote.org - The Absentee Ballot Experts";
  $meta_url = site_url().'/absentee-ballot/'.$state;
  $og_image = get_template_directory_uri().'/dist/images/og-absentee.jpg';
  
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
        <iframe id="absentee" class="register" src="https://absentee.vote.org" width="100%" height="600" marginheight="0" frameborder="0" scrollable="no"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->
   

    <section class="voter-registration-guide <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">
        <h2><?php the_title(); ?> absentee ballot guide</h2>
        
        <div class="updated">Last updated <?php the_modified_date('F j, Y');?></div>
        
        <?php $vbm_warnings = types_render_field("absentee-ballot-warnings");
          if ($vbm_warnings !== "") { ?>
        <div class="usa-alert usa-alert-warning">
          <div class="usa-alert-body">
            <h3 class="usa-alert-heading">Warnings</h3>
            <p class="usa-alert-text">
              <?php echo $vbm_warnings; ?>
           </p>
          </div>
        </div><!--.usa-alert-warning-->

          <?php } ?>

        <h3><?php the_title(); ?> absentee ballot deadlines</h3>

        <div class="table">
          <div class="header">Absentee ballot application deadline</div>
          <div class="cell"><?php echo types_render_field("absentee-ballot-application-deadline");?></div>
          <div class="clear-fix tablet"></div>
        </div>
        <div class="table">
          <div class="header">Voted ballots are due</div>
          <div class="cell"><?php echo types_render_field("voted-absentee-ballot-deadline");?></div>
          <div class="clear-fix tablet"></div>
        </div>

        <h3><?php the_title(); ?> absentee ballot rules</h3>

        <?php echo types_render_field("vbm-eligibilty");?>


        <h3><?php the_title(); ?> absentee ballot directions</h3>

        <?php echo types_render_field("how-to-get-your-absentee-ballot");?>


        <?php 
        $instructions = types_render_field("voted-absentee-ballot-instructions");
        if ($instructions !== "") { ?>
        <h3>Once you receive your ballot...</h3>
          <?php echo $instructions;?>
        <?php } ?>
        
        <?php $permanent_vbm_instructions = types_render_field("permanent-absentee-ballot-instructions"); ?>
        
        <?php if ($permanent_vbm_instructions !== "") { ?>
        <h3>Permanent absentee ballots</h3>

        <?php echo $permanent_vbm_instructions;?>
        <?php } ?>

        <?php $emergency_vbm_instructions = types_render_field("emergency-vbm-eligibilty");
        if ($emergency_vbm_instructions !=="") { ?>
        <h3>Emergency absentee ballots</h3>

        <?php echo $emergency_vbm_instructions;?>
        <?php } ?>
        
        
        <?php get_template_part('templates/content-links'); ?>


      </div><!--.container-->

    </section><!--.voter-registration-guide -->
<?php endwhile; 
    wp_reset_postdata();
  endif; ?>

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
