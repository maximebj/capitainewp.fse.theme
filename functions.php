<?php

# Bases du thème
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/base-theme-fse/#le-fichier-functions-php

# Retirer les accents des noms de fichiers
add_filter("sanitize_file_name", "remove_accents");

# Retirer le pattern directory et la suggestion de blocs
remove_action("enqueue_block_editor_assets", "wp_enqueue_editor_block_directory_assets");
remove_theme_support("core-block-patterns");

# Ajouter des fonctionnalités
add_theme_support("editor-styles");

# Déclarer les scripts et les styles
function capitaine_register_assets()
{
    # Intégrer des feuilles de style sur le site
    wp_enqueue_style("main", get_stylesheet_uri(), [], wp_get_theme()->get('Version'));

    # Désactiver le CSS de certains blocs
    wp_dequeue_style("wp-block-columns");
}
add_action("wp_enqueue_scripts", "capitaine_register_assets");

# Autoriser l'import de fichiers SVG et WebP
function capitaine_allow_mime($mimes)
{
    $mimes["svg"] = "image/svg+xml";
    $mimes["webp"] = "image/webp";

    return $mimes;
}
add_filter("upload_mimes", "capitaine_allow_mime");


# Autorisations supplémentaires pour le WebP
function capitaine_allow_file_types($types, $file, $filename, $mimes)
{
    if (false !== strpos($filename, ".webp")) {
        $types["ext"] = "webp";
        $types["type"] = "image/webp";
    }

    return $types;
}
add_filter("wp_check_filetype_and_ext", "capitaine_allow_file_types", 10, 4);


# Charger les styles de blocs personnalisés
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/surcharger-css-blocs-natifs/#automatiser-le-chargement-des-feuilles-de-styles
function capitaine_register_blocks_assets()
{
    $files = glob(get_template_directory() . '/assets/css/*.css');

    foreach ($files as $file) {
        $filename   = basename($file, '.css');
        $block_name = str_replace('core-', 'core/', $filename);

        wp_enqueue_block_style(
            $block_name,
            [
                'handle' => "capitaine-{$filename}",
                "src"    => get_theme_file_uri("assets/css/{$filename}.css"),
                "path"   => get_theme_file_path("assets/css/{$filename}.css"),
                "ver"    => filemtime(get_theme_file_path("assets/css/{$filename}.css"))
            ]
        );
    }
}
add_action('init', 'capitaine_register_blocks_assets');


# Retirer les variations de styles de blocs natifs 
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/retirer-variations-styles-blocs-natifs/#la-methode-javascript
function capitaine_deregister_blocks_variations()
{
    wp_enqueue_script(
        "unregister-styles",
        get_template_directory_uri() . "/assets/js/unregister-blocks-styles.js",
        ["wp-blocks", "wp-dom-ready", "wp-edit-post"],
        "1.0",
    );
}
add_action("enqueue_block_editor_assets", "capitaine_deregister_blocks_variations");


# Ajout de catégories de compositions personnalisées
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/categories-compositions/#declarer-des-categories-de-compositions
function capitaine_register_block_pattern_categories()
{
    register_block_pattern_category("cta", ["label" => "Call to action"]);
    register_block_pattern_category("cards", ["label" => "Cards"]);
    register_block_pattern_category("marketing", ["label" => "Marketing"]);
}
add_action("init", "capitaine_register_block_pattern_categories");


# Ajouter des catégories de compositions personnalisées
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/categories-compositions/#declarer-des-categories-de-compositions
function capitaine_register_patterns_categories()
{
    register_block_pattern_category(
        "marketing",
        ["label" => __("Marketing", "capitaine")]
    );

    register_block_pattern_category(
        "cards",
        ["label" => __("Cartes", "capitaine")]
    );

    register_block_pattern_category(
        "hero",
        ["label" => __("Hero", "capitaine")]
    );

    register_block_pattern_category(
        "posts",
        ["label" => __("Publications", "capitaine")]
    );
}
add_filter("init", "capitaine_register_patterns_categories");


