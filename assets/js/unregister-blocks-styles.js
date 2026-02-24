// Retirer les styles de blocs natifs
// Pour connaître les styles disponibles, voir :
// https://developer.wordpress.org/themes/features/block-style-variations/#customizing-block-styles-via-theme-json

wp.domReady(function () {
    //wp.blocks.unregisterBlockStyle("core/image", "rounded");
    //wp.blocks.unregisterBlockStyle("core/button", "fill");
    wp.blocks.unregisterBlockStyle("core/button", "outline");
    wp.blocks.unregisterBlockStyle("core/separator", "dots");
    wp.blocks.unregisterBlockStyle("core/separator", "wide");
    wp.blocks.unregisterBlockStyle("core/quote", "plain");
    wp.blocks.unregisterBlockStyle("core/site-logo", "rounded");
    wp.blocks.unregisterBlockStyle("core/social-links", "pills-shape");
    wp.blocks.unregisterBlockStyle("core/table", "stripes");
    wp.blocks.unregisterBlockStyle("core/tag-cloud", "outline");
});
