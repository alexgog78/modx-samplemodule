<?php

$model = 'sampleItem';
$sourceFile = 'items.csv';

Helpers::resetTable($model);

$data = file(__DIR__ . '/sources/' . $sourceFile);
foreach ($data as $string) {
    $csv = str_getcsv($string, ';');
    $modelData = [
        'collection_id' => $csv[0],
        'name' => $csv[1],
        'description' => $csv[2],
        'options' => $modx->fromJSON($csv[3]),
        'is_active' => 1,
    ];
    $item = $modx->newObject($model);
    $item->fromArray($modelData, '', true);
    if (!$item->save()) {
        Helpers::log('Error saving: ' . $model);
    }
}
Helpers::log('Test models (' . $model . ') created');
