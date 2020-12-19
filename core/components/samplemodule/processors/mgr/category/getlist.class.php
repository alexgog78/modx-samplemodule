<?php

require_once dirname(__DIR__) . '/getlist.class.php';

class sampleCategoryGetListProcessor extends sampleModuleGetListProcessor
{
    /** @var string */
    public $classKey = 'sampleCategory';
}

return 'sampleCategoryGetListProcessor';
