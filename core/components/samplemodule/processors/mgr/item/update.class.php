<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleItemUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleItem';
}

return 'sampleItemUpdateProcessor';
