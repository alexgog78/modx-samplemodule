<?php

require_once __DIR__ . '/default.class.php';

abstract class sampleModuleMgrUpdateController extends sampleModuleMgrDefaultController
{
    /** @var string */
    protected $objectPrimaryKey = 'id';

    /** @var string */
    protected $objectGetProcessorPath;

    /** @var array */
    protected $object = [];

    /**
     * @param array $scriptProperties
     */
    public function process(array $scriptProperties = [])
    {
        $this->object = $this->getRecord($scriptProperties);
        parent::process($scriptProperties);
    }

    /**
     * @param array $scriptProperties
     * @return mixed
     */
    private function getRecord($scriptProperties = [])
    {
        $objectPrimaryKey = $this->objectPrimaryKey;
        $objectPrimaryValue = $scriptProperties[$objectPrimaryKey];
        $processorsPath = $this->objectGetProcessorPath;

        $response = $this->modx->runProcessor($processorsPath, [
            $objectPrimaryKey => $objectPrimaryValue,
        ], [
            'processors_path' => $this->service->processorsPath ?? '',
        ]);
        if (!$response) {
            $this->failure('Processor ' . $processorsPath . ' does not exist;');
            return false;
        }
        if ($response->isError()) {
            $this->failure($response->getMessage());
        }
        return $response->getObject();
    }
}
