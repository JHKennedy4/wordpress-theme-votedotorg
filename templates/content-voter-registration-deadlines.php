 <section>
      <div class="container">
       <h1>Voter Registration Deadlines</h1>
       <?php the_content();?>

        <table class="deadlines sticky-enabled sticky-table">
         <thead>
          <tr>
           <th style="width: 100px;">State</th>
           <th style="width: 225px;">Voter Registration Deadline - In Person</th>
           <th style="width: 225px;">Voter Registration Deadline - By Mail</th>
           <th style="width: 225px;">Voter Registration Deadline - Online</th>
           <th style="width: 225px;">Election Day Registration</th>
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
            <tr valign="top">
            <td><a href="/<?php echo $state_slug; ?>"><?php echo $state_name; ?></a></td>
            <td><?php echo types_render_field('voter-registration-deadline-in-person');?></td>
            <td><?php echo types_render_field('voter-registration-deadline-by-mail');?></td>
            <td><?php echo types_render_field('voter-registration-deadline-online');?></td>
            <td><?php echo types_render_field('election-day-registration-instructions');?></td>

            </tr>
            <?php endwhile; 
              wp_reset_postdata();
            endif; ?>
           </tbody>
        </table>
        
      </div><!--.container-->
</section>



