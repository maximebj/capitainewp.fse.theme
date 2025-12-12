<?php

/**
 * Title: Carte de teaser
 * Slug: cards-teaser
 * Description: Une carte pour présenter un élément tout simple
 * Categories: cards
 * Keywords: 
 * Viewport Width: 600
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"name":"Carte de présentation"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}},"border":{"radius":{"topLeft":"var:preset|border-radius|m","topRight":"var:preset|border-radius|m","bottomLeft":"var:preset|border-radius|m","bottomRight":"var:preset|border-radius|m"}}},"backgroundColor":"gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-gray-background-color has-background" style="border-top-left-radius:var(--wp--preset--border-radius--m);border-top-right-radius:var(--wp--preset--border-radius--m);border-bottom-left-radius:var(--wp--preset--border-radius--m);border-bottom-right-radius:var(--wp--preset--border-radius--m);padding-top:var(--wp--preset--spacing--s);padding-right:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s);padding-left:var(--wp--preset--spacing--s)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
  <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
      <p class="has-secondary-color has-text-color has-link-color">Nouveauté</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading -->
      <h2 class="wp-block-heading">Titre</h2>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:social-links {"iconColor":"base","iconColorValue":"#FFFFFF","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#725C84","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}}} -->
    <ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

      <!-- wp:social-link {"url":"#","service":"x"} /-->

      <!-- wp:social-link {"url":"#","service":"wordpress"} /-->
    </ul>
    <!-- /wp:social-links -->
  </div>
  <!-- /wp:group -->

  <!-- wp:image {"id":638,"aspectRatio":"1.7778","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
  <figure class="wp-block-image size-large is-style-rounded"><img src="http://full-site-editing.local/wp-content/uploads/2024/11/original-c36f9a9a8c1ec3cbfcaf6cb3b3eeb675-1024x768.jpg" alt="" class="wp-image-638" style="aspect-ratio:1.7778;object-fit:cover" /></figure>
  <!-- /wp:image -->

  <!-- wp:paragraph -->
  <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons -->
  <div class="wp-block-buttons"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Bouton principal</a></div>
    <!-- /wp:button -->

    <!-- wp:button {"className":"is-style-transparent"} -->
    <div class="wp-block-button is-style-transparent"><a class="wp-block-button__link wp-element-button">Action secondaire</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->