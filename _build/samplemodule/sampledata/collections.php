<?php

$model = 'sampleCollection';
$sourceFile = 'collections.csv';

Helpers::resetTable($model);

$data = file(__DIR__ . '/sources/' . $sourceFile);
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
        'created_on' => time(),
        'created_by' => 1,
    ];
    $item = $modx->newObject($model);
    $item->fromArray($modelData, '', true);
    if (!$item->save()) {
        Helpers::log('Error saving: ' . $model);
    }
}
Helpers::log('Test models (' . $model . ') created');
