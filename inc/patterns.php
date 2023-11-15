<?php 

namespace Wia; 

add_action( 'init', 'Wia\\registerPatternCategories' );

function registerPatternCategories() {
  $categories = [
    'hero' => [
      'label' => "Hero",
      'description' => "Des sections d’accroche pour vos en-têtes de pages.",
    ],
    'section' => [
      'label' => "Sections",
      'description' => "Des sections pour vos pages.",
    ],
  ];

  foreach ($categories as $name => $category) {
    register_block_pattern_category($name, $category);
  }
}