<?php 

function post_articles(){
  $docs_API = "158e6d7525bb10b8f4c237879325667bafe248a8";
  $collections_ID = "56e35a51c697911471461343";
  $json = file_get_contents('FAQs.json');                                                                
  $data = json_decode($json, true); 
  foreach ($data as $data_obj) {

    $data_string = json_encode($data_obj);

      $options = array(
        CURLOPT_USERPWD => $docs_API.':X',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_HEADER         => true,
        CURLOPT_CUSTOMREQUEST   => "POST",
        CURLOPT_POSTFIELDS => $data_string
                                                                            
      );

      $url = 'https://docsapi.helpscout.net/v1/articles';                                                                                                           
        $ch = curl_init($url);  
        curl_setopt_array( $ch, $options );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
        );
        $result = curl_exec($ch);
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
      curl_close( $ch );  
      $header['errno']   = $err;
      $header['errmsg']  = $errmsg;
      $header['content'] = $content;

      $result = json_decode($content, true);
      print $content;
      print $errmsg;
  }                                             
}

post_articles();