<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleCollectionCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';
}

return 'sampleCollectionCreateProcessor';
