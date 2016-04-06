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

   <!--All the Meta Tags -->
   <title> <?php $title = get_the_title(); if (!empty($title)) { echo $title." | "; }  ?>Vote.org - Everything you need to vote</title>

   <meta property="og:title" content="<?php echo $title; ?> | Vote.org - Everything you need to vote">
   <meta name="description" content="<?php if(get_post_meta($post->ID, "metadesc", true) !='' ) echo get_post_meta($post->ID, "metadesc", true); else bloginfo('description');?>" />

   <meta name="description" content="<?php echo $meta_description; ?>"/>
   <meta property="og:url" content="<?php echo home_url();?>">
   <meta property="og:type" content="article">
   <meta property="og:site_name" content="Vote.org">
   <meta property="og:image" content="<?php $template_dir = get_template_directory_uri(); echo $template_dir.'/dist/images/og-default.jpg';?>">

   <meta name="twitter:site" content="@votedotorg">
   <meta name="twitter:url" content="<?php echo home_url();?>">
   <meta name="twitter:image" content="<?php $template_dir = get_template_directory_uri(); echo $template_dir.'/dist/images/og-default.jpg';?>">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:description" content="Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.">


   <!--[if lt IE 9]>    
   <script src="./js/html5shiv.js"></script>
   <![endif]-->
  <?php wp_head(); ?>
  
</head>
