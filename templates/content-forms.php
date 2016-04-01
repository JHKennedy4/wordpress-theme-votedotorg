//not able to get forms to show up

<?php $childargs = array(
  'post_type' => 'form',
  'numberposts' => -1,
  'orderby' => 'title',
  'order' => 'ASC'
  );
$child_posts = get_children($childargs);
$forms = json_encode($child_posts);
echo gettype($child_posts);


if ( !empty($child_posts)) { echo 'not empty'.!empty($child_posts).' isset '.isset($child_posts);?>
<li>

  <button class='question usa-button-unstyled' aria-expanded='false' aria-controls='collapsible-11'><?php echo $state_name; ?> Election Forms</button>
  <div id='collapsible-11' aria-hidden='true' class='answer usa-accordion-content'>
    <ul>
      <?php 
      foreach ($child_posts as $form_post) {
        echo json_encode($form_post);
        $form_title = $form_post->post_title;
        $form_url = $form_post->fields['form-file'];

        echo '<li><a href="'.$form_url.'">'.$form_title.'</a></li>';
      } ?>
    </ul>
  </div>
</li>
<?php }; ?>