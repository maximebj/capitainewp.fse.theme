<?php

/**
 * Title: Liste des articles en grille
 * Slug: posts-loop
 * Description: La liste des articles du blog en grille
 * Categories: posts
 * Keywords: blog, posts, query, loop
 * Viewport Width: 1200
 * Block Types: core/query
 * Post Types: 
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"categories":[],"patternName":"core/block/1018","name":"Grille"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Mes dernières actualités</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":29,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|s"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="min-height:100%"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#7b95a7","isUserOverlayColor":false,"contentPosition":"top left","isDark":false,"style":{"dimensions":{"aspectRatio":"1.7778"},"border":{"radius":{"topLeft":"20px","topRight":"20px"}},"layout":{"selfStretch":"fixed","flexSize":"200px"},"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-top-left-radius:20px;border-top-right-radius:20px;margin-top:0;margin-bottom:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#7b95a7"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}},"border":{"radius":"10px"}},"backgroundColor":"accent","textColor":"base","fontSize":"s"} /--></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":{"bottomLeft":"20px","bottomRight":"20px"}},"layout":{"selfStretch":"fill","flexSize":null}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-bottom-left-radius:20px;border-bottom-right-radius:20px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"s"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"layout":{"selfStretch":"fill","flexSize":null}},"textColor":"contrast"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"metadata":{"bindings":{"url":{"source":"capitaine/permalink"}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button">Lire la suite</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"}},"border":{"radius":"10px"}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-accent-background-color has-background" style="border-radius:10px;padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)"><!-- wp:image {"id":499,"width":"60px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="http://full-site-editing.local/wp-content/uploads/2024/09/rocket.png" alt="" class="wp-image-499" style="width:60px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Aucun article</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Pour le moment, revenez plus tard</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->