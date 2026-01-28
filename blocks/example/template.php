<?php
$attributes = get_block_wrapper_attributes();

# Récupérer les données du bloc
$title = get_field('title');
$content = get_field('content');

?>
<div <?php echo wp_kses_data($attributes); ?>>
    <h2><?php echo esc_html($title); ?></h2>
    <?php echo wp_kses_post($content); ?>
</div>