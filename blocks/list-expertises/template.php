<?php
  $class = isset( $block['className'] ) ? ' ' . $block['className'] : '';

  # Récupérer les données de la page
  $color = get_field( 'color', get_the_ID() );

  # Récupérer les données du bloc
  $expertises = get_field( 'expertises' );

?>
<div class="wp-block-list-expertises<?php echo $class; ?>">
  <ul class="is-style-arrow">
    <?php foreach($expertises as $expertise_id): ?>
      <li class="has-large-font-size">
        <a href="<?php echo get_permalink($expertise_id); ?>">
          <?php echo get_the_title($expertise_id); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>