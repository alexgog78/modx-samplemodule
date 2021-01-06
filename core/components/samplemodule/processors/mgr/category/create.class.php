<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/create.class.php';

class sampleCategoryCreateProcessor extends abstractModuleCreateProcessor
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

return 'sampleCategoryCreateProcessor';
