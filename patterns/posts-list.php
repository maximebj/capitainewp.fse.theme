<?php

/**
 * Title: Liste des publications
 * Slug: posts-list
 * Description: Liste des publications en grille
 * Categories: design
 * Keywords: 
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"backgroundColor":"accent","className":"is-style-rounded","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-rounded has-accent-background-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
  <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:heading {"level":1} -->
    <h1 class="wp-block-heading">Nos expertises</h1>
    <!-- /wp:heading -->

    <!-- wp:buttons {"layout":{"type":"flex"}} -->
    <div class="wp-block-buttons"><!-- wp:button -->
      <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Demander un devis</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->

  <!-- wp:separator {"backgroundColor":"white"} -->
  <hr class="wp-block-separator has-text-color has-white-color has-alpha-channel-opacity has-white-background-color has-background" />
  <!-- /wp:separator -->

  <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"default"}} -->
  <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
    <!-- wp:post-featured-image {"isLink":true} /-->

    <!-- wp:post-title {"level":3,"isLink":true} /-->

    <!-- wp:post-date {"format":null} /-->

    <!-- wp:read-more {"content":"Lire la suite"} /-->

    <!-- wp:post-excerpt /-->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:paragraph {"placeholder":"Ajouter un texte ou des blocs qui s’afficheront lorsqu’une requête ne renverra aucun résultat."} -->
    <p>Aucun résultat</p>
    <!-- /wp:paragraph -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->