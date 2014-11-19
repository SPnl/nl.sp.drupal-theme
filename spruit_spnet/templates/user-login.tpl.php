test123

<?php print drupal_render_children($form) ?>

<?php
/* print the variables if needed to allow for
  individual field theming or breaking them up. */
print '<pre>';
print_r($variables);
print '</pre>';
?>