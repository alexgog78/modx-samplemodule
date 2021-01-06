<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/update.class.php';

class sampleOptionTwoUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleOptionTwo';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];
}

return 'sampleOptionTwoUpdateProcessor';
