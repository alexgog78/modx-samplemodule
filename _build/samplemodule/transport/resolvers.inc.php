<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

/** Default modSystemSetting */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'settings.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);

/** Creating DB tables */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'database.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);

/** Creating sampleData */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'sampledata.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);
