<?php
global $wp_query;
if (isset($wp_query->query_vars['state_name'])) {
  $state = $wp_query->query_vars['state_name'];
  $state_name = ucwords($state);
} else {
  $state = "";
  $state_name = "";
}

?>
<section class="quote">
	<div class="container">
		<div class="quote-text">"Nobody will ever deprive the American people of the right to vote except the American people themselves and the only way they could do this is by not voting."</div>
		<div class='attribution'>
			<strong>Franklin Delano Roosevelt</strong>
			<br />32nd President of the United States 
		</div>
	</div>
</section>
<!--.quote -->

<section class="zebra">
	<div class="container">
		<div class="quote-text">"For this Nation to remain true to its principles, we cannot allow any American's vote to be denied, diluted, or defiled. The right to vote is the crown jewel of American liberties, and we will not see its luster diminished."</div>
		<div class='attribution'>
			<strong>Ronald Reagan</strong>
			<br />40th President of the United States 
		</div>
	</div>
</section>
<!--.quote -->


<?php get_template_part('templates/quicklinks-state'); ?>
