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
<!-- wp:group {"metadata":{"name":"Carte de présentation","categories":["cards"],"patternName":"core/block/1412"},"style":{"border":{"radius":{"topLeft":"var:preset|border-radius|m","topRight":"var:preset|border-radius|m","bottomLeft":"var:preset|border-radius|m","bottomRight":"var:preset|border-radius|m"}},"spacing":{"padding":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s","left":"var:preset|spacing|s","right":"var:preset|spacing|s"}},"dimensions":{"minHeight":"100%"}},"backgroundColor":"gray","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group has-gray-background-color has-background" style="border-top-left-radius:var(--wp--preset--border-radius--m);border-top-right-radius:var(--wp--preset--border-radius--m);border-bottom-left-radius:var(--wp--preset--border-radius--m);border-bottom-right-radius:var(--wp--preset--border-radius--m);min-height:100%;padding-top:var(--wp--preset--spacing--s);padding-right:var(--wp--preset--spacing--s);padding-bottom:var(--wp--preset--spacing--s);padding-left:var(--wp--preset--spacing--s)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
  <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
    <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
      <p class="has-secondary-color has-text-color has-link-color"><strong>Un sur-titre</strong></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":3,"fontSize":"l"} -->
      <h3 class="wp-block-heading has-l-font-size">Le titre de la carte</h3>
      <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:social-links {"iconColor":"gray","iconColorValue":"#F9F7F3","iconBackgroundColor":"primary","iconBackgroundColorValue":"#2f1847","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}}} -->
    <ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"github"} /-->

      <!-- wp:social-link {"url":"#","service":"instagram"} /-->

      <!-- wp:social-link {"url":"#","service":"facebook"} /-->
    </ul>
    <!-- /wp:social-links -->
  </div>
  <!-- /wp:group -->

  <!-- wp:image {"aspectRatio":"1.7778","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
  <figure class="wp-block-image size-full is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/phare.jpg" alt="Phare" style="aspect-ratio:1.7778;object-fit:cover" /></figure>
  <!-- /wp:image -->

  <!-- wp:paragraph {"style":{"layout":{"selfStretch":"fill","flexSize":null}}} -->
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":{"top":"var:preset|spacing|s","left":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
  <div class="wp-block-buttons"><!-- wp:button {"width":50} -->
    <div class="wp-block-button has-custom-width wp-block-button__width-50"><a class="wp-block-button__link wp-element-button">Bouton principal</a></div>
    <!-- /wp:button -->

    <!-- wp:button {"width":50,"className":"is-style-transparent"} -->
    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-transparent"><a class="wp-block-button__link wp-element-button">Action secondaire</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->