<?php

namespace Capitaine;

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\registerAssets');
add_filter('upload_mimes', __NAMESPACE__ . '\\allowMimeTypes');
add_filter('wp_check_filetype_and_ext', __NAMESPACE__ . '\\allowFileTypes', 10, 4);
add_filter('sanitize_file_name', 'remove_accents');

# Retirer le pattern directory et la suggestion de blocs
remove_action('enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets');
remove_theme_support('core-block-patterns');

# Ajouter des fonctionnalités
add_theme_support('post-thumbnails');

add_theme_support('editor-styles');
add_editor_style(['editor.css']);


function registerAssets()
{
  # Enqueue styles
  wp_enqueue_style('main', get_stylesheet_uri(), [], '1.0.0');

  # Disable native blocks styles
  //wp_dequeue_style( 'wp-block-columns' );
}

function allowMimeTypes($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  $mimes['webp'] = 'image/webp';

  return $mimes;
}

function allowFileTypes($types, $file, $filename, $mimes)
{
  if (false !== strpos($filename, '.webp')) {
    $types['ext'] = 'webp';
    $types['type'] = 'image/webp';
  }

  return $types;
}

# TODO : Add optimization (remove emojis...)