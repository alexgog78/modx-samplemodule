<?php

/**
 * @var modX $modx
 */

$model = 'sampleCategory';
$sourceFile = PKG_BUILD_SAMPLEDATA_SOURCES_PATH . 'categories.csv';

$sql = 'TRUNCATE ' . $modx->getTableName($model);
$stmt = $modx->prepare($sql);
if (!$stmt->execute()) {
    $modx->log(modX::LOG_LEVEL_ERROR, print_r($stmt->errorInfo(), true));
    exit();
}

$data = file($sourceFile);
foreach ($data as $string) {
    $csv = str_getcsv($string, ';');
    $modelData = [
        'name' => $csv[0],
        'is_active' => 1,
    ];
    $item = $modx->newObject($model);
    $item->fromArray($modelData, '', true);
    if (!$item->save()) {
        $modx->log(modX::LOG_LEVEL_ERROR, 'Error saving: ' . $model);
    }
}
$modx->log(modX::LOG_LEVEL_ERROR, 'Test ' . $model . ' created');
