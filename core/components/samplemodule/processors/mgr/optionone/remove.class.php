<?php

require_once dirname(__DIR__) . '/remove.class.php';

class sampleOptionOneRemoveProcessor extends sampleModuleRemoveProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneRemoveProcessor';
