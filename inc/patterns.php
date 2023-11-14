<?php 

namespace Wia; 

add_action( 'init', 'Wia\\registerPatternCategories' );

function registerPatternCategories() {
  $categories = [
    'sections' => [
      'label' => "Sections",
      'description' => "Des sections pleines largeur pour vos pages de contenus.",
    ],
    'cta' => [
      'label' => "Appels à l’action",
      'description' => "Des compositions pour inciter l’internaute à cliquer.",
    ]
  ];

  foreach ($categories as $name => $category) {
    register_block_pattern_category($name, $category);
  }
}