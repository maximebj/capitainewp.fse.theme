<?php
$attributes = get_block_wrapper_attributes();

# Récupérer les données du bloc
$title = get_field('title');
$content = get_field('content');

?>
<div <?php echo $attributes; ?>>
  <h2><?php echo $title; ?></h2>
  <?php echo $content; ?>
</div>