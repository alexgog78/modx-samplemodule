<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class sampleItemRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleItem';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];
}

return 'sampleItemRemoveProcessor';
