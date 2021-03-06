<?php 

function get_web_page( $url )
{
  //add the HelpScout API key as a text file in /lib and name it "helpscout_api.txt"
    $docsAPI = file_get_contents(dirname(__FILE__).'/helpscout_api.txt',false);
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        
        CURLOPT_USERPWD => $docsAPI.':X',
        
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;

    $result = json_decode($content, true);
    echo $errmsg;
    return $result;

}

function add_category($url){
 get_web_page($url);
 
}

//figure out the right category ID that matches the slug we are looking for


function get_helpScout_category($state_name) {
  //$collections_ID = "56e35a51c697911471461343";
  //$data = get_web_page('https://docsapi.helpscout.net/v1/collections/'.$collections_ID.'/categories');
  $uri = get_template_directory_uri();
  $json = wp_remote_fopen($uri.'/lib/state_categories.json');
                                      
  $states = json_decode($json, true); 
  foreach ($states as $state) {
    $category_name = $state["name"];
    if ($category_name == $state_name) {
      return $state["id"];
    }
  }    
}

function get_helpScout_articles_by_category($slug, $state_name) {
 $id = get_helpScout_category($state_name);
 $category_articles = get_web_page('https://docsapi.helpscout.net/v1/categories/'.$id.'/articles');
 $items = $category_articles["articles"]["items"];
 $count = count($items);

 for ($x=0; $x < $count; $x++) {
  $article_num = $items[$x]["number"];
  $article_url = 'https://docsapi.helpscout.net/v1/articles/'.$article_num;
  $full_articles = get_web_page($article_url);
  $button_num = $x + 5;
  foreach ($full_articles as $full_article) {

   //outputs title and text. can format this for HTML
   echo "<li><button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-".$button_num."'><h4>".$full_article["name"]."</h4></button><div id='collapsible-".$button_num."' aria-hidden='true' class='answer usa-accordion-content'>".$full_article["text"]."</div></li>"; 
  }
 }
}
//Add new state parameter as query variable
 function custom_rewrite_tag() {
   add_rewrite_tag('%state_name%', '([^&]+)');
 }
 add_action('init', 'custom_rewrite_tag', 10, 0);

//adding rewrite rules for register and absentee pages to redirect /register/alabama  or /absentee/alabama to /registration/?state=alabama or /absentee-registration (page ids will change) 
 // You need to have permalinks enabled. How do you know if you enabled permalinks? You just need to go to Settings > Permalinks and make sure you aren’t using the default setting.

 //add_rewrite_rule The first argument is our regular expression, what we want to match exactly. 
 //index.php?p=11 is our reidrect URL, it tells Wordprss to load the post with ID = 11
function custom_rewrite_rule(){
  add_rewrite_rule('^register-to-vote/([a-z-]+)/?$','index.php?pagename=register-to-vote&state_name=$matches[1]','top');
  add_rewrite_rule('^absentee-ballot/([a-z-]+)/?$','index.php?pagename=absentee-ballot&state_name=$matches[1]','top');
  add_rewrite_rule('^state/([a-z-]+)/?$','index.php?pagename=states&state_name=$matches[1]','top');
  add_rewrite_rule('^state[//]?$','index.php?pagename=states','top');
  // Call flush_rules() as a method of the $wp_rewrite object
  flush_rewrite_rules();
}
add_action('init', 'custom_rewrite_rule', 10, 0);


//remove default jQuery with WordPress and load with CDN instead
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
  if(!is_admin())
  {
      $scripts->remove( 'jquery');
      $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.1' );
  }
}

add_action( 'wp_enqueue_scripts', 'addthis' );

function addthis() {
 wp_enqueue_script( 'addthis', 'https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56bd6f489abb811d', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'register_jquery' );
function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js', false, '2.2.2');
        wp_enqueue_script('jquery');
    }
}
//add class 'iframe' to body for the templates that have iframes, this will allow us to run init functions based on the 'iframe' class in main.js
add_filter( 'body_class', 'iframe_class' );

function iframe_class($classes) {
  $template = array('template-register.php', 'template-absentee.php', 'template-verify.php');
  if ( is_page_template( $template ) ) {
    $classes[] = 'iframe';

    return $classes;
  } else {
    return $classes;
  }
}
//add class 'table' to body element for templates that contain tables in order to add JS for persistent headers. 
add_filter( 'body_class', 'table_class' );

function table_class($classes) {
  $template = array('template-absentee-ballot-deadlines.php', 'template-early-voting-calendar.php', 'template-voter-registration-deadlines.php', 'template-where-do-i-vote.php', 'template-voter-ID-laws.php');
  if ( is_page_template( $template ) ) {
    $classes[] = 'table';

    return $classes;
  } else {
    return $classes;
  }
}
//add iFrameResizer script if the page has a tool. Update $template with any pages that use an iFrame.

add_action( 'wp_enqueue_scripts', 'iframe_resizer' );

function iframe_resizer() {
  $template = array('template-register.php', 'template-absentee.php', 'template-verify.php');
  if ( is_page_template( $template ) ) {
    wp_enqueue_script( 'iframeResizer', 'https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.3/iframeResizer.min.js', array(), '3.5.3', true );
  }
}
//add class 'state' to body element for any templates using template-state.php
add_filter( 'body_class', 'state_class' );

function state_class($classes) {
  $template = array('template-state.php');
  if ( is_page_template( $template ) ) {
    $classes[] = 'state';

    return $classes;
  } else {
    return $classes;
  }
}

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}