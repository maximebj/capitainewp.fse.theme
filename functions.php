<?php

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
    # Enqueue styles
    wp_enqueue_style("main", get_stylesheet_uri(), [], "1.0.0");

    # Disable native blocks styles
    wp_dequeue_style("wp-block-columns");
}
add_action("wp_enqueue_scripts", "capitaine_register_assets");


# Charger les styles des variations de blocs
function capitaine_register_blocks_assets()
{
    wp_enqueue_block_style(
        "core/button",
        [
            "handle" => "capitaine-group",
            "src"    => get_theme_file_uri("assets/css/core-group.css"),
            "path"   => get_theme_file_path("assets/css/core-group.css"),
            "ver"    => "1.0",
        ]
    );
}
add_action("init", "capitaine_register_blocks_assets");

# On retire le CSS natif des colonnes et on ajoute notre propre feuille de style
function capitaine_deregister_stylesheets()
{
    # On retire le CSS natif des colonnes
    wp_dequeue_style("wp-block-columns");

    # On ajoute notre propre feuille de style
    wp_enqueue_block_style(
        "columns",
        [
            "handle" => "capitaine-columns",
            "src" => get_theme_file_uri("css/columns.css"),
            "path" => get_theme_file_path("css/columns.css"),
            "ver" => "1.0",
        ]
    );
}
add_action("wp_enqueue_scripts", "capitaine_deregister_stylesheets");

# Ajout de catégories de compositions personnalisées
function capitaine_register_block_pattern_categories()
{
    register_block_pattern_category("cta", ["label" => "Call to action"]);
    register_block_pattern_category("cards", ["label" => "Cards"]);
    register_block_pattern_category("marketing", ["label" => "Marketing"]);
}
add_action("init", "capitaine_register_block_pattern_categories");

# Retirer les variations de styles de blocs natifs 
function capitaine_deregister_blocks_styles()
{
    wp_enqueue_script(
        "unregister-styles",
        get_template_directory_uri() . "/assets/js/unregister-blocks-styles.js",
        ["wp-blocks", "wp-dom-ready", "wp-edit-post"],
        "1.0",
    );
}
add_action("enqueue_block_editor_assets", "capitaine_deregister_blocks_styles");

function capitaine_deregister_blocks($allowed_block_types, $editor_context)
{
    $blocks_to_disable = [
        "core/preformatted",
        "core/pullquote",
        "core/quote",
        "core/rss",
        "core/search",
        "core/verse",
    ];
    $active_blocks = array_keys(
        WP_Block_Type_Registry::get_instance()->get_all_registered()
    );

    return array_values(array_diff($active_blocks, $blocks_to_disable));
}
add_filter("allowed_block_types_all", "capitaine_deregister_blocks", 10, 2);

# Ajouter des catégories de compositions personnalisées
function register_patterns_categories()
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
add_filter("init", "register_patterns_categories");

# Allow SVG and WebP uploads
function capitaine_allow_mime($mimes)
{
    $mimes["svg"] = "image/svg+xml";
    $mimes["webp"] = "image/webp";

    return $mimes;
}
add_filter("upload_mimes", "capitaine_allow_mime");

# Allow WebP uploads
function capitaine_allow_file_types($types, $file, $filename, $mimes)
{
    if (false !== strpos($filename, ".webp")) {
        $types["ext"] = "webp";
        $types["type"] = "image/webp";
    }

    return $types;
}
add_filter("wp_check_filetype_and_ext", "capitaine_allow_file_types", 10, 4);


// TODO REMOVE
class SetupEditor
{
    # Extracted JSON configuration data
    protected array $config;

    # All in one setup
    public function setup()
    {
        # Hooks
        add_action('init', [$this, 'registerCustomBlocks']);
        add_action('init', [$this, 'registerBlocksAssets']);

        # Setup
        $this->setupEditorConfig();
    }

    # Auto register custom blocks from blocks/* 
    public function registerCustomBlocks()
    {
        $folders = glob(get_template_directory() . '/blocks/*/');

        foreach ($folders as $folder) {
            $block = basename($folder);
            register_block_type(dirname(__DIR__) . "/blocks/$block");
        }
    }

