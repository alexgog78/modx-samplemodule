<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleOptionOneUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionOne';
}

return 'sampleOptionOneUpdateProcessor';
