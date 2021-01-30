<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/updatemultiple.class.php';

class sampleCollectionUpdateMultipleProcessor extends abstractModuleUpdateMultipleProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCollection';
}

return 'sampleCollectionUpdateMultipleProcessor';
