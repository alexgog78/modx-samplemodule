<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/create.class.php';

class sampleItemCreateProcessor extends abstractModuleCreateProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleItem';

    /** @var bool */
    protected $softValidate = false;
}

return 'sampleItemCreateProcessor';
