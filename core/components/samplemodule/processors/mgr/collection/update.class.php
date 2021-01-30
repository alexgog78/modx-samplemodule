<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class sampleCollectionUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var bool */
    protected $softValidate = false;
}

return 'sampleCollectionUpdateProcessor';
