<?php

require_once dirname(__DIR__) . '/remove.class.php';

class sampleCategoryRemoveProcessor extends sampleModuleRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';
}

return 'sampleCategoryRemoveProcessor';
