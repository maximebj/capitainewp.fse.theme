<?php

/**
 * Title: 2 colonnes de cartes de teaser
 * Slug: columns-cards-teaser
 * Description: 2 cartes affichées côte à côte
 * Categories: cards, columns
 * Keywords: 
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}}} -->
  <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:pattern {"slug":"cards-teaser"} /-->
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:pattern {"slug":"cards-teaser"} /-->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->