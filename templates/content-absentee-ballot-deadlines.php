     <section>
      <div class="container">
       <h1>Absentee Ballot Deadlines</h1>
       <?php the_content();?>

        <table class="states-chart responsive-chart three-columns">
         <thead>
          <tr>
           <th class="state">State</th>
           <th>Absentee Ballot Application Deadline</th>
           <th>Voted Absentee Ballot is Due</th>
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
              <td data-title="Absentee Ballot Application Deadline"><?php echo types_render_field('absentee-ballot-application-deadline');?></td>
              <td data-title="Voted Absentee Ballot Is Due:"><?php echo types_render_field('voted-absentee-ballot-deadline');?></td>

            </tr>
            <?php endwhile; 
              wp_reset_postdata();
            endif; ?>
           </tbody>
        </table>
        
      </div><!--.container-->
     </section>




