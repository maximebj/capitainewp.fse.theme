<?php
$class = isset($block['className']) ? ' ' . $block['className'] : '';

# Récupérer les données du bloc
$title = get_field('title');
$content = get_field('content');

?>
<div class="wp-block-example<?php echo $class; ?>">
  <h2><?php echo $title; ?></h2>
  <?php echo $content; ?>
</div>