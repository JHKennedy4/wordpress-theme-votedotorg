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
    'posts_per_page' => 50
  ) ); 
      if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
      $state_name = $post->post_title; ?>
    <h1>Register to Vote in <?php echo $state_name; ?></h1>
  </div><!--.container-->
</section><!--.breadcrumbs-->

<section class="register-tool">

      <div class="container">
        <iframe class="register" src="https://ldv-apollo-staging.herokuapp.com/" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->

   

    <section class="voter-registration-guide">
      <div class="container">
        <h2><?php the_title(); ?> Voter Registration Guide</h2>
        
        <div class="updated">Last updated <?php the_modified_date('F j, Y');?></div>

        <h3><?php the_title(); ?> Voter Registration Deadlines</h3>

        <div class="table">
          <div class="header">Voter Registration Deadline - In Person</div>
          <div class="cell"><?php echo types_render_field("voter-registration-deadline-in-person");?></div>
          <div class="clear-fix tablet"></div>
        </div>
        <div class="table">
          <div class="header">Voter Registration Deadline - By Mail</div>
          <div class="cell"><?php echo types_render_field("voter-registration-deadline-by-mail");?></div>
          <div class="clear-fix tablet"></div>
        </div>
        <div class="table">
          <div class="header">Voter Registration Deadline - Online</div>
          <div class="cell"><?php echo types_render_field("voter-registration-deadline-online");?></div>
          <div class="clear-fix tablet"></div>
        </div>

        <?php $election_day_instructions = types_render_field("election-day-registration-instructions", array('raw' => true));

         if ($election_day_instructions !== "" && $election_day_instructions !== "NA") { ?>
        
        <div class="table">
          <div class="header">Election Day Registration Instructions</div>
          <div class="cell"><?php echo $election_day_instructions;?></div>
          <div class="clear-fix tablet"></div>
        </div><!--.table-->
        <?php }  ?>

        <h3><?php the_title(); ?> Voter Registration Rules</h3>

        <?php echo types_render_field("voter-registration-rules");?>
        <h3><?php the_title(); ?> Voter Registration Directions</h3>

        <?php echo types_render_field("how-to-register-to-vote");?>
        

        <?php get_template_part('templates/content-links'); ?>


        </ul>
      
      </div><!--.container-->

    </section><!--.voter-registration-guide -->
<?php endwhile; 
    wp_reset_postdata();
  endif; ?>

    <section class="faqs">
      <div class="container">
        <h2>Frequently Asked Questions</h2>

        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>
            
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->
      </div><!--.container-->

    </section><!--.faqs-->
