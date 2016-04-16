<?php

/**
 * add custom meta tags and title tags based on state names and pages 
 */
//


function hook_meta() {
  $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $path = parse_url($url)['path'];
  $pattern = '/^\/([a-z-]+)\//';
  preg_match($pattern, $path, $matches);
  
  if (isset($matches[1])) {
   $page_type = $matches[1];
  } else {
   $page_type = "";
  }
  
  $theme_uri = get_template_directory_uri();
  //get the state slug and post name
  global $post;
  //if state query variable is set then set the $state variable
  $state = get_query_var('state_name', null);

  //define $title for Register to Vote 
  if ($page_type == "register-to-vote" && $state == null ) {
    
    $title = "Register to Vote | Vote.org - The Voter Registration Experts";
    $description = "It takes 2 minutes to register to vote. Get started now.";
    $image = $theme_uri."/dist/images/og-register-to-vote.jpg";
  } 
  //define $title for Register to Vote State Specific Pages
  else if ($page_type == "register-to-vote" && $state !== "") {
    $state_name = $post->post_title;
    $title = "Register to Vote in $state_name | Vote.org - The Voter Registration Experts";
    $description = "It takes 2 minutes to register to vote in $state_name. Get started now.";
    $image = $theme_uri."/dist/images/og-register-to-vote.jpg";
  }
  //define $title for Absentee Ballot Pages with State Names
  else if ($page_type == "absentee-ballot" && $state == "" ) {
    $title = "Absentee Ballots | Vote.org - The Absentee Ballot Experts";
    $description = "It takes 2 minutes to get your absentee ballot. Get started now.";
    $image = $theme_uri."/dist/images/og-absentee.jpg";
  }
    //define $title for Absentee Ballot State Specific Pages

  else if ($page_type == "absentee-ballot" && $state !== "") {
    $state_name = $post->post_title;
    $title = "$state_name Absentee Ballots | Vote.org - The Absentee Ballot Experts";
    $description = "It takes 2 minutes to get your $state_name absentee ballot. Get started now.";
    $image = $theme_uri."/dist/images/og-absentee.jpg";
  } 
  //define $title for Election Center Pages
  else if ($page_type == "state" && $state == "" ) {
    $title = "Election Center | Vote.org";
    $description = "Everything you need to vote: register to vote, check your registration status, get your absentee ballot.";
    $image = $theme_uri."/dist/images/og-default.jpg";
  }
  //define $title for Election Center Pages with State Names
  else if ($page_type == "state" && $state !== "" ) {
    $state_name = $post->post_title;
    $title = "$state_name Election Center | Vote.org";
    $description = "Everything you need to vote in $state_name: register to vote, check your registration status, get your absentee ballot.";
    $image = $theme_uri."/dist/images/og-default.jpg";
  }
  //homepage  meta tags
  else if ( is_home() || is_front_page() ) {
    $title = "Vote.org - Everything you need to vote";
    $description = "Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.";
    $image = $theme_uri."/dist/images/og-default.jpg";
  } 
  else if ( is_404() ) {
    $title = "Vote.org - Everything you need to vote";
    $description = "404 Erro Page Not Found | Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.";
    $image = $theme_uri."/dist/images/og-default.jpg";

  } else if ( is_search() ) {
    $query = get_search_query();
    $title = "Search Results for $query | Vote.org - Everything you need to vote";
    $description = "Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.";
    $image = $theme_uri."/dist/images/og-default.jpg";
  }
  else {
    //all other pages on site are using the defaul description and image. Adding post title to the title tag.
    $title = $post->post_title." | Vote.org - Everything you need to vote";
    //check to see if a custom meta description is set on the post, if so display that, if not display the default language
    $description = get_post_meta($post->ID, "wpcf-meta-description", true);
    if (empty($description)) {
      $description = "Vote.org knows that Americans want to vote, and that there are millions of Americans who want to vote -- and who will vote consistently -- as voting becomes easier and more convenient.";
    }
    //check to see if a custom field meta-image is set on the post, if so display that, if not display the default image
    $image = get_post_meta($post->ID, "wpcf-meta-image", true);
    if (empty($image)) {
      $image = $theme_uri."/dist/images/og-default.jpg";
    } 
  }
  //change this FB App_ID if you necessary, this one is connected to Justine & Debra's accounts.
  $app_id = 194944264230902;
  $output = "<!--All the Meta Tags generated by hook_meta() -->\r\n";
  $output .= "<meta property=\"fb:app_id\" content=\"$app_id\"/>\r\n";
  $output .= "<meta property=\"og:title\" content=\"$title\">\r\n";
  $output .= "<meta name=\"description\" content=\"$description\" />\r\n";
  $output .= "<meta property=\"og:description\" content=\"$description\" />\r\n";
  $output .= "<meta property=\"og:url\" content=\"$url\">\r\n";
  $output .= "<meta property=\"og:type\" content=\"article\">\r\n";
  $output .= "<meta property=\"og:site_name\" content=\"Vote.org\">\r\n";
  $output .= "<meta property=\"og:image\" content=\"$image\">\r\n\r\n";
  $output .= "<meta name=\"twitter:site\" content=\"@votedotorg\">\r\n";
  $output .= "<meta name=\"twitter:url\" content=\"$url\">\r\n";
  $output .= "<meta name=\"twitter:image\" content=\"$image\">\r\n";
  $output .= "<meta name=\"twitter:card\" content=\"summary_large_image\">\r\n";    
  $output .= "<meta name=\"twitter:description\" content=\"$description\">\r\n\r\n";
  echo $output;
  return $title;
  
}

//add filter to wp_title to display the $title from hook_meta() function and all meta tags

add_filter('pre_get_document_title', 'hook_meta');



