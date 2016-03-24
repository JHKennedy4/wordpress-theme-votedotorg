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
    <h1>Register to Vote > <?php echo $state_name; ?></h1>
  </div><!--.container-->
</section><!--.breadcrumbs-->

<section class="register-tool">

      <div class="container">
        <iframe class="register" src="https://register2.rockthevote.com/registrants/map/?source=iframe&partner=32936" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->

   

    <section class="voter-registration-guide">
      <div class="container">
        <h1><?php the_title(); ?> Voter Registration Guide</h1>
        
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
        <div class="table">
          <div class="header">Election Day Registration Instructions</div>
          <div class="cell"></div>
          <div class="clear-fix tablet"></div>
        </div><!--.table-->
        
        <h3>Voter Registration Rules</h3>

        <p>To register to vote in <?php the_title(); ?> you must:</p>
        <?php echo types_render_field("voter-registration-rules");?>
        

        
        <h3>How to Register to Vote</h3>
        <?php echo types_render_field("how-to-register-to-vote");?>

        <h3>Additional Information</h3>
        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

        <div class="table">
          <div class="header">State Election Website</div>
          <div class="cell"><a href="<?php echo types_render_field('state-election-website', array('raw' => true));?>" alt="<?php the_title();?> State Election Website"><?php the_title(); ?> State Election Website</a></div>
        </div><!--.table-->

        <div class="table">
          <div class="header">Local Election Officials</div>
          <div class="cell">
              <p>Your Local Election is the best person to contact if you have voting-related questions. They'll be able to provide up to date information on rules and deadlines.</p>
          </div><!--.cell-->
        </div><!--.table-->
      </div><!--.container-->

    </section><!--.voter-registration-guide -->
<?php endwhile; 
    wp_reset_postdata();
  endif; ?>

    <section class="faqs">
      <div class="container">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-box usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>
            
          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->
      </div><!--.container-->

    </section><!--.faqs-->
