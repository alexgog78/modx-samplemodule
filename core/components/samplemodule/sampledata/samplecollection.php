<?php

/**
 * @var modX $modx
 */

$model = 'sampleCollection';
$sourceFile = PKG_BUILD_SAMPLEDATA_SOURCES_PATH . 'collections.csv';

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
        'description' => $csv[1],
        'richtext' => $csv[2],
        'code' => $csv[3],
        'option_one_id' => $csv[4],
        'option_two_id' => $csv[5],
        'tags' => $modx->fromJSON($csv[6]),
        'options' => $modx->fromJSON($csv[7]),
        'is_active' => 1,
    ];
    $item = $modx->newObject($model);
    $item->fromArray($modelData, '', true);
    if (!$item->save()) {
        $modx->log(modX::LOG_LEVEL_ERROR, 'Error saving: ' . $model);
    }
}
$modx->log(modX::LOG_LEVEL_ERROR, 'Test ' . $model . ' created');
