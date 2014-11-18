<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 * @see template_preprocess_field()
 * @see theme_field()
 */
 
?>

<?php foreach ($items as $delta => $item): ?>
	<?php print render($item); ?>
<?php endforeach; ?>
