     <section class="table">
      <div class="container">
       <h1>Where Do I Vote?</h1>
       <?php the_content();?>

      <table class="states-chart responsive-chart two-columns persist-area">
        <thead class="persist-header">
          <tr>
            <th class="state">State</th>
            <th>Polling place locator</th>
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
              <p><?php echo $state_name; ?></p>
            </td>
            <td data-title="Polling place locator:">
              <p><a href="<?php echo types_render_field('polling-place-locator', array('raw' => true)); ?>" target="_blank"><?php echo $state_name; ?> polling place locator</a></p>
            </td>

          </tr>
          <?php endwhile; 
          wp_reset_postdata();
          endif; ?>
        </tbody>
      </table>

      </div><!--.container-->
    </section>
