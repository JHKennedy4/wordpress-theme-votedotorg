
<h2><?php $state_name; ?> Helpful voting links</h2>

<ul>
  <li><a href="<?php echo types_render_field('state-election-website', array('raw' => true));?>">State Election Website</a></li>
  
  <li><a href="<?php echo types_render_field('local-election-official', array('raw' => true));?>">Local Election Officials</a>: These are the best people to contact if you have any questions at all about voting in your state.</li>
  <li><a href="<?php echo types_render_field('polling-place-locator', array('raw' => true));?>">Find your polling place</a></li>
  <li><a href="<?php echo types_render_field('online-ballot-tracker-url', array('raw' => true));?>">Absentee ballot tracker tool</a></li>
  <li><a href="<?php echo types_render_field('absentee-ballot-info-url', array('raw' => true));?>">Learn more about absentee voting</a></li>

  <li><a href="<?php echo types_render_field('early-voting-info-url', array('raw' => true));?>">Learn more about early voting</a></li>
  <li><a href="<?php echo types_render_field('voter-id-more-information', array('raw' => true));?>">Learn more about voter ID </a></li>


</ul>