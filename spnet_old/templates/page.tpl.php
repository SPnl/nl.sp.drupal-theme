<?php
/**
 *  page.tpl.php - beta 2.0
 *  IMPORTANT: Super elements (cross-domain navigation, fourth sidebar) variables are added by module 'Afd super items'. 
 */

// HEADER ?>

	<?php if(user_is_anonymous()):
			print render($page['super_navigatie']);
	endif; ?>
	<div id="header">
	  <?php 	print render($page['header']);
			print render($branding); ?>
	</div>
<?php 
// LEFT SIDEBAR
	
	if ($page['sidebar_first']): ?>
		<div id="sidebar-left" class="sidebar">
			<?php print render($page['sidebar_first']); ?>
		</div>
	<?php endif; 
	
// CONTENT ?> 
 
	<div id="primary" class="content">
		<div class="seperator"><?php print $afdelingen_seperator;?></div>
		<?php print render($page['help']); ?>	
		<?php if (!empty($tabs['#primary']) || !empty($messages)) : ?>	
			<div class="interface">	        
				<?php print render($tabs); ?> 
				<?php print $messages; ?>
			</div>
		<?php endif; ?>
		<?php
			/* Title */
			print render($title_prefix); 
			if ($title) { print '<h2 class="page-title">'.$title.'</h2>'; }
			print render($title_suffix);
		?>

		<?php print render($page['help']); ?>
		<?php if ($action_links): ?>
			<ul class="action-links">
				<?php print render($action_links); ?>
			</ul>
		<?php endif; ?>
		<?php print render($page['content']); ?>

		<div id="extra">
			<?php print render($page['extra']); ?>
		</div>
		<?php print $breadcrumb; ?>	  
	</div>
<?php 
// RIGHT SIDEBAR

	  if ($page['sidebar_second']): ?>
		<div id="sidebar-right" class="sidebar"><?php print render($page['sidebar_second']); ?></div>
	<?php endif; 

// FOURTH SIDEBAR

	/* print render($page['super_campagnes']); */
	
// FOOTER ?>	
 
	 <div id="footer">
	 <?php 	print render($page['footer']);
			print render($page['super_footer']);
	 ?>
	 </div>