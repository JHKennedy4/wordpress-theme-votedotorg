    <section>
      <div class="container">
        <h1><?php the_title();?></h1>
        
        <?php the_content();?>
        <div class="usa-alert usa-alert-warning">
          <div class="usa-alert-body">
            <h3 class="usa-alert-heading">EXCEPTIONS TO THE VOTER ID REQUIREMENTS</h3>
            <p class="usa-alert-text">
              <ul>
                <li>Military and overseas voters who are vote by absentee ballot under the federal Uniformed and Overseas Citizen Absentee Voting Act&nbsp;(UOCAVA) are exempt from ALL voter ID requirements.</li>
                <li>Elderly and disabled voters are exempt from federal first-time voter ID requirements but might not be exempt from state voter ID laws.</li>
              </ul>
           </p>
          </div>
        </div><!--.usa-alert-warning-->
        <div class="usa-alert usa-alert-warning">
          <div class="usa-alert-body">
            <h3 class="usa-alert-heading"></h3>
            <p class="usa-alert-text">
              Voter ID is a pain in the neck and laws change frequently. We make every effort to keep this data up-to-date, but if you have any questions you should contact your&nbsp;<a href="https://www.overseasvotefoundation.org/overseas/eod.htm">Local Election Official</a>.
            </ul>
           </p>
          </div>
        </div><!--.usa-alert-warning-->

        <table class="states-chart responsive-chart persist-area">
         <thead class="persist-header">
          <tr>
           <th class="state">State</th>
           <th>In-Person Voter ID Laws</th>
           <th>Absentee Voter ID Laws</th>
           <th>Get Started</th>
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
              <td class="state-name"><p><a href="/<?php echo $state_slug; ?>"><?php echo $state_name; ?></a></p></td>
              <td data-title="Voter ID Requirements - In Person"><?php echo types_render_field('voter-id-requirements-in-person');?></td>
              <td data-title="Voter ID Requirements - Absentee"><?php echo types_render_field('voter-id-requirements-absentee');?></td>
              <td>
                <p><a href="//register.vote.org/<?php echo '?state='.urlencode($state_name); ?>">Register to vote </a></p>
                <p><a href="//absentee.vote.org/<?php echo '?state='.urlencode($state_name); ?>">Get your absentee ballot</a></p>
              </td>
            </tr>
            <?php endwhile; 
              wp_reset_postdata();
            endif; ?>
           </tbody>
        </table>
        <div class="sources">
         <h2>Resources and off-site links</h2>
         <ul>
           <li>The bulk of our in-person voter ID information comes from the&nbsp;<a href="http://www.ncsl.org/research/elections-and-campaigns/voter-id.aspx">National Conference of State Legislatures</a>, which is a fantastic resource.</li>
           <li>We contacted the Secretaries of State and/or Local Election Officials directly to gather the absentee voter ID information.</li>
         </ul>
          
        </div><!--.sources-->
      </div><!--.container-->

    </section>



