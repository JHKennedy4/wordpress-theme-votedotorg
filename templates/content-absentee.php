<?php
$iframeurl= types_render_field("iframe-url", array('raw' => true));

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
      if ( $state_loop->have_posts() ) : 
        while ( $state_loop->have_posts() ) : 
          $state_loop->the_post(); 
          if ($state_name !== "") {
            $state_name = $post->post_title; ?>
            <h1><?php echo $state_name; ?> Absentee Ballot</h1>
          <?php } else {  ?> 
            <h1>Absentee Ballot</h1>
        <?php } endwhile; 
      else :  $state = ""; ?> 
        <h1>Absentee Ballot</h1>
      <?php endif;?>

      </div><!--.container-->
    </section><!--.breadcrumbs-->

    <section class="register-tool">

      <div class="container">
        <iframe id="absentee" class="register" src="<?php if ($iframeurl !== "") { echo $iframeurl; } else { echo 'https://absentee.vote.org'; }?>/<?php if ($state !== "") { echo '?state='.urlencode($state_name); }?>" width="100%" height="600" marginheight="0" frameborder="0" scrollable="no"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->
   
    
    <?php if ( $state_loop->have_posts() ) : 
            while ( $state_loop->have_posts() ) : 
              $state_loop->the_post();
              if($state_name !== "") { ?>
      <!--hide voter absentee ballot section when there isn't a state selected-->
    <section class="voter-registration-guide">
      <div class="container">
        <h2><?php the_title(); ?> absentee ballot guide</h2>
        
        <div class="updated-date">Last updated on <?php the_date('F j, Y'); ?></div><!--updated-date-->
        
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

        <h2><?php the_title(); ?> absentee ballot deadlines</h2>
        <ul>
          <li><strong>Absentee ballot application deadlines:</strong> <?php echo types_render_field("absentee-ballot-application-deadline", array('raw'=>true));?></li>
          <li><strong>Voted ballots are due:</strong> <?php echo types_render_field("voted-absentee-ballot-deadline",array('raw'=>true));?></li>
        </ul>
      
        <h2><?php the_title(); ?> absentee ballot rules</h2>
        <?php echo types_render_field("vbm-eligibilty");?>


        <h2><?php the_title(); ?> absentee ballot directions</h2>

        <?php echo types_render_field("how-to-get-your-absentee-ballot");?>
        <?php 
        $instructions = types_render_field("voted-absentee-ballot-instructions");
        if ($instructions !== "") { ?>
        <h2>Once you receive your ballot...</h2>
          <?php echo $instructions;?>
        <?php } ?>
        
        <?php $permanent_vbm_instructions = types_render_field("permanent-absentee-ballot-instructions"); ?>
        <?php if ($permanent_vbm_instructions !== "") { ?>
        <h2>Permanent absentee ballots</h2>

        <?php echo $permanent_vbm_instructions;?>
        <?php } ?>

        <?php $emergency_vbm_instructions = types_render_field("emergency-vbm-eligibilty");
        if ($emergency_vbm_instructions !=="") { ?>
        <h2>Emergency absentee ballots</h2>
        <?php echo $emergency_vbm_instructions;?>
        <?php } ?>
        
        
        <?php get_template_part('templates/content-links'); ?>


      </div><!--.container-->

    </section><!--.voter-registration-guide -->

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

<?php if ( $state_loop->have_posts() ) : 
        while ( $state_loop->have_posts() ) : 
          $state_loop->the_post();
          if($state_name !== "") { ?>
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
<?php } endwhile; wp_reset_postdata(); endif;?>
