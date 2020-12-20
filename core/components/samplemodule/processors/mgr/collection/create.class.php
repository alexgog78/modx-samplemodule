<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleCollectionCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';

    /** @var bool */
    protected $softValidate = false;
}

return 'sampleCollectionCreateProcessor';
