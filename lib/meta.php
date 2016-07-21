<?php

/*remove default link tags in wp_head including canonical link */
add_action('init', function () {
    remove_action('wp_head', 'Roots\\Soil\\CleanUp\\rel_canonical');
}, 15); // $priority = 15 ensures that it's running after Soil. This tells SOIL Plugin not to add their default canonical URL
remove_action( 'wp_head', 'rel_canonical');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'index_rel_link');
remove_action( 'wp_head', 'wp_print_head_scripts');
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

/* Replace WP default canonical URLS to display the state-specific URL -- uncomment this out once I can get the above remove_action function to execute */

add_action( 'wp_head', 'my_rel_canonical');

function my_rel_canonical() {

  // original code
  if ( !is_singular() )
    return;
  global $wp_the_query;
  if ( !$id = $wp_the_query->get_queried_object_id() )
    return;

  // new code - if this is a state specific page then use actual URL otherwise find permalink

  $state = get_query_var('state_name', null);
  if (isset($state)) {
    $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "<link rel='canonical' href='$url' />\n";
  } else {
    $url = get_permalink( $id );
    echo "<link rel='canonical' href='$url' />\n";
  }
}
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
    
    $title = "Register to Vote - VOTE.org - The Voter Registration Experts";
    $description = "It takes 2 minutes to register to vote. Get started now.";
    $image = $theme_uri."/dist/images/og-register-to-vote.jpg";
  } 
  //define $title for state-specific register to vote pages
  else if ($page_type == "register-to-vote" && $state !== "") {
    $state_name = $post->post_title;
    $title = "Register to Vote in $state_name - VOTE.org - The Voter Registration Experts";
    $description = "It takes 2 minutes to register to vote in $state_name. Get started now.";
    $image = $theme_uri."/dist/images/og-register-to-vote.jpg";
  }
  //define $title for Get your absentee ballot page
  else if ($page_type == "absentee-ballot" && $state == "" ) {
    $title = "Get Your Absentee Ballot - VOTE.org - The Absentee Ballot Experts";
    $description = "It takes 2 minutes to get your absentee ballot. Get started now.";
    $image = $theme_uri."/dist/images/og-absentee.jpg";
  }
    
  //define $title for state-specific absentee ballot pages
  else if ($page_type == "absentee-ballot" && $state !== "") {
    $state_name = $post->post_title;
    $title = "$state_name Absentee Ballots - VOTE.org - The Absentee Ballot Experts";
    $description = "It takes 2 minutes to get your $state_name absentee ballot. Get started now.";
    $image = $theme_uri."/dist/images/og-absentee.jpg";
  } 
  //define $title for Election Center Page
  else if ($page_type == "state" && $state == "" ) {
    $title = "Everything you need to vote - Vote.org";
    $description = "Everything you need to vote: register to vote, check your registration status, get your absentee ballot.";
    $image = $theme_uri."/dist/images/og-default-square.png";
  }
  //define $title for state-specific election center pages
  else if ($page_type == "state" && $state !== "" ) {
    $state_name = $post->post_title;
    $title = "Everything you need to vote in $state_name - Vote.org";
    $description = "Everything you need to vote in $state_name: register to vote, check your registration status, get your absentee ballot.";
    $image = $theme_uri."/dist/images/og-default-square.png";
  }
  //homepage  meta tags
  else if ( is_home() || is_front_page() ) {
    $title = "VOTE.org - Everything you need to vote.";
    $description = get_post_meta($post->ID, "wpcf-meta-description", true);
    if (empty($description)) {
      $description = "Everything you need to vote: register to vote, check your registration status, get your absentee ballot.";
    }
    $image = get_post_meta($post->ID, "wpcf-meta-image", true);
    if (empty($image)) {
      $image = $theme_uri."/dist/images/og-default-square.png";
    }
  } 
  else if ( is_404() ) {
    $title = "404 Error Page Not Found - VOTE.org - Everything you need to vote";
    $description = "404 Error Page Not Found - VOTE.org";
    $image = $theme_uri."/dist/images/og-default-square.png";
  } else if ( is_search() ) {
    $query = get_search_query();
    $title = "Search Results for $query - VOTE.org - Everything you need to vote";
    $description = "VOTE.org - everything you need to vote. Nonpartisan and nonprofit.";
    $image = $theme_uri."/dist/images/og-default-square.png";
     
  }
  else {
    //all other pages on site are using the defaul description and image. Adding post title to the title tag.
    $title = $post->post_title." - VOTE.org - Everything you need to vote";
    //check to see if a custom meta description is set on the post, if so display that, if not display the default language
    $description = get_post_meta($post->ID, "wpcf-meta-description", true);
    if (empty($description)) {
      $description = "VOTE.org - everything you need to vote. Nonpartisan and nonprofit.";
    }
    //check to see if a custom field meta-image is set on the post, if so display that, if not display the default image
    $image = get_post_meta($post->ID, "wpcf-meta-image", true);
    if (empty($image)) {
      $image = $theme_uri."/dist/images/og-default-square.png";
    } 
  }
  //change this FB App_ID if necessary, this one is connected to Justine & Debra's accounts.
  $app_id = 194944264230902;
  $output = "<!--All the Meta Tags generated by hook_meta() -->\r\n";
  $output .= "<meta property=\"fb:app_id\" content=\"$app_id\"/>\r\n";
  $output .= "<meta property=\"og:title\" content=\"$title\">\r\n";
  $output .= "<meta name=\"description\" content=\"$description\" />\r\n";
  $output .= "<meta property=\"og:description\" content=\"$description\" />\r\n";
  $output .= "<meta property=\"og:url\" content=\"$url\">\r\n";
  $output .= "<meta property=\"og:type\" content=\"article\">\r\n";
  $output .= "<meta property=\"og:site_name\" content=\"VOTE.org\">\r\n";
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
