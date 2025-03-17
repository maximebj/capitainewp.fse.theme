<?php

/**
 * Title: Liste verticale des articles
 * Slug: posts-list
 * Description: Une liste verticale des articles du blog
 * Categories: posts
 * Keywords: blog, posts, query, loop
 * Viewport Width: 1200
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|l","bottom":"var:preset|spacing|l"}}},"backgroundColor":"gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--l);padding-bottom:var(--wp--preset--spacing--l)"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|large"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--large)">Mes dernières actualités</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":2}} -->
<!-- wp:media-text {"mediaType":"image","imageFill":true,"useFeaturedImage":true,"backgroundColor":"white"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-image-fill-element has-white-background-color has-background"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|x-small","right":"var:preset|spacing|x-small"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--x-small)"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} /-->

<!-- wp:post-title {"level":3,"style":{"typography":{"fontWeight":"700"}}} /-->

<!-- wp:post-excerpt {"moreText":"Lire la suite","fontSize":"s"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:media-text -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers {"midSize":1} /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Ajouter un texte ou des blocs qui s’afficheront lorsqu’une requête ne renverra aucun résultat."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->