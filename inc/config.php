<?php 

namespace Wia;

add_action( 'init', 'Wia\\themeFeatures' );
add_action( 'wp_enqueue_scripts', 'Wia\\registerAssets' );


function themeFeatures() {
  add_theme_support( 'post-thumbnails' );

  add_theme_support( 'editor-styles' );
  add_editor_style( [ 'editor.css' ] );

  # Retirer le pattern directory et la suggestion de blocs
  remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
  remove_theme_support( 'core-block-patterns' );
}

function registerAssets() {


  # Disable native blocks styles
  wp_dequeue_style( 'wp-block-columns' );
}