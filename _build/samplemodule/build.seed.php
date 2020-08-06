<?php

require_once dirname(__FILE__) . '/build.config.php';
require_once MODX_CORE_PATH . 'components/abstractmodule/cli/cli.class.php';

class BuildSeed extends AbstractCLI
{
    /** @var SampleModule */
    private $sampleModule;

    /**
     * BuildSeed constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->sampleModule = $this->modx->getService('samplemodule', 'SampleModule', MODX_CORE_PATH . 'components/samplemodule/model/samplemodule/');
    }

    public function run()
    {
        $this->seed('sampleCollection', 'collections.csv');
        $this->seed('sampleItem', 'items.csv');
        $this->seed('sampleCategory', 'categories.csv');
        $this->seed('sampleCollectionCategory', 'collection_categories.csv');
        $this->seed('sampleOptionOne', 'option_one.csv');
        $this->seed('sampleOptionTwo', 'option_two.csv');
        $this->success('Seeding finished');
    }

    /**
     * @param string $model
     * @param string $source
     */
    private function seed(string $model, string $source)
    {
        $this->resetTable($model);
        $data = file(__DIR__ . '/seed/' . $source);
        foreach ($data as $string) {
            $csv = str_getcsv($string, ';');
            switch ($model) {
                case 'sampleCollection':
                    $modelData = $this->prepareCollection($csv);
                    break;
                case 'sampleItem':
                    $modelData = $this->prepareItem($csv);
                    break;
                case 'sampleCategory':
                    $modelData = $this->prepareCategory($csv);
                    break;
                case 'sampleCollectionCategory':
                    $modelData = $this->prepareCollectionCategory($csv);
                    break;
                case 'sampleOptionOne':
                case 'sampleOptionTwo':
                    $modelData = $this->prepareOption($csv);
                    break;
                default:
                    $this->error($model . ' no data');
            }
            $this->addItem($model, $modelData);
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
        $item->fromArray($data, '', true);
        if (!$item->save()) {
            $this->info('Error saving ' . $model);
            $this->error($model);
        }
    }

    /**
     * @param array $csv
     * @return array
     */
    private function prepareCollection(array $csv)
    {
        return [
            'name' => $csv[0],
            'description' => $csv[1],
            'richtext' => $csv[2],
            'code' => $csv[3],
            'option_one_id' => $csv[4],
            'option_two_id' => $csv[5],
            'tags' => $this->modx->fromJSON($csv[6]),
            'options' => $this->modx->fromJSON($csv[7]),
            'is_active' => 1,
            'created_on' => time(),
            'created_by' => 1,
        ];
    }

    /**
     * @param array $csv
     * @return array
     */
    private function prepareItem(array $csv)
    {
        return [
            'collection_id' => $csv[0],
            'name' => $csv[1],
            'description' => $csv[2],
            'options' => $this->modx->fromJSON($csv[3]),
            'is_active' => 1,
            'created_on' => time(),
            'created_by' => 1,
        ];
    }

    /**
     * @param array $csv
     * @return array
     */
    private function prepareCategory(array $csv)
    {
        return [
            'name' => $csv[0],
            'is_active' => 1,
        ];
    }

    private function prepareCollectionCategory(array $csv)
    {
        return [
            'collection_id' => $csv[0],
            'category_id' => $csv[1],
        ];
    }

    /**
     * @param array $csv
     * @return array
     */
    private function prepareOption(array $csv)
    {
        return [
            'name' => $csv[0],
            'is_active' => 1,
        ];
    }
}
(new BuildSeed())->run();
