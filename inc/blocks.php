<?php 

namespace Wia;

add_action( 'init', 'Wia\\registerCustomBlocks' );
add_filter( 'block_categories_all','Wia\\registerCustomBlocksCategories');
add_action( 'init', 'Wia\\registerBlocksStyles' );
add_action( 'init', 'Wia\\registerBlocksCSS' );
add_action( 'enqueue_block_editor_assets', 'Wia\\unRegisterBlocksStyles' );
add_filter( 'allowed_block_types_all', 'Wia\\disableCoreBlocks');

function registerCustomBlocks()
{
  $folders = glob( get_template_directory() . '/blocks/*/' );

  foreach( $folders as $folder ) {
    $block = basename( $folder );
    register_block_type( dirname(__DIR__) . "/blocks/$block" );
  }
}

function registerCustomBlocksCategories( $categories ) {
  array_unshift( $categories, [
    'slug'	=> 'custom',
    'title' => 'Blocs Spéciaux',
  ] );

  return $categories;
}

function registerBlocksStyles() {
  $block_styles = [
    'core/button' => [
      'border' => 'Contour',
    ],
    'core/group' => [
      'rounded' => "Arrondi",
    ],
    'core/list' => [
      'arrow' => "Flèche",
    ],
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

function unRegisterBlocksStyles() {
  wp_enqueue_script(
    'unregister-styles',
    get_template_directory_uri() . '/assets/scripts/unregister-blocks-styles.js',
    ['wp-blocks', 'wp-dom-ready', 'wp-edit-post'],
    '1.0',
  );
}

function disableCoreBlocks() {
  $blocks = array_keys( \WP_Block_Type_Registry::get_instance()->get_all_registered() );

  $disabled_blocks = [
    'core/preformatted',
    'core/pullquote',
    'core/quote',
    'core/rss',
    'core/search',
    'core/verse',
    'core/social-links',
    'core/social-link',
  ];

  return array_values( array_diff( $blocks, $disabled_blocks ) );
}