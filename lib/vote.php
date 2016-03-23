<?php 

function get_web_page( $url )
{
    $docsAPI = "158e6d7525bb10b8f4c237879325667bafe248a8";
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
    
    return $result;
}

function add_category($url){
 get_web_page($url);
 
}


//figure out the right category ID that matches the slug we are looking for

function get_helpScout_category($slug) {
  $data = get_web_page('https://docsapi.helpscout.net/v1/collections/56a903cfc697914361562efb/categories');
  $categories = $data["categories"];
  $items = $categories["items"];
 foreach ($items as $item) {
  $category_slug = $item["slug"];
  if ($category_slug == $slug) {
   return $item["id"];
   // echo var_export($item)."category id: ".$item["id"]."collectionID: ".$item["collectionId"]."publicURL: ".$item["publicUrl"];
  }
   
 }
}

function get_helpScout_articles_by_category($slug) {
 $id = get_helpScout_category($slug);
 $category_articles = get_web_page('https://docsapi.helpscout.net/v1/categories/'.$id.'/articles');

 $items = $category_articles["articles"]["items"];
 $count = count($items);

 for ($x=0; $x < $count; $x++) {
  $article_num = $items[$x]["number"];
  $article_url = 'https://docsapi.helpscout.net/v1/articles/'.$article_num;
  $full_articles = get_web_page($article_url);
  foreach ($full_articles as $full_article) {

   //outputs title and text. can format this for HTML
   echo "<h3>".$full_article["name"]."</h3><p>".$full_article["text"]."</p>"; 
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
  add_rewrite_rule('^register-to-vote/([a-z]+)/?$','index.php?page_id=11&state_name=$matches[1]','top');
  add_rewrite_rule('^absentee-ballot/([a-z]+)/?$','index.php?page_id=2&state_name=$matches[1]','top');
  add_rewrite_rule('^state/([a-z]+)/?$','index.php?page_id=2224&state=$matches[1]','top');
  // Call flush_rules() as a method of the $wp_rewrite object
  flush_rewrite_rules();
}
add_action('init', 'custom_rewrite_rule', 10, 0);