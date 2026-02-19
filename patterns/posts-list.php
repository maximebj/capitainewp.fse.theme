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
<!-- wp:group {"metadata":{"categories":[],"patternName":"core/block/1018"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center"} -->
  <h2 class="wp-block-heading has-text-align-center">Mes dernières actualités</h2>
  <!-- /wp:heading -->

  <!-- wp:query {"queryId":29,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
  <div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"default","columnCount":3,"minimumColumnWidth":null}} -->
    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"20px"}},"backgroundColor":"base"} -->
    <div class="wp-block-columns has-base-background-color has-background" style="border-radius:20px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"40%"} -->
      <div class="wp-block-column" style="flex-basis:40%"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"customOverlayColor":"#aaaba9","isUserOverlayColor":false,"minHeight":300,"minHeightUnit":"px","contentPosition":"top left","isDark":false,"style":{"layout":{"selfStretch":"fixed","flexSize":"40%"},"border":{"radius":{"topLeft":"20px","topRight":"0px","bottomLeft":"20px","bottomRight":"0px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-top-left-radius:20px;border-top-right-radius:0px;border-bottom-left-radius:20px;border-bottom-right-radius:0px;min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#aaaba9"></span>
          <div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":"10px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"accent","textColor":"base","fontSize":"s"} /--></div>
        </div>
        <!-- /wp:cover -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0"}}}} -->
      <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-bottom:0;flex-basis:60%"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|30"},"border":{"radius":{"bottomLeft":"20px","bottomRight":"20px"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="border-bottom-left-radius:20px;border-bottom-right-radius:20px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"s"} /-->

          <!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}}} /-->

          <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} /-->

          <!-- wp:buttons -->
          <div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">Lire la suite</a></div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <!-- wp:query-pagination-previous /-->

    <!-- wp:query-pagination-numbers /-->

    <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->

    <!-- wp:query-no-results -->
    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"10px"}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
    <div class="wp-block-group has-accent-background-color has-background" style="border-radius:10px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:image {"id":499,"width":"60px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
      <figure class="wp-block-image aligncenter size-full is-resized"><img src="http://full-site-editing.local/wp-content/uploads/2024/09/rocket.png" alt="" class="wp-image-499" style="width:60px" /></figure>
      <!-- /wp:image -->

      <!-- wp:heading {"textAlign":"center"} -->
      <h2 class="wp-block-heading has-text-align-center">Aucun article</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"align":"center"} -->
      <p class="has-text-align-center">Pour le moment, revenez plus tard</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:query-no-results -->
  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->