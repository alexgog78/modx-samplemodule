<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class sampleCategoryRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'samplemodule';

    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var array */
    public $languageTopics = [
        'samplemodule:status',
    ];
}

return 'sampleCategoryRemoveProcessor';
