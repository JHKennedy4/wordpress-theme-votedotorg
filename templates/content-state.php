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


    <section class="register-tool">

      <div class="container">
        <iframe src="https://ldv-apollo-staging.herokuapp.com/" width="100%" height="600" marginheight="0" frameborder="0"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->

    <section class="voter-registration-guide">
      <div class="container">
        <h2><?php echo $state_name;?> Voter Registration Guide</h2>
        <div class="updated">Last updated January 16, 2016</div>

        <h3>Voter Registration Deadlines</h3>

        <div class="table">
          <div class="header">Registration Deadline</div>
          <div class="cell">{Registration Deadlines}</div>
        </div>

        <div class="table">
          <div class="header">Election Day Registration</div>
          <div class="cell">{Election Day Registration Information} </div>
          <div class="clear-fix tablet"></div>
        </div><!--.table-->
        
        <h3>Voter Registration Rules</h3>

        <p>Donec sed odio dui vestibulum id ligula porta felis euismod semper:</p>

        <ul>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
          <li>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>

        </ul>
        <h3>How to Register to Vote</h3>
        <p>Donec sed odio dui vestibulum id ligula porta felis euismod semper:</p>

        <ul>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</li>
          <li>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>
          <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
          <li>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>

        </ul>

        <h3>Additional Information</h3>
        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>

        <div class="table">
          <div class="header">State Election Website</div>
          <div class="cell"><a href="http://www.sos.state.al.us/Elections/Default.aspx" alt="Alabama State Election Website">Alabama State Election Website</a></div>
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