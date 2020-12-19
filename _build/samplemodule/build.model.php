<?php

require_once __DIR__ . '/includes/modx.php';
require_once __DIR__ . '/build.config.php';


/** @var xPDOManager $manager */
$manager = $modx->getManager();
/** @var xPDOGenerator $generator */
$generator = $modx->manager->getGenerator();


/**
 * Generate model files
 */
$status = $generator->parseSchema(PKG_SCHEMA_PATH, PKG_MODEL_PATH);
if (!$status) {
    Helpers::log('Error generating model');
    exit();
}


/**
 * Create DB tables
 */
$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH . PKG_NAME_LOWER . '/');
$mapFile = $service->modelPath . $service::PKG_NAMESPACE . '/metadata.' . DB_TYPE . '.php';
include $mapFile;
foreach ($xpdo_meta_map as $baseClass => $extends) {
    foreach ($extends as $className) {
        $manager->createObjectContainer($className);
    }
}


exit();
