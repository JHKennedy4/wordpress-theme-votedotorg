

<head>

   <meta charset="utf-8">
   <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/favicon/favicon.ico">

   <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/styles/uswds.css">
   <!--All the Meta Tags -->
   <title> <?php $title = get_the_title(); if (!empty($title)) { echo $title." | "; }  ?>Vote.org - Everything you need to vote</title>

   <meta property="og:title" content="<?php wp_title(); ?> | Vote.org - Everything you need to vote">
   <meta name="description" content="Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient."/>
   <meta property="og:url" content="<?php echo home_url();?>">
   <meta property="og:type" content="article">
   <meta property="og:site_name" content="Vote.org">
   <meta property="og:image" content="<?php $template_dir = get_template_directory_uri(); echo $template_dir.'/dist/images/og-default.jpg';?>">

   <meta name="twitter:site" content="@votedotorg">
   <meta name="twitter:url" content="<?php echo home_url();?>">
   <meta name="twitter:card" content="summary_large_image">


   <!--[if lt IE 9]>    
   <script src="./js/html5shiv.js"></script>
   <![endif]-->
  <?php wp_head(); ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/uswds.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.3/iframeResizer.min.js" ></script>
</head>
