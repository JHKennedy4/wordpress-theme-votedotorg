<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];
  
} else {
  $state = "";
  $state_name = "";
}

?>
<section class="register-tool">

      <div class="container">
        <iframe src="https://register2.rockthevote.com/registrants/map/?source=iframe&partner=32936" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->


<?php 

//looping through States to find one with the matching state slug
$state_loop = new WP_Query( array( 
  'post_type' => 'state',
  'name'      => $state,
  'posts_per_page' => 50
) ); 
    if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 

    $state_name = $post->post_title; ?>
   

    <section class="voter-registration-guide">
      <div class="container">
        <h1><?php the_title(); ?> Absentee Ballot Guide</h1>
        
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
        <?php echo types_render_field("test")."test";?>
        <p>To get your absentee ballot in <?php the_title(); ?> you must:</p>
        <ol>
          <li>Use our Absentee Ballot Tool to prepare your application.</li>
          <li>Sign and date the form. This is very important!</li>
          <li>Return your completed application to your Local Election Official as soon as possible.  We'll provide the mailing address for you.</li>
          <li>All Local Election Officials will accept mailed or hand-delivered forms. If it's close to the deadline, call and see if your Local Election Official will let you fax or email the application.</li>
          <li>Make sure your application is received by the deadline.  Your application must actually arrive by this time -- simply being postmarked by the deadline is insufficient.</li>
          <li>Please contact your Local Election Official if you have any further questions about the exact process.</li>
        </ol>


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

        <ul>
          <li>Helpful Voting Links -- <?php $state_name; ?></li>
          <li>State Elections Website</li>
          <li>Local Election Officials - these are the best people to contact if you hae any questions at all about voting in your state.</li>
          <li>Learn more about absentee voting</li>
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
