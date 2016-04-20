<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/zeroclipboard/ZeroClipboard.js"></script>


    <section>
     <div class="container">
      <h1><?php the_title();?></h1>
      <?php the_content();?>


    
      <h2>Our voter registration tool</h2>
      
      <textarea id="clipboard_textarea1">
        <iframe src="https://register.vote.org" width="100%" marginheight="0" frameborder="0" id="frame1" scrollable ="no"></iframe>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.3/iframeResizer.min.js" >
        </script>

        <script type="text/javascript">
          iFrameResize({ log:true, checkOrigin:false})
        </script>


      </textarea><!--#clipboard_textarea1-->
      <button class="clip_button" variant="1" data-clipboard-target="clipboard_textarea1">Click to copy code</button>

      
      <h2>Our absentee ballot tool</h2>
      
      <textarea id="clipboard_textarea2">
        <iframe src="https://absentee.vote.org" width="100%" marginheight="0" frameborder="0" id="frame2" scrollable="no">
        </iframe>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.3/iframeResizer.min.js" >
        </script>

        <script type="text/javascript">
          iFrameResize({ log:true, checkOrigin:false})
        </script>
      </textarea><!--#clipboard_textarea2-->
      <button class="clip_button"  variant="1" data-clipboard-target="clipboard_textarea2">Click to copy code</button>
      
      
      <h2>Our voter verification tool</h2>
      
      <textarea id="clipboard_textarea3">
        <iframe src="https://verify.vote.org" width="100%" marginheight="0" frameborder="0" id="frame3" scrollable="no">
        </iframe>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.3/iframeResizer.min.js" >
        </script>

        <script type="text/javascript">
          iFrameResize({ log:true, checkOrigin:false})
        </script>

      </textarea><!--#clipboard_textarea3-->
      <button class="clip_button"  variant="1"  data-clipboard-target="clipboard_textarea3">Click to copy code</button>
      
       
     </div><!--.container-->
    </section>




