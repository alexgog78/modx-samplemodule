<?php

class sampleModuleData
{
    const SOURCES_PATH = __DIR__ . '/sources/';

    /** @var sampleModule */
    private $service;

    /** @var modX */
    private $modx;

    /** @var array */
    private $modelMapping = [
        'sampleCategory' => 'categories',
        'sampleOptionOne' => 'options_one',
        'sampleOptionTwo' => 'options_two',
        'sampleCollection' => 'collections',
        'sampleCollectionCategory' => 'collection_categories',
        'sampleItem' => 'items',
    ];

    /**
     * sampleModuleData constructor.
     *
     * @param sampleModule $service
     */
    public function __construct(sampleModule $service)
    {
        $this->service = $service;
        $this->modx = $service->modx;
    }

    public function process()
    {
        foreach ($this->modelMapping as $model => $source) {
            $this->clearTable($model);
            $this->addData($model, $source . '.csv');
        }
    }

    /**
     * @param string $model
     * @param string $source
     */
    private function addData(string $model, string $source)
    {
        $rows = file($this::SOURCES_PATH . $source);
        $keys = str_getcsv(array_shift($rows));
        foreach ($rows as $row) {
            $row = str_getcsv($row);
            $data = array_combine($keys, $row);

            $item = $this->modx->newObject($model);
            $item->fromArray($data, '', true);
            if (!$item->save()) {
                $this->service->log('Error saving: ' . $model, modX::LOG_LEVEL_INFO);
            }
        }
        $this->service->log('Test ' . $model . ' (' . count($rows) . ') created', modX::LOG_LEVEL_INFO);
    }

    /**
     * @param string $model
     */
    private function clearTable(string $model)
    {
        $sql = 'TRUNCATE ' . $this->modx->getTableName($model);
        $stmt = $this->modx->prepare($sql);
        if (!$stmt->execute()) {
            $this->service->log($stmt->errorInfo(), modX::LOG_LEVEL_INFO);
        }
    }
}
