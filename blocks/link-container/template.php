<?php
# Récupérer les attributs du bloc
$attributes = get_block_wrapper_attributes([
    "href" => get_the_permalink()
]);
?>
<a <?php echo wp_kses_data($attributes); ?>>
    <InnerBlocks />
</a>