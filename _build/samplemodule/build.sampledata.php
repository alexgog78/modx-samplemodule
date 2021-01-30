<?php

/**
 * @var modX $modx
 */
require_once dirname(__DIR__) . '/modx.php';
require_once __DIR__ . '/build.config.php';

/**
 * @var sampleModule $service
 */
$service = $modx->getService(PKG_NAME_LOWER, PKG_NAME, PKG_MODEL_PATH);

/**
 * @var sampleModuleData $sampleModuleData
 */
require_once $service->sampleDataPath . 'sampledata.class.php';
$sampleModuleData = new sampleModuleData($service);

$sampleModuleData->process();

exit();
