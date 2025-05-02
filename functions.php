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
add_editor_style("style-editor.css");


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
    $files = glob(get_template_directory() . "/assets/css/*.css");

    foreach ($files as $file) {
        $filename   = basename($file, ".css");
        $block_name = str_replace("core-", "core/", $filename);

        wp_enqueue_block_style(
            $block_name,
            [
                "handle" => "capitaine-{$filename}",
                "src"    => get_theme_file_uri("assets/css/{$filename}.css"),
                "path"   => get_theme_file_path("assets/css/{$filename}.css"),
                "ver"    => filemtime(get_theme_file_path("assets/css/{$filename}.css"))
            ]
        );
    }
}
add_action("init", "capitaine_register_blocks_assets");


# Retirer les variations de styles de blocs natifs 
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/retirer-variations-styles-blocs-natifs/#la-methode-javascript
function capitaine_deregister_blocks_variations()
{
    wp_enqueue_script(
        "unregister-styles",
        get_template_directory_uri() . "/assets/js/unregister-blocks-styles.js",
        ["wp-blocks", "wp-dom-ready", "wp-edit-post"],
        "1.0",
        true // Important pour que ça fonctionne dans le FSE et Gut
    );
}
add_action("enqueue_block_editor_assets", "capitaine_deregister_blocks_variations");