    # Auto load blocks styles from assets/css/*
    public function registerBlocksAssets()
    {
        $files = glob(get_template_directory() . '/assets/css/*.css');

        foreach ($files as $file) {
            $filename   = basename($file, '.css');
            $block_name = str_replace('core-', 'core/', $filename);

            wp_enqueue_block_style(
                $block_name,
                [
                    'handle' => "capitaine-{$filename}",
                    'src'    => get_theme_file_uri("assets/css/{$filename}.css"),
                    'path'   => get_theme_file_path("assets/css/{$filename}.css"),
                    'ver'    => wp_get_environment_type() === 'local' ? filemtime($file) : null,
                ]
            );
        }
    }

    # Load editor custom configuration and register configurations
    public function setupEditorConfig()
    {
        # Load editor JSON configuration file
        $this->config = $this->loadJsonConfig();

        # Loop through configuration and launch corresponding function
        foreach ($this->config as $key => $data) {

            switch ($key) {
                case 'registerBlocksStyles':
                    add_action('init', [$this, 'registerBlocksStyles']);
                    break;
                case 'registerBlocksCategories':
                    add_filter('block_categories_all', [$this, 'registerBlocksCategories']);
                    break;
                case 'registerPatternsCategories':
                    add_action('init', [$this, 'registerPatternsCategories']);
                    break;
                case 'deregisterBlocks':
                    add_filter('allowed_block_types_all', [$this, 'deregisterBlocks']);
                    break;
                case 'deregisterStylesheets':
                    add_action('wp_enqueue_scripts', [$this, 'deregisterStylesheets']);
                    break;
                case 'deregisterBlocksStyles':
                    add_action('enqueue_block_editor_assets', [$this, 'deregisterBlocksStyles']);
                    break;
                default:
                    break;
            }
        }
    }

    # Register new block styles variations
    function registerBlocksStyles()
    {
        $block_styles = $this->getConfigData('registerBlocksStyles');

        foreach ($block_styles as $block_name => $styles) {
            foreach ($styles as $style_name => $style_label) {
                register_block_style(
                    $block_name,
                    [
                        'name' => $style_name,
                        'label' => $style_label,
                    ]
                );
            }
        }
    }

    # Register custom blocks categories
    public function registerBlocksCategories($categories): array
    {
        $block_categories_to_register = $this->getConfigData('registerBlocksCategories');

        # New categories will appear at the top
        $new_categories = [];

        foreach ($block_categories_to_register as $slug => $title) {
            $new_categories[] = [
                'slug' => $slug,
                'title' => $title,
                'icon' => null
            ];
        }

        return array_merge($new_categories, $categories);
    }

    # Register new block patterns categories
    public function registerPatternsCategories()
    {
        $patterns = $this->getConfigData('registerPatternsCategories');
        foreach ($patterns as $name => $label) {
            $category = ['label' => $label];
            register_block_pattern_category($name, $category);
        }
    }

    # Deregister unwanted blocks stylesheets in order to register custom ones
    public function deregisterStylesheets()
    {
        $blocks_stylesheets_to_disable = $this->getConfigData('deregisterStylesheets');

        foreach ($blocks_stylesheets_to_disable as $block) {
            $handle = str_replace('core/', '', $block);
            wp_dequeue_style("wp-block-$handle");
        }
    }

    # Load the Json file
    protected function loadJsonConfig(): array
    {
        # Check existence of config.json file
        if (!file_exists(get_template_directory() . '/config.json')) {
            return [];
        }

        # Extract data from file
        $config = json_decode(file_get_contents(get_template_directory() . '/config.json'), true);

        # Check if data is valid
        if (!is_array($config)) {
            throw new \Exception('config.json file is not valid');
        }

        # Return all data
        return $config;
    }

    # Get config specific data 
    protected function getConfigData($key): array
    {
        return $this->config[$key] ?? [];
    }
}
