    <section class="breadcrumbs">
      <div class="container">
       <h1><?php the_title();?></h1>
      </div><!--.container-->
    </section><!--.breadcrumbs-->
    <section class="register-tool">

      <div class="container">
        <iframe src="<?php echo types_render_field("iframe-url", array('raw' => true));?>" width="100%" height="1000" marginheight="0" frameborder="0" id="frame1" scrollable="no"></iframe>
      </div><!--.container-->

    </section><!--.register-tool-->


    <section class="table">
     <div class="container">
      <?php the_content();?>

       <table class="states-chart responsive-chart persist-area">
        <thead class="persist-header">
         <tr>
          <th class="state">State</th>
          <th>Official state voter lookup</th>
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
             <td data-title="Official state voter lookup: ">
               <p><a href="<?php echo types_render_field('online-voter-lookup-tool-url', array('raw'=>true));?>">Am I registered to vote in <?php echo $state_name; ?>?</a></p>
             </td>
             

           </tr>
           <?php endwhile; 
             wp_reset_postdata();
           endif; ?>
          </tbody>
       </table>
       
     </div><!--.container-->
    </section>




