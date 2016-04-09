    <section>
      <div class="container">
       <h1>Early Voting Calendar</h1>
       <?php the_content();?>

        <table class="states-chart responsive-chart four-columns persist-area">
         <thead class="persist-header">
          <tr>
           <th class="state">State</th>
           <th>Early in-person voting begins</th>
           <th>Early in-person voting ends</th>
           <th>More Information</th>
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
              <td class="state-name"><p><a href="/<?php echo $state_slug; ?>"><?php echo $state_name; ?></a></p>
              </td>
              <td data-title="Early Voting Begins"><?php echo types_render_field('early-voting-begins');?>
              </td>
              <td data-title="Early Voting Ends"><?php echo types_render_field('early-voting-ends');?>
              </td>
              <td data-title="More Information">
                <p>Contact your <a href="https://www.overseasvotefoundation.org/overseas/eod.htm">Local Election Official</a> to learn more about early voting in your area.</p>
              </td>
            </tr>
            <?php endwhile; 
              wp_reset_postdata();
            endif; ?>
           </tbody>
        </table>
        <div class="sources">
         <h3>Sources</h3>
         <ul>
          <?php if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post(); 
            $state_name = $post->post_title; 
            $state_slug = $post->post_name;
            $source_url = types_render_field('early-voting-info-url', array('raw' => true)); 
             //if there is no early voting info url defined then display source
            if ($source_url !== "" && $source_url !== "NA") { ?>
            <li><?php echo $state_name.': <a href="'.$source_url.'">'.$source_url.'</a>';?></li>

            <?php } 
                 endwhile; 
                wp_reset_postdata();
               endif; ?>
         </ul>
          
        </div><!--.sources-->
      </div><!--.container-->

    </section>



