<?php

require_once dirname(__DIR__) . '/create.class.php';

class sampleOptionTwoCreateProcessor extends sampleModuleCreateProcessor
{
    /** @var string */
    public $classKey = 'sampleOptionTwo';
}

return 'sampleOptionTwoCreateProcessor';
