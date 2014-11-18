<?php

/**
 *  node--blog.tpl.php - beta 1.0
 *  See: http://api.drupal.org/api/drupal/modules--node--node.tpl.php/7
 */
 
?>

<div id="blog-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	
	<div class="profile">
		<?php print render($content['field_blog_categorie']);?>
		<span class="name">Blog: <?php print $name; ?></span>
	</div>
	
	<?php print render($title_prefix); ?>
		<?php if (!$page): ?>
			<h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title;  ?></a></h2>
		<?php endif; ?>  
	<?php print render($title_suffix); ?>	
	
	<?php print render($content['field_afbeelding']); ?>
	
		<div class="node-content clearfix"<?php print $content_attributes; ?>> 
			
			<span class="date"><?php print $afd_date;?> &bull;</span>
			<?php 
			
			hide($content['comments']);
			hide($content['addthis']);
			hide($content['read_more']);
			
			print render($content); 
			
			
			?>	
		
		</div>
		<?php if(!$teaser) { print render($content['addthis']); } else {
		
		print render($content['read_more']);
		
		} ?>
		<?php print render($content['comments']); ?>
</div>