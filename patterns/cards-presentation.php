<?php

/**
 * Title: Présentation
 * Slug: cards-presentation
 * Description: Carte de présentation de l'agence
 * Categories: cards, marketing, hero
 * Keywords: 
 * Viewport Width: 1200
 * Block Types:
 * Post Types:
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"categories":["cards","marketing","hero"],"patternName":"cards-presentation","name":"Hero"},"align":"wide","className":"is-style-rounded","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"right":"var:preset|spacing|m","left":"var:preset|spacing|m","top":"var:preset|spacing|m","bottom":"var:preset|spacing|m"}},"border":{"radius":"20px"}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-rounded has-white-color has-primary-background-color has-text-color has-background has-link-color" style="border-radius:20px;padding-top:var(--wp--preset--spacing--m);padding-right:var(--wp--preset--spacing--m);padding-bottom:var(--wp--preset--spacing--m);padding-left:var(--wp--preset--spacing--m)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|m","left":"var:preset|spacing|m"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} -->
            <p class="has-secondary-color has-text-color has-link-color">Besoin d’un site Internet&nbsp;?</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading -->
            <h2 class="wp-block-heading">Capitaine <img style="width: 40px;" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/wp-logo.png" alt="Logo WordPress"><br>l’agence <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-accent-color">WordPress</mark>.</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>De la conception de votre marque à la réalisation d'un site sur mesure avec WordPress, Capitaine c'est une équipe de passionnés à votre écoute avec plus de 15 ans d'expérience.</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons"><!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Prendre rendez-vous</a></div>
                <!-- /wp:button -->

                <!-- wp:button {"textColor":"white","className":"is-style-button-transparent is-style-transparent","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"borderColor":"white"} -->
                <div class="wp-block-button is-style-button-transparent is-style-transparent"><a class="wp-block-button__link has-white-color has-text-color has-link-color has-border-color has-white-border-color wp-element-button">Nos services</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|s","bottom":"var:preset|spacing|s"}}},"backgroundColor":"contrast"} -->
            <hr class="wp-block-separator has-text-color has-contrast-color has-alpha-channel-opacity has-contrast-background-color has-background" style="margin-top:var(--wp--preset--spacing--s);margin-bottom:var(--wp--preset--spacing--s)" />
            <!-- /wp:separator -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph -->
                <p>Retrouvez-nous sur les réseaux&nbsp;:</p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#5F4D6F","iconBackgroundColor":"white","iconBackgroundColorValue":"#FFFFFF","openInNewTab":true,"className":"is-style-default","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs"}}}} -->
                <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"dribbble"} /-->

                    <!-- wp:social-link {"url":"#","service":"github"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"45%"} -->
        <div class="wp-block-column" style="flex-basis:45%"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
            <figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/austin-distel-wD1LRb9OeEo-unsplash-1536x1152.jpg" alt="Des personnes en réunion" style="aspect-ratio:4/3;object-fit:cover" /></figure>
            <!-- /wp:image -->

            <!-- wp:gallery {"linkTo":"none","className":"is-style-rounded"} -->
            <figure class="wp-block-gallery has-nested-images columns-default is-cropped is-style-rounded"><!-- wp:image {"className":"size-large"} -->
                <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/tim-van-der-kuip-CPs2X8JYmS8-unsplash-1024x683.jpg" alt="2 hommes travaillant face à un ordinateur" /></figure>
                <!-- /wp:image -->

                <!-- wp:image {"className":"size-large"} -->
                <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/lycs-architecture-U2BI3GMnSSE-unsplash-1024x683.jpg" alt="Vue d'ensemble d'un bureau en open space" /></figure>
                <!-- /wp:image -->
            </figure>
            <!-- /wp:gallery -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->