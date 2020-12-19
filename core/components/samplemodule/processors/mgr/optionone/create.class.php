<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleOptionOneCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneCreateProcessor';
