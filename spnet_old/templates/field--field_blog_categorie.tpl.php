<?php

/**
 *  field--field_blog_categorie.tpl.php - beta 1.0
 */
 
?>
<span class="<?php print $field_name_css.' '.$field_type_css ?>">
	<?php foreach ($items as $delta => $item) : ?>
		<?php print render($item); ?>
    <?php endforeach; ?>
</span>