# Retirer certains blocs de l'éditeur
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/desactiver-blocs-gutenberg/#exclusionnbsp-retirer-seulement-certains-blocs
function capitaine_deregister_blocks($allowed_block_types, $editor_context)
{
    $blocks_to_disable = [
        "core/preformatted",
        "core/pullquote",
        "core/quote",
        "core/rss",
        "core/verse",
    ];
    $active_blocks = array_keys(
        WP_Block_Type_Registry::get_instance()->get_all_registered()
    );

    return array_values(array_diff($active_blocks, $blocks_to_disable));
}
add_filter("allowed_block_types_all", "capitaine_deregister_blocks", 10, 2);


# Ajouter des meta dans la balise <head> de la page
function capitaine_add_google_site_verification()
{
    echo '<meta name="google-site-verification" content="12345" />';
}
add_action('wp_head', 'capitaine_add_google_site_verification');


# Ajouter une classe sur la balise <body>
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/header-footer-full-site-editing/#utiliser-les-hooks-pour-inserer-des-balises
function capitaine_body_class($classes)
{
    $classes[] = 'capitainewp';
    return $classes;
}
add_filter('body_class', 'capitaine_body_class');

# Add params to the related post query in single post
function capitaine_related_posts_query($wp_query)
{
    if (!is_admin() && !$wp_query->is_main_query() && is_singular('post')) {
        $current_post_id = get_the_ID();
        $current_post_categories = wp_get_post_categories($current_post_id, ['fields' => 'ids']);

        $wp_query->set('post__not_in', [$current_post_id]);
        $wp_query->set('cat', $current_post_categories);
    }
}
add_action('pre_get_posts', 'capitaine_related_posts_query');


# Déclarer un nouveau type de publication « Portfolio »
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/modeles-custom-post-types/#declaration-classique-en-php
function capitaine_register_post_types()
{
    # CPT « Portfolio »
    $labels = [
        'name' => 'Portfolio',
        'all_items' => 'Tous les projets',
        'singular_name' => 'Projet',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'menu_name' => 'Portfolio'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-appearance',
    ];

    register_post_type('portfolio', $args);

    # Taxonomy « Type de projets »
    $labels = [
        'name' => 'Types de projets',
        'singular_name' => 'Type de projet',
        'add_new_item' => 'Ajouter un Type de Projet',
        'new_item_name' => 'Nom du nouveau Projet',
        'parent_item' => 'Type de projet parent',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    ];

    register_taxonomy('type-projets', 'portfolio', $args);
}
add_action('init', 'capitaine_register_post_types');


# Déclarer les meta pour le bloc binding
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/donnees-dynamiques-binding-api/#le-bloc-binding-avec-les-post-metas
function capitaine_register_meta()
{
    register_meta(
        'post',
        'distance',
        [
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => 'string',
            'sanitize_callback' => 'wp_strip_all_tags',
            'default'           => '{16 km}',
            'label'             => 'Distance',
        ]
    );

    register_meta(
        'post',
        'elevation',
        [
            'show_in_rest'      => true,
            'single'            => true,
            'type'              => 'string',
            'sanitize_callback' => 'wp_strip_all_tags',
            'default'           => '{400 D+}',
            'label'             => 'Dénivelé',
        ]
    );
}

add_action('init', 'capitaine_register_meta');


# Déclarer des sources de données personnalisées pour le block binding
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/donnees-dynamiques-binding-api/#creer-une-source-de-donnees-personnalisee
function capitaine_register_binding_sources()
{
    register_block_bindings_source(
        'capitaine/comments-number',
        [
            'label' => __('Nombre de commentaires', 'capitaine'),
            'get_value_callback' => 'capitaine_comments_binding'
        ]
    );
}
add_action('init', 'capitaine_register_binding_sources');


# Callback pour le block binding
function capitaine_comments_binding($source_attrs, $block_instance, $attribute_name)
{
    return get_comments_number_text();
}
