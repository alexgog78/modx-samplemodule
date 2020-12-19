<?php

$model = 'sampleCategory';
$sourceFile = 'categories.csv';

Helpers::resetTable($model);

$data = file(__DIR__ . '/sources/' . $sourceFile);
foreach ($data as $string) {
    $csv = str_getcsv($string, ';');
    $modelData = [
        'name' => $csv[0],
        'is_active' => 1,
    ];
    $item = $modx->newObject($model);
    $item->fromArray($modelData, '', true);
    if (!$item->save()) {
        Helpers::log('Error saving: ' . $model);
    }
}
Helpers::log('Test models (' . $model . ') created');
