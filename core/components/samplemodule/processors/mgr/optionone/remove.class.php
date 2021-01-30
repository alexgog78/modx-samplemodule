<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class sampleOptionOneRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneRemoveProcessor';
