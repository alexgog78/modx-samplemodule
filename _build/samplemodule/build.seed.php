<?php

require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'components/abstractmodule/cli/cli.class.php';

class BuildSeed extends AbstractCLI
{
    const DATA_SOURCE_FILE_PATH = '/data/seed.data.json';

    /** @var SampleModule */
    private $sampleModule;

    /** @var array */
    private $data = [];

    /**
     * BuildSeed constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->sampleModule = $this->modx->getService('samplemodule', 'SampleModule', MODX_CORE_PATH . 'components/samplemodule/model/samplemodule/');
        $this->data = file_get_contents(__DIR__ . self::DATA_SOURCE_FILE_PATH);
        $this->data = $this->modx->fromJSON($this->data);
    }

    public function run()
    {
        foreach ($this->data as $model => $collection) {
            $this->handleCollection($model, $collection);
        }
        $this->success('Seeding finished');
    }

    /**
     * @param string $model
     * @param array $collection
     */
    private function handleCollection(string $model, $collection = [])
    {
        $this->resetTable($model);
        foreach ($collection as $item) {
            $this->addItem($model, $item);
        }
    }

    /**
     * @param string $model
     */
    private function resetTable(string $model)
    {
        $sql = 'TRUNCATE ' . $this->modx->getTableName($model);
        $stmt = $this->modx->prepare($sql);
        if (!$stmt->execute()) {
            $this->error($stmt->errorInfo());
        }
    }

    /**
     * @param string $model
     * @param array $data
     */
    private function addItem(string $model, $data = [])
    {
        $item = $this->modx->newObject($model);
        $item->fromArray(array_merge([
            'is_active' => rand(0, 1),
            'created_on' => time(),
            'created_by' => 1,
        ], $data), '', true);
        if (!$item->save()) {
            $this->info('Error saving ' . $model);
            $this->error($model);
        }
    }
}
(new BuildSeed())->run();
