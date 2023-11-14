<?php 

namespace Wia;

add_action( 'init', 'Wia\\registerBlocksStyles' );
add_action( 'init', 'Wia\\registerBlocksCSS' );


function registerBlocksStyles() {
  $block_styles = [
    'core/button' => [
      'special' => 'Spécial',
      'big' => 'Gros',
    ]
  ];

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

function registerBlocksCSS() {
  $files = glob( get_template_directory() . '/assets/styles/*.css' );

  foreach ($files as $file) {
    $filename   = basename( $file, '.css' );
    $block_name = str_replace( 'core-', 'core/', $filename );

    wp_enqueue_block_style(
      $block_name,
      [
        'handle' => "wia-{$filename}",
        'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
        'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
        'ver'    => wp_get_environment_type() === 'local' ? filemtime( $file ) : null,
      ]
    );
  }
}