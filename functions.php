<?php

namespace Capitaine;

# Include files
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/editor.php';
require_once __DIR__ . '/inc/post-types.php';

# Init Classes
$editor = new SetupEditor();
$editor->setup();
