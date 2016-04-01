    <section>
      <div class="container">
        <h1><?php the_title();?></h1>
        
        <div class="usa-alert usa-alert-warning">
          <div class="usa-alert-body">
            <p class="usa-alert-text">
              Military and Overseas voters should visit the <a href="https://www.overseasvotefoundation.org/">Overseas Vote Foundation.</a> Long Distance Voter's information should only be used by voters with US mailing addresses.
           </p>
          </div>
        </div><!--.usa-alert-warning-->

        <div class="intro">
          <?php the_content();?>
          <a class="usa-button usa-button-secondary" href="//register.vote.org/">Register to vote</a>
        </div><!--.intro-->
       
       <?php //looping through States to output early voting deadlines
         $state_loop = new WP_Query( array( 
           'post_type' => 'state',
           'posts_per_page' => 50,
           'orderby' => 'post_name',
           'order' => 'asc'

         ) ); 
         if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
          $state_name = $post->post_title; 
          $state_slug = $post->post_name;?>

        <div class="state">
          <h2><?php echo $state_name; ?></h2>
            <div class="text"><?php echo types_render_field('voter-registration-rules');?>
            </div>
            <a class="usa-button usa-button-outline" href="//register.vote.org/<?php echo '?state='.urlencode($state_name); ?>">Register to vote</a>
        </div><!--.state-->

        <?php endwhile; 
          wp_reset_postdata();
        endif; ?>
        
      </div><!--.container-->

    </section>



