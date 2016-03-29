     <section>
      <div class="container">
       <h1>Voter Registration Deadlines</h1>
       <?php the_content();?>

      <table class="states-chart responsive-chart five-columns">
        <thead>
          <tr>
            <th class="state">State</th>
            <th>Voter Registration Deadline - In Person</th>
            <th>Voter Registration Deadline - By Mail</th>
            <th>Voter Registration Deadline - Online</th>
            <th>Election Day Registration</th>
          </tr>
        </thead>
        <tbody>
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
          <tr class="state-row" valign="top">
            <td class="state-name"><a href="/<?php echo $state_slug; ?>"><?php echo $state_name; ?></a></td>
            <td data-title="Voter Registration Deadline In-Person"><?php echo types_render_field('voter-registration-deadline-in-person');?></td>
            <td data-title="Voter Registration Deadline By-Mail"><?php echo types_render_field('voter-registration-deadline-by-mail');?></td>
            <td data-title="Voter Registration Deadline Online"><?php echo types_render_field('voter-registration-deadline-online');?></td>
            <td data-title="Election Day Registration Instructions"><?php echo types_render_field('election-day-registration-instructions');?></td>

          </tr>
          <?php endwhile; 
          wp_reset_postdata();
          endif; ?>
        </tbody>
      </table>

      </div><!--.container-->
    </section>



