<?php

require_once __DIR__ . '/includes/modx.php';
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/build.config.php';

$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH);

require_once __DIR__ . '/sampledata/categories.php';
require_once __DIR__ . '/sampledata/option_one.php';
require_once __DIR__ . '/sampledata/option_two.php';
require_once __DIR__ . '/sampledata/collections.php';
require_once __DIR__ . '/sampledata/collection_categories.php';
require_once __DIR__ . '/sampledata/items.php';

exit();
