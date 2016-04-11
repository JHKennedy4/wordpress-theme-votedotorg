     <section class="table">
      <div class="container">
       <h1>Voter Registration Deadlines</h1>
       <?php the_content();?>

      <table class="states-chart responsive-chart three-columns persist-area">
        <thead class="persist-header">
          <tr>
            <th class="state">State</th>
            <th>Voter Registration Deadlines</th>
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
            <td class="state-name">
              <p><a href="https://register.vote.org/<?php if ($state_name !== "") { echo '?state='.urlencode($state_name); }?>"><?php echo $state_name; ?></a></p>
            </td>
            <td data-title="Voter Registration Deadlines">
              <ul>
                <li><strong>In-Person:</strong> <?php echo types_render_field('voter-registration-deadline-in-person');?></li>
                <li><strong>By Mail:</strong> <?php echo types_render_field('voter-registration-deadline-by-mail');?></li>
                <li><strong>Online:</strong> <?php echo types_render_field('voter-registration-deadline-online');?></li>
              </ul>
            </td>
            
            <td data-title="Election Day Registration Instructions">
              <p>
                <?php echo types_render_field('election-day-registration-instructions');?>
              </p>
              
            </td>

          </tr>
          <?php endwhile; 
          wp_reset_postdata();
          endif; ?>
        </tbody>
      </table>

      </div><!--.container-->
    </section>



