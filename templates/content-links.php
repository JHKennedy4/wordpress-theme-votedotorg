
<h2><?php $state_name; ?> Helpful voting links</h2>
<?php
 $state_election_site = types_render_field('state-election-website', array('raw' => true));
 $leo_link = types_render_field('local-election-official', array('raw' => true));
 $polling_locator = types_render_field('polling-place-locator', array('raw' => true));
 $online_ballot_tracker = types_render_field('online-ballot-tracker-url', array('raw' => true));
 $absentee_ballot_url = types_render_field('absentee-ballot-info-url', array('raw' => true));
 $early_voting_url = types_render_field('early-voting-info-url', array('raw' => true));
 $voter_id_info = types_render_field('voter-id-more-information', array('raw' => true)); 
 ?>
<ul>
  <?php if (!empty($state_election_site) ) {  ?>

  <li><a href="<?php echo $state_election_site; ?>">State Election Website</a></li>
  <?php } ?>

  <?php if (!empty($leo_link) ) {  ?>
  <li><a href="<?php echo $leo_link; ?>">Local Election Officials</a>: These are the best people to contact if you have any questions at all about voting in your state.</li>
  <?php } ?>
  <?php if (!empty($polling_locator) ) {  ?>
  <li><a href="<?php echo $polling_locator ?>">Find your polling place</a></li>
  <?php } ?>
  <?php if (!empty($online_ballot_tracker) ) {  ?>
  <li><a href="<?php echo $online_ballot_tracker; ?>">Absentee ballot tracker tool</a></li>
  <?php } ?>
  <?php if (!empty($absentee_ballot_url) ) {  ?>
  <li><a href="<?php echo $absentee_ballot_url; ?>">Learn more about absentee voting</a></li>
  <?php } ?>
  <?php if (!empty($early_voting_url) ) {  ?>
  <li><a href="<?php echo $early_voting_url;?>">Learn more about early voting</a></li>
  <?php } ?>
  <?php if (!empty($voter_id_info) ) {  ?>
  <li><a href="<?php echo $voter_id_info;?>">Learn more about voter ID </a></li>
  <?php } ?>


</ul>