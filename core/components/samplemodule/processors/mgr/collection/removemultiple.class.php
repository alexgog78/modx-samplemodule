<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/removemultiple.class.php';

class sampleCollectionRemoveMultipleProcessor extends abstractModuleRemoveMultipleProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCollection';
}

return 'sampleCollectionRemoveMultipleProcessor';
