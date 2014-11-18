<?php
/**
 *  comment.tpl.php - beta 1.0
 */

?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print $picture ?>

  <?php if ($new): ?>
    <span class="new"><?php print $new ?></span>
  <?php endif; ?>

  <div class="submitted">
    <?php print $author; ?>
    
    <span class="created"> 
    op: <span class="created-date"> <?php print $created_date; ?> </span> 
    om: <span class="created-time"> <?php print $created_time; ?> </span>
    </span>
    
  </div>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php if($logged_in) { print render($content['links']); } ?>
</div>
