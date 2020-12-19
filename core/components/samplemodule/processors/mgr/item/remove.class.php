<?php

require_once dirname(__DIR__) . '/remove.class.php';

class sampleItemRemoveProcessor extends sampleModuleRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';
}

return 'sampleItemRemoveProcessor';
