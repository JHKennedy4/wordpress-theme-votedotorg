<?php 

function post_state_category(){
  $docs_API = "158e6d7525bb10b8f4c237879325667bafe248a8";
  $collections_ID = "56e35a51c697911471461343";
  $json = '[
  {
    "order": 1,
    "name": "Alabama",
    "collectionId": "56e35a51c697911471461343",
    "slug": "alabama",
    "defaultSort": "name"
  },
  {
    "order": 2,
    "name": "Alaska",
    "collectionId": "56e35a51c697911471461343",
    "slug": "alaska",
    "defaultSort": "name"
  },
  {
    "order": 3,
    "name": "Arizona",
    "collectionId": "56e35a51c697911471461343",
    "slug": "arizona",
    "defaultSort": "name"
  },
  {
    "order": 4,
    "name": "Arkansas",
    "collectionId": "56e35a51c697911471461343",
    "slug": "arkansas",
    "defaultSort": "name"
  },
  {
    "order": 5,
    "name": "California",
    "collectionId": "56e35a51c697911471461343",
    "slug": "california",
    "defaultSort": "name"
  },
  {
    "order": 6,
    "name": "Colorado",
    "collectionId": "56e35a51c697911471461343",
    "slug": "colorado",
    "defaultSort": "name"
  },
  {
    "order": 7,
    "name": "Connecticut",
    "collectionId": "56e35a51c697911471461343",
    "slug": "connecticut",
    "defaultSort": "name"
  },
  {
    "order": 8,
    "name": "Delaware",
    "collectionId": "56e35a51c697911471461343",
    "slug": "delaware",
    "defaultSort": "name"
  },
  {
    "order": 9,
    "name": "Florida",
    "collectionId": "56e35a51c697911471461343",
    "slug": "florida",
    "defaultSort": "name"
  },
  {
    "order": 10,
    "name": "Georgia",
    "collectionId": "56e35a51c697911471461343",
    "slug": "georgia",
    "defaultSort": "name"
  },
  {
    "order": 11,
    "name": "Hawaii",
    "collectionId": "56e35a51c697911471461343",
    "slug": "hawaii",
    "defaultSort": "name"
  },
  {
    "order": 12,
    "name": "Idaho",
    "collectionId": "56e35a51c697911471461343",
    "slug": "idaho",
    "defaultSort": "name"
  },
  {
    "order": 13,
    "name": "Illinois",
    "collectionId": "56e35a51c697911471461343",
    "slug": "illinois",
    "defaultSort": "name"
  },
  {
    "order": 14,
    "name": "Indiana",
    "collectionId": "56e35a51c697911471461343",
    "slug": "indiana",
    "defaultSort": "name"
  },
  {
    "order": 15,
    "name": "Iowa",
    "collectionId": "56e35a51c697911471461343",
    "slug": "iowa",
    "defaultSort": "name"
  },
  {
    "order": 16,
    "name": "Kansas",
    "collectionId": "56e35a51c697911471461343",
    "slug": "kansas",
    "defaultSort": "name"
  },
  {
    "order": 17,
    "name": "Kentucky",
    "collectionId": "56e35a51c697911471461343",
    "slug": "kentucky",
    "defaultSort": "name"
  },
  {
    "order": 18,
    "name": "Louisiana",
    "collectionId": "56e35a51c697911471461343",
    "slug": "louisiana",
    "defaultSort": "name"
  },
  {
    "order": 19,
    "name": "Maine",
    "collectionId": "56e35a51c697911471461343",
    "slug": "maine",
    "defaultSort": "name"
  },
  {
    "order": 20,
    "name": "Maryland",
    "collectionId": "56e35a51c697911471461343",
    "slug": "maryland",
    "defaultSort": "name"
  },
  {
    "order": 21,
    "name": "Massachusetts",
    "collectionId": "56e35a51c697911471461343",
    "slug": "massachusetts",
    "defaultSort": "name"
  },
  {
    "order": 22,
    "name": "Michigan",
    "collectionId": "56e35a51c697911471461343",
    "slug": "michigan",
    "defaultSort": "name"
  },
  {
    "order": 23,
    "name": "Minnesota",
    "collectionId": "56e35a51c697911471461343",
    "slug": "minnesota",
    "defaultSort": "name"
  },
  {
    "order": 24,
    "name": "Mississippi",
    "collectionId": "56e35a51c697911471461343",
    "slug": "mississippi",
    "defaultSort": "name"
  },
  {
    "order": 25,
    "name": "Missouri",
    "collectionId": "56e35a51c697911471461343",
    "slug": "missouri",
    "defaultSort": "name"
  },
  {
    "order": 26,
    "name": "Montana",
    "collectionId": "56e35a51c697911471461343",
    "slug": "montana",
    "defaultSort": "name"
  },
  {
    "order": 27,
    "name": "Nebraska",
    "collectionId": "56e35a51c697911471461343",
    "slug": "nebraska",
    "defaultSort": "name"
  },
  {
    "order": 28,
    "name": "Nevada",
    "collectionId": "56e35a51c697911471461343",
    "slug": "nevada",
    "defaultSort": "name"
  },
  {
    "order": 29,
    "name": "New Hampshire",
    "collectionId": "56e35a51c697911471461343",
    "slug": "new-hampshire",
    "defaultSort": "name"
  },
  {
    "order": 30,
    "name": "New Jersey",
    "collectionId": "56e35a51c697911471461343",
    "slug": "new-jersey",
    "defaultSort": "name"
  },
  {
    "order": 31,
    "name": "New Mexico",
    "collectionId": "56e35a51c697911471461343",
    "slug": "new-mexico",
    "defaultSort": "name"
  },
  {
    "order": 32,
    "name": "New York",
    "collectionId": "56e35a51c697911471461343",
    "slug": "new-york",
    "defaultSort": "name"
  },
  {
    "order": 33,
    "name": "North Carolina",
    "collectionId": "56e35a51c697911471461343",
    "slug": "north-carolina",
    "defaultSort": "name"
  },
  {
    "order": 34,
    "name": "North Dakota",
    "collectionId": "56e35a51c697911471461343",
    "slug": "north-dakota",
    "defaultSort": "name"
  },
  {
    "order": 35,
    "name": "Ohio",
    "collectionId": "56e35a51c697911471461343",
    "slug": "ohio",
    "defaultSort": "name"
  },
  {
    "order": 36,
    "name": "Oklahoma",
    "collectionId": "56e35a51c697911471461343",
    "slug": "oklahoma",
    "defaultSort": "name"
  },
  {
    "order": 37,
    "name": "Oregon",
    "collectionId": "56e35a51c697911471461343",
    "slug": "oregon",
    "defaultSort": "name"
  },
  {
    "order": 38,
    "name": "Pennsylvania",
    "collectionId": "56e35a51c697911471461343",
    "slug": "pennsylvania",
    "defaultSort": "name"
  },
  {
    "order": 39,
    "name": "Rhode Island",
    "collectionId": "56e35a51c697911471461343",
    "slug": "rhode-island",
    "defaultSort": "name"
  },
  {
    "order": 40,
    "name": "South Carolina",
    "collectionId": "56e35a51c697911471461343",
    "slug": "south-carolina",
    "defaultSort": "name"
  },
  {
    "order": 41,
    "name": "South Dakota",
    "collectionId": "56e35a51c697911471461343",
    "slug": "south-dakota",
    "defaultSort": "name"
  },
  {
    "order": 42,
    "name": "Tennessee",
    "collectionId": "56e35a51c697911471461343",
    "slug": "tennessee",
    "defaultSort": "name"
  },
  {
    "order": 43,
    "name": "Texas",
    "collectionId": "56e35a51c697911471461343",
    "slug": "texas",
    "defaultSort": "name"
  },
  {
    "order": 44,
    "name": "Utah",
    "collectionId": "56e35a51c697911471461343",
    "slug": "utah",
    "defaultSort": "name"
  },
  {
    "order": 45,
    "name": "Vermont",
    "collectionId": "56e35a51c697911471461343",
    "slug": "vermont",
    "defaultSort": "name"
  },
  {
    "order": 46,
    "name": "Virginia",
    "collectionId": "56e35a51c697911471461343",
    "slug": "virginia",
    "defaultSort": "name"
  },
  {
    "order": 47,
    "name": "Washington",
    "collectionId": "56e35a51c697911471461343",
    "slug": "washington",
    "defaultSort": "name"
  },
  {
    "order": 48,
    "name": "West Virginia",
    "collectionId": "56e35a51c697911471461343",
    "slug": "west-virginia",
    "defaultSort": "name"
  },
  {
    "order": 49,
    "name": "Wisconsin",
    "collectionId": "56e35a51c697911471461343",
    "slug": "wisconsin",
    "defaultSort": "name"
  },
  {
    "order": 50,
    "name": "Wyoming",
    "collectionId": "56e35a51c697911471461343",
    "slug": "wyoming",
    "defaultSort": "name"
  },
  {
    "order": 51,
    "name": "District of Columbia",
    "collectionId": "56e35a51c697911471461343",
    "slug": "district-of-columbia",
    "defaultSort": "name"
  }
]';                                                                
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

      $url = 'https://docsapi.helpscout.net/v1/categories';                                                                                                           
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
  }                                             
}

post_state_category();