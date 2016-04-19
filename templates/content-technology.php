<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/zeroclipboard/ZeroClipboard.js"></script>

    <section>
     <div class="container">
      <h1><?php the_title();?></h1>
      <?php the_content();?>


    
      <h2>Register to vote tool embed code</h2>
      <button class="clip_button" variant="1" data-clipboard-target="clipboard_textarea1">Click to copy code:</button>
      <textarea id="clipboard_textarea1">
        <style type="text/css">
          iframe#frame1 {
            height: 1247px;
            overflow: hidden;
          }
          @media only screen and (min-width: 768px) { 
            iframe#frame1 {
              height: 823px;
              overflow: scroll;
            }
          }
        </style>
        <iframe src="https://register.vote.org" width="100%" marginheight="0" frameborder="0" id="frame1" scrollable ="no"></iframe>

      </textarea><!--#clipboard_textarea-->

      
      <h2>Absentee ballot embed code</h2>
      <button class="clip_button"  variant="1" data-clipboard-target="clipboard_textarea2">Click to copy code:</button>
      <textarea id="clipboard_textarea2">
        <style type="text/css">
          iframe#frame2 {
            height: 2071px;
            overflow: hidden;
          }
          @media only screen and (min-width: 768px) { 
            iframe#frame2 {
              height: 1145px;
              overflow: scroll;
            }
          }
        </style>
        <iframe src="https://absentee.vote.org" width="100%" marginheight="0" frameborder="0" id="frame2" scrollable="no"></iframe>
      </textarea>
      
      
      <h2>Verify voter registration embed code</h2>
      <button class="clip_button"  variant="1"  data-clipboard-target="clipboard_textarea3">Click to copy code:</button>
      <textarea id="clipboard_textarea3">
        <style type="text/css">
          iframe#frame3 {
            height: 1893px;
            overflow: hidden;
          }
          @media only screen and (min-width: 768px) { 
            iframe#frame3 {
              height: 1146px;
              overflow: scroll;
            }
          }
        </style>
        <iframe src="https://verify.vote.org" width="100%" marginheight="0" frameborder="0" id="frame3" scrollable="no"></iframe>

      </textarea>
      
       
     </div><!--.container-->
    </section>




