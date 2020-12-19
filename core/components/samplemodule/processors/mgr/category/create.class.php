<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleCategoryCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';

    /** @var bool */
    protected $softValidate = true;
}

return 'sampleCategoryCreateProcessor';
