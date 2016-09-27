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
			<br />
          32nd President of the United States
        
		</div>
	</div>
	<!--.container-->
</section>
<!--.quote -->
<section class="zebra">
	<div class="container">
		<h2>Americans want to vote.</h2>
		<p>40% of nonvoters are already registered to vote. Vote.org knows that these Americans want to vote -- and will vote consistently -- as voting becomes easier and more convenient.</p>
		<a href="/about">Learn more about Vote.org</a>
	</div>
</section>
<?php get_template_part('templates/quicklinks-state'); ?>
