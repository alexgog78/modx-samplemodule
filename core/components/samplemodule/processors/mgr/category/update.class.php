<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleCategoryUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';
}

return 'sampleCategoryUpdateProcessor';
