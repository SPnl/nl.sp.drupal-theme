<?php

/**
 *  node--page.tpl.php - beta 1.0
 *  See: http://api.drupal.org/api/drupal/modules--node--node.tpl.php/7
 */
 
?>

<div id="page-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	
	<?php print render($title_prefix); ?>
		<?php if (!$page): ?>
			<h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title;  ?></a></h2>
		<?php endif; ?>  
	<?php print render($title_suffix); ?>	
	<?php  print render($content['field_afbeelding']); ?>
	
		<div class="node-content clearfix"<?php print $content_attributes; ?>> 
		
			<?php 
			
			hide ($content['comments']);
			hide ($content['addthis']);
			
			print render($content); 
			?>   
		
		</div>
		<?php print render($content['comments']); ?>
</div>