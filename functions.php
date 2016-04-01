<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/vote.php'       // Curling for HelpScout articles and URL rewriting for /register-to-vote/state-name and /absentee-ballot/state-name
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function set_post_order_in_admin( $wp_query ) {
global $pagenow;
  if ( is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
    $wp_query->set( 'orderby', 'title' );
    $wp_query->set( 'order', 'ASC' );
  }
}
add_filter('pre_get_posts', 'set_post_order_in_admin' );

//remove emoji support in WP 4.2 https://wordpress.org/support/topic/emoji-and-smiley-js-and-css-added-to-head?replies=53
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// function createStates() {
//   $states = ['Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','District of Columbia','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'];

//   foreach ($states as $state) {
//     $my_post = array(
//       'post_title'    => $state,
//       'post_content'  => '',
//       'post_type' => 'state',
//       'post_status' => 'publish'
//     );
//     wp_insert_post($my_post);
//   }
// }

/**
 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
 * array containing the HTTP server response header fields and content.
 */


