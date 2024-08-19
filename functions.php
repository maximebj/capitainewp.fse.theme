<?php

# Retirer les accents des noms de fichiers
add_filter("sanitize_file_name", "remove_accents");

# Retirer le pattern directory et la suggestion de blocs
remove_action("enqueue_block_editor_assets", "wp_enqueue_editor_block_directory_assets");
remove_theme_support("core-block-patterns");

# Ajouter des fonctionnalités
add_theme_support("title-tag");
add_theme_support("post-thumbnails");
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

# On enregistre une variation de style de bloc personnalisée pour le bloc bouton
function capitaine_register_block_styles()
{
  // register_block_style(
  //   "core/button",
  //   [
  //     "name" => "primary-button",
  //     "label" => __("Action", "capitainewp"),
  //   ]
  // );

  // register_block_style(
  //   "core/image",
  //   [
  //     "name" => "secondary-button",
  //     "label" => __("Secondaire", "capitainewp"),
  //   ]
  // );
}
add_action("init", "capitaine_register_block_styles");

# Charger les styles des variations de blocs
function capitaine_register_blocks_assets()
{
  // wp_enqueue_block_style(
  //   "core/button",
  //   [
  //     "handle" => "capitaine-button",
  //     "src"    => get_theme_file_uri("assets/css/button.css"),
  //     "path"   => get_theme_file_path("assets/css/button.css"),
  //     "ver"    => "1.0",
  //   ]
  // );
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
function capitaine_register_block_pattern_categories(): void
{
  register_block_pattern_category("cta", ["label" => "Call to action"]);
  register_block_pattern_category("cards", ["label" => "Cards"]);
  register_block_pattern_category("marketing", ["label" => "Marketing"]);
}
add_action("init", "capitaine_register_block_pattern_categories");

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
