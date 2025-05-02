<div <?php echo get_block_wrapper_attributes(['class' => 'plugin']) ?>>
  <div class="plugin__content">
    <p class="plugin__title">
      <?php the_field( 'title' ); ?>
    </p>
    <p class="plugin__description">
      <?php the_field( 'description' ); ?>
    </p>
    <p>
      <a href="<?php the_field( 'url' ); ?>" class="plugin__link" style="background-color: <?php the_field( 'color' ); ?>">
        Télécharger l'extension
      </a>
    </p>
  </div>
  <div class="plugin__icon">
    <?php echo wp_get_attachment_image( get_field( 'icon' ), 'full' );  ?>
  </div>
</div>