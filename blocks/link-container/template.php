<?php
# Récupérer les attributs du bloc
$attributes = get_block_wrapper_attributes();

# Récupérer les données du bloc
$current_post_id = get_the_ID();
$link = get_the_permalink($current_post_id);

?>
<a <?php echo $attributes; ?> href="<?php echo $link; ?>">
  <InnerBlocks />
</a>