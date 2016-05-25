<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </header>
  <div class="entry-summary">
    <?php if( $post->post_content != "" || has_excerpt( $post->ID ) ) {
    // This post has content or custom excerpt so use the default excerpt language
    	the_excerpt();
	} else {
    // This post has a custom excerpt
    	echo types_render_field("wpcf-meta-description");
	}  ?>
  </div>
</article>
