<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class sampleOptionTwoRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleOptionTwo';
}

return 'sampleOptionTwoRemoveProcessor';
