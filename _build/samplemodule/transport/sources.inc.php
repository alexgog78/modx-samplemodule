<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

$classKey = 'sources.modMediaSource';
$chunks = include PKG_BUILD_TRANSPORT_DATA_PATH . 'sources.php';
foreach ($chunks as $data) {
    $source = $modx->newObject($classKey);
    $source->fromArray(array_merge([
        'class_key' => 'sources.modFileMediaSource',
    ], $data), '', true, true);

    $properties = [];
    $propertiesData = include PKG_BUILD_TRANSPORT_PROPERTIES_PATH . 'source.' . strtolower($data['name']) . '.php';
    foreach ($propertiesData as $propertyData) {
        $properties[] = array_merge([
            'type' => 'textfield',
            'lexicon' => 'core:source',
            'desc' => 'prop_file.' . $propertyData['name'] . '_desc',
        ], $propertyData);
    }
    $source->setProperties($properties);

    $vehicle = $builder->createVehicle($source, [
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'name',
    ]);
    $builder->putVehicle($vehicle);
    $modx->log(modX::LOG_LEVEL_INFO, 'Added package ' . $classKey . ': ' . $data['name']);
}
