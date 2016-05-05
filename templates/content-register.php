<?php
$iframeurl= types_render_field("iframe-url", array('raw' => true));

global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];

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
    'posts_per_page' => 1

  ) );
      if ( $state_loop->have_posts() ) : while ( $state_loop->have_posts() ) : $state_loop->the_post();
      if ($state_name !== "") {
        $state_name = $post->post_title; ?>
        <h1>Register to Vote in <?php echo $state_name; ?></h1>
      <?php } else {  ?>
        <h1>Register to Vote</h1>
    <?php }
     ?>

  </div><!--.container-->
</section><!--.breadcrumbs-->

<section class="register-tool">
  <div class="container">
    <iframe id="register" class="register" src="<?php if ($iframeurl !== "") { echo $iframeurl; } else { echo 'https://register.vote.org'; }?>/<?php if ($state_name !== "") { echo '?state='.urlencode($state_name); }?>" width="100%" height="600" marginheight="0" frameborder="0" scrollable="no" sandbox="allow-same-origin allow-scripts allow-forms allow-top-navigation allow-popups"></iframe>
  </div><!--.container-->

</section><!--.register-tool-->


<!--hide section when there isn't a state selected-->
<section class="voter-registration-guide <?php if($state_name == "") {echo 'hidden';}?>">
  <div class="container">
    <h2><?php the_title(); ?> voter registration guide</h2>

    <div class="updated">Last updated <?php the_modified_date('F j, Y');?></div>

    <h3><?php the_title(); ?> voter registration deadlines</h3>
    <ul>
      <li><strong>In Person:</strong> <?php echo types_render_field("voter-registration-deadline-in-person");?></li>
      <li><strong>By Mail:</strong> <?php echo types_render_field("voter-registration-deadline-by-mail");?></li>
      <li><strong>Online:</strong> <?php echo types_render_field("voter-registration-deadline-online");?></li>

    </ul>


    <?php $election_day_instructions = types_render_field("election-day-registration-instructions");

     if ($election_day_instructions !== "" && $election_day_instructions !== "NA" && $election_day_instructions !== "N/A" && $election_day_instructions !== "?????") { ?>
    <h3>Election day registration instructions</h3>
      <?php echo $election_day_instructions;?>

    <?php }  ?>

    <h3><?php the_title(); ?> voter registration rules</h3>

    <?php echo types_render_field("voter-registration-rules");?>
    <h3><?php the_title(); ?> voter registration directions</h3>

    <?php echo types_render_field("how-to-register-to-vote");?>


    <?php get_template_part('templates/content-links'); ?>




  </div><!--.container-->

</section><!--.voter-registration-guide -->
<?php endwhile;
    wp_reset_postdata();
  endif; ?>

    <section class="faqs <?php if($state_name == "") {echo 'hidden';}?>">
      <div class="container">
        <h2>Frequently asked questions</h2>

        <div class="usa-accordion">
          <ul class="usa-unstyled-list">
            <?php get_helpScout_articles_by_category($state, $state_name); ?>

          </ul><!--.usa-unstyled-list-->
        </div><!--.faq-box- .usa-accordion-->
      </div><!--.container-->

    </section><!--.faqs-->
