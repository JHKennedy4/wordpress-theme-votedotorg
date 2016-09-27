<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {

  $state = $wp_query->query_vars['state_name'];
  $state_loop = new WP_Query( array( 
    'post_type' => 'state',
    'name'      => $state,
    'posts_per_page' => 1
  ) ); 
  if ( $state_loop->have_posts() )  {
    while ( $state_loop->have_posts() ) {
      $state_loop->the_post();
      $state_name = $post->post_title;
    }    
  }

 }
  else {
    $state = ""; $state_name = "";

  } 

?>

<head>

   <meta charset="utf-8">
   <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/favicon.ico">

   <!--[if lt IE 9]>    
   <script src="<?php echo get_template_directory_uri(); ?>/dist/scripts/html5shiv.js"></script><![endif]-->
   
   
   <!--[if lt IE 10]> 
   <script src="<?php echo get_template_directory_uri(); ?>/dist/scripts/placeholders.min.js"></script>
   <![endif]-->
  <?php wp_head(); ?>

  <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

   ga('create', 'UA-74219462-1', 'auto');
   ga('require', 'displayfeatures');
   ga('send', 'pageview');

  </script>
  
  <script>
  $(function() { var search = window.location.search; 
  $("#register").attr("src", $("#register").attr("src")+search); });
   </script>
  
</head>
