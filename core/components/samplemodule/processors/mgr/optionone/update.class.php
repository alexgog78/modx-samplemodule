<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class sampleOptionOneUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneUpdateProcessor';
