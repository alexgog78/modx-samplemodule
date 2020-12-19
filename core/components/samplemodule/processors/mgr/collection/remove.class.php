<?php

require_once dirname(__DIR__) . '/remove.class.php';

class sampleCollectionRemoveProcessor extends sampleModuleRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleCollection';
}

return 'sampleCollectionRemoveProcessor';
