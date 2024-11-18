<?php

/**
 * Title: Boucle de requête du Portfolio
 * Slug: query-portfolio
 * Description: 
 * Categories: hero
 * Viewport width: 1200
 * Inserter: false
 */
?>
<!-- wp:spacer {"height":"60px"} -->
<div style="height: 60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":4,"query":{"perPage":10,"pages":0,"offset":0,"postType":"portfolio","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"format":[]},"align":"wide"} -->
<div class="wp-block-query alignwide">
  <!-- wp:post-template {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":3}} -->
  <!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /-->
  <!-- /wp:post-template -->

  <!-- wp:spacer {"height":"52px"} -->
  <div
    style="height: 52px"
    aria-hidden="true"
    class="wp-block-spacer"></div>
  <!-- /wp:spacer -->

  <!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"layout":{"type":"flex","justifyContent":"center"}} -->
  <!-- wp:query-pagination-previous /-->

  <!-- wp:query-pagination-numbers /-->

  <!-- wp:query-pagination-next /-->
  <!-- /wp:query-pagination -->

  <!-- wp:query-no-results -->
  <!-- wp:paragraph {"placeholder":"Ajouter un texte ou des blocs qui s’afficheront lorsqu’une requête ne renverra aucun résultat."} -->
  <p></p>
  <!-- /wp:paragraph -->
  <!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->