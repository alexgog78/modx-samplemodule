<?php

require_once dirname(__DIR__) . '/update.class.php';

class sampleOptionTwoUpdateProcessor extends sampleModuleUpdateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';
}

return 'sampleOptionTwoUpdateProcessor';
