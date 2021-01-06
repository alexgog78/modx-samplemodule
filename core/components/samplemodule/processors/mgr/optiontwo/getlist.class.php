<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/getlist.class.php';

class sampleOptionTwoGetListProcessor extends abstractModuleGetListProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleOptionTwo';
}

return 'sampleOptionTwoGetListProcessor';
