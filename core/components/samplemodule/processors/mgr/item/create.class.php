<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleItemCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var bool */
    protected $softValidate = false;
}

return 'sampleItemCreateProcessor';
