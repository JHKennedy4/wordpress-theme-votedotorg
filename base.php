<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;


?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js ie6 lt-ie9"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js ie7 lt-ie9"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->

<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php if( is_home() || is_front_page() || is_page( $page = "states") ) : 
    do_action('get_header');
     get_template_part('templates/header-home');
   
   else : 

     do_action('get_header');
      get_template_part('templates/header');

    endif; ?>

    
    <?php include Wrapper\template_path(); ?>
        
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();

    ?>
    <script type="text/javascript">
    var addthis_config =
    {
      // enable social tracking
      data_ga_social : true,
      // enable clickback tracking
      data_track_clickback: true,
      // address bar tracking for homepage
      data_track_addressbar_paths: '/*',
      // address bar tracking
      data_track_addressbar: true,
      //make drop-down show up in correct place
      ui_offset_top: '20px',
      ui_offset_left: '20px'
    }
    </script>

   

    
  </body>
  
</html>
