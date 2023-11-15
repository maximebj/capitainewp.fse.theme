<?php 

namespace Wia;

add_action( 'wp_enqueue_scripts', 'Wia\\registerAssets' );

# Retirer le pattern directory et la suggestion de blocs
remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
remove_theme_support( 'core-block-patterns' );

# Ajouter des fonctionnalités
add_theme_support( 'post-thumbnails' );

add_theme_support( 'editor-styles' );
add_editor_style( [ 'editor.css' ] );


function registerAssets() {
  # Enqueue styles
  wp_enqueue_style( 'main', get_stylesheet_uri(), [], '1.0.0' );

  # Disable native blocks styles
  wp_dequeue_style( 'wp-block-columns' );
}