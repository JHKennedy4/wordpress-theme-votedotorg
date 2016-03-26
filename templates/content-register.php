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

        OPTIONAL if statement
        <div class="table">
          <div class="header">Election Day Registration Instructions</div>
          <div class="cell"><?php echo types_render_field("election-day-registration-instructions");?></div>
          <div class="clear-fix tablet"></div>
        </div><!--.table-->
        
        <h3><?php the_title(); ?> Voter Registration Rules</h3>

        <?php echo types_render_field("voter-registration-rules");?>
        

        <h3>How to Register to Vote</h3>
        <?php echo types_render_field("how-to-register-to-vote");?>

        <h3>Helpful Voting Links -- <?php $state_name; ?></h3>
        OFFSITE URLS
        <ul>
          <li>State Elections Website</li>
          <li>Local Election Officials - these are the best people to contact if you have any questions at all about voting in your state.</li>
          <li>Learn more about absentee voting</li>  http://
          <li>Learn more about early voting</li>
          <li>Learn more about voter ID</li>
          <li>Check your registration status</li>
          <li>Find your polling place</li>
          <li>Track your absentee ballot</li>
        </ul>
        
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
