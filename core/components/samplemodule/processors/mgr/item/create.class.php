<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleItemCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';
}

return 'sampleItemCreateProcessor';