# Activer toutes les fonctionnalités de l'éditeur de blocks aux administrateurs
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/hooker-le-theme-json-en-php/#offrir-une-experience-differente-en-fonction-des-roles-utilisateurs
function capitaine_filter_theme_json_theme($theme_json)
{
    if (!current_user_can("edit_theme_options")) {
        return $theme_json;
    }

    $new_data = json_decode(
        file_get_contents(get_theme_file_path("admin.json")),
        true
    );

    return $theme_json->update_with($new_data);
}
//add_filter('wp_theme_json_data_theme', 'capitaine_filter_theme_json_theme');


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

    register_block_pattern_category(
        "pages",
        ["label" => __("Pages complètes", "capitaine")]
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
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/header-footer-full-site-editing/#utiliser-les-hooks-pour-inserer-des-balises
function capitaine_add_google_site_verification()
{
    echo '<meta name="google-site-verification" content="12345" />';
}
add_action("wp_head", "capitaine_add_google_site_verification");


# Ajouter une classe sur la balise <body>
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/header-footer-full-site-editing/#utiliser-les-hooks-pour-inserer-des-balises
function capitaine_body_class($classes)
{
    $classes[] = "capitainewp";
    return $classes;
}
add_filter("body_class", "capitaine_body_class");


# Modifier les paramètes d'une boucle de requête pour faire une liste Related Posts par exemple
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/modifier-parametres-boucles-requetes-php/#une-boucle-personnalisee-related-posts
function capitaine_related_posts_query( $query_args, $block)
{
    if ($block->context["queryId"] === 3) {        
        $current_post_id = get_the_ID();
        $current_post_categories = wp_get_post_categories($current_post_id, ["fields" => "ids"]);

        $query_args["post__not_in"] = [$current_post_id];
        $query_args["cat"] = $current_post_categories;
    }

    return $query_args;
}
add_filter("query_loop_block_query_vars", "capitaine_related_posts_query", 10, 2);


# Déclarer un nouveau type de publication « Portfolio »
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/modeles-custom-post-types/#declaration-classique-en-php
function capitaine_register_post_types()
{
    # CPT « Portfolio »
    $labels = [
        "name" => "Portfolio",
        "all_items" => "Tous les projets",
        "singular_name" => "Projet",
        "add_new_item" => "Ajouter un projet",
        "edit_item" => "Modifier le projet",
        "menu_name" => "Portfolio"
    ];

    $args = [
        "labels" => $labels,
        "public" => true,
        "show_in_rest" => true,
        "has_archive" => true,
        "supports" => ["title", "editor", "thumbnail", "revisions", "custom-fields"],
        "menu_position" => 5,
        "menu_icon" => "dashicons-admin-appearance",
    ];

    register_post_type("portfolio", $args);

    # Taxonomy « Type de projets »
    $labels = [
        "name" => "Types de projets",
        "singular_name" => "Type de projet",
        "add_new_item" => "Ajouter un Type de Projet",
        "new_item_name" => "Nom du nouveau Projet",
        "parent_item" => "Type de projet parent",
    ];

    $args = [
        "labels" => $labels,
        "public" => true,
        "show_in_rest" => true,
        "hierarchical" => true,
    ];

    register_taxonomy("type-projets", "portfolio", $args);
}
add_action("init", "capitaine_register_post_types");


# Définir le contenu par défaut des publications du Portfolio
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/modeles-custom-post-types/#ajouter-un-contenu-par-defaut-a-votre-cpt
function capitaine_add_default_content($content, $post)
{
    if ($post->post_type === "portfolio") {
        $content = '<!-- wp:pattern  { "slug":"default-portfolio" } /-->';
    }
    return $content;
}
add_filter("default_content", "capitaine_add_default_content", 10, 2);


# Retirer des niveaux de titre dans les blocs de type Heading
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/retirer-des-niveaux-de-titre-dans-le-bloc-titre/#retirer-les-niveaux-de-titres
function capitaine_remove_heading_levels($args, $block_type)
{
    if ($block_type !== "core/heading") {
        return $args;
    }

    $args["attributes"]["levelOptions"]["default"] = [1, 2, 3, 4];

    return $args;
}
add_action("register_block_type_args", "capitaine_remove_heading_levels", 10, 2);


# Déclarer les meta pour le bloc binding
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/donnees-dynamiques-binding-api/#le-bloc-binding-avec-les-post-metas
function capitaine_register_meta()
{
    register_meta(
        "post",
        "distance",
        [
            "show_in_rest"      => true,
            "single"            => true,
            "type"              => "string",
            "sanitize_callback" => "wp_strip_all_tags",
            "default"           => "{16 km}",
            "label"             => "Distance",
        ]
    );

    register_meta(
        "post",
        "elevation",
        [
            "show_in_rest"      => true,
            "single"            => true,
            "type"              => "string",
            "sanitize_callback" => "wp_strip_all_tags",
            "default"           => "{400 D+}",
            "label"             => "Dénivelé",
        ]
    );
}

add_action("init", "capitaine_register_meta");


# Déclarer des sources de données personnalisées pour le block binding
# Dans https://capitainewp.io/formations/wordpress-full-site-editing/donnees-dynamiques-binding-api/#creer-une-source-de-donnees-personnalisee
function capitaine_register_binding_sources()
{
    register_block_bindings_source(
        "capitaine/comments-number",
        [
            "label" => __("Nombre de commentaires", "capitaine"),
            "get_value_callback" => "capitaine_comments_binding"
        ]
    );

    register_block_bindings_source(
        "capitaine/permalink",
        [
            "label" => __("Lien vers la publication", "capitaine"),
            "get_value_callback" => "capitaine_permalink_binding"
        ]
    );
}
add_action("init", "capitaine_register_binding_sources");


# Callbacks pour le block binding
function capitaine_comments_binding($source_attrs, $block_instance, $attribute_name)
{
    return get_comments_number_text();
}

function capitaine_permalink_binding($source_attrs, $block_instance, $attribute_name)
{
    return get_permalink();
}


# Déclarer un bloc custom avec ACF
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/blocs-acf-gutenberg
function register_acf_blocks()
{
    register_block_type(__DIR__ . "/blocks/example");
    register_block_type(__DIR__ . "/blocks/plugin");
    register_block_type(__DIR__ . "/blocks/recipe");
    register_block_type(__DIR__ . "/blocks/link-container");
}
add_action("init", "register_acf_blocks");


# Créer un rôle utilisateur « Client »
# Dans : https://capitainewp.io/formations/wordpress-full-site-editing/hooker-le-theme-json-en-php/#creer-un-role-utilisateur-qui-na-pas-acces-a-lediteur-de-site
function capitaine_add_client_role()
{
    # Ne pas déclarer le rôle à chaque exécution
    if (get_role("client")) {
        return;
    }

    # Définir les droits d'accès
    $capabilities = [
        # Lecture des contenus
        "read" => true,
        
        # Pages
        "edit_pages" => true,
        "edit_published_pages" => true,
        "publish_pages" => true,
        "delete_pages" => true,
        "delete_published_pages" => true,

        # Publications
        "edit_posts" => true,
        "delete_posts" => true,
        "publish_posts" => true,
        "upload_files" => true,
        "edit_published_posts" => true,
        "delete_published_posts" => true,
        
        # Plugins
        "install_plugins" => false,
        "activate_plugins" => false,
        "update_plugins" => false,
        "delete_plugins" => false,
        "edit_plugins" => false,
        
        # Options de WordPress et des plugins
        "manage_options" => true,

        # Thème
        "edit_theme_options" => false,
    ];

	# Ajouter le rôle
    add_role("client", "Client / Cliente", $capabilities);
}
add_action("init", "capitaine_add_client_role");