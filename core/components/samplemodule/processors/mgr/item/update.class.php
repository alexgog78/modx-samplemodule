<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleItemUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';

    /** @var bool */
    protected $softValidate = false;
}

return 'sampleItemUpdateProcessor';
